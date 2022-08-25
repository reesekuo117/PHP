<?php

session_start(); //啟動

// session_destroy(); //清除所有的session資料（不建議使用）

unset($_SESSION['user1']);  //清除某個session 變數

// https://www.php.net/manual/en/function.header
header('Location: 0824-10.login.php');  //頁面轉向redirect(type) 302（status）
exit;  //結束程式，底下的城市都不會執行
// die('oops!'); // 同exit 少用



