<?php
include("connMysqlObj2.php");
session_start();


$oldpassword = $_POST["oldpassword"];

// 待改，取session
$mID = $_SESSION["memberID"];

$result = $db_link->query("SELECT password FROM member WHERE memberID = $mID");
$row_result = $result->fetch_assoc();

if($oldpassword == $row_result["password"])
    echo 123;
else
    echo 0;

?>