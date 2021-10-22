<?php
include("connMysqlObj2.php");

//預設每頁筆數
$pageRow_records = 99;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
	$num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$sql_query = "SELECT * FROM products as p JOIN category as c  ON c.categoryid = p.categoryid WHERE offlinedate >NOW() AND productstock > 0";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$sql_query_limit = $sql_query . " LIMIT {$startRow_records}, {$pageRow_records}";
//以加上限制顯示筆數的SQL敘述句查詢資料到 $result 中
$result = $db_link->query($sql_query_limit);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_result 中
$all_result = $db_link->query($sql_query);
//計算總筆數
$total_records = $all_result->num_rows;
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records / $pageRow_records);



?>
