<?php
$conn = new mysqli("us-cdbr-east-04.cleardb.com", "bfa69862a40c61", "5bec0e39", "heroku_c8b7ac2233a2b6e", 3306); //哪裡,帳號,密碼,資料庫名稱,port號
if ($conn->connect_error) {
    die("錯誤" . $conn->connect_error);
}
