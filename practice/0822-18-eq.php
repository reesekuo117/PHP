<pre>
<?php
$ar3 = [
    'name' => 'John',
    'age' => 25,
];

$ar4 = $ar3; //複製後再設定 不會變更到原陣列 //平常使用這個就好了！
$ar5 = &$ar3; 
//設定位址（類似參照js）//$ar5是$ar3的別名
//有＆符號直接傳參照

$ar3['age'] = 32;

print_r($ar3);
print_r($ar4);
print_r($ar5);



$a = 10;
$b = &$a;  //設定參照
$b = 5;
var_dump($a); //＄a=5;

?>
</pre>




