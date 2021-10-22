<?php
include("connMysqlObj.php");
include("./control/updateOrderC.php");
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
                                    <h2> <i class="fas fa-sticky-note" style="display: block; justify-content: left;">訂單明細</i></h2>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="product_table" class="table  table-striped table-bordered  data-table" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>訂單明細編號</th>
                                                <th>商品編號</th>
                                                <th>展示圖片</th>
                                                <th>商品名稱</th>
                                                <th>商品單價</th>
                                                <th>商品數量</th>
                                                <th>總價錢</th>
                                                <!-- <th data-sortable="false">操作功能</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($row_result = $result->fetch_assoc()) {
                                                echo "<tr>";

                                                echo "<td> " .$row_result["orderdetailID"] . "</td>";
                                                echo "<td> " . $row_result["productsID"] . "</td>";
                                                echo "<td scope='row' ><img src='../../img/product/200x200/" . $row_result["orderdetailimg"] . "'></td>";
                                                echo "<td>" . $row_result["productname"] . "</td>";
                                                echo "<td>" . $row_result["productprice"] . "</td>";
                                                echo "<td>" . $row_result["oqty"] . "</td>";
                                                echo "<td>" . $row_result["ototalprice"] . "</td>";

                                                echo "</tr>";
                                            }
                                            ?>

                                            <!-- <tr>
                                                <td>#0001</td>
                                                <td>S01</td>
                                                <td style="text-align: center;"><img src="./img/貓咪問號.png" style="width: 100px; height: 100px;" alt=""></td>
                                                <td>玩具</td>
                                                <td>450</td>
                                                <td>1</td>
                                                <td>500</td>
                                                <td><button class="btn btn-success">出貨</button></td>
                                            </tr> -->

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; padding: 0 0 10px 0;">

                                <a href="./noOrderV.php" class="btn btn-secondary mx-3">返回訂單查詢</a>
                                <!-- <a href="" class="btn btn-success">全部商品出貨</a> -->
                                <form action="" method="post">
                                    <input name="action" type="hidden" value="update">
                                    <?php
                                    if ($ostatus == 0) {
                                        echo ' <input class="btn btn-success" type="submit" name="button" id="button" value="全部商品出貨">';
                                    } else {
                                        echo ' <input class="btn btn-warning" type="submit" name="button" id="button" value="商品已出貨" disabled>';
                                    }
                                    ?>
                                </form>
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