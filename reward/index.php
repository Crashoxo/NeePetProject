<!DOCTYPE html>
<html lang="zh">

<head>
    <!-- ======================== link font or icon setting =============================  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet"> -->


    <!-- ======================== CSS setting =============================  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/sign.css">


    <!-- ======================== JS setting =============================  -->
    <!-- <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- ======================== title icon setting =============================  -->
    <link rel="icon" href="./img/logo2.jpg">

    <title>寵愛NEE</title>
    <style>
        /* 跳窗外框 */

        .swal-modal {
            width: 478px;
            opacity: 0;
            pointer-events: none;
            background-color: #eaf2dd;
            text-align: center;
            border-radius: 5px;
            border: 2px solid #f7b044;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s, -webkit-transform .3s;
            transition: transform .3s, opacity .2s;
            transition: transform .3s, opacity .2s, -webkit-transform .3s;
        }

        /* 背景圓 */

        .swal-icon--success:after,
        .swal-icon--success:before {
            content: "";
            border-radius: 50%;
            position: absolute;
            width: 60px;
            height: 120px;
            /* background: #eaf2dd80; */
            visibility: hidden;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .swal-icon--success__hide-corners {
            width: 5px;
            height: 90px;
            /* background-color: #eaf2dd; */
            visibility: hidden;
            padding: 1px;
            position: absolute;
            left: 28px;
            top: 8px;
            z-index: 1;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        /* 按鈕 */

        .swal-button {
            background-color: #004b4a;
            color: #fff;
            border: none;
            box-shadow: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 24px;
            margin: 0 auto;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <? include('./header.php'); 
    ?>

    <?php
    $memberID = $_SESSION['memberID'];
    include("connMysqlObj.php");

    // 查詢今日是否有簽到
    $sql_nowDay = "SELECT * FROM reward WHERE memberID = {$memberID} AND rewardDate = CURDATE()";
    $resultNowDay = $db_link->query($sql_nowDay);
    $isResultNowDay =  $resultNowDay->num_rows;

    // 查詢 該會員帳號，當月有簽到的日期
    $sql_query = "SELECT * FROM reward  WHERE memberID = {$memberID} AND rewardDate >= (select date_sub(date_sub(date_format(now(),'%y-%m-%d'),interval extract(
	day from now())-1 day),interval 0 month)) ORDER BY rewardID DESC";

    $result = $db_link->query($sql_query);

    ?>

    <div class="htmleaf-container">

        <div class="brand">
            <div class=" qiandao-tran qiandao-radius" id="js-qiandao-history1">玩法</div>
            <div class=" qiandao-tran qiandao-radius" id="js-qiandao-history2">獎品介紹</div>
            <div class=" qiandao-tran qiandao-radius" id="js-qiandao-history">簽到記錄</div>
            <div class=" qiandao-tran qiandao-radius" id="js-qiandao-history4">兌換說明</div>
        </div>



        <input type="hidden" id="memberID" value="<?= $memberID ?>">
        <input type="hidden" id="selectProduct" value="">
        <input type="hidden" id="rewardNum" value="">
        <input type="hidden" id="sqlData" value="<?php
                                                    while ($row_result = $result->fetch_assoc()) {
                                                        echo $row_result["rewardDate"] . ",";
                                                    } ?>">




        <div class="qiandao-warp">
            <div class="qiandap-box">
                <div class="qiandao-con clear">
                    <div class="qiandao-right">
                        <div class="qiandao-top">
                            <!-- #js-just-qiandao 簽到按鈕 -->
                            <?php
                            if ($isResultNowDay == 0) {
                                echo "<div class='just-qiandao qiandao-sprits' id='js-just-qiandao'></div>";
                                // echo" <p class='qiandao-notic'>今日尚未簽到</p> ";
                            } else {
                                echo "<div class='just-qiandao qiandao-sprits actived' id='js-just-qiandao'></div>";
                                // echo" <p class='qiandao-notic'>今日已簽到，請明日繼續</p> ";
                            }
                            ?>
                        </div>

                    </div>
                    <div class="qiandao-left">
                        <div class="qiandao-left-top clear">
                            <!-- .current-date 顯示今天日期處-->
                            <div class="current-date">2021年9月18日</div>
                            <!-- <div class="qiandao-history qiandao-tran qiandao-radius" id="js-qiandao-history">我的簽到</div> -->
                        </div>
                        <div class="qiandao-main" id="js-qiandao-main">
                            <!-- #js-qiandao-list ul 用js 跑li塞入 -->
                            <ul class="qiandao-list" id="js-qiandao-list">
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- 簽到記錄 -->
        <div class="qiandao-layer qiandao-history-layer ">
            <div class="qiandao-layer-con qiandao-radius">
                <a href="javascript:;" class="close-qiandao-layer close-qiandao-layer1 qiandao-sprits"></a>
                <p>簽到記錄</p>
                <div class="qiandao-history-table">
                    <table>
                        <thead>
                            <tr>
                                <th>商品名稱</th>
                                <th>條碼</th>
                                <th>兌換期限</th>
                                <th>兌換狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_queryProduct = "SELECT * FROM reward WHERE memberID = {$memberID} ";
                            $resultProduct = $db_link->query($sql_queryProduct);

                            while ($row_resultProduct = $resultProduct->fetch_assoc()) :
                            ?>

                                <tr>
                                    <td><?= $row_resultProduct['rewardProducts'] ?></td>
                                    <td><?= $row_resultProduct['rewardNum'] ?></td>
                                    <td><?= $row_resultProduct['endDate'] ?></td>
                                    <?php if ($row_resultProduct['isUsed'] == 0) { ?>
                                        <td><button id="<?= $row_resultProduct['rewardID'] ?>" class="qh_btn1 qh_btn">未兌換</button></td>
                                    <?php } else { ?>
                                        <td><button class="qh_btn2 qh_btn">已兌換</button></td>
                                    <?php } ?>
                                </tr>


                            <?php endwhile; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="qiandao-layer-bg"></div>
        </div>
        <!-- 我的簽到 layer end -->
        <!-- 簽到 layer start -->
        <div class="qiandao-layer qiandao-active">
            <div class="qiandao-layer-con qiandao-radius">
                <a href="javascript:;" class="close-qiandao-layer qiandao-sprits close-qiandao-layer1"></a>
                <div class="yiqiandao clear">
                    <div class="yiqiandao-icon qiandao-sprits"></div>
                </div>
                <div class="qiandao-jiangli qiandao-sprits">
                    <!-- <span class="qiandao-jiangli-num">10<em>元</em></span> -->
                </div>
                <a href="#" class=" qiandao-share qiandao-tran close-qiandao-layer">確定</a>
            </div>
            <div class="qiandao-layer-bg"></div>
        </div>
        <!-- 簽到 layer end -->
        <!-- 玩法說明區塊 -->
        <div class="qiandao-layer js-qiandao-history1">
            <div class="qiandao-layer-con qiandao-radius">
                <a href="javascript:;" class="close-qiandao-layer close-qiandao-layer1 qiandao-sprits"></a>

                <div class="HowToPlay">
                    <p>玩法說明</p>
                    <div>
                        <div><img src="./images/1.png" alt=""><span>每天上午<h1>10</h1>點到下午 <h1>6</h1>點開放簽到。</span></div>
                        <div class="step2">
                            <div><img src="./images/2.png" alt=""></div>
                            <p>在頁面點擊
                            <p class="qiandao-sprits"></p> 完成簽到。
                            </p>
                        </div>
                        <div class="step3"><img src="./images/3.png" alt=""><span>即可獲得獎品進行兌換!</span></div>
                        <div><img src="./images/4.png" alt=""><span>兌換詳細請看<h2>兌換說明</h2>。</span></div>
                    </div>
                </div>
            </div>
            <div class="qiandao-layer-bg"></div>
        </div>

        <!-- 獎品說明區塊 -->
        <div class="qiandao-layer js-qiandao-history2">
            <div class="qiandao-layer-con qiandao-radius">
                <a href="javascript:;" class="close-qiandao-layer close-qiandao-layer1 qiandao-sprits"></a>
                <div class="MyPrize">
                    <p>獎品介紹</p>
                    <p>每日簽到成功即贈送一樣商品，獎品採隨機贈送，<br> 內容有寵物用品、寵物食品等多樣好禮。<br>
                    </p>

                </div>
                <div class="qiandao-history-table">
                    <table>
                        <thead>
                            <tr>
                                <th>獎品一覽表</th>
                                <th>獎品價值</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KAKO寵物背帶</td>
                                <td>$150</td>
                            </tr>
                            <tr>
                                <td>KIKI潔牙骨</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>KAKO逗貓棒</td>
                                <td>$180</td>
                            </tr>
                            <tr>
                                <td>MISO肉泥</td>
                                <td>$150</td>
                            </tr>
                            <tr>
                                <td>MINI罐頭</td>
                                <td>$75</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="qiandao-layer-bg"></div>
        </div>

        <!-- 兌換說明區塊 -->
        <div class="qiandao-layer js-qiandao-history4">
            <div class="qiandao-layer-con qiandao-radius">
                <a href="javascript:;" class="close-qiandao-layer close-qiandao-layer1 qiandao-sprits"></a>
                <div class="MyExchange">
                    <p>兌換說明</p>
                    <div>
                        <span>1.完成每日簽到。</span> <img src="./images/立即簽到.png" alt="" width="150px"><br>
                        <span>2.點擊簽到記錄顯示自己可兌換的商品。</span><img src="./images/簽到記錄.png" alt="" height="50px"> <br>
                        <span>3.持畫面至連鎖店即可進行兌換。</span><br>
                    </div>
                    <p>注意事項</p>
                    <ul>
                        <li>每樣商品都有標註兌換期限。</li>
                        <li>請在有兌換期限到期前進行兌換。</li>
                        <li>商品一旦逾期便無法進行兌換。</li>
                        <li>每次簽到的商品只可兌換一次。</li>
                        <li>請勿自行兌換商品。</li>
                        <li>需操作實體畫面因此請勿使用截圖兌換。</li>
                    </ul>
                </div>
            </div>
            <div class="qiandao-layer-bg"></div>
        </div>

    </div>

    <?php include('./footer.php'); ?>
    <!-- <script src="./js/jquery-3.4.1.js" type="text/javascript"></script> -->
    <script>
        window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"><\/script>')
    </script>
    <script src="./js/main.js"></script>
    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
    <script type="text/javascript">
        $(function() {
            var date = new Date();
            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            $(".current-date").text(year + "年" + month + "月" + day + "日");
        })


        // 改變按鈕樣式

        var qh_btn = document.querySelectorAll('.qh_btn1');
        qh_btn.forEach(function(tab, tab_index) {
            tab.addEventListener('click', function() {
                swal("已兌換商品", "", "success");
                $('.swal-button').click(()=>{
                    let _thisId = this.id;
                    $.ajax({
                        url: `./control/updateRewardC.php?action=rewardEdit&rewardID=${_thisId}`,
                        method: 'get',
                        success: function(res) {
                            console.log("已兌換Ok");
                            location.reload();
                        }
                    })

                });

                // tab.classList.remove('qh_btn1');
                // tab.classList.add('qh_btn2');
                // $('.qh_btn2').text('已兌換');
            })
        })


        //打開玩法視窗

        $(document).on('click', '#js-qiandao-history1', function() {
            $('.js-qiandao-history1').fadeIn();
        });
        $(document).on('click', '#js-qiandao-history2', function() {
            $('.js-qiandao-history2').fadeIn();
        });
        $(document).on('click', '#js-qiandao-history4', function() {
            $('.js-qiandao-history4').fadeIn();
        });
    </script>
</body>

</html>