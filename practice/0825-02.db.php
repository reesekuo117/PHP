<?php

require __DIR__. '/parts/connect_db.php';  // /開頭

$sql = "SELECT * FROM address_book"; //sql外層通常用雙引號 內層用單引號就不需要跳脫
$stmt = $pdo->query($sql);  
// 這個代理物件＄stmt

//$row = $stmt->fetch(PDO::FETCH_NUM); //讀取一筆 索引值陣列
//$row = $stmt->fetch(PDO::FETCH_ASSOC); //讀取一筆 關聯式陣列
//$row = $stmt->fetch(PDO::FETCH_BOTH); //讀取一筆 關聯式陣列
//$row = $stmt->fetch(); //讀取一筆 關聯式陣列

$row = $stmt->fetchAll(); //讀取所有資料  fetch拿取一筆

header('Content-Type: application/json'); //轉換文字
echo json_encode($row);




