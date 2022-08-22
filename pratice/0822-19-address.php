<pre>
<?php
$ar = [2, 5, 7, 3, 17];

foreach ($ar as &$v){
    $v++;
}
print_r($ar);

//foreach(陣列變數 as 列舉變數) {
    //迴圈主體內容}
?>
</pre>




