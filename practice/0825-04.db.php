<?php

require __DIR__. '/parts/connect_db.php';  // /開頭

$sql = "SELECT * FROM address_book"; //sql外層通常用雙引號 內層用單引號就不需要跳脫
$stmt = $pdo->query($sql);  
// 這個代理物件＄stmt

while($row = $stmt->fetch()){
    echo "<div>{$row['name']}: {$row['mobile']}</div>";
}
//




