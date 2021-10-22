<?php
include("../connMysqlObj.php");



// 更新庫存量
if (isset($_GET["action"]) && ($_GET["action"] == "rewardAdd")) {


  $memberID = $_GET['memberID'];
  $rewardProducts = $_GET["selectProduct"];
  $rewardNum = $_GET['rewardNum'];

  // $sql_query2 = "INSERT INTO reward (memberID,rewardDate,rewardpoint) VALUES (?,NOW(),2)";
  $sql_query2 = "INSERT INTO reward (memberID,rewardDate,rewardpoint,rewardProducts,rewardNum,endDate) VALUES (?,NOW(),2,?,?,date_add(now(), interval 1 week))";
  $stmt2 = $db_link->prepare($sql_query2);

  $stmt2->bind_param("iss", $memberID, $rewardProducts, $rewardNum);
  $stmt2->execute();
  $stmt2->close();

  // $sql_query = "UPDATE member SET integral= integral+2 WHERE memberID=?";
  //   $stmt = $db_link->prepare($sql_query);

  //   $stmt->bind_param("i",$memberID);
  //   $stmt->execute();
  //   $stmt->close();
  echo "簽到成功";
}
if (isset($_GET["action"]) && ($_GET["action"] == "rewardEdit")) {
  $rewardID = $_GET['rewardID'];

  $sql_Edit = "UPDATE reward SET isUsed=1  WHERE rewardID=?";
  $stmt3 = $db_link->prepare($sql_Edit);

  $stmt3->bind_param("i", $rewardID);
  $stmt3->execute();
  $stmt3->close();
}
