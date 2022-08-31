<?php
require __DIR__. '/parts/connect_db.php';
// 查看有沒有登入及有沒有購物車
if(empty($_SESSION['user']) or empty($_SESSION['cart'])){
    header('Location: product-list.php');
    exit;
}
$total = 0;
//應該由資料表的資料計算總價
foreach($_SESSION['cart'] as $k=>$v){
    $total += $v['price']*$v['qty'];
}
// 寫入訂單
// sprintf() 函數把格式化的字符串寫入一個變量中
$o_sql = sprintf( "INSERT INTO `orders`(`member_sid`, `amount`, `order_date`) 
            VALUES(%s, %s, NOW())", $_SESSION['user']['id'], $total );


// 查看有沒有寫入成功
$stmt = $pdo->query($o_sql);

// echo $stmt->rowCount()."<br>";
// echo $pdo->lastInsertId(); // primary key
/*
echo json_encode([
    'rowCount'=>$stmt->rowCount(),
    'lastInsertId'=>$pdo->lastInsertId(),
]);
exit;
*/

$order_sid = $pdo->lastInsertId();
//訂單明細
$od_sql = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `price`, `quantity`) VALUES(?, ?, ?, ?)";
$stmt = $pdo->prepare($od_sql);
foreach($_SESSION['cart'] as $k=>$v){
    $stmt->execute([
        $order_sid,
        $v['sid'],
        $v['price'],
        $v['qty'],
    ]);
}

//清除購物車內容
unset($_SESSION['cart']);



?>

<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <h2>
        感謝您的購買 月老喵愛你呦
    </h2>
    <!-- 
        include 包含檔案進來
        require 包含檔案進來(連資料庫使用錯誤會直接出現)
    -->
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>

<?php include __DIR__. '/parts/html.foot.php'; ?>