<?php
include("connMysqlObj2.php");




$email = $_POST["email"];

$phone = $_POST["phone"];

$result = $db_link->query("SELECT password FROM member WHERE email = '".$email."'  and phone = $phone");
// echo $result;

$row_result = $result->fetch_assoc();
// echo '密碼是： '.$row_result["password"] . '<br>三秒後跳轉至登入頁面';
header("Refresh:3;url=./login.php?password=".$row_result["password"]);
// echo "<a href='./login.php'></a>"
?>