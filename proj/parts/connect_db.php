<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'proj57';

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8"; //data source name

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
// 

try{
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
}catch(PDOException $ex){
    echo "Exception:". $ex->getMessage();
    //Exception 可自定義 get出現的訊息
}
//https://developer.mozilla.org/zh-TW/docs/Web/JavaScript/Reference/Statements/try...catch

//if//    判斷有沒有做初始化，沒有就會執行

if(! isset($_SESSION)){
    session_start();
}





