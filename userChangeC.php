<?php
include("connMysqlObj2.php");
session_start();


$mname = $_POST["mname"];
$memail = $_POST["memail"];
$mphone = $_POST["mphone"];
$maddr = $_POST["maddr"];

// 待改，取session
$mID = $_SESSION["memberID"];

$_SESSION['name'] = $mname;

$sql_update = "UPDATE member SET name=?, email=?, phone=?, address=? WHERE memberID = ?";
$stmt = $db_link->prepare($sql_update);
$stmt->bind_param("sssss", $mname, $memail , $mphone , $maddr , $mID);
$stmt->execute();
$stmt->close();


header("Location: ./users-html.php");
?>