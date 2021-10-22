<?php
include("connMysqlObj2.php");

session_start();

unset($_SESSION['memberID']);
unset($_SESSION['name']);


header("Location: ./login.php");
?>