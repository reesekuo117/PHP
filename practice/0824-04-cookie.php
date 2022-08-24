<?php
// 第一次用 setcookie()設值時,用 $_COOKIE 是讀不到的,因為 server 是要告訴 client 設定Cookie,並未從 client 端得到 Cookie。
// setcookie() 函数向客户端发送一个 HTTP cookie
// https://www.w3school.com.cn/php/func_http_setcookie.asp
// setcookie("Cookie變數名稱","Cookie數值","期限","路徑","網域","安全");
setcookie('my_cookie', 'Shin', time()+300); //  設定

echo $_COOKIE['my_cookie']; //讀取


// https://ithelp.ithome.com.tw/articles/10157724

?>


