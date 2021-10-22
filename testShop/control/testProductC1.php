<?php
require_once("connMysql.php");
//預設每頁筆數
$pageRow_records = 6;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
    $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;



//若有分類關鍵字 加上 貓狗 和產品目錄 時未加限制顯示筆數的SQL敘述句
if (isset($_GET["categoryname"]) && ($_GET["categoryname"] != "") && (isset($_GET["categoryanimal"])) && ($_GET["categoryanimal"] != "")) {
    $query_RecProduct = "SELECT * FROM category RIGHT JOIN products ON products.categoryid = category.categoryid  WHERE categoryname =?  AND categoryanimal=? AND offlinedate >NOW() AND productstock > 0 ORDER BY productsID DESC";
    $stmt = $db_link->prepare($query_RecProduct);
    $stmt->bind_param("ss", $_GET["categoryname"], $_GET["categoryanimal"]);

    //若有分類關鍵字 加上 貓狗 時未加限制顯示筆數的SQL敘述句
} elseif (isset($_GET["categoryanimal"]) && ($_GET["categoryanimal"] != "")) {
    $query_RecProduct = "SELECT * FROM category RIGHT JOIN products ON products.categoryid = category.categoryid  WHERE categoryanimal=? AND offlinedate >NOW() AND productstock > 0 ORDER BY productsID DESC";
    $stmt = $db_link->prepare($query_RecProduct);
    $stmt->bind_param("s", $_GET["categoryanimal"]);


    //若有分類關鍵字時未加限制顯示筆數的SQL敘述句
} elseif (isset($_GET["categoryname"]) && ($_GET["categoryname"] != "")) {
    // $query_RecProduct = "SELECT * FROM products WHERE categoryid=? ORDER BY productsID DESC";
    $query_RecProduct = "SELECT * FROM category RIGHT JOIN products ON products.categoryid = category.categoryid  WHERE categoryname =? AND offlinedate >NOW() AND productstock > 0 ORDER BY productsID DESC";
    $stmt = $db_link->prepare($query_RecProduct);
    $stmt->bind_param("s", $_GET["categoryname"]);
    //若有搜尋關鍵字時未加限制顯示筆數的SQL敘述句
} elseif (isset($_GET["keyword"]) && ($_GET["keyword"] != "")) {
    $query_RecProduct = "SELECT * FROM products WHERE productname LIKE ? OR productvote LIKE ? AND offlinedate >NOW() AND productstock > 0 ORDER BY productsID DESC";
    $stmt = $db_link->prepare($query_RecProduct);
    $keyword = "%" . $_GET["keyword"] . "%";
    $stmt->bind_param("ss", $keyword, $keyword);
    //若有價格區間關鍵字時未加限制顯示筆數的SQL敘述句
} elseif (isset($_GET["price1"]) && isset($_GET["price2"]) && ($_GET["price1"] <= $_GET["price2"])) {
    $query_RecProduct = "SELECT * FROM products WHERE productprice BETWEEN ? AND ? AND offlinedate >NOW() AND productstock > 0 ORDER BY productsID DESC";
    $stmt = $db_link->prepare($query_RecProduct);
    // $stmt->bind_param("ii", $_GET["price1"], $_GET["price1"]);
    $stmt->bind_param("ii", $_GET["price1"], $_GET["price2"]);
    //預設狀況下未加限制顯示筆數的SQL敘述句
} else {
    $query_RecProduct = "SELECT * FROM products WHERE offlinedate >NOW() AND productstock > 0 ORDER BY productsID DESC";
    $stmt = $db_link->prepare($query_RecProduct);
}
$stmt->execute();
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecProduct 中
$all_RecProduct = $stmt->get_result();
//計算總筆數
$total_records = $all_RecProduct->num_rows;
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records / $pageRow_records);
//繫結產品目錄資料
// $query_RecCategory = "SELECT category.categoryid, category.categoryname, category.categorysort, count(products.productsID) as productNum FROM category LEFT JOIN products ON category.categoryid = products.categoryid GROUP BY category.categoryid, category.categoryname, category.categorysort ORDER BY category.categorysort ASC";
$query_RecCategory = "SELECT  category.categoryname, count(products.productsID) as productNum FROM category LEFT JOIN products ON category.categoryid = products.categoryid GROUP BY  category.categoryname ";
$RecCategory = $db_link->query($query_RecCategory);
//計算資料總筆數
$query_RecTotal = "SELECT count(productsID) as totalNum FROM products WHERE offlinedate >NOW() AND productstock > 0 ";
$RecTotal = $db_link->query($query_RecTotal);
$row_RecTotal = $RecTotal->fetch_assoc();
//返回 URL 參數
function keepURL()
{
    $keepURL = "";
    if (isset($_GET["keyword"])) $keepURL .= "&keyword=" . urlencode($_GET["keyword"]);
    if (isset($_GET["price1"])) $keepURL .= "&price1=" . $_GET["price1"];
    if (isset($_GET["price2"])) $keepURL .= "&price2=" . $_GET["price2"];
    if (isset($_GET["categoryid"])) $keepURL .= "&categoryid=" . $_GET["categoryid"];
    if (isset($_GET["categoryname"])) $keepURL .= "&categoryname=" . $_GET["categoryname"];
    if (isset($_GET["categoryanimal"])) $keepURL .= "&categoryanimal=" . $_GET["categoryanimal"];
    return $keepURL;
}
function keepURL2()
{
    $keepURL = "";
    if (isset($_GET["keyword"])) $keepURL .= "&keyword=" . urlencode($_GET["keyword"]);
    if (isset($_GET["price1"])) $keepURL .= "&price1=" . $_GET["price1"];
    if (isset($_GET["price2"])) $keepURL .= "&price2=" . $_GET["price2"];
    if (isset($_GET["categoryid"])) $keepURL .= "&categoryid=" . $_GET["categoryid"];
    if (isset($_GET["categoryname"])) $keepURL .= "&categoryname=" . $_GET["categoryname"];

    return $keepURL;
}
