
<?php

session_start(); //初始化,才能使用＄_session  //啟動後才可以用！！！

if(! isset($_SESSION['my'])){
    $_SESSION['my'] = 1; //設定
}else{
    $_SESSION['my']++;
};

$_SESSION['my_data'] = [
    'name' => 'shin',
    'age' => 30,
    'data'=>[1, 3, 5],
];


echo $_SESSION['my'];
?>


