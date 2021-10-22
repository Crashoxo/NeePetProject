<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .ok {
            color: green;
        }

        .no {
            color: yellow;
        }
    </style>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">


    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body>
    <!-- ======================== navbar setting =============================  -->


    <?php include("./header.php"); ?>
    <?php


    if (!$_SESSION['memberID'])
        header("Location: login.php");
    $memberID = $_SESSION['memberID'];

    include("./booking/connMysqlObj.php");


    $sql_query = "SELECT * FROM booking left join member on booking.memberID = member.memberID WHERE booking.memberID = {$memberID} ORDER BY bookingID DESC";
    $result = $db_link->query($sql_query);
    $total_records = $result->num_rows;

    ?>




    <div class="htmleaf-container">

        <div class="container ">
            <div class="row">
                <div class=" Order_Detail">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- <div class="Order_Detail_Date">
                            <h4>日期查詢</h4>
                            <div>
                                <p>日期：</p>
                                <input type="text" name="datetimes" />
                                <p>到</p>
                                <input type="text" name="datetimes" />
                                <button>查詢</button>
                            </div>
                        </div> -->
                        <h3>預約明細</h3>
                        <table class="Order_Detail_Header">
                            <tr>
                                <td>預約編號</td>
                                <td>預約日期</td>
                                <td>預約時段</td>
                                <td>會員名稱</td>
                                <td>付款方式</td>
                                <td>訂單狀態</td>
                            </tr>
                        </table>

                        <?php
                        while ($row_result = $result->fetch_assoc()) :
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="Order_Detail_a" role="button" data-toggle="collapse" data-parent="#accordion" href="#booking<?= $row_result["bookingID"] ?>" aria-expanded="true" aria-controls="booking<?= $row_result["bookingID"] ?>">
                                            <table>
                                                <tr>
                                                    <td><?= $row_result["bookingID"] ?></td>
                                                    <td><?= $row_result["bdate"] ?></td>
                                                    <td><?= $row_result["bHour"] ?></td>
                                                    <td><?= $row_result["name"] ?></td>
                                                    <td><?= $row_result["bpaytype"] ?></td>
                                                    <td><?php echo (($row_result["bpaystatus"] == "已付款") ? "<span class='ok'>已付款</span>" : "<span class='no'>未付款</span>") ?> </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </h4>
                                </div>
                                <div id="booking<?= $row_result["bookingID"] ?>" class=" booking<?= $row_result["bookingID"] ?> collapseOne panel-collapse collapse " role="tabpanel" aria-labelledby="booking<?= $row_result["bookingID"] ?>">
                                    <div class="panel-body">
                                        <div class="Order_Detail_text">
                                            <p>連絡電話：<?= $row_result["phone"] ?></p>

                                        </div>
                                        <div class="Order_Detail_text">
                                            <p>E-mail：<?= $row_result["email"] ?></p>

                                        </div>
                                        <div class="Order_Detail_text">
                                            <p>備註：<?= $row_result["bvote"] ?></p>

                                        </div>
                                        <table>
                                            <tr>
                                                <th>服務名稱</th>
                                                <th>單價</th>
                                                <th>數量</th>
                                                <th>小計</th>
                                            </tr>

                                            <tr>
                                                <td><?= $row_result["bitem"] ?></td>
                                                <td><?= $row_result["btotalprice"] / $row_result["bcount"]  ?></td>
                                                <td><?= $row_result["bcount"] ?></td>
                                                <td><?= $row_result["btotalprice"] ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>


                    </div>
                </div>

                <!-- 分頁 -->
                <div class="Change_Page">
                    <div class="Change_Page_block">
                        <div class="universal-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                        <div class="universal-page"> <span class="page-num">1</span></div>
                        <div class="universal-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="footer-menus">
            <div class="footer-menu__item">
                <div>
                    <img src="./img/logo2.jpg" alt="" width='190px' height='70px'>
                    <h3 class="word">輕鬆買對毛好物</h3>
                </div>
                <div>
                    <h6 class="word"><i class="fas fa-map-marker-alt mr-1"></i>
                        台中市南屯區公益路二段51號18樓
                    </h6>


                    <h6 class="word"><i class="fas fa-phone mr-1"></i>
                        02-8888-8888
                    </h6>
                    <h6 class="word">
                        平日：9:30-12:00 / 13:30-17:30
                    </h6>
                    <a href=""><i class="fab fa-instagram IG"></i></a>
                    <a href=""><i class="fab fa-facebook-square FB"></i></i></a>
                </div>
            </div>

            <div class="footer-menu__item divNone">
                <div class="footer-menu__items">
                    <div class="footer-new">
                        <a href="">最新消息</a>
                        <a href="">關於我們</a>
                        <a href="">銷售據點</a>
                        <a href="">聯絡我們</a>
                    </div>
                    <div class="footer-new">
                        <a href="">會員權益</a>
                        <a href="">購物須知</a>
                        <a href="">配送服務</a>
                        <a href="">常見問題</a>
                    </div>
                    <div class="footer-new">
                        <a href="">會員專區</a>
                        <a href="">購物條款</a>
                        <a href="">隱私權條款</a>
                        <a href="">免責聲明</a>
                    </div>
                </div>
            </div>

            <div class="footer-menu__item divNone">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.6044320422593!2d120.64881961482347!3d24.15052618439368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d9650422ae1%3A0x334dfd5796c49ff6!2z6LOH562W5pyDLeaVuOS9jeaVmeiCsueglOeptuaJgC3kuK3ljYDoqJPnt7TkuK3lv4M!5e0!3m2!1szh-TW!2stw!4v1629882259019!5m2!1szh-TW!2stw" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <div class="copyright">
            <h6>
                COPYRIGHT@2021 寵愛NEE 版權所有 All RIGHTS RESERVED
            </h6>
        </div>
    </footer>


    <script>
        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'YYYY - MM - DD',
                    "daysOfWeek": [
                        "日",
                        "一",
                        "二",
                        "三",
                        "四",
                        "五",
                        "六"
                    ],
                    "monthNames": [
                        "一月",
                        "二月",
                        "三月",
                        "四月",
                        "五月",
                        "六月",
                        "七月",
                        "八月",
                        "九月",
                        "十月",
                        "十一月",
                        "十二月"
                    ],

                }
            });
        });
    </script>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>