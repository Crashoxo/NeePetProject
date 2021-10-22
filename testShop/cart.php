<?php
session_start();
$randNUM = $_SESSION['randNUM'];  //瀏覽器編號取得
$memberID = $_SESSION['memberID'];
// 抓會員資料
if (!$_SESSION['memberID'])  header("Location: ../login.php");

//判斷右上結帳:購物車內有無商品
require 'config.php';
$grand_total = 0; //含運倉庫
$cqty_total = 0; //總數量倉庫
$sql = "SELECT CONCAT(productname,'(',cqty,')') AS ItemQty, ctotalprice FROM cart";
$stmt = $conn->prepare($sql); // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
$stmt->execute(); // 執行SQL
$result = $stmt->get_result(); //使用取得結過的方法
while ($row = $result->fetch_assoc()) { //fetch_assoc()顯示陣列
    $grand_total = $row['ctotalprice'];
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css_bs/bootstrap.min.css" /> -->
    <script src="./js_bs/jquery.min.js"></script>
    <script src="./js_bs/popper.min.js"></script>
    <!-- <script src="./js_bs/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css" />
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="./img/LOGO100x100.png">
    <title>Cart</title>
    <style>

    </style>
</head>

<body>

    <?php require 'header.php' ?>

    <div style="margin-top: 115px;"></div>
    <!-- 通知 已刪除產品 展示SESSION-->
    <!-- display:block 此處沒差 div本來就是block-->
    <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                            echo $_SESSION['showAlert'];
                        } else {
                            // display:none
                            // 無觸發刪除時
                            echo 'none';
                        }
                        // unset清除變數
                        unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <!-- 文字顯示 -->
        <strong><?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                } ?></strong>
    </div>


    <section class="cartcontainer">
        <h1>購物車</h1>
        <table class="products">


            <div class="cart">
                <div class="products">

                    <?php
                    require 'config.php'; //引入
                    // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
                    $stmt = $conn->prepare("SELECT * FROM cart");
                    // 執行SQL
                    $stmt->execute();
                    //1. get_result()使用方法
                    $result = $stmt->get_result();
                    $grand_total = 0; //總額倉庫
                    while ($row = $result->fetch_assoc()) : //fetch_assoc()顯示陣列
                    ?>
                        <div class="product">
                            <img src="../../img/product/200x200/<?= $row['cartimg'] ?>" width="50">
                            <div class="product-info">

                                <!-- hidden find才能抓到值 -->
                                <input type="hidden" class="pid" value="<?= $row['cartID'] ?>">
                                <input type="hidden" class="pprice" value="<?= $row['productprice'] ?>">
                                <h4 class="product-name">品項：<?= $row['productname'] ?></h4>

                                <h4>單價：
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<?= number_format($row['productprice'], 0) ?>
                                </h4>
                                <br>
                                <h4 class="product-offer"></h4>
                                <!-- 數量 -->
                                <div class="remove-area">
                                    <p class="product-quantity">數量<input id="controlNUM" type="number" class="itemQty" value="<?= $row['cqty'] ?>">
                                        <!-- 價格 -->
                                        個別總價：
                                        &nbsp;&nbsp;<?= number_format($row['ctotalprice'], 0) ?>

                                        <a class="product-remove remove" href="action.php?remove=<?= $row['cartID'] ?>" onclick="return confirm('確定清除該商品？');" style="text-decoration:none;">
                                            <i class=" fa fa-trash" aria-hidden="true"></i><span class="delete-remove">刪除</span></a>

                                </div>

                            </div>
                        </div>
                        <?php
                        //總額計算
                        $grand_total += $row['ctotalprice'];
                        // 商品種數計算
                        $cqty_total += $row['cqty'];
                        // echo $grand_total; 
                        ?>
                    <?php endwhile; ?>
                </div>


                <div class="cart-total">
                    <p><b>購物車總數</b></p>
                    <p>
                        <span> 總金額：</span>
                        <span>&nbsp;&nbsp;<?= number_format($grand_total, 0) ?></span>
                    </p>
                    <p>
                        <span> 商品數量：</span>
                        <span>&nbsp;&nbsp;<?= $cqty_total ?></span>
                    </p>

                    <div style="padding: 10px 0 10px 0;">
                        <a href="mall.php" class="">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;繼續購物</a>
                        <!-- 結帳紐 -->
                        <!-- 結帳金額>1?沒事:否則無法結帳(disabled)-->
                        <!-- btn btn-info需保留，否則無法disabled -->
                        <a href="checkout.php" style="display: flex; justify-content: center; align-items: center;" class="btn btn-secondary <?= ($grand_total > 1 ? "" : "disabled") ?>"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;&nbsp;結帳</a>

                        <a href="action.php?clear=all" onclick="return confirm('確定清除購物車？');">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i>&nbsp;&nbsp;清除購物車
                        </a>
                    </div>
                </div>
            </div>
        </table>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <input type="hidden" disabled="disabled" name="memberID" class="form-control" placeholder="memberID之後須從外匯入" value="<? echo $memberID ?>" require>
    </section>

    <!-- 會員編號及瀏覽器編號 -->





    <?php require 'footer.php'; ?>

    <!-- 使用itemQty傳入的值  AJAX用-->
    <!-- 把資料庫資料傳入網頁 將網頁資料傳入ajax 計算購物車總價額-->
    <script type="text/javascript">
        // 文件準備好才使用
        $(document).ready(function() {
            //可更改數量
            $(".itemQty").on('change', function() {
                // console.log(this);
                var $el = $(this).closest('.product-info'); //closest找到為止
                var pid = $el.find(".pid").val(); //找標籤外的小孩 不找自己
                var pprice = $el.find(".pprice").val(); //找標籤外的小孩 不找自己
                var qty = $el.find(".itemQty").val(); //找標籤外的小孩 不找自己

                // console.log($el);
                // console.log(pprice);
                // console.log(qty);

                setTimeout(() => {
                    location.reload(true)
                }, 300); //reload資料變更即重整

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    cache: false, //method: 'get'時有效，True會被暫存資料
                    // https://blog.csdn.net/qing_gee/article/details/80236856
                    data: {
                        qty: qty,
                        pid: pid,
                        pprice: pprice
                    },
                    success: function(response) {
                        console.log(response);
                        console.log("成功");
                    },
                });
            });

            load_cart_item_number() //抓資料庫的值顯示在#cart-item

            function load_cart_item_number() {

                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {
                        cartItem: "cart_item"
                    },
                    success: function(response) {
                        $("#cart-item").html(response); //新增數量在#cart-item
                    }
                });
            }
        });
    </script>
</body>
<script src="./js/js.js"></script>

</html>