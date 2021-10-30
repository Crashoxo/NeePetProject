<?php
session_start();
$randNUM = $_SESSION['randNUM'];  //瀏覽器編號取得
//判斷右上結帳:購物車內有無商品 但是希望可以直接執行 之後換AJAX****************************
require 'config.php';

// 抓會員資料
if (!$_SESSION['memberID'])  header("Location: ../login.php");
$memberID = $_SESSION['memberID'];

// $memberID = 2;

$grand_total = 0; //含運倉庫
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <link rel="stylesheet" href="./jquery-ui-1.12.1/jquery-ui.css" />
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./jquery-ui-1.12.1/jquery-ui.js"></script>
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->

    <title>寵愛NEE</title>

</head>
<style>
    * {
        box-sizing: border-box;
    }
</style>

<body>



    <?php require 'header.php' ?>

    <div class="petbook-step-title">
        <img src="./img/寵物服務預約(橙色字體).png" alt="">
    </div>



    <div class="petbook-wrapper">
        <div id="petbook-bar-container">
            <ul>
                <li class="step step01 active">
                    <div class="step-inner">選擇服務</div>
                </li>
                <li class="step step02 ">
                    <div class="step-inner">預約時間</div>
                </li>
                <li class="step step03">
                    <div class="step-inner">填寫資料</div>
                </li>
                <li class="step step04">
                    <div class="step-inner">確認訂單資料</div>
                </li>
                <li class="step step05">
                    <div class="step-inner">成功預約</div>
                </li>
            </ul>
            <div id="petbook-line">
                <div id="petbook-line-progress"></div>
            </div>
        </div>

        <form action="" method="post" id="placeBooking">
            <div id="petbook-content-section">
                <div class="petbook-content discovery active">
                    <h2 style="font-size: 26px;">選擇服務</h2>
                    <div class="petbook-grid-part">
                        <div class="petbook-detail-block">
                            <div class="petbook-grid-part">
                                <label class="petbook-custom-radio">
                                    <input type="radio" name="bitem" value="住宿" />
                                    <div class="petbook-radio-btn">
                                        <i class="fas fa-home" style="color:#004B4A;"></i>
                                        <div class="petbook-radio-content">
                                            <span class="petbook-radio-title">
                                                <span>寶貝住宿</span>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                                <label class="petbook-custom-radio">
                                    <input type="radio" name="bitem" value="美容" />
                                    <div class="petbook-radio-btn">
                                        <i class="fas fa-cut" style="color:#004B4A;"></i>
                                        <div class="petbook-radio-content">
                                            <span class="petbook-radio-title">
                                                <span>寶貝美容</span>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                                <label class="petbook-custom-radio">
                                    <input type="radio" name="bitem" value="攝影" />
                                    <div class="petbook-radio-btn">
                                        <i class="fa fa-camera-retro" aria-hidden="true" style="color:#004B4A;"></i>
                                        <div class="petbook-radio-content">
                                            <span class="petbook-radio-title">
                                                <span>寶貝攝影</span>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                                <label class="petbook-custom-radio">
                                    <input type="radio" name="bitem" value="醫療" />
                                    <div class="petbook-radio-btn">
                                        <i class="fas fa-briefcase-medical" style="color:#004B4A;"></i>
                                        <div class="petbook-radio-content">
                                            <span class="petbook-radio-title">
                                                <span>寶貝醫療</span>
                                            </span>
                                        </div>
                                    </div>
                                </label>

                            </div>
                            <hr>

                            <div style="display: flex; justify-content: center;">
                                <a class="petbook-btn-next step02 active ">下一步</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="petbook-content strategy">
                    <h2 style="font-size: 26px;">預約時間</h2>
                    <div class="petbook-book">

                        <div class="petbook-book-form">
                            <div class="petbook-form-item">
                                <label for="checkin-date">時間</label>
                                <input type="text" name="bdate" id="chekin-date">
                            </div>
                            <div class="petbook-form-item">
                                <label for="checkout-date">時段</label>
                                <select name="bhour" id="petbook-daytime" class="checkout-date" style="border-radius: 5px ; padding: 12px 15px; margin: 4px 0 16px 0;  font-size: 17px;">
                                    <option value="上午9點">上午9點</option>
                                    <option value="上午10點">上午10點</option>
                                    <option value="上午11點">上午11點</option>
                                    <option value="下午1點">下午1點</option>
                                    <option value="下午2點">下午2點</option>
                                    <option value="下午3點">下午3點</option>
                                    <option value="下午4點">下午4點</option>
                                </select>
                            </div>
                            <div class="petbook-form-item">
                                <label for="checkout-date">寵物選擇</label>
                                <select name="banimal" id="petbook-bodytype" class="" style="border-radius: 5px ; padding: 12px 15px; margin: 4px 0 16px 0;  font-size: 17px;">
                                    <option value="cat">喵咪</option>
                                    <option value="dog">狗溝</option>
                                </select>
                            </div>
                            <div class="petbook-form-item">
                                <label for="children">寶貝數量</label>
                                <input type="number" name="bcount" min="1" value="1" id="children">
                            </div>

                        </div>
                        <hr>
                    </div>
                    <div style="display: flex; justify-content: center; ">
                        <div style="display: flex; justify-content: center; margin-right: 10px;">
                            <a class="petbook-btn-next step01 active ">上一步</a>
                        </div>
                        <div style="display: flex; justify-content: center;  margin-left: 10px;">
                            <a class="petbook-btn-next step03 active ">下一步</a>
                        </div>
                    </div>
                </div>



                <?php
                $stmt_member = $conn->prepare("SELECT memberID, name, address, phone FROM member WHERE memberID = ?");
                //bind_param?幾個寫幾個
                //id是抓網址列"?id="後的值!!對應index.php內products.php?id=<?= $row['productsID']
                $stmt_member->bind_param('i', $memberID); //必須按照SELECT順序 ; 綁定參數bind_param(資料型態s字串 i整數 d浮點數)
                // echo $_GET["id"]; //抓id=後的值
                // 執行SQL
                $stmt_member->execute();
                //1. get_result()使用方法:用1.MySQL物件被2.執行後的方法，取得3.結果一列一列，使用取得結果函式?
                //bind_result SELECT 幾個就放幾個變數
                $stmt_member->bind_result($memberID, $name, $address, $phone);
                //fetch()單一變數、fetch_assoc()顯示陣列
                $stmt_member->fetch();
                // var_dump($stmt);
                // echo "<br>";
                // print($stmt);
                // echo "<br>";
                ?>

                <div class="petbook-content creative">

                    <h2 style="font-size: 26px;">填寫資料</h2>

                    <div class="petbook-form-div">
                        <p>會員姓名：<?= $name ?></p>
                        <!-- <input type="text" class="petbook-form-input" placeholder=" " value="">
                        <label for="" class="petbook-form-label">主人姓名</label> -->
                    </div>

                    <div class="petbook-form-div">
                        <p>住家地址：<?= $address ?></p>
                        <!-- <input type="text" class="petbook-form-input" placeholder=" " value="">
                        <label for="" class=" petbook-form-label">住家地址</label> -->
                    </div>
                    <div class="petbook-form-div">
                        <p>會員手機：<?= $phone ?></p>
                        <!-- <input type="tel" class="petbook-form-input" placeholder=" " value="">
                        <label for="" class=" petbook-form-label">手機</label> -->
                    </div>
                    <div class="petbook-form-div">
                        <input id="pet_name" type="text" class="petbook-form-input" placeholder=" ">
                        <label for="" class="petbook-form-label">寵物姓名</label>
                    </div>
                    <div class="petbook-form-div">
                        <input type="text" class="petbook-form-input" placeholder=" ">
                        <label for="" class="petbook-form-label">緊急聯絡人</label>
                    </div>
                    <div class="petbook-form-div">
                        <input type="tel" class="petbook-form-input" placeholder=" ">
                        <label for="" class="petbook-form-label">緊急聯絡電話</label>
                    </div>

                    <div class="petbook-form-div">
                        <select name="bpaytype" class="form-control petbook-form-input">
                            <option value="cash">到店付現</option>
                            <!-- <option value="" selected disabled>-select 付款方式-</option>
                            <option value="atm" selected>atm匯款</option>
                            <option value="creditcard">線上刷卡</option> -->
                        </select>
                    </div>
                    <div class="petbook-textarea">
                        <textarea name="bvote" spellcheck="false" placeholder="如果寶貝有特別需要注意的地方，歡迎備註提前告知。"></textarea>
                    </div>


                    <div style="display: flex; justify-content: center; ">
                        <div style="display: flex; justify-content: center; margin-right: 10px;">
                            <a class="petbook-btn-next step02 active ">上一步</a>
                        </div>
                        <div style="display: flex; justify-content: center;  margin-left: 10px;">
                            <a class="petbook-btn-next step04 active ">下一步</a>
                        </div>
                    </div>
                </div>


                <div class="petbook-content production">
                    <h2 style="font-size: 26px;">確認訂單資料</h2>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="Order_Detail_text">
                                <p id="pet_name_pass">寵物名稱</p>
                                <p>會員姓名：<?= $name ?></p>
                                <p>會員手機：<?= $phone ?></p>
                            </div>
                            <div class="Order_Detail_text">
                                <p>住家地址：<?= $address ?></p>
                            </div>
                            <table>
                                <tr>
                                    <th>服務品項</th>
                                    <th>價錢</th>
                                    <th>寶貝數量</th>
                                    <th>小計</th>
                                </tr>
                                <tr>
                                    <td id="pet_service"></td>
                                    <td id="pet_cost"></td>
                                    <td id="pet_num">1</td>
                                    <td id="pet_total"></td>
                                </tr>

                            </table>
                            <div class="Order_Detail_text">
                                <p id="pet_total_down"></p>



                            </div>

                        </div>
                    </div>

                    <div style="display: flex; justify-content: center; ">
                        <div style="display: flex; justify-content: center; margin-right: 10px;">
                            <a class="petbook-btn-next step03 active ">上一步</a>
                        </div>

                        <div class="petbook-btn-part step05 active">
                            <button type="submit" name="submit" class="petbook-btn-next ">確認訂單</button>
                        </div>

                    </div>
                </div>

                <div class="petbook-content analysis">
                    <h2 style="font-size: 26px;">預約完成</h2>
                    <p style="font-size: 20px;">恭喜你預約成功囉~請準時到預定店面報到，逾期半小時後將自動取消預約資格。</p>
                    <img src="./img/吉娃娃1.jpg" style="height: 300px; width: 300px;" alt="">

                    <div class="petbook-btn-part">
                        <a class="petbook-btn-next" href="../index.php">回首頁</a>
                    </div>
                </div>
                <div class="col-lg-6 px-4 pb-4" id="Booking">
                </div>
            </div>



            <!-- hidden才抓的到值 -->
            <div class="form-group">
                <input type="hidden" name="memberID" class="form-control memberID" placeholder="memberID之後須從外匯入" value="<? echo $memberID ?>">
            </div>

    </div>

    </form>

    <?php require 'footer.php'; ?>


    <script type="text/javascript">
        // 文件準備好才使用
        $(document).ready(function() {

            $("#placeBooking").submit(function(e) {
                console.log(e); //event
                e.preventDefault(); //preventDefault 終止「預設」行為
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    // serializes the form's elements.
                    // https://www.ucamc.com/articles/332-%E5%A6%82%E4%BD%95%E4%BD%BF%E7%94%A8jquery-ajax-submit-%E5%82%B3%E9%80%81form%E8%A1%A8%E5%96%AEserialize-%E6%96%B9%E6%B3%95
                    data: $('form').serialize() + "&action_b=booking",
                    success: function(response) {
                        $("#Booking").html(response);
                    }
                })
            })

            load_cart_item_number() //抓資料庫的值顯示在#cart-item

            // 增加購物車 旁邊的數量
            // ajax可以接收又可回傳
            function load_cart_item_number() {
                $.ajax({
                    url: 'action.php',
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
                    }
                });
            }

            // 限制日期
            $(function() {
                $("#chekin-date").datepicker({
                    minDate: 1,
                    maxDate: "+1M +10D",
                    dateFormat: "yy-mm-dd"
                });
            });
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $("#pet_name").change(function() {
            pet_name_pass.innerText = "寵物名稱：" + pet_name.value;
        })

        $("input[type=radio]").click(function() {
            // console.log($("input[type=radio]:checked").val());
            let radio_value = $("input[type=radio]:checked").val();
            switch (radio_value) {
                case "住宿":
                    pet_service.innerText = "寶貝住宿";
                    pet_cost.innerText = 800;
                    pet_total.innerText = 800 * pet_num.innerText;
                    pet_total_down.innerText = "總金額：" + pet_num.innerText * pet_cost.innerText;
                    break;
                case "美容":
                    pet_service.innerText = "寶貝美容";
                    pet_cost.innerText = 600;
                    pet_total.innerText = 600 * pet_num.innerText;
                    pet_total_down.innerText = "總金額：" + pet_num.innerText * pet_cost.innerText;
                    break;
                case "攝影":
                    pet_service.innerText = "寶貝攝影";
                    pet_cost.innerText = 700;
                    pet_total.innerText = 700 * pet_num.innerText;
                    pet_total_down.innerText = "總金額：" + pet_num.innerText * pet_cost.innerText;
                    break;
                case "醫療":
                    pet_service.innerText = "寶貝醫療";
                    pet_cost.innerText = 900;
                    pet_total.innerText = 900 * pet_num.innerText;
                    pet_total_down.innerText = "總金額：" + pet_num.innerText * pet_cost.innerText;
                    break;
                default:
                    break;
            }
        });

        $("#children").change(function() {
            pet_num.innerText = children.value;
            let num = $("#children").val();
            if (num > 0) {
                pet_total.innerText = pet_num.innerText * pet_cost.innerText;
                pet_total_down.innerText = "總金額：" + pet_num.innerText * pet_cost.innerText;
            } else {
                alert("請輸入數值");
            }
        })


        $(".step").click(function() {
            $(this).addClass("active").prevAll().addClass("active");

            $(this).nextAll().removeClass("active");
        });

        $(".step01").click(function() {
            $("#petbook-line-progress").css("width", "3%");
            $(".discovery").addClass("active").siblings().removeClass("active");
        });

        $(".step02").click(function() {
            $("#petbook-line-progress").css("width", "25%");
            $(".strategy").addClass("active").siblings().removeClass("active");
            $("#petbook-bar-container .step02").addClass("active");
        });

        $(".step03").click(function() {
            $("#petbook-line-progress").css("width", "50%");
            $(".creative").addClass("active").siblings().removeClass("active");
            $("#petbook-bar-container .step03").addClass("active");

        });

        $(".step04").click(function() {
            $("#petbook-line-progress").css("width", "75%");
            $(".production").addClass("active").siblings().removeClass("active");
            $("#petbook-bar-container .step04").addClass("active");

        });

        $(".step05").click(function() {
            $("#petbook-line-progress").css("width", "100%");
            $(".analysis").addClass("active").siblings().removeClass("active");
            $("#petbook-bar-container .step05").addClass("active");

        });
    </script>




    <script>
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e => {
            textarea.style.height = "63px";
            let scHeight = e.target.scrollHeight;
            textarea.style.height = `${scHeight}px`;
        });
    </script>


    <script>
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
    </script>





</body>
<script src="./js/js.js"></script>

</html>