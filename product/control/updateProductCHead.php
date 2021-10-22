<?php
$sql_select = "SELECT productsID,productshowimg,categoryanimal,categoryname,productname,productprice,productdiscount,productstock,productstatus,onlinedate,offlinedate,productvote,productnews FROM products as p JOIN category as c  ON c.categoryid = p.categoryid WHERE productsID = ? ";
$stmt = $db_link->prepare($sql_select);
$stmt->bind_param("i", $_GET["productsID"]);
$stmt->execute();
$stmt->bind_result($productsID, $productShowImg, $categoryAnimal, $categoryName, $productName, $productPrice, $productDiscount, $productStock, $productStatus, $onlineDate, $offlineDate, $productVote, $productNews);
$stmt->fetch();
$stmt->close();

$sql_select2 = "SELECT filename FROM productimg  WHERE productsID =" . $_GET["productsID"];
$filenameResult = $db_link->query($sql_select2);




?>