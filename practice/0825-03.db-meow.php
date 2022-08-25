<?php

require __DIR__. '/parts/meow_db.php';  // /開頭

$sql = "SELECT * FROM address_book"; //sql外層通常用雙引號 內層用單引號就不需要跳脫
$stmt = $pdo->query($sql);  
// 這個代理物件＄stmt

$row = $stmt->fetchAll(); //讀取所有資料  fetch拿取一筆

header('Content-Type: application/json'); //轉換文字
echo json_encode($row);




