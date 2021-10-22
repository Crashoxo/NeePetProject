<?php
include("connMysqlObj.php");

if ($_GET['orderID'] && ($_GET['orderID'] != '')) {
    $orderID = $_GET['orderID'];
    $sql_query = "SELECT * FROM orderdetails  WHERE orderID = {$orderID} ";
    $result = $db_link->query($sql_query);

    echo "<table>";
    echo " <tr>
                <th>商品名稱</th>
                <th>單價</th>
                <th>數量</th>
                <th>小計</th>
            </tr>";
    while ($row_result = $result->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $row_result["productname"] . "</td>";
        echo "<td>" . number_format($row_result["productprice"], 0) . "</td>";
        echo "<td>" . $row_result["oqty"] . "</td>";
        echo "<td>" . number_format($row_result["ototalprice"], 0) . "</td>";

        echo "</tr>";
    }
    echo "</table>";
}
