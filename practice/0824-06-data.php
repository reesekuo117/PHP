<pre>
<?php
// date_default_timezone_set('Asia/Taipei');

echo time(). "\n";              //取得 timestamp

echo date("Y-m-d H:i:s"). "\n"; //輸出時間格式
echo date("Y-m-d H:i:s", time()+7*24*60*60). "\n";     

echo strtotime('2022-08-24');   //標準格式的時間字串,轉換為timestamp


// https://www.php.net/manual/zh/function.date.php
?>
</pre>


