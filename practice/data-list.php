<?php

require __DIR__. '/parts/connect_db.php';  // /開頭
$pageName ='list'; //頁面名稱

$perPage = 10;  //每頁最多有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//TODO: 代辦事項 沒做完不會向下執行

//取得資料的總筆數  
$t_sql = "SELECT COUNT(1) FROM address_book";   
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];  //PDO::FETCH_NUM — 數字索引陣列形式

//計算總頁數
$totalPages = ceil($totalRows/$perPage);  //ceil無條件進位

$rows = []; //預設
//有資料才執行 >0
if($totalRows > 0){
    if($page<1){
        //header('Location: data.list.php?page=1');
        header('Location: ?page=1');
        exit;
    }
    if($page>$totalPages){
        header('Location: ?page='. $totalPages);
        exit;
    }
    //$page<1 ? ($page=1) : null;  //三元運算子
    //$page>$totalPages ? ($page=$totalPages) : null; 

    //TODO:取得該頁面的資料
    //sql外層通常用雙引號 內層用單引號就不需要跳脫
    $sql = sprintf("SELECT * FROM address_book ORDER BY `sid` DESC LIMIT %s, %s", ($page-1)*$perPage, $perPage); 
    // ORDER BY `sid` DESC 降冪 講義41頁
    // LIMIT %s, %s ==> [索引][筆數]
    $rows = $pdo->query($sql)->fetchAll();

}
// json_encode判斷型別輸出JSON 數字型態
// echo json_encode([ 
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'perPage' => $perPage,
//     'page' => $page,
//     'rows' => $rows,
// ]);
// exit;


?>
<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>">
                    <i class="fa-solid fa-angle-left"></i>
                    </a>
                </li>
                <!-- < for($i=1; $i<=$totalPages; $i++): ?> -->
                <?php for($i=$page - 2; $i<=$page + 2; $i++): 
                    if($i>=1 and $i <= $totalPages) : ?>
                <li class="page-item <?= $page==$i ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
                <!-- < endfor; ?> -->
                <?php endif; endfor; ?>

                <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page+1 ?>">
                    <i class="fa-solid fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">birthday</th>
                <th scope="col">address</th>
                <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
                <!-- scope無障礙網頁使用 -->
            </tr>
        </thead>
        <tbody>
            <!-- 在宣告為PHP區域時會打上<?php ?>，而它的縮寫是<? ?> -->
            <?php foreach($rows as $r): ?>
            <tr>
                <td> 
                    <a href="data-del.php?sid=<?= $r['sid'] ?>"
                    data-onclick="event.currentTarget.closest('tr').remove()"
                    >
                    <!--右面資料刪除 後端資料並未變更 
                    <a href="javascript: console.log(<?= $r['sid'] ?>)"
                    onclick="event.currentTarget.closest('tr').remove()"
                    >-->
                        <i class="fa-solid fa-trash-can"></i>
                    </a>  
                </td>
                <td><?= $r['sid'] ?></td>
                <td><?= $r['name'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['mobile'] ?></td>
                <td><?= $r['birthday'] ?></td>
                <td><?= $r['address'] ?></td>
                <td>
                    <a href="javescript: ">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a> 
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
        </div>
    </div>


</div>
<?php include __DIR__. '/parts/scripts.php'; ?>

<?php include __DIR__. '/parts/html.foot.php'; ?>



