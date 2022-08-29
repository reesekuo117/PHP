<?php

require __DIR__. '/parts/connect_db.php';

if(isset($_GET['sid'])){
    $sid = intval($_GET['sid']);
    $sql = "DELETE FROM address_book WHERE sid=$sid";
    $pdo->query($sql);
}
// 如果有sid執行刪除DELETE

header('Location: data-list.php');


