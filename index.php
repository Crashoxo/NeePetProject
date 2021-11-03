<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======================== link font or icon setting =============================  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">


    <!-- ======================== CSS setting =============================  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/loading.css">

    <!-- ======================== JS setting =============================  -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/loading.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- ======================== title icon setting =============================  -->
    <link rel="icon" href="./img/logo2.jpg">

    <title>寵愛NEE</title>


</head>

<body>

    <div class="loaderpage" style="background-color: #F4F3F2;">
        <div class='RuningLine'>
            <span></span>
            <span></span>
            <span></span>
            <div class="LoadingPage">
                <div class="Gif">
                    <img src="./img/dogrun5.gif" alt="">
                </div>
                <div class="loadingimg">
                    <img class="Img1" style="--i:1" src="./img/肉球.png" alt="">
                    <img class="Img2" style="--i:2" src="./img/肉球.png" alt="">
                    <img class="Img1" style="--i:3" src="./img/肉球.png" alt="">
                    <img class="Img2" style="--i:4" src="./img/肉球.png" alt="">
                    <img class="Img1" style="--i:5" src="./img/肉球.png" alt="">
                    <img class="Img2" style="--i:6" src="./img/肉球.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <div style="height:13vh;">

    </div>





    <!-- ======================== navbar setting =============================  -->
    <?php require 'header.php' ?>
    <?php

    $randNUM = rand(0, 999999); //瀏覽器編號製作 ; 
    $_SESSION['randNUM'] = $randNUM; //瀏覽器編號製作

    @$memberID = $_SESSION['memberID'];
    if ($memberID == null) {
        $memberID = $_SESSION['randNUM'];
    }
    ?>
    <!-- ======================== BS製作輪播 html =============================  -->


    <div class="carousel slide" id="carouselExampleIndicators">
        <div class="carousel-indicators">
            <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="" class="d-block w-100" src="./img/廣告1.jpg">

            </div>
            <div class="carousel-item">
                <img alt="" class="d-block w-100" src="./img/廣告2-1.jpg">

            </div>
            <div class="carousel-item">
                <img alt="" class="d-block w-100" src="./img/廣告3.jpg">

            </div>
        </div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
    </div>

    <!-- ======================== 人氣分類 html =============================  -->

    <div class="classification-bg">
        <div class="title-style">
            <h1 class="heading-title"> <img src="./img/人氣商品-2.png" alt="">人氣商品<img src="./img/人氣商品-2.png" alt=""> </h1>
        </div>
        <div class="classification">
            <div class="classification-item">
                <div class="classification-item-img foo">
                    <img src="./img/衣服-2.png" alt="">
                </div>
                <div class="classification-text">
                    <a href="./testShop/mall.php?categoryname=衣物">衣物</a>
                </div>
            </div>
            <div class="classification-item">
                <div class="classification-item-img foo">
                    <img src="./img/屋子-2.png" alt="">
                </div>
                <div class="classification-text">
                    <a href="./testShop/mall.php?categoryname=居家用品">房屋</a>
                </div>
            </div>
            <div class="classification-item">
                <div class="classification-item-img foo">
                    <img src="./img/玩具-3.png" alt="">
                </div>
                <div class="classification-text">
                    <a href="./testShop/mall.php?categoryname=玩具">玩具</a>
                </div>
            </div>
            <div class="classification-item">
                <div class="classification-item-img foo">
                    <img src="./img/玩具-4.png" alt="">
                </div>
                <div class="classification-text">
                    <a href="./testShop/mall.php?categoryname=外出用品">用品</a>
                </div>
            </div>
            <div class="classification-item">
                <div class="classification-item-img foo">
                    <img src="./img/飼料-3.png" alt="">
                </div>
                <div class="classification-text">
                    <a href="./testShop/mall.php?categoryname=飼料">飼料</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================== 熱賣產品 html =============================  -->
    <!-- 通知有無成功加入購物車 -->

    <div class="title-style">
        <h1 class="heading-title"><img src="./img/讚.png" alt="">暢銷好評<img src="./img/讚.png" alt=""> </h1>
    </div>
    <div id="message"></div>
    <section class="commodity-categories" id="categories">
        <div class="categories-box-container">

            <!-- <div class="box" onclick="location.href='./prop.html' ;">

                <img src="./img/飼料商品.jpg" alt="">
                <div class="box-description">
                    <h1>低磷無穀雞肉貓糧
                    </h1>
                    <p><span>特價:150</span><br><del>原價:200</del></p>
                </div>

                <div class="box-description-btn">
                    <a href="#" class="cart-btn">加入購物車</a>
                    <a href="#" class="buy-btn">直接購買</a>
                </div>

            </div> -->



            <?php
            require_once("connMysql.php");
            $query_RecProduct = "SELECT * FROM products WHERE offlinedate >NOW() AND productstock > 0 ORDER BY productsID LIMIT 12 ";
            $result = $db_link->query($query_RecProduct);

            while ($row_RecProduct = $result->fetch_assoc()) {
            ?>
                <div class="box">
                    <?php if ($row_RecProduct["productshowimg"] == "") { ?>
                        <img src="./testShop/images/nopic.png" alt="暫無圖片" width="120" height="120" border="0" />
                    <?php } else { ?>
                        <img onclick="location.href='./testShop/products.php?id=<?= $row_RecProduct["productsID"] ?>' ; " src="../img/product/200x200/<?php echo $row_RecProduct["productshowimg"]; ?>" alt="<?php echo $row_RecProduct["productname"]; ?>" width="135" height="135" border="0" />
                    <?php } ?>

                    <div class="box-description">
                        <h1><?php echo $row_RecProduct["productname"]; ?></h1>
                        <p><span>特價:<?php echo ceil($row_RecProduct["productprice"] * $row_RecProduct["productdiscount"]); ?></span><br><del>原價:<?= $row_RecProduct["productprice"] ?></del></p>
                    </div>

                    <div class="box-description-btn">
                        <form action="" class="form-submit">
                            <input type="hidden" class="pid" value="<?= $row_RecProduct['productsID'] ?>">
                            <input type="hidden" class="pname" value="<?= $row_RecProduct['productname'] ?>">
                            <input type="hidden" class="pprice" value="<?= $row_RecProduct['productprice'] ?>">
                            <input type="hidden" class="pimage" value="<?= $row_RecProduct['productshowimg'] ?>">
                            <button class="cart-btn addItemBtn">
                                加入購物車
                            </button>
                            <button class="buy-btn addItemBtn buy_button">
                                直接購買
                            </button>
                        </form>
                    </div>
                </div>
            <?php } ?>

        </div>
    </section>

    <!-- ======================== 預約廣告 =============================  -->

    <div class="title-style">
        <h1 class="heading-title"> <i class="fas fa-utensils"></i>寵物預約<i class="fas fa-utensils"></i> </h1>
    </div>
    <div class="advertise-booking">
        <div class="advertise-lift-img">
            <div class="advertise-img-part">
                <div class="advertise-img">
                    <img class="up-img" src="./img/貓窩標誌上半部.png" alt=""><br>
                    <h3>貓窩特輯</h3>
                    <img class="up-img" src="./img/貓窩標誌下半部.png.png" alt="">
                </div>
                <div class="advertise-text">
                    <p>給貓咪一個自由安適的睡眠空間，
                        讓貓咪和你一樣，睡一張有品味的床
                    </p>
                </div>
                <a style="text-align: center;" class="advertise-btn" href="./booking.php">立即預約</a>
            </div>
        </div>
        <div class="advertise-right-img">
            <img class="chenge" src="./img/右邊貓窩圖-1.png">
        </div>
    </div>

    <!-- ======================== QA =============================  -->

    <div class="title-style">
        <h1 class="heading-title"> <img src="./img/問號.png" alt=""> 預約常見問題 <img src="./img/問號.png" alt=""> </h1>
    </div>
    <div class="qa-booking">
        <div class="qa-booking-part">
            <div class="qa-booking-btn active">
                <a href="./index.php" class="current">
                    <div class="qa-booking-img">
                        <img src="./img/開箱評測圖.jpeg" alt="">
                    </div>
                    <h3 class="qa-booking-title">我的貓幾歲該吃什麼食品？</h3>
                </a>
            </div>
            <div class="qa-booking-btn ">
                <a href="./qapart2.html">
                    <div class="qa-booking-img">
                        <img src="./img/開箱評測圖-2.jpeg" alt="">
                    </div>
                    <h3 class="qa-booking-title">為什麼貓咪一直長不出毛？</h3>
                </a>
            </div>
            <div class="qa-booking-btn ">
                <a href="./qapart3.html">
                    <div class="qa-booking-img">
                        <img src="./img/開箱評測圖-3.jpeg" alt="">
                    </div>
                    <h3 class="qa-booking-title">我的貓為什麼一直吐？</h3>
                </a>
            </div>
        </div>
    </div>

    <!-- ======================== qa-conten AJAX部分 =============================  -->
    <section id="qa-content">
        <div id="container">
            <h1 class="containerh1">我的貓幾歲該吃什麼食品？</h1>
            <p class="containerP">1.<strong>幼貓罐頭：</strong>選擇主食罐頭，而不是一些零食罐頭，妙鮮包之類的。</p>
            <p class="containerP">2.<strong>貓糧：</strong>選擇主食罐頭，而不是一些零食罐頭，妙鮮包之類的。</p>
            <p class="containerP">
                3.<strong>千萬不要用牛奶泡乾糧：</strong>貓咪對乳糖會不耐受，一般是不能給貓咪喝牛奶的。如果一定要選擇奶製品的話，建議餵食羊奶，少量的酸奶也是可以的，有助於貓咪消化。</p>
            <p class="containerP">4.<strong>飲水選擇：</strong>30-40ml/礦泉水、純淨水、自來水、涼白開都可以。貓咪更偏愛流動的水。</p>
            <p class="containerP">5.<strong>飲水量</strong>30-40ml/天，具體還要根據貓咪的體重來做出調整。讓貓咪多喝水，可以有效預防貓咪的泌尿系統疾病。</p>
            <p class="containerP">6.<strong>餵食器具</strong>專門的貓碗或者一般家用碟盤都可以，不過最重要是保證餵食器具的乾淨，定期做好清潔消毒。</p>
        </div>
    </section>


    <!-- ======================== footer html =============================  -->
    <?php include('./footer.php'); ?>




    <script type="text/javascript">
        // 文件準備好才使用
        $(document).ready(function() {
            // 把　商品資料庫　資料傳入 加入　購物車資料庫
            // 使用addItemBtn傳入的值  AJAX用
            $(".addItemBtn").click(function(e) {
                //preventDefault 終止「預設」行為
                e.preventDefault();
                // closest 找到為止 ; 離當前元素最近的元素form-submit
                var $form = $(this).closest(".form-submit");
                // find 找標籤外的小孩 不找自己
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();

                console.log(this);
                //是否有class
                if ($(this).hasClass("buy_button")) {
                    // $("#message").side("display:none");
                    $("#message").hide();
                    setTimeout(() => {
                        location.href = "testShop/cart.php";
                    }, 300); //reload資料變更即重整
                }

                setTimeout(() => {
                    location.reload(true)
                }, 2000); //reload資料變更即重整



                $.ajax({ //AJAX可用來即時檢查帳號有無重複(舉例)
                    url: 'testShop/action.php', //傳送到這,這裡判斷 購物車系統(處理購物車加入，無實體頁面)
                    method: 'post', //方法(表單都是post)
                    data: { //放入值
                        pid: pid,
                        pname: pname,
                        pprice: pprice,
                        pimage: pimage,
                    },
                    success: function(response) {
                        $("#message").html(response); //新增訊息在#message
                        // window.scrollTo(0, 0); //如果新增商品成功，滾輪滾治最上
                        load_cart_item_number(); //抓資料庫的值顯示在#cart-item
                    }
                });
            });

            load_cart_item_number() //抓資料庫的值顯示在#cart-item


            // 1.增加購物車 旁邊的數量
            // 2.並判斷購物車內有東西才能結帳
            // ajax可以接收又可回傳
            function load_cart_item_number() {
                $.ajax({
                    url: 'testShop/action.php',
                    method: 'get',
                    // get:比較方便使用(不適合機密，會顯示網址列) ; post:表單用比較麻煩
                    // date物件 屬性 cartItem(key) : "cart_item"(vaule) 用get 傳給 'action.php'
                    // date前都是請求(req)
                    data: { // 1.透過get方式將資料送出action.php請求 2.內含資料後送到success
                        cartItem: "cart_item" // 物件屬性(接收action $row) ; "cart_item"放進 cartItem
                    },

                    //success以下回應(res)
                    success: function(response) { //　success 這邊接收到 $row ; 
                        $("#cart-item").html(response); //　新增數量在#cart-item
                        if (response > 0) {
                            $(".checkout").removeClass("disabled"); // 並判斷購物車內有東西才能結帳
                        }
                    }
                });
            }

        });
    </script>


    <script src="./js/js.js"></script>
    <script src="./js/ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js">
    </script>
</body>

</html>