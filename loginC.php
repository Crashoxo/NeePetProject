<?php
include("connMysqlObj2.php");

session_start();



$email = $_POST["email"];

$password = $_POST["password"];

$result = $db_link->query("SELECT memberID, name, password, isManger FROM member WHERE email = '".$email."'  ");

if ($result->num_rows == 0) 
    header("Location: ./login.php?error=0");
else{
    $row_result = $result->fetch_assoc();
    
    if($row_result["isManger"] == 1){
        header("Location: ../back/product/dataProductV.php");

    }
    else{
        if($password == $row_result["password"]){
            // echo 'success!';
            $_SESSION['memberID'] = $row_result["memberID"];
            $_SESSION['name'] = $row_result["name"];
            header("Location: ./index.php");
        }
        else
            header("Location: ./login.php?error=1");

    }
}

// echo $row_result["password"];
// echo $row_result["email"];
