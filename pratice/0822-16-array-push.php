<!-- 還原程式碼 包含所有空格 -->
<pre>
<?php
$arr[] = $i;  //空陣列，有說明的用意，不是必須

for($i=1; $i<=20; $i++){
    $arr[] = $i;  // array push
}
// 亂數排序
shuffle($arr);

print_r($arr);
?>
</pre>

