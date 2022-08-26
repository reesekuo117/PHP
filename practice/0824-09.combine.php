<?php
require __DIR__. '/parts/connect_db.php';  // /開頭
$pageName ='home'; //頁面名稱
?>

<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <h2>
        Hello
    </h2>
    <!-- 
        include 包含檔案進來
        require 包含檔案進來(連資料庫使用錯誤會直接出現)
    -->
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>

<?php include __DIR__. '/parts/html.foot.php'; ?>


