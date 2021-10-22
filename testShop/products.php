<?php
session_start();
$randNUM = $_SESSION['randNUM'];  //瀏覽器編號取得
//判斷右上結帳:購物車內有無商品 但是希望可以直接執行 之後換AJAX****************************
require 'config.php';
$grand_total = 0; //含運倉庫
$sql = "SELECT CONCAT(productname,'(',cqty,')') AS ItemQty, ctotalprice FROM cart";
$stmt = $conn->prepare($sql); // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
$stmt->execute(); // 執行SQL
$result = $stmt->get_result(); //使用取得結過的方法
while ($row = $result->fetch_assoc()) { //fetch_assoc()顯示陣列
    $grand_total = $row['ctotalprice'];
};
?>

<?php session_start();
// $_SESSION['memberID'] = 2;
$memberID = $_SESSION['memberID']
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="./img/LOGO100x100.png">
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->

    <title>寵愛NEE</title>


</head>

<body>
    <?php require 'header.php' ?>



    <?php
    include 'config.php';
    // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
    // 必須把表內容寫出來，bind_result需對應
    $stmt = $conn->prepare("SELECT productsID, productname, productprice, productshowimg ,categoryid ,productstock ,productsold ,productdiscount ,productstatus ,onlinedate ,offlinedate ,productvote ,productnews FROM products WHERE productsID = ?");
    //bind_param?幾個寫幾個
    //id是抓網址列"?id="後的值!!對應index.php內products.php?id=<?= $row['productsID']
    $stmt->bind_param('i', $_GET["id"]); //必須按照SELECT順序 ; 綁定參數bind_param(資料型態s字串 i整數 d浮點數)
    // echo $_GET["id"]; //抓id=後的值
    // 執行SQL
    $stmt->execute();
    //1. get_result()使用方法:用1.MySQL物件被2.執行後的方法，取得3.結果一列一列，使用取得結果函式?
    //bind_result SELECT 幾個就放幾個變數
    $stmt->bind_result($productsID, $productname, $productprice, $productshowimg, $categoryid, $productstock, $productsold, $productdiscount, $productstatus, $onlinedate, $offlinedate, $productvote, $productnews);
    //fetch()單一變數、fetch_assoc()顯示陣列
    $stmt->fetch();
    // var_dump($stmt);
    // echo "<br>";
    // print($stmt);
    // echo "<br>";
    // echo $productsID;
    // echo $productname;
    // echo $productprice;
    // echo $productshowimg;
    // echo $product_code;
    // echo $categoryid;
    // echo $productstock;
    // echo $productsold;
    // echo $productdiscount;
    // echo $productstatus;
    // echo $onlinedate;
    // echo $offlinedate;
    // echo $productvote;
    // echo $productnews;
    ?>
    <!-- 顯示資料用 -->

    <main class="container l-product-page Product_Block">
        <div class="Bookmark">
            <a href="./homepage.html">寵愛NEE</a>
            <span>/</span>
            <a href="./mall.php">購物商城</a>
            <!-- <span>/</span>
            <a href="./prop.html">罐頭</a> -->
        </div>
        <!-- 通知有無成功加入購物車 -->
        <div id="message"></div>
        <div id="product-app" class="row l-product-basic-info">
            <div class="col-lg-6 mb-3 l-product-images">
                <div class="c-product-images pr-lg-5">
                    <div class="c-product-images__cover text-center" style="position: relative; overflow: hidden;"><img src="../../img/product/400x400/<? echo $productshowimg; ?>" alt="" class="img-fluid img-thumbnail" id="ProductImg">
                    </div>
                    <div class="c-product-images__thumbs row no-gutters mt-3">


                        <?php

                        require_once('connMysql.php');
                        $sql_query3 = "SELECT filename FROM productimg  WHERE productsID =" . $productsID;
                        $result3 = $db_link->query($sql_query3);

                        while ($row_result3 = $result3->fetch_assoc()) { ?>
                            <!-- 輪播圖 -->
                            <div class="c-product-images__thumb col-2 mr-1"><a href="#" data-fancybox="product">
                                    <img src="../../img/product/400x400/<?= $row_result3["filename"] ?>" alt="Image" class="img-thumbnail"></a>
                            </div>

                        <?php } ?>

                    </div>

                </div>
            </div>
            <div class="col-lg-6 pl-lg-3 l-product-info">
                <div class="c-product-info">
                    <div class="c-product-info__title mb-2">
                        <h1 class="h3 m-0 text-dark">
                            <?= $productname ?>
                        </h1>
                    </div>
                    <div class="c-product-info__price">
                        <!-- <div class="c-product-info__category mb-2"><span>分類&nbsp; 主食</span></div> -->
                        <div class="c-product-info__market-price mb-2"><span class="c-product-info__label mr-1">原價</span> <del class="c-product-info__text">
                                <?= $productprice ?>
                            </del></div>
                        <div class="c-product-info__final-price mb-2"><span class="c-product-info__label mr-1">特價</span>
                            <span class="c-product-info__text">
                                <?= ceil($productprice * $productdiscount) ?>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <input type="hidden" id="remark" value="<? echo $productvote; ?>">
                <div class="c-product-intro">
                    <p>產品特色:</p>
                    <div id="test"></div>

                </div>
                <!-- <hr>
                <div class="c-product-attributes py-3">
                    <div class="c-product-attribute c-product-attribute--brand"><span class="c-product-attribute__label aaa">
                            產品品牌：
                        </span> <span class="c-product-attribute__text"><a></a></span></div>
                    <div class="c-product-attribute c-product-attribute--model"><span class="c-product-attribute__label">
                            產品型號：
                        </span> <span class="c-product-attribute__text">
                            coffee-74538
                        </span></div>
                    <div class="c-product-attribute c-product-attribute--dimension"><span class="c-product-attribute__label">
                            產品尺寸：
                        </span> <span class="c-product-attribute__text">
                            5cm x
                            5cm x
                            5cm
                        </span></div>
                    <div class="c-product-attribute c-product-attribute--location"><span class="c-product-attribute__label">
                            製造地 / 產地：台灣
                        </span> <span class="c-product-attribute__text"></span></div>
                    <div class="c-product-attribute c-product-attribute--warranty"><span class="c-product-attribute__label">
                            保固年限：1年
                        </span> <span class="c-product-attribute__text"></span></div>
                </div> -->
                <hr>
                <div class="c-product-features mt-4"></div>
                <div class="c-product-control mt-4">
                    <div class="c-product-quantity mb-4 pr-md-4 d-flex align-items-center">
                        <div class="c-product-quantity__label text-center text-md-left">


                            <label for="input-quantity" class="amount_text">
                                購買數量：
                            </label>
                        </div>
                        <div class="c-product-quantity__input-group ml-4">

                            <form action="" class="form-submit">
                                <input type="hidden" class="ProductsDetailId" value="<? echo $productsID ?>">
                                <input type="hidden" class="ProductsDetailName" value="<? echo $productname ?>">
                                <input type="hidden" class="ProductsDetailPrice" value="<? echo $productprice ?>">
                                <input type="hidden" class="ProductsDetailImage" value="<? echo $productshowimg ?>"><br>

                                <div class="input-group ">
                                    <div class="input-group-prepend "><button type="button" class="btn btn-secondary amount_btn_red"><span class="fa fa-minus"></span></button></div>
                                    <input id="input-quantity" type="number" min="1" value="1" class="ProductsDetailcqty c-product-quantity__input form-control text-center bg-white amount_input" style="max-width: 75px;">
                                    <div class="input-group-append "><button type="button" class="btn btn-primary amount_btn_add"><span class="fa fa-plus"></span></button></div>
                                </div>

                            </form>

                        </div>
                    </div>

                    <div class="c-product-actions row mx-0 mb-4">
                        <div class="col-lg-6 d-flex p-0">
                            <button data-product-id="60" data-min-quantity="1" type="button" class="addItemBtn buy_button addProductsDetailItemBtn c-button c-button--add-to-cart btn btn-primary flex-grow-1 btn-lg text-center mr-lg-1 GoToBuy_Btn">
                                <span class="fa fa-shopping-cart mr-2"></span>
                                直接購買
                            </button>
                        </div>
                        <div class="col-lg-6 p-0 d-flex">
                            <button class="addItemBtn addProductsDetailItemBtn  
                                                c-button c-button--add-to-wishlist btn btn-outline-secondary btn-lg text-center flex-grow-1 js-button--add-to-wishlist InToCar_Btn" data-product-id="60" data-user-id="" id="InToCar_Btn">
                                <i class="fa fa-heart mr-2"></i>加入購物車
                            </button>
                        </div>
                    </div>
                    <div class="c-product-actions row mx-0 mb-4">


                        <input type="hidden" disabled="disabled" name="memberID" class="form-control memberID" placeholder="memberID之後須從外匯入" value="<? echo $memberID ?>" required>
                        </form>

                    </div>
                </div>
            </div>

            <!-- <div class="l-product-details mt-5">
            <ul class="nav nav-tabs nav-fill c-tab-nav" role="tablist">
                <li class="nav-item c-tab-nav__item c-tab-nav__item--description text-center Product_li Product_li_m">
                    <a class="nav-link active Product_Page" href="#description" data-toggle="tab">
                        產品介紹
                    </a>
                </li>
                <li class="nav-item c-tab-nav__item c-tab-nav__item--description text-center Product_li Product_li_m">
                    <a class="nav-link  Product_Page" href="#description" data-toggle="tab">
                        商品規格
                    </a>
                </li>

                <li class="nav-item c-tab-nav__item c-tab-nav__item--description text-center Product_li Product_li_m">
                    <a class="nav-link Product_Page" href="#description" data-toggle="tab">
                        售後服務
                    </a>
                </li>
                <li class="nav-item c-tab-nav__item c-tab-nav__item--description text-center Product_li Product_li_m">
                    <a class="nav-link Product_Page" href="#description" data-toggle="tab">
                        保固說明
                    </a>
                </li>
            </ul>

            <div class="tab-content product-info__tab-content p-2 p-lg-5 border-left border-bottom border-right Product_Content">
                <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="home-tab">
                    <p>成分：雞肉，雞肉粉，火雞肉粉，油鯡魚粉，豌豆，雞脂肪（以維生素E及檸檬酸保存），木薯，天然香料，乾燥番茄碎粒，白魚粉（太平洋鱈魚，太平洋比目魚，太平洋石斑魚），鹽，維生素群（維生素E，L-抗壞血酸-2-多磷酸鹽，菸鹼酸，維生素B1，維生素B5，維生素A，維生素B2，維生素K3，維生素B6，維生素B12，維生素B9，維生素D3，維生素B7），蒙脫石粘土（協助吸附黴菌和有害細菌，加強粘膜保護），紅蘿蔔，蘋果，蔓越莓，氯化膽鹼，氯化鉀，礦物質（鋅蛋白鹽，鐵蛋白鹽，銅蛋白鹽，錳蛋白鹽，亞硒酸鈉，乙二胺二氫碘化物），凍乾雞肉，DL-蛋氨酸，牛磺酸，凍乾雞肝，南瓜籽，凍乾雞心，乾燥芽孢乳酸菌，迷迭香萃取物。
                        營養分析： 粗蛋白(最少)43.0％ 粗脂肪(最少)19.5％ 粗纖維(最多)3.0％ 水分(最多)9.0％ 維生素E(最少)100IU/kg 維生素C(最少)85mg/kg
                        Omega-3脂肪酸(最少)0.45％ Omega-6脂肪酸(最少)3.0％ 熱量(代謝能量)4150大卡/公斤</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>

                <div class="tab-pane fade" id="attributes" role="tabpanel">

                    <table class="table std-table">
                        <tbody>
                        </tbody>
                    </table>

                </div>

                <div class="tab-pane fade" id="installation" role="tabpanel">
                    <p>食品不提供安裝</p>
                </div>

                <div class="tab-pane fade" id="after-sales-service" role="tabpanel">
                    <p>食品不提供售後服務</p>
                </div>

                <div class="tab-pane fade" id="warranty" role="tabpanel">
                    <div class="l-warranty">
                        <div class="l-warranty__table">
                            <table class="table std-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">品牌</th>
                                        <th class="text-center">保固範圍</th>
                                        <th class="text-center">售後服務方式</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">牧毛町</td>
                                        <td class="text-center">食品不適用保固規則</td>
                                        <td class="text-center">若飲食後，毛孩有發生，身體不適，請告知我們，我們會請貨運跟您收貨。</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="l-warranty__certificate">
                            <div class="l-warranty__text mb-2">
                                提醒! 請記得填寫隨貨附贈的家電品保證書兌換卡，確保您商品保固的權益。
                            </div>
                            <img class="img-responsive" src="./img/飼料商品.jpg" alt="證書">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </main>






    <?php require 'footer.php'; ?>

    <?php require 'config.php'; ?>
    <script type="text/javascript">
        // 文件準備好才使用
        $(document).ready(function() {
            // 把　商品資料庫　資料傳入 加入　購物車資料庫
            // 使用addItemBtn傳入的值  AJAX用
            $(".addProductsDetailItemBtn").click(function(e) {

                if ($(".ProductsDetailcqty").val() == 0) {
                    alert("請輸入數量");
                    return;
                } else {

                    //preventDefault 終止「預設」行為
                    e.preventDefault();
                    // find 找標籤外的小孩 不找自己
                    var ProductsDetailId = $(".ProductsDetailId").val();
                    var ProductsDetailName = $(".ProductsDetailName").val();
                    var ProductsDetailPrice = $(".ProductsDetailPrice").val();
                    var ProductsDetailImage = $(".ProductsDetailImage").val();
                    var ProductsDetailcqty = $(".ProductsDetailcqty").val();

                    // var $form = $(this).closest(".form-submit");
                    // var ProductsDetailId = $form.find(".ProductsDetailId").val();
                    // var ProductsDetailName = $form.find(".ProductsDetailName").val();
                    // var ProductsDetailPrice = $form.find(".ProductsDetailPrice").val();
                    // var ProductsDetailImage = $form.find(".ProductsDetailImage").val();
                    // var ProductsDetailcqty = $form.find(".ProductsDetailcqty").val();

                    console.log("ProductsDetailId:", ProductsDetailId);
                    console.log("ProductsDetailName:", ProductsDetailName);
                    console.log("ProductsDetailPrice:", ProductsDetailPrice);
                    console.log("ProductsDetailImage:", ProductsDetailImage);
                    console.log("ProductsDetailcqty:", ProductsDetailcqty);

                    if ($(this).hasClass("buy_button")) {
                        // $("#message").side("display:none");
                        $("#message").hide();
                        setTimeout(() => {
                            location.href = "cart.php";
                        }, 300); //reload資料變更即重整
                    }

                    setTimeout(() => {
                        location.reload(true)
                    }, 1000); //reload資料變更即重整




                    $.ajax({ //AJAX可用來即時檢查帳號有無重複(舉例)
                        url: 'action.php', //傳送到這,這裡判斷 購物車系統(處理購物車加入，無實體頁面)
                        method: 'post', //方法(表單都是post)
                        data: { //放入值
                            ProductsDetailId: ProductsDetailId,
                            ProductsDetailName: ProductsDetailName,
                            ProductsDetailPrice: ProductsDetailPrice,
                            ProductsDetailImage: ProductsDetailImage,
                            ProductsDetailcqty: ProductsDetailcqty
                        },
                        success: function(response) {
                            $("#message").html(response); //新增訊息在#message
                            window.scrollTo(0, 0); //如果新增商品成功，滾輪滾治最上
                            load_cart_item_number(); //抓資料庫的值顯示在#cart-item
                        }
                    });
                }


            });

            load_cart_item_number() //抓資料庫的值顯示在#cart-item


            // 1.增加購物車 旁邊的數量
            // 2.並判斷購物車內有東西才能結帳
            // ajax可以接收又可回傳
            function load_cart_item_number() {
                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    // get:比較方便使用(不適合機密，會顯示網址列) ; post:表單用比較麻煩
                    // date物件 屬性 cartItem(key) : "cart_item"(value) 用get 傳給 'action.php'
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

        //remark值加,輸出字串
        let str = $("#remark").val();
        let newArr = str.split(','); //將文字轉乘陣列，以','做區分
        for (let i = 0; i < newArr.length; i++) {
            $('#test').append(`<p>${newArr[i]}</p>`);
        }
        //    console.log(str);
    </script>

    <script>
        $(".amount_btn_add").click(function() {

            var amount = parseInt($("#input-quantity").val());
            document.getElementById("input-quantity").value = amount + 1;
        })
        $(".amount_btn_red").click(function() {
            var amount = parseInt(document.getElementById("input-quantity").value);
            if (amount > 1) {
                document.getElementById("input-quantity").value = amount - 1;
            } else {
                document.getElementById("input-quantity").value = 1;
            }
        })

        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("img-thumbnail");

        SmallImg[0].onclick = function() {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function() {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function() {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function() {
            ProductImg.src = SmallImg[3].src;
        }

        // document.getElementById("InToCar_Btn").addEventListener("click", function() {
        //     swal("加入購物車", "繼續選購產品吧!", "success");
        // });
    </script>



    <script src="./js/js.js"></script>
</body>


</html>