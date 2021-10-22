<?php
include("connMysqlObj.php");
include("./control/noOrderC.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> 寵愛NEE後台管理 </title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Boxicons CDN Link -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link rel="icon" href="./img/LOGO100x100.png">
    <style>
        .ok {
            color: green;
        }

        .no {
            color: red;
        }
    </style>
</head>

<body>
    <!-- <div class="sidebar">
        <div class="logo-details">
            <i class="fas fa-database"></i>
            <span class="logo_name">寵愛NEE後台</span>

        </div>
        <ul class="nav-links">
            <li>
                <a href="./商品管理.html">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="links_name">商品管理</span>
                </a>
            </li>
            <li>
                <a href="./訂單查詢.html">
                    <i class="fas fa-sticky-note"></i>
                    <span class="links_name">訂單查詢</span>
                </a>
            </li>

            <li>
                <a href="./預約查詢.html">
                    <i class="fas fa-clipboard"></i>
                    <span class="links_name">預約查詢</span>
                </a>
            </li>

            <li>
                <a href="./new.html">
                    <i class="fab fa-facebook-messenger"></i>
                    <span class="links_name">消息管理</span>
                </a>
            </li>

            <li>
                <a href="./更新密碼.html">
                    <i class="fas fa-cogs"></i>
                    <span class="links_name">更新密碼</span>
                </a>
            </li>
            <li class="log_out">
                <a href="./登入.html">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">登出</span>
                </a>
            </li>
        </ul>
    </div> -->
    <?php
    require '../navBar.php';
    ?>



    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="fas fa-align-justify sidebarBtn"></i>

            </div>
            <div class="profile-details">
                <!-- <img src="./img/profile.jpg" alt=""> -->
                <span class="admin_name">管理者:root</span>
            </div>
        </nav>
        <div style="height: 50px;">
        </div>
        <main class="mt-5 pt-3">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header" style="background-color:white;">
                                <div style="display: flex;">
                                    <h2> <i class="fas fa-sticky-note" style="display: block; justify-content: left;">訂單查詢-尚未出貨</i></h2>
                                    <a href="./orderV.php" class="btn btn-secondary mx-3">歷史出貨單查詢</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="product_table" class="table data-table table-striped table-bordered " style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>訂單編號</th>
                                                <th>訂單日期</th>
                                                <th>購買人</th>
                                                <th>電子郵件</th>
                                                <th>地址</th>
                                                <th>付款方式</th>
                                                <th>含運總計</th>
                                                <th>備註</th>
                                                <th>訂單狀態</th>
                                                <th data-sortable="false">操作功能</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($row_result = $result->fetch_assoc()) :
                                            ?>
                                                <tr>
                                                <td> <?=$row_result["orderID"] ?></td>
                                                <td> <?=$row_result["orderDate"]?></td>
                                                <td> <?=$row_result["customername"]?></td>
                                                <td> <?=$row_result["customeremail"]?></td>
                                                <td> <?=$row_result["customeraddress"]?></td> 
                                                <td> <?=$row_result["paytype"]?></td>
                                                <td> <?=$row_result["grandtotal"] ?></td>
                                                <td> <?=$row_result["remark"] ?></td>
                                                <td><?= (($row_result["ostatus"]) ? "<span class='ok'>已完成</span>" : "<span class='no'>未出貨</span>") ?></td>

                                                <td><a class="btn btn-info" href='updateOrderV.php?orderID=<?= $row_result["orderID"]?>'>訂單明細</a>
                                                </tr>
                                            <?php  endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>



    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>