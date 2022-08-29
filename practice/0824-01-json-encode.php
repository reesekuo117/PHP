<?php
$ar = [
    'name' => '橘胖',
    'age' => '7',
    'data' => '/abc',
    'data1' => '',

];
echo json_encode($ar, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);  //使用＋或｜都可以 // | 有一個ture就是ture

// JSON_UNESCAPED_UNICODE 不跳脫 中文字就可以顯示

// 原先的（不可同時存在）echo只會出現一次
// echo json_encode($ar);
// {"name":"\u6a58\u80d6","age":"7"}  跳脫\

// {"name":"橘胖","age":"7","data":"/abc"}
?>


