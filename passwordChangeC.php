<?php
include("connMysqlObj2.php");
session_start();

$password = $_POST["password"];

// 待改，取session
$mID = $_SESSION["memberID"];

$sql_update = "UPDATE member SET password=? WHERE memberID = ?";
$stmt = $db_link->prepare($sql_update);
$stmt->bind_param("si", $password, $mID);
$stmt->execute();
$stmt->close();

header("Location: ./users-html.php");
?>