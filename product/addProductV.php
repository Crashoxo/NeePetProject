<?php
include("connMysqlObj2.php");
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
        <div style="height: 150px;">
        </div>



        <div class="container">

            <h2 class="text-center">
                商城系統-新增商品
            </h2>

            <form action="./control/addProductC.php" method="POST" name="productFormAdd" id="productFormAdd" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                <h5 for="">寵物項目</h5>
                                <select class="form-control" name="categoryanimal" id="categoryanimal">
                                    <?php
                                    $sql_query = "SELECT categoryanimal FROM category GROUP BY categoryanimal";
                                    $result = $db_link->query($sql_query);
                                    while ($row_result = $result->fetch_assoc()) {
                                        echo "<option value='" . $row_result["categoryanimal"] . "'>" . $row_result["categoryanimal"] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">

                                <label for="">商品分類名稱</label>
                                <select class="form-control" name="categoryname" id="categoryname">
                                    <?php
                                    $sql_query2 = "SELECT categoryname FROM category GROUP BY categoryname";
                                    $result2 = $db_link->query($sql_query2);
                                    while ($row_result2 = $result2->fetch_assoc()) {
                                        echo "<option value='" . $row_result2["categoryname"] . "'>" . $row_result2["categoryname"] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h5 for="productname">商品名稱</h5>
                    <input type="text" class="form-control" name="productname" id="productname" placeholder="請輸入商品名稱" aria-describedby="productnameHelpId">
                    <small id="productnameHelpId" class="text-danger"></small>
                </div>
                <div class="form-group ">
                    <h5 for="productprice">商品單價</h5>
                    <input type="number" name="productprice" id="productprice" class="form-control" placeholder="請輸入商品單價" aria-describedby="productpriceHelpId">
                    <small id="productpriceHelpId" class="text-danger"></small>
                </div>

                <div class="form-group ">
                    <h5 for="productstock">商品庫存量</h5>
                    <input type="number" name="productstock" id="productstock" class="form-control" placeholder="請輸入商品庫存" aria-describedby="productstockHelpId">
                    <small id="productstockHelpId" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <div class="form-list">
                        <h5 for="productdiscount">商品折扣</h5>
                        <select class="form-control" name="productdiscount" id="productdiscount">
                            <option value="1" selected>原價</option>
                            <option value="0.95">95折</option>
                            <option value="0.9">9折</option>
                            <option value="0.85">85折</option>
                            <option value="0.8">8折</option>
                            <option id="discountOther" value="">其他</option>
                        </select>
                        <input type="number" id="discountOtherText" value="" disabled="true">折
                    </div>
                </div>
                <div class="form-group">
                    <h5 for="productstatus">物品狀態</h5>
                    <select class="form-control" name="productstatus" id="productstatus">
                        <option value="新品">新品</option>
                        <option value="特價">特價</option>
                        <option value="一般">一般</option>
                    </select>
                </div>
                <div class="form-group">
                    <h5 for="onlinedate">上架日期</h5>
                    <input type="date" name="onlinedate" id="onlinedate" class="form-control" placeholder="" aria-describedby="onlinedateHelpId">
                    <small id="onlinedateHelpId" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <h5 for="offlinedate">下架日期</h5>
                    <input type="date" name="offlinedate" id="offlinedate" class="form-control" placeholder="" aria-describedby="offlinedateHelpId">
                    <small id="offlinedateHelpId" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <h5 for="productvote">備註</h5>
                    <textarea class="form-control" name="productvote" id="productvote" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <h5 for="productnews">活動訊息</h5>
                    <textarea class="form-control" name="productnews" id="productnews" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <h5 for="productshowimg" class="pt-2">展示圖片</h5>
                    <input type="file" class="form-control-file" name="productshowimg" id="productshowimg" placeholder="" aria-describedby="productshowimgHelpId">
                    <!-- <input type="text" class="form-control-file" name="productshowimg" id="productshowimg" placeholder="" aria-describedby="productshowimgHelpId"> -->
                    <small id="productshowimgHelpId" class="form-text text-danger"></small>
                </div>
                <h5 class="pt-2">圖片集</h5>
                <div class="form-row" style="display: flex;">

                    <div class="col">
                        <!-- <label for="">圖片1</label> -->
                        <input type="file" class="form-control-file" name="productimg[]" id="productimg1" placeholder="" aria-describedby="productimgHelpId1">
                        <small id="productimgHelpId1" class="form-text text-danger"></small>
                    </div>
                    <div class="col">
                        <!-- <label for="">圖片2</label> -->
                        <input type="file" class="form-control-file" name="productimg[]" id="productimg2" placeholder="" aria-describedby="productimgHelpId2">
                        <small id="productimgHelpId2" class="form-text text-danger"></small>
                    </div>
                    <div class="col">
                        <!-- <label for="">圖片3</label> -->
                        <input type="file" class="form-control-file" name="productimg[]" id="productimg3" placeholder="" aria-describedby="productimgHelpId3">
                        <small id="productimgHelpId3" class="form-text text-danger"></small>
                    </div>
                    <!-- <div class="col"> -->
                        <!-- <label for="">圖片4</label> -->
                        <!-- <input type="file" class="form-control-file" name="productimg[]" id="productimg4" placeholder="" aria-describedby="productimgHelpId4"> -->
                        <!-- <small id="productimgHelpId4" class="form-text text-danger"></small> -->
                    <!-- </div> -->
                </div>



                <div class="form-group pb-4">
                    <div class="row">
                        <input name="action" type="hidden" value="add">
                        <div class="mt-3" style="display: flex; justify-content: center;">
                            <a class="btn btn-secondary col-3" href="./dataProductV.php">回主畫面</a>
                            <input type="reset" value="清除資料" class="col-3  mx-3 btn btn-warning"></input>
                            <button type="submit" class="col-3 btn btn-success">新增商品</button>

                        </div>
                    </div>

                </div>
            </form>
        </div>






    </section>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/script.js"></script>

    <script>
        $(function() {

            $('#productdiscount').click(function() {

                if (discountOther.selected) {
                    $('#discountOtherText').prop("disabled", false);
                    $('#discountOtherText').blur(function() {
                        let discount = `0.${discountOtherText.value}`;
                        discountOther.value = discount;
                    });
                } else {
                    $('#discountOtherText').prop("disabled", true);
                    $('#discountOtherText').prop('value', '');
                }
            });

        });
    </script>
</body>

</html>