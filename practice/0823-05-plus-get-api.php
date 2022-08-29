<?php
// isset() 函数用于检测变量是否已设置并且非 NULL
// intval() 函数用于获取变量的整数值
$a = isset($_GET['a']) ? intval($_GET['a']) : 0 ;
$b = isset($_GET['b']) ? intval($_GET['b']) : 0 ;

echo $a + $b;




