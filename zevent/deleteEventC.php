<?php
include("connMysqlObj2.php");


$newsID = $_GET["newsID"];

$sql_update = "UPDATE news SET newstatus=5 WHERE newsID = ?";
$stmt = $db_link->prepare($sql_update);
$stmt->bind_param("i", $newsID);
$stmt->execute();
$stmt->close();

header("Location: ./news.php");
// $sql_select2 = "SELECT filename FROM productimg  WHERE productsID =" . $_GET["productsID"];
// $filenameResult = $db_link->query($sql_select2);
?>