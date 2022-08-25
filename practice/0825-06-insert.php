<?php
require __DIR__. '/parts/connect_db.php';

//INSERT INTO 新增資料
//UPDATE 修改
//DELETE FROM 刪除
//SELECT INTO 新建

//SQL injection ,SQL 隱碼攻擊
$sql = "INSERT INTO `address_book`(
    `name`,
    `email`, 
    `mobile`, 
    `birthday`, 
    `address`, 
    `created_at`
    ) VALUES (
        '小明',
        'aaa@aaa.com',
        '0935111222',
        '1990-12-11',
        '台南市',
        NOW()
    )";


$stmt = $pdo->query($sql);

echo $stmt->rowCount();
//CRUD 新增修改刪除  //rowCount()影響的資料的筆數 //判斷有無修改成功



