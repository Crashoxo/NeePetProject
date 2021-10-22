<?php
	$sql_query = "SELECT * FROM orders WHERE ostatus=1 ORDER BY orderID ASC";
	$result = $db_link->query($sql_query);
	$total_records = $result->num_rows;
?>