<?php
    //加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
    $query_limit_RecProduct = $query_RecProduct." LIMIT {$startRow_records}, {$pageRow_records}";
    //以加上限制顯示筆數的SQL敘述句查詢資料到 $RecProduct 中
    $stmt = $db_link->prepare($query_limit_RecProduct);

    //若有分類關鍵字 加上 貓狗，產品分類 時未加限制顯示筆數的SQL敘述句
    if(isset($_GET["categoryname"])&&($_GET["categoryname"]!="")&&(isset($_GET["categoryanimal"]))&&($_GET["categoryanimal"]!="")){
    $stmt->bind_param("ss", $_GET["categoryname"],$_GET["categoryanimal"]);

    //若有分類關鍵字 加上 貓狗 時未加限制顯示筆數的SQL敘述句
    }elseif(isset($_GET["categoryname"])&&($_GET["categoryname"]!="")){
    $stmt->bind_param("s", $_GET["categoryname"]);

    //若有分類關鍵字 加上產品分類 時未加限制顯示筆數的SQL敘述句
    }elseif(isset($_GET["categoryanimal"])&&($_GET["categoryanimal"]!="")){
        $stmt->bind_param("s", $_GET["categoryanimal"]);
    //若有搜尋關鍵字時未加限制顯示筆數的SQL敘述句
    }elseif(isset($_GET["keyword"])&&($_GET["keyword"]!="")){
        $keyword = "%".$_GET["keyword"]."%";
        $stmt->bind_param("ss", $keyword, $keyword);	
    //若有價格區間關鍵字時未加限制顯示筆數的SQL敘述句
    }elseif(isset($_GET["price1"]) && isset($_GET["price2"]) && ($_GET["price1"]<=$_GET["price2"])){
        $stmt->bind_param("ii", $_GET["price1"], $_GET["price2"]);
    }
    $stmt->execute();            
    $RecProduct = $stmt->get_result();
?>