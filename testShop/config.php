<?php
$conn = new mysqli("localhost", "root", "root", "teamproject", 3306); //哪裡,帳號,密碼,資料庫名稱,port號
if ($conn->connect_error) {
    die("錯誤" . $conn->connect_error);
}
