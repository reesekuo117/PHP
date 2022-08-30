<?php
require __DIR__. '/parts/connect_db.php';  // /開頭
$pageName ='list'; //頁面名稱

//int isset(mixed var); 說明: 若參數var存在則傳回true，否則傳回false
//intval -- 取得變量的整數值
$perPage = 4;  //每頁最多有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //使用者決定看第幾頁
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$lowp = isset($_GET['lowp']) ? intval($_GET['lowp']) : 0; //低價
$highp = isset($_GET['highp']) ? intval($_GET['highp']) : 0; //高價
// cate用戶要指定哪個分類  cates分類的資料

$qsp = []; //query string parameters 查詢字串的參數

// 取得分類資料
$cates = $pdo->query("SELECT * FROM categories WHERE parent_sid=0")
    ->fetchAll();

// -------------------------------商品
//
$where = 'where 1';  //起頭
if($cate){
    $where .= " AND category_sid=$cate ";
    $qsp['cate'] = $cate;
} // .= 相加.

//做價格排序
if($lowp){
    $where .= " AND price>=$lowp ";
    $qsp['lowp'] = $lowp;
}
if($highp){
    $where .= " AND price<=$highp ";
    $qsp['highp'] = $highp;
}

//取得資料的總筆數  
$t_sql = "SELECT COUNT(1) FROM products $where";   
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];  //PDO::FETCH_NUM — 數字索引陣列形式

//計算總頁數
$totalPages = ceil($totalRows/$perPage);  //ceil無條件進位

$rows = []; //預設
//有資料才執行 >0
if($totalRows > 0){
    if($page<1){
        //header('Location: data-list.php?page=1');
        header('Location: ?page=1');
        exit;
    }
    if($page>$totalPages){
        header('Location: ?page='. $totalPages);
        exit;
    }
    //$page<1 ? ($page=1) : null;  //三元運算子
    //$page>$totalPages ? ($page=$totalPages) : null; 

    //TODO:取得該頁面的資料
    //sql外層通常用雙引號 內層用單引號就不需要跳脫
    $sql = sprintf("SELECT * FROM `products` %s ORDER BY `sid` DESC LIMIT %s, %s", 
        $where,
        ($page-1)*$perPage, 
        $perPage
        ); 
    // ORDER BY `sid` DESC 降冪 講義41頁
    // LIMIT %s, %s ==> [索引][筆數]
    $rows = $pdo->query($sql)->fetchAll();
}
// json_encode判斷型別輸出JSON 數字型態
// echo json_encode([ 
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'perPage' => $perPage,
//     'page' => $page,
//     'rows' => $rows,
// ]);
// exit;
?>

<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
<!-- 分類 -->
    <div class="row">
        <div class="col">
            <?php $allBtnStyle = empty($cate) ? 'btn-primary' : 'btn-outline-primary' ?>
        <a type="button" class="btn <?= $allBtnStyle ?>"
            href="?<?php 
                    $tmp = $qsp; //複製
                    unset($tmp['cate']); 
                    unset($tmp['lowp']); 
                    unset($tmp['highp']); 
                    echo http_build_query($tmp); ?>">所有商品</a>
            <!--  -->
        <?php foreach($cates as $c): 
            $btnStyle = $c['sid']==$cate ? 'btn-primary' : 'btn-outline-primary' 
            ?>
            <!-- 如果cate在當頁面 btn樣式變藍色 -->
            <a type="button" class="btn <?= $btnStyle ?>" href="?<?php 
                $tmp['cate']=$c['sid'];
                echo http_build_query($tmp); ?>">
                <?= $c['name'] ?>
            </a>
            <!--  -->
        <?php endforeach ?>
        </div>
    </div>
<!-- 價格排序 -->
<div class="row">
    <div class="col">
        <!-- 沒有低價格最高價格設定400 -->
        <?php $btnStyle =(!$lowp && $highp==400) ? 'btn-primary' : 'btn-outline-primary' ?>
        <a type="button" class="btn <?= $btnStyle ?>"
            href="?<?php 
                        $tmp = $qsp;
                        unset($tmp['lowp']);  
                        $tmp['highp']=400;
                        echo http_build_query($tmp); ?>">~400</a>
        <?php $btnStyle =($lowp==400 && $highp==500) ? 'btn-primary' : 'btn-outline-primary' ?>
        <a type="button" class="btn btn-outline-primary"
            href="?<?php $tmp['lowp']=400;  
                        $tmp['highp']=500;
                        echo http_build_query($tmp); ?>">400~500</a>
        <?php $btnStyle =($lowp==500 && !$highp) ? 'btn-primary' : 'btn-outline-primary' ?>
        <a type="button" class="btn btn-outline-primary"
            href="?<?php unset($tmp['highp']);  
                        $tmp['lowp']=500;
                        echo http_build_query($tmp); ?>">500~</a>
    </div>
</div>
<!--  -->
    <div class="row">
        <div class="col">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?<?php $qsp['page']=$page-1; echo http_build_query($qsp); ?>">
                    <i class="fa-solid fa-angle-left"></i>
                    </a>
                </li>
                <!-- < for($i=1; $i<=$totalPages; $i++): ?> -->
                <?php for($i=$page - 2; $i<=$page + 2; $i++): 
                    if($i>=1 and $i <= $totalPages) :
                    $qsp['page']=$i; ?>
                <li class="page-item <?= $page==$i ? 'active' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query($qsp); ?>"><?= $i ?></a>
                </li>
                <!-- < endfor; ?> -->
                <?php endif; endfor; ?>
                <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?<?php $qsp['page']=$page+1;
                    echo http_build_query($qsp); ?>">
                    <i class="fa-solid fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </div>
    <div class="row">
        <?php foreach($rows as $r) : ?>
        <div class="col-lg-3">
        <div class="card">
            <img src="./imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $r['bookname'] ?></h5>
                <p class="card-text"><?= $r['author'] ?></p>
                <p class="card-text"><?= $r['price'] ?></p>
                <p>
                    <!-- 不能給id -->
                    <!-- option selected -->
                    <!-- https://api.jquery.com/selected-selector/ -->
                    <select class="form-select">
                        <?php for($i=1; $i<=10; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </p>
                <p>
                    <button class="btn btn-warning" 
                    data-sid="<?= $r['sid']?>"
                    onclick="addToCart(event)">加入購物車</button>
                    <!-- event要有 才知道選取的商品項目 -->
                </p>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>
<script>
    function addToCart(event) {
        const btn = $(event.currentTarget);
        //currentTarget 事件屬性返回其事件偵聽器觸發事件的元素
        const qty = btn.closest('.card-body').find('select').val();
        const sid = btn.attr('data-sid');
        //使用attr叫出自定屬性 data-sid

        // console.log(btn.closest('.card-body').find('select'));
        console.log({sid, qty});

        // $(selector).get(url,data,success(response,status,xhr),dataType)
        $.get(
            'handle-cart.php', 
            {sid, qty}, 
            function(data){
                showCartCount(data);
            }, 
            'json');
    }
</script>
<?php include __DIR__. '/parts/html.foot.php'; ?>


