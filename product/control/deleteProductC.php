<?php
	if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
		$sql_query = "DELETE FROM products WHERE productsID=?";
		$stmt = $db_link -> prepare($sql_query);
		$stmt -> bind_param("i", $_POST["productsID"]);
		$stmt -> execute();
		$stmt -> close();

		$sql_query2 = "DELETE FROM productimg WHERE productsID=?";
		$stmt2 = $db_link -> prepare($sql_query2);
		$stmt2 -> bind_param("i", $_POST["productsID"]);
		$stmt2 -> execute();
		$stmt2 -> close();


		$db_link -> close();
		//重新導向回到主畫面
		header("Location: dataProductV.php");
	}
	$sql_select = "SELECT productsID,productshowimg,categoryanimal,categoryname,productname,productprice,productdiscount,productstock,productstatus,onlinedate,offlinedate FROM products as p JOIN category as c  ON c.categoryid = p.categoryid WHERE productsID = ? ";
    $stmt = $db_link -> prepare($sql_select);
	$stmt -> bind_param("i", $_GET["productsID"]);
	$stmt -> execute();
	$stmt -> bind_result($productsID, $productShowImg, $categoryAnimal, $categoryName, $productName, $productPrice,$productDiscount, $productStock,$productStatus,$onlineDate,$offlineDate);
	$stmt -> fetch();



?>