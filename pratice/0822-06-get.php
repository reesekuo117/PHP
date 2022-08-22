<?php
    //query string

    //$_GET內建變數
    echo $_GET['a'] + $_GET['b'];

    //Warning: Undefined array key "a" in /Applications/XAMPP/xamppfiles/htdocs/php/pratice/0822-06-get.php on line 5
    //Warning: Undefined array key "b" in /Applications/XAMPP/xamppfiles/htdocs/php/pratice/0822-06-get.php on line 5

    //在網址給值  /?a=100&b=10

    // isset() 判斷是不是有設定
    // intval() 把字串轉換為整數
    $c = isset($_GET['c']) ? intval($_GET['c']) : 0;
    $d = isset($_GET['d']) ? intval($_GET['d']) : 0;
    echo $c + $d;



    /*
    條件運算子「?:」是唯一的三元運算子,
    其語法如下:
    判斷值 ? 真時選擇值 : 假時選擇值
    第一個運算元(判斷值)應該為布林值,或是結果為布林值的運算式。當判斷值為 true 時,整個運算式的結果取真時選擇值;反之,判斷值為 false 時,取假時選擇值。通 常我們會將整個條件運算結果,存放到某個變數內,
    所以會如下式:變數 = 判斷值 ? 真時選擇值 : 假時選擇值;
    邏輯運算式和關係運算式有一個共同點,兩者的運算結果都是布林值,不是 true就是 false。然而,邏輯運算式中的運算對象(運算元),也是布林值。
    */







    // 錯誤錯誤錯誤
    // $a = isset($_GET['a']) ? $_GET['a'] : 0;
    // $b = isset($_GET['b']) ? $_GET['b'] : 0;
    // echo $a + $b;

?>
