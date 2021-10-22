<?php
session_start();

// if(!$_SESSION['memberID'])  header("Location: index.php");
// $memberID = $_SESSION['memberID'];
$memberID = 3;

include("connMysqlObj.php");

//join booking.memberID + member.memberID(有相同名稱才能join)
$sql_query = "SELECT * FROM booking left join member on booking.memberID = member.memberID WHERE booking.memberID = {$memberID} ORDER BY bookingID DESC";

$result = $db_link->query($sql_query);

$total_records = $result->num_rows;
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>預約查詢</title>
	<style>
		.ok {
			color: green;
		}

		.no {
			color: red;
		}
	</style>
</head>

<body>
	<h1 align="center">預約查詢</h1>

	<p align="center">目前資料筆數：<?php echo $total_records; ?>
	<table border="1" align="center">
		<!-- 表格表頭 -->
		<tr>
			<th>會員名稱(Join)</th>
			<th>預約日期</th>
			<th>預約時段</th>
			<th>預約編號</th>
			<th>預約項目</th>
			<th>預約寵物</th>
			<th>預約數量</th>
			<th>付款方式</th>
			<th>總價錢</th>
			<th>備註</th>
		</tr>

		<!-- 資料內容 -->
		<?php
		while ($row_result = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row_result["name"] . "</td>";
			echo "<td>" . $row_result["bdate"] . "</td>";
			echo "<td>" . $row_result["bHour"] . "</td>";
			// echo "<td>o" . str_pad($row_result["bookingID"], 4, "0", STR_PAD_LEFT) . "</td>";
			echo "<td>" . $row_result["bookingID"] . "</td>";
			echo "<td>" . $row_result["bitem"] . "</td>";
			echo "<td>" . $row_result["banimal"] . "</td>";
			echo "<td>" . $row_result["bcount"] . "</td>";
			// echo "<td>".$row_result["paystatus"]."</td>";ostatus
			echo "<td>" . $row_result["bpaytype"] . "</td>";
			echo "<td>" . $row_result["btotalprice"] . "</td>";
			echo "<td>" . $row_result["bvote"] . "</td>";
			echo "</tr>";
		}
		?>
	</table>


	</div>
	<script src="./js/jquery.min.js"></script>

</body>

</html>