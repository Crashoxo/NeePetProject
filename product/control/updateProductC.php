<?php
include("../connMysqlObj2.php");


// 商品上架
if(isset($_POST["action"]) && ($_POST["action"] == "onProduct")){
  $productsID = $_POST['getOnPID'];
  $onlinedate = $_POST['onDateProduct'];
  $offlinedate = $_POST['offDateProduct'];
  $sql_query = "UPDATE products SET onlinedate=? , offlinedate=? WHERE productsID=?";
  $stmt = $db_link->prepare($sql_query);

  $stmt->bind_param("sss",$onlinedate,$offlinedate,$productsID);
  $stmt->execute();
  $stmt->close();
  echo "更改成功";
}

// 點下上架時ajax 會去撈該上架下架日期
if(isset($_GET["productID"]) && ($_GET["productID"] !=0) && $_GET["action"]=='selectOn' ){
 
  $sql_select = "SELECT onlinedate,offlinedate FROM products WHERE productsID = ?";
  $stmt = $db_link->prepare($sql_select);
  $stmt->bind_param("i", $_GET["productID"]);
  $stmt->execute();
  $stmt->bind_result($onlinedate, $offlinedate);
  $stmt->fetch();
  $stmt->close();
  $arr = $onlinedate."&".$offlinedate;
  
  echo $arr;
}


//商品下架
if(isset($_GET["action"]) && ($_GET["action"] == "offProduct")){
$productsID = $_GET['productsID'];
$sql_query = "UPDATE products SET offlinedate=NOW() WHERE productsID=?";
$stmt = $db_link->prepare($sql_query);

$stmt->bind_param("s",$productsID);
$stmt->execute();
$stmt->close();
header("Location: ../dataProductV.php");
}



// 更新庫存量
if(isset($_POST["action"]) && ($_POST["action"] == "updateNum")){

 $productsID = $_POST['getPID'];
 $productStock = $_POST['productstockNum'];
  $sql_query = "UPDATE products SET productstock=? WHERE productsID=?";
    $stmt = $db_link->prepare($sql_query);

    $stmt->bind_param("ii",$productStock,$productsID);
    $stmt->execute();
    $stmt->close();
    echo "補貨成功";

}


// 點下補貨時ajax 會去撈該商品庫存
if(isset($_GET["productID"]) && ($_GET["productID"] !=0) && $_GET["action"]=='selectNum'){
   
  $sql_select = "SELECT productsID,productstock FROM products WHERE productsID = ?";
  $stmt = $db_link->prepare($sql_select);
  $stmt->bind_param("i", $_GET["productID"]);
  $stmt->execute();
  $stmt->bind_result($productsID, $productStock);
  $stmt->fetch();
  $stmt->close();

  echo $productsID.'-'.$productStock;
}


// 商品資料修改
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
    // include("connMysqlObj2.php");


    $upload = $_FILES['productshowimg'];  //展示圖片
    $imgSrc200 = '../../../img/product/200x200/'; //200x200圖片資料夾
    $imgSrc400 = '../../../img/product/400x400/'; //400x400圖片資料夾
    $imgSrcNoZip = '../../../img/product/noZip/'; //原圖片資料夾
  
  
    if ($upload['error'] == 0) {
      ////upload success
  
      $filename = date('Ymd_His') . '.jpg'; //檔名  格式化 變成日期+jpg檔
      $imgSrc200 .= $filename; //圖檔路徑: ../../img/product/200x200/xxx.jpg
      $imgSrc400 .= $filename; //圖檔路徑: ../../img/product/400x400/xxx.jpg
      $imgSrcNoZip .= $filename; //圖檔路徑: ../../img/product/noZip/xxx.jpg
  
      //// strtolower():轉小寫英文 
      //// strrchr(): 取得'.'後面的字串  ex: img/abc.jpg  則顯示 jpg
      $src_ext = strtolower(strrchr($_FILES["productshowimg"]["name"], "."));
      switch ($src_ext) {
        case ".jpg":
        case ".jpeg":
          $getSrc = imagecreatefromjpeg($upload['tmp_name']); //取得jpg原圖片
          break;
        case ".png":
          $getSrc = imagecreatefrompng($upload['tmp_name']); // 取得png原圖片
          break;
        case ".gif":
          $getSrc = imagecreatefromgif($upload['tmp_name']); // 取得gif原圖片
          break;
      }
  
  
  
      $width = imagesx($getSrc);  // 取得原圖片(寬)
      $height = imagesy($getSrc); // 取得原圖片(寬)
  
      $thumb200 = imagecreatetruecolor(200, 200); // Load 目標圖(寬，高)
      $thumb400 = imagecreatetruecolor(400, 400); // Load 目標圖(寬，高)
      imagecopyresized($thumb200, $getSrc, 0, 0, 0, 0, 200, 200, $width, $height); //將圖轉成200x200
      imagecopyresized($thumb400, $getSrc, 0, 0, 0, 0, 400, 400, $width, $height); //將圖轉成400x400
  
      if (!imagejpeg($thumb200, $imgSrc200, 100)) { //200x200圖檔搬移
        echo "imgSrc200 error!"; //失敗回傳
      }
      if (!imagejpeg($thumb400, $imgSrc400, 100)) { //400x400圖檔搬移
        echo "imgSrc400 error!"; //失敗回傳
      }
      imagedestroy($thumb200); //釋放200
      imagedestroy($thumb400); //釋放400
  
      //// 上傳原圖 圖檔搬移
      if (!move_uploaded_file($upload['tmp_name'], $imgSrcNoZip)) {
        echo "imgSrcNoZip error!"; //失敗回傳
      }
    } else {
  
      ////upload failure
      echo "upload failure!";
    }
  
  


    $categoryName = $_POST["categoryname"];  //商品分類名稱
    $categoryAnimal = $_POST["categoryanimal"]; //寵物項目
    //根據 商品分類名稱，寵物項目 查詢商品分類編號
    echo $categoryName;
    echo $categoryAnimal;
    $sql_queryCategoryid = "SELECT categoryid FROM category WHERE categoryname = '{$categoryName}' AND categoryanimal = '{$categoryAnimal}' ";
    $categoryidResult = $db_link->query($sql_queryCategoryid);
    $row_result2 = $categoryidResult->fetch_assoc();
  

    $categoryID =   $row_result2["categoryid"]; //商品分類編號
    echo $categoryID;

    $productName = $_POST["productname"];  //商品名稱
    $productPrice = $_POST["productprice"]; //商品單價
    $productStock = $_POST["productstock"]; //商品庫存
    $productDiscount = $_POST["productdiscount"]; //折扣
    $productStatus = $_POST["productstatus"]; //物品狀態
    $onlineDate = $_POST["onlinedate"]; //上架日期
    $offlineDate = $_POST["offlinedate"]; //下架日期
    $productVote = $_POST["productvote"]; //備註
    $productNews = $_POST["productnews"]; //活動訊息
    
    $productsID = $_POST["productsID"]; //商品編號
    
    // $filename = "testttttt";
    
    try {
    $sql_query = "UPDATE products SET categoryid=?, productname=?, productprice=?, productstock=?, productdiscount=? ,productstatus=?,onlinedate=?,offlinedate=?,productvote=?,productnews=?,productshowimg=? WHERE productsID=?";
    $stmt = $db_link->prepare($sql_query);

    $stmt->bind_param("isiidssssssi",$categoryID,$productName,$productPrice,$productStock,$productDiscount,$productStatus,$onlineDate,$offlineDate,$productVote,$productNews,$filename,$productsID);
    $stmt->execute();
    $stmt->close();
    // $db_link->close();


	$sql_del = "DELETE FROM productimg WHERE productsID=?";
    $stmt2 = $db_link -> prepare($sql_del);
    $stmt2 -> bind_param("i", $_POST["productsID"]);
    $stmt2 -> execute();
    $stmt2 -> close();



    $uploadMuti = $_FILES['productimg']; //獲取圖片集的多圖上傳
    // var_dump($upload); //查看資料型態 0.1有上傳
    foreach ($uploadMuti['error'] as $k => $v) {
      $imgSrc200 = '../../../img/product/200x200/'; //200x200圖片資料夾
      $imgSrc400 = '../../../img/product/400x400/'; //400x400圖片資料夾
      $imgSrcNoZip = '../../../img/product/noZip/'; //原圖片資料夾
      $filename2 = '';

      if ($v == 0) {
        // $k
        $filename2 = date('Ymd_His') . "_{$k}.jpg"; //檔名  格式化 變成日期+jpg檔
        $imgSrc200 .= $filename2; //圖檔路徑: ../../img/product/200x200/xxx.jpg
        $imgSrc400 .= $filename2; //圖檔路徑: ../../img/product/400x400/xxx.jpg
        $imgSrcNoZip .= $filename2; //圖檔路徑: ../../img/product/noZip/xxx.jpg

        // strtolower():轉小寫英文 
        // strrchr(): 取得'.'後面的字串  ex: img/abc.jpg  則顯示 jpg
        $src_ext = strtolower(strrchr($_FILES["productimg"]["name"][$k], "."));
        switch ($src_ext) {
          case ".jpg":
          case ".jpeg":
            $getSrc = imagecreatefromjpeg($uploadMuti['tmp_name'][$k]); //取得jpg原圖片
            break;
          case ".png":
            $getSrc = imagecreatefrompng($uploadMuti['tmp_name'][$k]); // 取得png原圖片
            break;
          case ".gif":
            $getSrc = imagecreatefromgif($uploadMuti['tmp_name'][$k]); // 取得gif原圖片
            break;
        }

        $width = imagesx($getSrc);  // 取得原圖片(寬)
        $height = imagesy($getSrc); // 取得原圖片(寬)

        $thumb200 = imagecreatetruecolor(200, 200); // Load 目標圖(寬，高)
        $thumb400 = imagecreatetruecolor(400, 400); // Load 目標圖(寬，高)
        imagecopyresized($thumb200, $getSrc, 0, 0, 0, 0, 200, 200, $width, $height); //將圖轉成200x200
        imagecopyresized($thumb400, $getSrc, 0, 0, 0, 0, 400, 400, $width, $height); //將圖轉成400x400

        if (!imagejpeg($thumb200, $imgSrc200, 100)) { //200x200圖檔搬移
          echo "imgSrc200 error!"; //失敗回傳
        }
        if (!imagejpeg($thumb400, $imgSrc400, 100)) { //400x400圖檔搬移
          echo "imgSrc400 error!"; //失敗回傳
        }
        imagedestroy($thumb200); //釋放200
        imagedestroy($thumb400); //釋放400

        //  上傳原圖 圖檔搬移
        if (!move_uploaded_file($uploadMuti['tmp_name'][$k], $imgSrcNoZip)) {
            echo "imgSrcNoZip uploadMuti error!"; //失敗回傳
        }
        // SQL insert
        $sql_query2 = "INSERT INTO productimg (productsID,filename) VALUES ('{$productsID}','{$filename2}')";
          $db_link->query($sql_query2);
        }
        
      }
    //重新導向回到主畫面
    header("Location: ../dataProductV.php");
  } catch (\Throwable $th) {
    //throw $th;
  }

}
?>