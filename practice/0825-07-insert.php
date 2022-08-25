<?php
require __DIR__. '/parts/connect_db.php';

//SQL injection, SQL 隱碼攻擊
$sql = "INSERT INTO `address_book`(
        `name`,
        `email`, 
        `mobile`, 
        `birthday`, 
        `address`, 
        `created_at`
    ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        NOW()
    )";


$stmt = $pdo->prepare($sql);  //prepare 檢查語法,到execute 才執行,可避免SQL 隱碼攻擊被竊取資料
$stmt->execute([
    "橘胖's女友",
    'aaa@aaa.com',
    '0935111222',
    '1990-12-11',
    '台南市',
]);

echo $stmt->rowCount();
//CRUD 新增修改刪除  //rowCount()影響的資料的筆數 //判斷有無修改成功

echo json_encode([
    $stmt->rowCount(),   // 影響的資料筆數
    $pdo->lastInsertId(),  //最新的新增資料的主鍵
]);



