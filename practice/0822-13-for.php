<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for</title>
</head>
<body>
    <table border="1">
        <?php for($i=1; $i<10; $i++): ?>
        <tr>
            <?php for($k=1; $k<10; $k++): ?>
                <td><?= sprintf("%s * %s = %s", $i, $k, $i*$k) ?></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
    <div><?= sprintf("%x", 255) ?></div> 
    <!-- sprintf("%x", 255) 輸出的數值轉換16進位 -->
    
    <!-- 前面= 相當於echo 沒有=會出現錯誤 -->
    <!-- = sprintf return回傳一個字串 -->
    <!-- php prinyf (格式化輸出)直接輸出有echo功能 -->

    <!-- % 標示的符號  s 表示輸出字串   Ｘ 表示輸出數值（有大小寫之分，輸出大寫或小寫）-->
    
</body>
</html>
