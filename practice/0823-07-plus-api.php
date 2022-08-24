<?php
// isset() 函数用于检测变量是否已设置并且非 NULL
// intval() 函数用于获取变量的整数值
$a = isset($_POST['a']) ? intval($_POST['a']) : 0 ;
$b = isset($_POST['b']) ? intval($_POST['b']) : 0 ;
//echo $a + $b;  //變更為以下程式

$output = [
    'postData' => $_POST,
    'result' => $a + $b,
];
//header('Content-Type: application/json'); //設定http檔頭,回應的檔案內容的類型  //可加可不加
echo json_encode($output, JSON_UNESCAPED_UNICODE);




