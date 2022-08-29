<?php

// echo $_SERVER['HTTP_REFERER'];  // 人從哪裡來
// exit;

require __DIR__. '/parts/connect_db.php';

if(isset($_GET['sid'])){
    $sid = intval($_GET['sid']);
    $sql = "DELETE FROM address_book WHERE sid=$sid";
    $pdo->query($sql);
}
// 如果有sid執行刪除DELETE

//刪除後回到該頁面
$comeFrom = 'data-list.php';
if(! empty($_SERVER['HTTP_REFERER'])){
    $comeFrom = $_SERVER['HTTP_REFERER'];
}

header('Location: '. $comeFrom);



