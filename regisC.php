<?php

include("connMysqlObj2.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$sex = '1';
$phone = "尚未設定";
$address = '尚未設定';
$idcard = 'A219469681';
$isManger = '0';
$status = '0';
$token = '123';
$integral = '0';
$other = '123';



// $imgSrc ="test";
// echo $newstitle.$newscontent.$newsdate.$newstatus .$filename.$newsother;

$sql_query = "INSERT INTO member (name, email, password, sex, phone, address, idcard, isManger, status, token, integral, other) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $db_link->prepare($sql_query);
$stmt->bind_param("sssisssiisis", $name, $email, $password, $sex, $phone, $address, $idcard, $isManger, $status, $token, $integral, $other);
$stmt->execute();

// $autoID = mysqli_insert_id($db_link); //取得 自動遞增productsID

$stmt->close();


header("Location: ./login.php");
?>