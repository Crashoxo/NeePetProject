<?php
// if (isset($_POST["action"]) && ($_POST["action"] == "add")) {
  include("connMysqlObj2.php");



  $upload = $_FILES['eventshowimg'];  //展示圖片
  $imgSrc200 = '../../front/news_img/'; //200x200圖片資料夾
  // $imgSrc400 = './img/400x400/'; //400x400圖片資料夾
  // $imgSrcNoZip = './img/noZip/'; //原圖片資料夾


  if ($upload['error'] == 0) {
    //upload success

    $filename = date('Ymd_His') . '.jpg'; //檔名  格式化 變成日期+jpg檔
    $imgSrc200 .= $filename; //圖檔路徑: ../../img/product/200x200/xxx.jpg
    $imgSrc400 .= $filename; //圖檔路徑: ../../img/product/400x400/xxx.jpg
    $imgSrcNoZip .= $filename; //圖檔路徑: ../../img/product/noZip/xxx.jpg

    // strtolower():轉小寫英文 
    // strrchr(): 取得'.'後面的字串  ex: img/abc.jpg  則顯示 jpg
    $src_ext = strtolower(strrchr($_FILES["eventshowimg"]["name"], "."));
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

    // $thumb200 = imagecreatetruecolor(200, 200); // Load 目標圖(寬，高)
    $thumb200 = imagecreatetruecolor(400, 200); // Load 目標圖(寬，高)
    // $thumb400 = imagecreatetruecolor(400, 400); // Load 目標圖(寬，高)
    
    // imagecopyresized($thumb200, $getSrc, 0, 0, 0, 0, 200, 200, $width, $height); //將圖轉成200x200
    imagecopyresized($thumb200, $getSrc, 0, 0, 0, 0, 400, 200, $width, $height); //將圖轉成400x200
    // imagecopyresized($thumb400, $getSrc, 0, 0, 0, 0, 400, 400, $width, $height); //將圖轉成400x400

    if (!imagejpeg($thumb200, $imgSrc200, 100)) { //200x200圖檔搬移
      echo "imgSrc200 error!"; //失敗回傳
    }
    // if (!imagejpeg($thumb400, $imgSrc400, 100)) { //400x400圖檔搬移
    //   echo "imgSrc400 error!"; //失敗回傳
    // }
    imagedestroy($thumb200); //釋放200
    // imagedestroy($thumb400); //釋放400

    
    // 上傳原圖 圖檔搬移
    // if (!move_uploaded_file($upload['tmp_name'], $imgSrcNoZip)) {
    //   echo "imgSrcNoZip error!"; 
    // }

  } else {

    //upload failure
    echo "upload failure!";
  }


    
  $newstitle = $_POST["newstitle"];
  $newscontent = $_POST["newscontent"];
  $newsdate = $_POST["newsdate"];
  $newstatus = $_POST["newstatus"];
  $newsother = "111";

  // $imgSrc ="test";
echo $newstitle.$newscontent.$newsdate.$newstatus .$filename.$newsother;

  try {
    $sql_query = "INSERT INTO news (newstitle, newscontent, newsdate, newstatus, newsimg, newsother) VALUES (?,?,?,?,?,?)";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("sssiss", $newstitle, $newscontent, $newsdate, $newstatus, $filename, $newsother);
    $stmt->execute();

    // $autoID = mysqli_insert_id($db_link); //取得 自動遞增productsID

    $stmt->close();

    
    header("Location: ./news.php");
    
  //   $uploadMuti = $_FILES['productimg']; //獲取圖片集的多圖上傳
  //   // var_dump($upload); //查看資料型態 0.1有上傳
  //   foreach ($uploadMuti['error'] as $k => $v) {
  //     $imgSrc200 = './img/200x200/'; //200x200圖片資料夾
  //     $imgSrc400 = './img/400x400/'; //400x400圖片資料夾
  //     $imgSrcNoZip = './img/noZip/'; //原圖片資料夾
  //     $filename2 = '';

  //     if ($v == 0) {
  //       // $k
  //       $filename2 = date('Ymd_His') . "_{$k}.jpg"; //檔名  格式化 變成日期+jpg檔
  //       $imgSrc200 .= $filename2; //圖檔路徑: ../../img/product/200x200/xxx.jpg
  //       $imgSrc400 .= $filename2; //圖檔路徑: ../../img/product/400x400/xxx.jpg
  //       $imgSrcNoZip .= $filename2; //圖檔路徑: ../../img/product/noZip/xxx.jpg

  //       // strtolower():轉小寫英文 
  //       // strrchr(): 取得'.'後面的字串  ex: img/abc.jpg  則顯示 jpg
  //       $src_ext = strtolower(strrchr($_FILES["eventimg"]["name"][$k], "."));
  //       switch ($src_ext) {
  //         case ".jpg":
  //         case ".jpeg":
  //           $getSrc = imagecreatefromjpeg($uploadMuti['tmp_name'][$k]); //取得jpg原圖片
  //           break;
  //         case ".png":
  //           $getSrc = imagecreatefrompng($uploadMuti['tmp_name'][$k]); // 取得png原圖片
  //           break;
  //         case ".gif":
  //           $getSrc = imagecreatefromgif($uploadMuti['tmp_name'][$k]); // 取得gif原圖片
  //           break;
  //       }

  //       $width = imagesx($getSrc);  // 取得原圖片(寬)
  //       $height = imagesy($getSrc); // 取得原圖片(寬)

  //       $thumb200 = imagecreatetruecolor(200, 200); // Load 目標圖(寬，高)
  //       $thumb400 = imagecreatetruecolor(400, 400); // Load 目標圖(寬，高)
  //       imagecopyresized($thumb200, $getSrc, 0, 0, 0, 0, 200, 200, $width, $height); //將圖轉成200x200
  //       imagecopyresized($thumb400, $getSrc, 0, 0, 0, 0, 400, 400, $width, $height); //將圖轉成400x400

  //       if (!imagejpeg($thumb200, $imgSrc200, 100)) { //200x200圖檔搬移
  //         echo "imgSrc200 error!"; //失敗回傳
  //       }
  //       if (!imagejpeg($thumb400, $imgSrc400, 100)) { //400x400圖檔搬移
  //         echo "imgSrc400 error!"; //失敗回傳
  //       }
  //       imagedestroy($thumb200); //釋放200
  //       imagedestroy($thumb400); //釋放400

  //       //  上傳原圖 圖檔搬移
  //       if (!move_uploaded_file($uploadMuti['tmp_name'][$k], $imgSrcNoZip)) {
  //           echo "imgSrcNoZip uploadMuti error!"; //失敗回傳
  //       }
  //       // SQL insert
  //       $sql_query2 = "INSERT INTO productimg (productsID,filename) VALUES ('{$autoID}','{$filename2}')";
  //         $db_link->query($sql_query2);
  //       }
        
  //     }
  } catch (\Throwable $th) {
  //   //throw $th;
  }
// }
