<?php
require __DIR__. '/parts/connect_db.php';  // /開頭
$pageName ='cart'; //頁面名稱
?>

<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="alert alert-danger" role="alert">
            購物車內沒有商品
        </div>
    <?php else : ?>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover cart-table">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                        <th scope="col">#商品編號</th>
                        <th scope="col">封面</th>
                        <th scope="col">書名</th>
                        <th scope="col">價格</th>
                        <th scope="col">數量</th>
                        <th scope="col">小計</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $total = 0;
                    foreach($_SESSION['cart'] as $k=>$v): 
                        $total += $v['price'] * $v['qty'];  // 計算總價格
                ?>
                    <tr data-sid="<?= $k ?>" class="cart-item">
                        <td>
                            <a href="javascropt:" onclick="removeItem(event)">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                        <td><?= $k ?></td>
                        <td><img src="imgs/small/<?= $v['book_id'] ?>.jpg" alt="<?= $v['bookname'] ?>"></td>
                        <td><?= $v['bookname'] ?></td>
                        <td class="price" data-val="<?= $v['price'] ?>"></td>
                        <td>
                            <select class="form-select qty" onchange="updataItem(event)">
                                <?php for($i=1; $i<=10; $i++): ?>
                                    <option value="<?= $i ?>" <?= $i==$v['qty'] ? 'selected' : '' ?>><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td class="sub-total"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="alert alert-success" role="alert">
        <span>總計: </span><span id="total-price"></span> 元
    </div>
    <div>
        <!-- 判斷登入狀態 -->
        <?php if(empty($_SESSION['user'])): ?>
            <div class="alert alert-danger" role="alert">
                請先登入會員, 再結帳
            </div>
        <?php  else: ?>
            <a href="buy.php" class="btn btn-warning">結帳</a>
        <?php endif;  ?>
    </div>
    <?php endif; ?>
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>
<script>
    const dollarCommas = function(n){
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    function removeItem(event){
        const tr = $(event.currentTarget).closest('tr');
        const sid = tr.attr('data-sid');
        $.get(
            'handle-cart.php',
            {sid},
            function(data){
                console.log(data);
                showCartCount(data); // 總數量
                tr.remove();
                //TODO:更新小計,總計,總數量
                updatePrices();
            },
            'json');
    }
    function updataItem(event){
        const sid = $(event.currentTarget).closest('tr').attr('data-sid');
        const qty = $(event.currentTarget).val();
        $.get(
            'handle-cart.php',
            {sid,qty},
            function(data){
                console.log(data);
                showCartCount(data); // 總數量
                //TODO:更新小計,總計,總數量
                updatePrices();
            },
            'json');
    }
    function updatePrices(){
        let total = 0; // 總價

        $('.cart-item').each(function(){
            const tr = $(this);
            const td_price = tr.find('.price');
            const td_sub = tr.find('.sub-total');

            const price = +td_price.attr('data-val'); // +轉換成數字
            const qty = +tr.find('.qty').val();

            td_price.html('$ '+ dollarCommas(price));
            td_sub.html('$ '+ dollarCommas(price * qty));
            total += price * qty;
        });
        $('#total-price').html('$ '+ dollarCommas(total));
    }
    updatePrices(); //一進來就要先執行一次
</script>
<?php include __DIR__. '/parts/html.foot.php'; ?>


