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
echo json_encode([ 
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'perPage' => $perPage,
    'page' => $page,
    'rows' => $rows,
]);
// exit;


?>



