<?php
include("connMysqlObj.php");
$sql_query = "SELECT * FROM booking  LEFT JOIN member ON booking.memberID = member.memberID WHERE bstatus='服務完成'  ORDER BY bookingID ASC";
$result = $db_link->query($sql_query);
$total_records = $result->num_rows;
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
    <!-- <link rel="icon" href="./img/LOGO100x100.png"> -->
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
                                    <h2> <i class="fas fa-sticky-note" style="display: block; justify-content: left;">歷史預約紀錄</i></h2>
                                    <a href="./bookingV.php" class="btn btn-info mx-3">尚未服務</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="product_table" class="table  table-striped table-bordered data-table" style="width:100%">


                                        <thead>
                                            <tr>
                                                <th>預約編號</th>
                                                <th>會員名稱</th>
                                                <th>連絡電話</th>
                                                <th>預約項目</th>
                                                <th>預約寵物</th>
                                                <th>預約數量</th>
                                                <th>預約日期</th>
                                                <th>預約時段</th>
                                                <th>付款方式</th>
                                                <th>預約價格</th>
                                                <th>預約備註</th>
                                                <th>付款狀態</th>
                                                <th>預約狀態</th>
                                                <th data-sortable="false">操作功能</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($row_result = $result->fetch_assoc()) :
                                            ?>
                                                <tr>
                                                    <td><?= $row_result["bookingID"] ?></td>
                                                    <td><?= $row_result["name"] ?></td>
                                                    <td><?= $row_result["phone"] ?></td>
                                                    <td><?= $row_result["bitem"] ?></td>
                                                    <td><?= ($row_result["banimal"] === 'cat' ? '貓' : '狗') ?></td>
                                                    <td><?= $row_result["bcount"] ?></td>
                                                    <td><?= $row_result["bdate"] ?></td>
                                                    <td><?= $row_result["bHour"] ?></td>
                                                    <td><?= $row_result["bpaytype"] ?></td>
                                                    <td><?= $row_result["btotalprice"] ?></td>
                                                    <td><?= $row_result["bvote"] ?></td>
                                                    <td><?= $row_result["bpaystatus"] ?></td>
                                                    <td><?= $row_result["bstatus"] ?></td>

                                                    <td>
                                                        <a class="btn btn-info" href='updateBookingV.php?bookingID=<?= $row_result["bookingID"] ?>'>預約明細</a>
                                                    </td>
                                                </tr>

                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; padding: 0 0 10px 0;">
                                <a href="./預約查詢.html" class="btn btn-secondary mx-3">返回預約查詢</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>



    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>