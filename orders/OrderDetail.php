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

    <link rel="stylesheet" href="../css/style.css">


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
    <title>寵愛NEE</title>
</head>

<body>






    <!-- ======================== navbar setting =============================  -->

    <?php include("./header.php"); ?>
    <?php


    $memberID = $_SESSION['memberID'];


    include("connMysqlObj.php");


    $sql_query = "SELECT * FROM orders  WHERE memberID = {$memberID} ORDER BY orderID DESC";

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
                        <h3>訂單明細</h3>
                        <table class="Order_Detail_Header">
                            <tr>
                                <td>訂單編號</td>
                                <td>訂購日期</td>
                                <td>收件人名稱</td>
                                <td>地址</td>
                                <td>付款方式</td>

                                <td>備註</td>
                                <td>訂單狀態</td>
                            </tr>
                        </table>

                        <?php
                        while ($row_result = $result->fetch_assoc()) :
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <!-- <a class="Order_Detail_a showODItem" id='order-<?= $row_result["orderID"] ?>' role="button" data-toggle="collapse" data-parent="#accordion" href="#od<?= $row_result['orderID'] ?>" aria-expanded="true" aria-controls="od<?= $row_result['orderID'] ?>"> -->
                                        <a class="Order_Detail_a showODItem" id='order-<?= $row_result["orderID"] ?>' role="button" data-toggle="collapse" data-parent="#accordion" href="#od<?= $row_result['orderID'] ?>" aria-expanded="true" aria-controls="od<?= $row_result['orderID'] ?>">
                                            <table>
                                                <tr>
                                                    <td><?= $row_result["orderID"] ?></td>
                                                    <td><?= $row_result["orderDate"] ?></td>
                                                    <td><?= $row_result["customername"] ?></td>
                                                    <td><?= $row_result["customeraddress"] ?></td>
                                                    <td><?= $row_result["paytype"] ?></td>
                                                    <td><?= $row_result["remark"] ?></td>
                                                    <td><?php echo (($row_result["ostatus"]) ? "<span class='ok'>已完成</span>" : "<span class='no'>未出貨</span>") ?> </td>

                                                </tr>
                                            </table>
                                        </a>
                                    </h4>
                                </div>
                                <div id="od<?= $row_result['orderID'] ?>" class=" od<?= $row_result['orderID'] ?> collapseOne panel-collapse collapse " role="tabpanel" aria-labelledby="od<?= $row_result['orderID'] ?>">
                                    <div class='panel-body'></div>

                                    <div class="Order_Detail_text">
                                        <p>總金額(含運費及折扣)：<?= number_format($row_result["grandtotal"], 0) ?></p>

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

    <?php include('./footer.php') ?>



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

    <script>
        // 當點擊class有showODItem標籤時，透過ajax向php送資料
        $('.showODItem').click(function() {
            let orderID = '';
            // console.log(this.id); //顯示id = order-xx 值
            let getOrderIDArray = this.id.split("-");
            let getOrderID = getOrderIDArray[1];
            // console.log(getID); //切order濾掉 剩下 xx值

            $.ajax({
                url: 'orderControl.php',
                method: 'get',
                data: {
                    orderID: getOrderID
                },
                success: function(res) {
                    $(`#od${getOrderID} .panel-body`).html(res);
                }
            })


        });
    </script>
    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>