<?php
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
    $sql_query = "UPDATE orders SET shippedDate=NOW() , ostatus=1 WHERE orderID=?";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("i", $_GET["orderID"]);
    $stmt->execute();
    $stmt->close();
    $db_link->close();
    //重新導向回到主畫面
    header("Location: orderV.php");
  }
  $sql_select = "SELECT * FROM orderdetails WHERE orderID =" . $_GET["orderID"]; //查詢訂單明細
  $sql_select2 = "SELECT ostatus FROM orders WHERE orderID = ?" ; //查詢訂單狀態
  
  $result = $db_link->query($sql_select); //查詢訂單明細
  
  
  $stmt2= $db_link->prepare($sql_select2);
  $stmt2->bind_param("i", $_GET["orderID"]);
  $stmt2->execute();
  $stmt2->bind_result($ostatus);
  $stmt2->fetch();
  $stmt2->close();
  
  
  $total_records = $result->num_rows; //顯示資料筆數

?>