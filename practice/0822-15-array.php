<!-- 還原程式碼 包含所有空格 -->
<pre>
<?php

// 索引式陣列
$ar1 = array(2, 4, 6, 8, 10, 12);
$ar2 = [2, 4, 6, 8, 10, 12];


// 關聯式陣列,由一個字串 key 對應到一個 value。
$ar3 = array(
    'name' => 'John',
    'age' => 25,
);
$ar4 = [
    'name' => 'John',
    'age' => 25,
];

// print_r()和 var_dump()常用來查看資料內容和除錯。
// 可查看任何
var_dump($ar1);
var_dump($ar3);

// 專門用來查看array
print_r($ar2);
print_r($ar4);
?>
</pre>

