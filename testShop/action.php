<?php
// php前面空白會被購物車抓到，而顯示紅框
session_start(); //開始使用session

// $randNUM = $_SESSION['randNUM'] = rand(0, 999999);  //瀏覽器編號讀取
$randNUM = 3;  //瀏覽器編號讀取

require 'config.php';

// 處理購物車加入，無實體頁面  mall.php 
if (isset($_POST['pid'])) {  //ajax抓post data ; isset(回傳Ture/False)收到值Ture 執行下方 ; data保留form的值
  //1.網頁抓到的值
  @$memberID = $_SESSION['memberID']; //接收會員ID
  $pid = $_POST['pid'];    //變數 = ajax抓pid
  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $pimage = $_POST['pimage'];
  $localsrotageID = $randNUM; //瀏覽器編號製作
  $pqty = 1; //數量
  // echo "OKKKKKKKKKKKKKKK";
  // echo "<br>";
  // echo $localsrotageID;
  // echo $memberID;


  //2.加入資料庫
  $stmt = $conn->prepare("SELECT productsID FROM cart WHERE productsID= ?"); //?自訂
  $stmt->bind_param('i', $pid); //必須按照SELECT順序 ; 綁定參數bind_param(資料型態s字串 i整數 d浮點數)
  $stmt->execute(); // 執行SQL
  $res = $stmt->get_result(); //使用取得結過的方法
  $r = $res->fetch_assoc(); //結果陣列
  @$code = $r['productsID']; //@把錯誤隱藏(新增資料成功會顯示警告抓不到值(NULL)，但是抓不到?的值才能新增商品) 

  //3.新增後會顯示下列文字
  if (!$code) {   // 如果cart沒有?的productsID，新增
    $query = $conn->prepare("INSERT INTO cart (
        productname, productprice, cartimg, cqty, ctotalprice,productsID,localsrotageID,memberID) VALUES(?,?,?,?,?,?,?,?)");
    $query->bind_param('sisiiisi', $pname, $pprice, $pimage, $pqty, $pprice, $pid, $localsrotageID, $memberID); //必須按照INSERT INTO順序
    $query->execute(); // 執行SQL

    echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>!!新增商品到購物車!!</strong>
            </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>商品已經加入購物車(錯誤)</strong>
            </div>';
  }
}

//處理購物車內數量 無實體頁面 index.php
// echo isset($_GET['cartItem']) == 'cart_item'　等同  echo $rows;
// isset(回傳Ture/False)收到值Ture 執行下方，num_rows()回傳幾列TABLE，回傳index.php(GET)AJAX，response是DATA收到的值，印出網頁
// 是否有GET到key(Ture $$ Ture == "cart_item") 
// 等同 if (isset($_GET['cartItem'])
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') { //ajax抓get data ; isset拿值$_GET ; data保留cartItem的值 ; ==相等
  $stmt = $conn->prepare("SELECT * FROM cart");
  $stmt->execute(); // 執行SQL
  $stmt->store_result(); //使用取得結果的方法
  $rows = $stmt->num_rows(); //打開看 選擇的結果(SQL COUNT(*):共幾筆資料)

  // echo isset($_GET['cartItem']); //1 Ture
  // echo isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'; //1 Ture
  echo $rows;
}

//remove 購物車移除個別產品 無實體頁面
//isset(回傳Ture/False)收到值Ture 執行下方
// get id
if (isset($_GET['remove'])) {
  $id = $_GET['remove'];
  $stmt = $conn->prepare("DELETE FROM cart WHERE cartID=?");
  $stmt->bind_param('i', $id); //必須按照DELECT順序
  $stmt->execute(); // 執行SQL

  //前面要使用SESSION 倉庫
  $_SESSION['showAlert'] = 'block'; //display:block
  $_SESSION['message'] = "已刪除該購物車產品";
  header('location:cart.php'); //執行完繼續留在此頁
}

//clear 購物車每項產品 無實體頁面
// get id
if (isset($_GET['clear'])) {
  $stmt = $conn->prepare("DELETE FROM cart");
  $stmt->execute(); // 執行SQL
  //前面要使用SESSION 倉庫
  $_SESSION['showAlert'] = 'block'; //display:block
  $_SESSION['message'] = "已清空購物車產品";
  header('location:cart.php'); //執行完繼續留在此頁
}

// 計算商品總價額 無實體頁面
// isset(回傳Ture/False)收到值Ture 執行下方
if (isset($_POST['qty'])) { //ajax抓get data ; isset(回傳Ture/False)收到值Ture 執行下方 
  //1.網頁抓到的值
  $qty = $_POST['qty'];
  $pid = $_POST['pid'];    //變數 = ajax抓pid
  $pprice = $_POST['pprice'];

  $tprice = $qty * $pprice;

  //更新資料庫總數資料
  $stmt = $conn->prepare("UPDATE cart SET cqty=?, ctotalprice=? WHERE cartID=?");
  $stmt->bind_param("isi", $qty, $tprice, $pid); //必須按照UPDATE順序
  $stmt->execute(); // 執行SQL
}

// 新增訂單 + 結帳後清空購物車 無實體頁面 checkout.php
// isset(回傳Ture/False)收到值Ture 執行下方
// 取得HTML值，塞進SQL
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $pmode = $_POST['pmode']; //付款方式
  $products = $_POST['products'];
  $ordertotal = $_POST['order_total'];
  $remark = $_POST['remark'];
  $memberID = $_POST['memberID'];
  $grandtotal = $_POST['grand_total']; //含運費 目前固定100
  $deliverfee = $_POST['deliverfee'];


  $data = '';
  $stmt = $conn->prepare("INSERT INTO orders (customername,customeremail,customerphone,customeraddress,paytype,products,ordertotal,remark,memberID,grandtotal,deliverfee
    ,requiredDate,shippedDate,orderDate,ostatus,paystatus
    )VALUES(?,?,?,?,?,?,?,?,?,?,?,DATE_ADD(now(),interval 2 week),DATE_ADD(now(),interval 7 day),now(),0,0)");  //最晚:兩周 出貨:七日 訂單日:現在
  //放進何變數
  //必須按照INSERT INTO 順序 ;只對?做綁定
  $stmt->bind_param("ssisssisiii", $name, $email, $phone, $address, $pmode, $products, $ordertotal, $remark, $memberID, $grandtotal, $deliverfee);
  $stmt->execute(); // 執行SQL
  $autoID = mysqli_insert_id($conn); //mysqli_insert_id取得 自動遞增的值 給 orderdetails orderID
  // 設定時間
  $getOrderDay = date("Y-m-d"); //訂單日
  $shippedDate = date("Y-m-d", strtotime($getOrderDay . "+7 day")); //出貨日
  $requiredDate = date("Y-m-d", strtotime($getOrderDay . "+2 week")); //最晚出貨日
  // 網頁輸出
  // <h4 class="bg-danger text-light rounded p-2">' . $products . '</h4>
  $data .=  '<div class="d-flex align-items-center flex-column">
  <div class="text-center ">
      <h1 class="display-4 mt-2 text-danger">謝謝惠顧!訂單成功!</h1>
  </div>
  <br>
  <div class="text-center">
      <table class=" table table-striped table-bordered">
          <tbody>
              <tr>
                  <td scope="col">
                      <h4>姓名：<h4>
                  </td>
                  <td scope="col">
                      <h4>' . $name . '<h4>
                  </td>
              </tr>
              <tr>
                  <td>
                      <h4>email：<h4>
                  </td>
                  <td>
                      <h4>' . $email . '<h4>
                  </td>
              </tr>
              <tr>
                  <td>
                      <h4>phone：<h4>
                  </td>
                  <td>
                      <h4>' . $phone . '<h4>
                  </td>
              </tr>
              <tr>
                  <td>
                      <h4>total(含運費)：<h4>
                  </td>
                  <td>
                      <h4>' . number_format($grandtotal, 0) . '<h4>
                  </td>
              </tr>
              <tr>
                  <td>
                      <h4>付款方式：<h4>
                  </td>
                  <td>
                      <h4>' . $pmode . '<h4>
                  </td>
              </tr>
              <h4>
                  <tr>
                      <td>
                          <h4>訂單日期：<h4>
                      </td>
                      <td>
                          <h4>' . $getOrderDay . '<h4>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <h4>出貨日：<h4>
                      </td>
                      <td>
                          <h4>' . $shippedDate . '<h4>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <h4>最晚出貨日：<h4>
                      </td>
                      <td>
                          <h4>' . $requiredDate . '<h4>
                      </td>
                  </tr>
                  </tbody>
                  </table>
                  <br><br><br>
                  <a class="cart-btn" href="../index.php" role="button">回首頁</a>
                  <a class="buy-btn" href="../orders/OrderDetail.php" role="button">訂單查詢</a>
                  </div><br>
                  </div>';

  echo $data;


  // // 結帳後清空購物車
  $stmt = $conn->prepare("DELETE FROM cart");
  $stmt->execute(); // 執行SQL
}

// 購物車結帳後出訂單明細orderdetails
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
  //checkout.php接收[]資料，此處才收的到[]
  $productsID = $_POST['productsID'];
  $productname = $_POST['productname'];
  $productprice = $_POST['productprice'];
  $orderdetailimg = $_POST['cartimg'];
  $oqty = $_POST['cqty'];
  $ototalprice = $_POST['ctotalprice'];
  @$orderID = $_POST['orderID_order'];

  // var_dump($orderID);

  //迴圈，看裡面有幾個就跑幾次，所以可以一次輸入多筆資料 
  //[$i]=陣列內第幾個
  for ($i = 0; $i < count($oqty); $i++) {
    $data = '';
    $stmt = $conn->prepare("INSERT INTO orderdetails (orderID ,productsID,productname,productprice,orderdetailimg,oqty,ototalprice
    )VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("iisisii", $autoID, $productsID[$i], $productname[$i], $productprice[$i], $orderdetailimg[$i], $oqty[$i], $ototalprice[$i]);
    // $stmt->bind_param("iisisii", $orderID[$i], $productsID[$i], $productname[$i], $productprice[$i], $orderdetailimg[$i], $oqty[$i], $ototalprice[$i]);
    $stmt->execute(); // 執行SQL
  }
}


// 處理購物車加入，無實體頁面  products.php
if (isset($_POST['ProductsDetailId'])) {  //ajax抓post data ; isset(回傳Ture/False)收到值Ture 執行下方 ; data保留form的值
  //1.網頁抓到的值
  $pid = $_POST['ProductsDetailId'];    //變數 = ajax抓pid
  $pname = $_POST['ProductsDetailName'];
  $pprice = $_POST['ProductsDetailPrice'];
  $pimage = $_POST['ProductsDetailImage'];
  $ProductsDetailcqty = $_POST['ProductsDetailcqty']; //數量
  $ctotalprice = $pprice * $ProductsDetailcqty; //總額
  $localsrotageID = $randNUM; //瀏覽器編號製作
  // echo "OK";
  // echo "<br>";
  // echo $ProductsDetailcqty;

  //2.加入資料庫
  $stmt = $conn->prepare("SELECT productsID FROM cart WHERE productsID= ?"); //?自訂
  $stmt->bind_param('i', $pid); //必須按照SELECT順序 ; 綁定參數bind_param(資料型態s字串 i整數 d浮點數)
  $stmt->execute(); // 執行SQL
  $res = $stmt->get_result(); //使用取得結過的方法
  $r = $res->fetch_assoc(); //結果陣列
  @$code = $r['productsID']; //@把錯誤隱藏(新增資料成功會顯示警告抓不到值(NULL)，但是抓不到?的值才能新增商品) 

  //3.新增後會顯示下列文字
  if (!$code) {   // 如果cart沒有?的productsID，新增
    $query = $conn->prepare("INSERT INTO cart (
        productname, productprice, cartimg, cqty, ctotalprice,productsID,localsrotageID,memberID) VALUES(?,?,?,?,?,?,?,?)");
    $query->bind_param('sisiiisi', $pname, $pprice, $pimage, $ProductsDetailcqty, $ctotalprice, $pid, $localsrotageID, $memberID); //必須按照INSERT INTO順序
    $query->execute(); // 執行SQL

    echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>!!新增商品到購物車!!</strong>
            </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>商品已經加入購物車(錯誤)</strong>
            </div>';
  }
}


// 預約訂單 無實體頁面 booking.php
// isset(回傳Ture/False)收到值Ture 執行下方
// 取得HTML值，塞進SQL
if (isset($_POST['action_b']) && isset($_POST['action_b']) == 'booking') {
  $memberID = $_POST['memberID'];
  $bitem = $_POST['bitem'];
  $banimal = $_POST['banimal'];
  $bcount = $_POST['bcount'];
  $bdate = $_POST['bdate'];
  $bhour = $_POST['bhour'];
  $bpaytype = $_POST['bpaytype'];

  // $day = strtotime($_POST['bdate']); //轉秒數
  // $bdate = date('Y-m-d H:i:s', $day); 


  switch ($bitem) {
    case "住宿":
      $bath = 800;
      $btotalprice = $bath * $bcount;
      break;
    case "美容":
      $bath = 600;
      $btotalprice = $bath * $bcount;
      break;
    case "攝影":
      $bath = 700;
      $btotalprice = $bath * $bcount;
      break;
    case "醫療":
      $bath = 900;
      $btotalprice = $bath * $bcount;
      break;
    case "其他":
      $bath = 1000;
      $btotalprice = $bath * $bcount;
      break;
  }

  $bvote = $_POST['bvote'];
  $bpaystatus = "未付款";
  $bstatus = "尚未服務";


  $data = '';
  $stmt = $conn->prepare("INSERT INTO booking (memberID ,bitem ,banimal ,bcount ,bdate ,bhour ,bpaytype ,btotalprice ,bvote ,bpaystatus ,bstatus
    )VALUES(?,?,?,?,?,?,?,?,?,?,?)");  //最晚:兩周 出貨:七日 訂單日:現在
  //放進何變數
  //必須按照INSERT INTO 順序 ;只對?做綁定
  $stmt->bind_param("ississsisss", $memberID, $bitem, $banimal, $bcount, $bdate, $bhour, $bpaytype, $btotalprice, $bvote, $bpaystatus, $bstatus);
  $stmt->execute(); // 執行SQL
  // 設定時間
  // 網頁輸出
  $data .= '<br><div class="text-center">
              <h4 class="bg-danger text-light rounded p-2">(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧預約訂單完成</h4>
              <h4>SESSION會員號碼：'  . $randNUM . '及' . $memberID  . '</h4> 
              <h4>預約項目：' . $bitem . '</h4>
              <h4>預約寵物：' . $banimal . '</h4>
              <h4>預約數量：' . $bcount . '</h4>
              <h4>預約日期：' . $bdate . '</h4>
              <h4>預約時段：' . $bhour . '</h4>
              <h4>付款方式：' . $bpaytype . '</h4>
              <h4>總價錢：' . $btotalprice . '</h4>
              <h4>備註：' . $bvote . '</h4>
              <h4>付款狀態：' . $bpaystatus . '</h4>
              <h4>預約狀態：' . $bstatus . '</h4>
              </div>';
  // echo $data;
}
