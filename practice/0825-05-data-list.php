<?php

require __DIR__. '/parts/connect_db.php';  // /開頭

$sql = "SELECT * FROM address_book"; //sql外層通常用雙引號 內層用單引號就不需要跳脫

$rows = $pdo->query($sql)->fetchAll();

?>
<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">email</th></th>
                <th scope="col">mobile</th>
                <th scope="col">birthday</th>
                <th scope="col">address</th>
            </tr>
        </thead>
        <tbody>
            <!-- 在宣告為PHP區域時會打上<?php ?>，而它的縮寫是<? ?> -->
            <?php foreach($rows as $r): ?>
            <tr>
                <td><?= $r['sid'] ?></td>
                <td><?= $r['name'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['mobile'] ?></td>
                <td><?= $r['birthday'] ?></td>
                <td><?= $r['address'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>

<?php include __DIR__. '/parts/html.foot.php'; ?>



