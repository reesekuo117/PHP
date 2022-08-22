<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>echo</title>
</head>
<body>
    <?php
    /*區塊註解
    */
        define('My_CONST', 12345); #自訂常數 不可變更
        echo 123+5;
        echo '<br>';
        echo 2+3;
        echo '<br>';
        echo 0xFF. '<br>';     //.在做字串的串接 //16進位
        echo TRUE . '<br>';    #布林值不區分大小寫  #輸出變成1
        echo false . '<br>';   #布林值不區分大小寫  #輸出變成空字串
        echo Null . '<br>';    #空值不區分大小寫
        echo '＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿<br>';
        echo My_CONST. '<br>';


    ?>
    <!-- echo 輸出的意思 -->
    <!--  -->
</body>
</html>