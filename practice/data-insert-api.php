<?php
require __DIR__. '/parts/connect_db.php';

$output = [
    'success' => false, // 是否新增成功
    'error' => '', // 錯誤訊息
    'code' => 0,
    'postData' => $_POST,
];

if(empty($_POST['name']) or empty($_POST['email'])){
    $output['error'] = '欄位資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
//$birthday = $_POST['birthday']
// 如果時間的字串無法轉換成 timestamp, 表示格式錯誤
if(strtotime($_POST['birthday'])===false){
    $birthday = null;
    //不能轉換就是空
}else {
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
}

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

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $birthday,
    $_POST['address'],
]);

if($stmt->rowCount()){
    $output['success'] = true;

} else {
    $output['error'] = '資料沒有新增';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
//轉換中文字


