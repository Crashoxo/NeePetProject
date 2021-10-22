<?php
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
    include("../connMysqlObj.php");
    $sql_query = "UPDATE booking SET bstatus='服務完成', bpaystatus='已付款' WHERE bookingID=?";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("i", $_POST["bookingID"]);
    $stmt->execute();
    $stmt->close();
    $db_link->close();
    //重新導向回到主畫面
    header("Location: ../bookingV.php");
  }
//查詢預約
 
  
  $sql_select2 = "SELECT bookingID,name,phone,bitem,banimal,bcount,bdate,bHour,bpaytype,btotalprice,bvote,bpaystatus,bstatus FROM booking  LEFT JOIN member ON booking.memberID = member.memberID WHERE bookingID = ? " ; 
  
  
  
  $stmt2= $db_link->prepare($sql_select2);
  $stmt2->bind_param("i", $_GET["bookingID"]);
  $stmt2->execute();
  $stmt2->bind_result($bookingID,$name,$phone,$bitem,$banimal,$bcount,$bdate,$bHour,$bpaytype,$btotalprice,$bvote,$bpaystatus,$bstatus);
  $stmt2->fetch();
  $stmt2->close();
  

?>