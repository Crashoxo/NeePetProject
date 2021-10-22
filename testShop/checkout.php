<?php
require 'config.php';
session_start();
$randNUM = $_SESSION['randNUM'];  //瀏覽器編號取得

$order_total = 0; //未含運倉庫
$grand_total = 0; //含運倉庫
$allItem = '';
$items = array();

$sql = "SELECT CONCAT(productname,'(',cqty,')') AS ItemQty, ctotalprice FROM cart";
$stmt = $conn->prepare($sql); // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
$stmt->execute(); // 執行SQL
$result = $stmt->get_result(); //使用取得結過的方法
// echo "<hr>";
// var_dump($result);
while ($row = $result->fetch_assoc()) { //fetch_assoc()顯示陣列
    // echo "<hr>";
    // var_dump($row);
    $order_total += $row['ctotalprice'];
    $items[] = $row['ItemQty'];
    $grand_total = $order_total + 100; //運費100
};
// echo "<hr>";
// echo $order_total; //看單一變數
// echo "<hr> 1.";
// print_r($items); //看陣列的方法1(較簡潔)
// echo "<hr> 2.";
// var_dump($items); //看陣列的方法2

//implode元素組合為一個字符串
$allItem = implode(", ", $items);
// echo "<hr>";
// echo "3." . $allItem;
?>

<?php
// $_SESSION['memberID'] = 2;
$memberID = $_SESSION['memberID'];
if ($memberID == null) {
    $memberID = $_SESSION['randNUM'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_bs/bootstrap.min.css" />
    <script src="./js_bs/jquery.min.js"></script>
    <script src="./js_bs/popper.min.js"></script>
    <script src="./js_bs/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Checkout</title>
    <style>
        .bg {
            background-color: red;
        }

        /* body {
            background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        } */
    </style>
</head>

<body>

    <!-- header section starts  -->

    <?php require 'header.php' ?>

    <!-- header section ends -->

    <section id="Detail_Section" class="col-6">
        <div id="order">
            <!-- 1.會員專區 -->
            <div id="Member_Detail">
                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                <span>會員專區</span>
                <div>
                    <p>
                        優惠券代碼：
                    </p>
                    <div class="Member_Detail_block">
                        <input type="text" name="" id="Shop666" placeholder="請輸入優惠券代碼">
                        <button id="Shop666_Btn">確認</button>
                    </div>
                </div>
            </div>
            <!--2. 購物車內容 -->
            <div id="ShoppingCart_Detail">
                <div id="order">
                    <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                    <span>購物車內容</span>
                    <h6 class="lead"><b>商品：<?= $allItem; ?></b></h6>
                    <form action="" method="post" id="placeOrder">
                        <table>
                            <thead>
                                <th>商品名稱</th>
                                <th>單價</th>
                                <th>數量</th>
                                <th>小計</th>
                            </thead>
                            <tbody>
                                <?php
                                require 'config.php'; //引入
                                // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
                                $stmt = $conn->prepare("SELECT * FROM cart");
                                // 執行SQL
                                $stmt->execute();
                                //1. get_result()使用方法
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) : //fetch_assoc()顯示陣列
                                ?>
                                    <tr>
                                        <td><?= $row['productname'] ?></td>
                                        <td id="price">$<?= number_format($row['productprice'], 0) ?></td>
                                        <td id="amount"><?= $row['cqty'] ?></td>
                                        <td id="total">$<?= number_format($row['productprice'], 0) ?></td>
                                    </tr>
                            </tbody>
                        <?php endwhile; ?>
                        </table>

                        <div class="ShoppingCart_Detail_Block">
                            <div class="ShoppingCart_Detail_block">
                                <p>商品總金額：$ </p>
                                <p>優惠券折扣：$ </p>
                                <p>運費：$ </p>
                                <p>含運總計：$ </p>
                            </div>
                            <div class="ShoppingCart_Detail_block">
                                <!-- number_format 針對數字的格式 -->
                                <p id="Commodity_Totle"><?= number_format($order_total, 0) ?></p>
                                <p id="Coupon">0</p>
                                <p id="Freight">100</p>
                                <p id="Totle"><?= number_format($grand_total + 100, 0) ?></p>
                            </div>
                        </div>

                </div>
            </div>
            <!-- 3.付款運送方式 -->
            <div id="Transpor_Detail">
                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                <span>付款運送方式</span>
                <div class="Transpor_Detail_Block">
                    <div class="Transpor_Detail_block">
                        <span>配送方式</span>
                        <ul>
                            <li class="active">
                                <a>
                                    <div class="active" id="C_S">
                                        <span>宅配</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <div id="H_D">
                                        <span>超商取貨</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <!-- 宅配區塊 -->
                    <div style="display: block;" class="aaa">
                        <div>請選擇配送地區</div>
                        <div class="checkable-radio active checkable-radio1">
                            <span class="checkable-radio-label">台灣本島</span>
                        </div>
                        <div class="checkable-radio checkable-radio1">
                            <span class="checkable-radio-label">台灣離島</span>
                        </div>

                        <div class="active">
                            <div>請選擇物流</div>
                            <a>
                                <div class="active">
                                    <span>宅配通(常溫)</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- 超商取貨區塊 -->
                    <div style="display: none;" class="aaa">
                        <div class="">
                            <div>請選擇超商</div>
                            <a>
                                <div class="active">
                                    <span>全家取貨</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <input type="button" class="Pick_Button " value="請選擇取貨門市">
                        </div>
                    </div>
                    <hr>
                    <div class="howToPay">
                        <div>付款方式</div>
                        <div class="howToPay_inputGroup">
                            <input id="radio1" name="pmode" type="radio" value="atm" checked />
                            <label for="radio1"><span>ATM轉帳</span></label>
                        </div>
                        <div class="howToPay_inputGroup">
                            <input id="radio2" name="pmode" type="radio" value="cash" />
                            <label for="radio2"><span>超商代碼</span></label>
                        </div>
                        <div class="howToPay_inputGroup">
                            <input id="radio3" name="pmode" type="radio" value="cards" />
                            <label for="radio3"><span>信用卡</span></label>
                        </div>
                    </div>
                    <div>
                        <div>結帳須知</div>
                        <pre>
謝謝您的購買，提醒您，
※若使用超商取貨不付款，『取貨人務必填寫與身份證件相符之真實姓名』，若與證件不符將無法完成取貨。
※下單並不代表訂單已成立。
請您務必於下一個頁面操作時，立即點選畫面右上方"付款按鈕"進行繳款程序；
信用卡訂單無法事後付款，
非信用卡無法事後取得繳款編號。
並請務必自行記下繳款編號，並於三日內一次付清訂單金額，
逾期則訂單失效，請您重新下單選購，謝謝！
                    </pre>
                    </div>
                </div>
            </div>

            <!-- 購買人資訊 -->
            <div class="Purchaser_Detail">
                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                <span>購買人資訊</span>
                <!-- 超商取貨區塊 -->
                <div class="Purchaser_Detail_Block bbb" style="display:block;">

                    <div class="Purchaser_Detail_block">
                        <p>姓名</p>
                        <input type="text" name="name" id="Input_Name2" placeholder="請輸入姓名" required>
                        <span></span>
                    </div>
                    <br>
                    <div class="Purchaser_Detail_block ">
                        <p>連絡電話</p>
                        <input type="tel" name="phone" id="Input_Namber" placeholder="請輸入電話" required>
                        <span>*宅配人員將以此電話聯繫，海外電話請在最前面加上 "+國碼"， 如：+886987654321</span>
                    </div>
                    <br>
                    <div class="Purchaser_Detail_block ">
                        <p>Email</p>
                        <input type="email" name="email" placeholder="請輸入Email" required>
                        <span>*請輸入Email</span>
                    </div>
                    <br>
                    <div class="Purchaser_Detail_block ">
                        <p>地址：</p>
                        <input type="text" name="address" cols="10" rows="3" placeholder="請輸入地址" required></ｉ>
                        <span>*請輸入詳細地址</span>
                    </div>
                    <br>
                    <div>
                        <textarea name="remark" class="form-control" cols="10" rows="3" placeholder="備註"></textarea>
                    </div>
                    <br>



                    <div class="Purchaser_Detail_block2">
                        <p>電子發票</p>
                        <div>
                            <div class="checkable-radio checkable-radio2 active ">
                                <span class="checkable-radio-label">會員載具(個人)</span>
                            </div>
                            <div class="checkable-radio checkable-radio2">
                                <span class="checkable-radio-label">手機載具</span>
                            </div>
                            <div class="checkable-radio checkable-radio2">
                                <span class="checkable-radio-label">自然人憑證</span>
                            </div>
                        </div>
                        <div class="pre">
                            依統一發票使用辦法規定 <br> 個人發票一經開立，無法更改或改開公司戶發票，需開立統編請選擇『公司用(統編) 』，<br> 請務必確認選用之電子發票載具類型是否正確，一經開立不得要求更改。
                        </div>
                    </div>
                    <hr>


                    <!-- <div class="Purchaser_Detail_block2">
                        <div>
                            <div class="checkable-radio checkable-radio3 " onclick="Chang_InnerText()">
                                <span class="checkable-radio-label">同購買人</span>
                            </div>
                            <div class="checkable-radio checkable-radio3">
                                <span class="checkable-radio-label">新增收件人</span>
                            </div>

                        </div>
                    </div>
                    <div class="Recipient_Detail">
                        <div class="Recipient_Detail_block Recipient_Detail_block1" style="display: block;">
                            <p>收件人資訊</p>
                            <div>
                                <p>姓名：<span id="Show_Name"></span></p>
                                <p>連絡電話：<span id="Show_Namber"></span></p>
                            </div>
                        </div>
                        <div class="Recipient_Detail_block Recipient_Detail_block2" style="display: none;">
                            <p>收件人資訊</p>
                            <div>
                                <p>姓名</p>
                                <input type="text" id="" placeholder="取件人姓名">
                                <p>連絡電話</p>
                                <input type="text" id="" placeholder="取件人電話">
                            </div>
                        </div>
                    </div> -->


                    <hr>
                    <div class=".Agree_Checkbox">
                        <input type="checkbox" id="agree" required>
                        <label for="agree">同意會員責任規範及個資聲明與商家會員條款</label> <br>
                        <input type="checkbox" id="agree2" required>
                        <label for="agree2">為保障彼此之權益，賣家在收到您的訂單後仍保有決定是否接受訂單及出貨與否之權利</label>
                    </div>
                </div>


                <!-- 宅配取貨區塊 未吃值 -->
                <div class="Purchaser_Detail_Block bbb" style="display:none;">

                    <div class="Purchaser_Detail_block">
                        <p>姓名</p>
                        <input type="text" name="" id="Input_Name2" placeholder="購買人姓名">
                    </div>
                    <div class="Purchaser_Detail_block">
                        <p>連絡電話</p>
                        <input type="text" name="" id="Input_Namber2" placeholder="購買人聯絡電話，例：0987654321">
                        <span>*宅配人員將以此電話聯繫，海外電話請在最前面加上 "+國碼"， 如：+886987654321</span>
                    </div>
                    <div class="Purchaser_Detail_block">
                        <p>購買人地址</p>
                        <input type="text" name="" id="Input_Address" placeholder="詳細地址">
                    </div>
                    <div class="Purchaser_Detail_block2">
                        <p>電子發票</p>
                        <div>
                            <div class="checkable-radio checkable-radio2 active">
                                <span class="checkable-radio-label">會員載具(個人)</span>
                            </div>
                            <div class="checkable-radio checkable-radio2">
                                <span class="checkable-radio-label">手機載具</span>
                            </div>
                            <div class="checkable-radio checkable-radio2">
                                <span class="checkable-radio-label">自然人憑證</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="Purchaser_Detail_block2">
                        <div>
                            <div>
                                <div class="checkable-radio checkable-radio3 " onclick="Chang_InnerText()">
                                    <span class="checkable-radio-label">同購買人</span>
                                </div>
                                <div class="checkable-radio checkable-radio3">
                                    <span class="checkable-radio-label">新增收件人</span>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="Recipient_Detail">
                        <div class="Recipient_Detail_block Recipient_Detail_block1" style="display: block;">
                            <p>收件人資訊</p>
                            <div>
                                <p>姓名：<span id="Show_Name"></span></p>
                                <p>連絡電話：<span id="Show_Namber"></span></p>
                                <p>寄送地址：<span id="Show_Address"></span></p>
                            </div>
                        </div>
                        <div class="Recipient_Detail_block Recipient_Detail_block2" style="display: none;">
                            <p>收件人資訊</p>
                            <div>
                                <p>姓名</p>
                                <input type="text" name="" id="" placeholder="取件人姓名">
                                <p>連絡電話</p>
                                <input type="text" name="" id="" placeholder="取件人電話">
                                <p>寄送地址</p>
                                <input type="text" name="" id="" placeholder="配送詳細地址">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="Agree_Checkbox">
                        <input type="checkbox" name="" id="agree">
                        <label for="agree">同意會員責任規範及個資聲明與商家會員條款</label> <br>
                        <input type="checkbox" name="" id="agree2">
                        <label for="agree2">為保障彼此之權益，賣家在收到您的訂單後仍保有決定是否接受訂單及出貨與否之權利</label>
                    </div>
                </div>







                <!-- hidden才抓的到值 -->
                <input type="hidden" name="products" value="<?= $allItem; ?>">
                <input type="hidden" name="order_total" value="<?= $order_total; ?>">
                <input type="hidden" id="orderTotalID" name="grand_total" value="<?= $grand_total + 100; ?>">

                <div class="form-group">
                    <input type="submit" name="submit" value="立即結帳" class="btn btn-danger btn-block">
                </div>

                <!-- 以下新增 -->
                <div class="form-group">
                    <input type="hidden" name="memberID" class="form-control memberID" placeholder="memberID之後須從外匯入" value="<? echo $memberID ?>" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="deliverfee" class="form-control" placeholder="運費" value="100" required>
                </div>


                <!---- 額外引入cart 及 orders 表單 讓AJAX抓值，送action.php---->
                <!-- 此處引用cart後輸出orderdetails action.php接收-->
                <?php
                // 抓好$conn(1.mySQL物件及2.語法) 準備執行 
                $stmt = $conn->prepare("SELECT * FROM cart");
                // 執行SQL
                $stmt->execute();
                //1. get_result()使用方法
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) : //fetch_assoc()顯示陣列
                ?>
                    <!-- []會送陣列的檔案，不只命名用，購物車結帳後出訂單明細action接收 (action接收不用[])-->
                    <input type="hidden" name="localsrotageID[]" value="<?= $row['localsrotageID']; ?>">
                    <input type="hidden" name="productsID[]" value="<?= $row['productsID']; ?>">
                    <input type="hidden" name="productname[]" value="<?= $row['productname']; ?>">
                    <input type="hidden" name="productprice[]" value="<?= $row['productprice']; ?>">
                    <input type="hidden" name="cartimg[]" value="<?= $row['cartimg']; ?>">
                    <input type="hidden" name="cqty[]" value="<?= $row['cqty']; ?>">
                    <input type="hidden" name="ctotalprice[]" value="<?= $row['ctotalprice']; ?>">
                <?php endwhile; ?>


                <!-- 此處引用orders orderID 後輸出 orderdetails orderID action.php接收-->
                <?php
                $stmt = $conn->prepare("SELECT * FROM orders");
                $stmt->execute();
                $autoID = mysqli_insert_id($conn); //取得 自動遞增productsID
                $result = $stmt->get_result();
                $allorderID = '';


                while ($row = $result->fetch_assoc()) : //fetch_assoc()顯示陣列
                ?>
                    <!-- []會送陣列的檔案，不只命名用，購物車結帳後出訂單明細action接收 (action接收不用[])-->
                    <input type="hidden" name="orderID_order[]" value="<?= $row['orderID']; ?>">


                <?php endwhile; ?>
                <!---- ------------------------------------------------------------------ ---->
                </form>

            </div>
        </div>
        </div>
        </div>
    </section>

    <?php require 'footer.php'; ?>




    <script type="text/javascript">
        // 文件準備好才使用
        $(document).ready(function() {

            $("#placeOrder").submit(function(e) {
                console.log(e); //event
                e.preventDefault(); //preventDefault 終止「預設」行為
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    // serializes the form's elements.
                    // https://www.ucamc.com/articles/332-%E5%A6%82%E4%BD%95%E4%BD%BF%E7%94%A8jquery-ajax-submit-%E5%82%B3%E9%80%81form%E8%A1%A8%E5%96%AEserialize-%E6%96%B9%E6%B3%95
                    data: $('form').serialize() + "&action=order",
                    success: function(response) {
                        $("#order").html(response);
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
        });
    </script>

</body>

<script>
    document.getElementById("Shop666_Btn").addEventListener("click", function() {
        var Shop666 = document.getElementById('Shop666').value;
        var myrepalce = $("#Totle").text().replace(",", "");

        var Totle = parseInt(myrepalce);
        // var Totle = parseInt(document.getElementById('Totle').textContent);


        //折扣碼
        if (Shop666 == "shop666") {
            swal("輸入成功!", "", "success");
            Coupon.innerText = 120;
            var discount = Coupon.innerText;
            // console.log(discount);
            // 顯示前端
            $("#Totle").text((Totle - discount).toLocaleString());

            // 送後端
            let discount_back = $("#Totle").text().replace(",", "");
            $("#orderTotalID").val(discount_back);
            console.log(discount_back);

        } else {
            swal("無此優惠券!", "", "error");
            Coupon.innerText = 0;
        }
    });

    //小計計算
    // function HaveTotal() {
    //     var x = document.getElementById("price").innerText;
    //     var y = document.getElementById("amount").innerText;
    //     document.getElementById("total").innerText = '$' + parseInt(x) * parseInt(y);
    // }
    // HaveTotal();


    //總金額計算
    function Totle() {
        var C_Sx = document.getElementById("C_S");
        var Freight = document.getElementById("Freight");
        if (C_S.classList.contains("active")) {
            Freight.innerText = 100;
        } else {
            Freight.innerText = 80;
        }
    }
    Totle();


    //配送方式選擇
    var tabA = document.querySelectorAll(".Transpor_Detail_block ul li ");
    var tabA_wraps = document.querySelectorAll(".aaa");
    var tabB_wraps = document.querySelectorAll(".bbb");
    tabA.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabA.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");

            tabA_wraps.forEach(function(content, content_index) {
                if (content_index == tab_index) {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            })
            tabB_wraps.forEach(function(content, content_index) {
                if (content_index == tab_index) {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            })
            Totle();
        })
    })
    var tabB = document.querySelectorAll(".Transpor_Detail_block ul li a div");
    tabB.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabB.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");
        })
    })

    //付款方式
    var tabC = document.querySelectorAll(".howToPay ul li ");
    tabC.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabC.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");
        })
    })
    var tabD = document.querySelectorAll(".howToPay ul li a div");
    tabD.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabD.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");
        })
    })

    //配送地區
    var tabE = document.querySelectorAll(".checkable-radio1");
    tabE.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabE.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");
        })
    })

    //電子發票
    var tabF = document.querySelectorAll(".checkable-radio2");
    tabF.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabF.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");
        })
    })

    // 收件人
    var tabG = document.querySelectorAll(".checkable-radio3");
    tabG.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {
            tabG.forEach(function(tab) {
                tab.classList.remove("active");
            })
            tab.classList.add("active");
        })
    })


    //購買人/新增收件人切換
    var tab = document.querySelectorAll(".checkable-radio3");
    var tab_wraps = document.querySelectorAll(".Recipient_Detail_block");
    tab.forEach(function(tab, tab_index) {
        tab.addEventListener("click", function() {

            tab_wraps.forEach(function(content, content_index) {
                if (content_index == tab_index) {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            })
        })
    })


    // 購買人資訊代入
    function Chang_InnerText() {

        //超商
        var Name = document.getElementById('Input_Name').value;
        document.getElementById('Show_Name').innerHTML = Name;
        var Namber = document.getElementById('Input_Namber').value;
        document.getElementById('Show_Namber').innerHTML = Namber;

        //宅配
        var Name = document.getElementById('Input_Name2').value;
        document.getElementById('Show_Name2').innerHTML = Name;
        var Namber = document.getElementById('Input_Namber2').value;
        document.getElementById('Show_Namber2').innerHTML = Namber;
        var Namber = document.getElementById('Input_Address').value;
        document.getElementById('Show_Address').innerHTML = Namber;
    }
</script>

<script src="./js/js.js"></script>

</html>