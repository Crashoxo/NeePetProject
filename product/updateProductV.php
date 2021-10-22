<?php
include("connMysqlObj2.php");
include("./control/updateProductCHead.php");
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

    <div class="sidebar">
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
    </div>

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
        <div style="height: 40px;">

        </div>
        <main class="mt-5 pt-3">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header" style="background-color:white;">
                                <div style="display: flex;">
                                    <h2> <i class="fas fa-sticky-note" style="display: block; justify-content: left;">商品修改</i></h2>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                <form action="./control/updateProductC.php" method="post" name="formFix" id="formFix" enctype="multipart/form-data">
                                    <table id="product_table" class="table  table-striped table-bordered " style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>欄位名稱</th>
                                                <th>商品資料</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    寵物項目
                                                </td>
                                                <td>
                                                    <select class="form-control" name="categoryanimal" id="categoryanimal">
                                                        <?php
                                                        $sql_query = "SELECT categoryanimal FROM category GROUP BY categoryanimal";
                                                        $result = $db_link->query($sql_query);
                                                        while ($row_result = $result->fetch_assoc()) {
                                                            if ($row_result["categoryanimal"] == $categoryAnimal) {
                                                                echo "<option value='" . $row_result["categoryanimal"] . "'selected>" . $row_result["categoryanimal"] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row_result["categoryanimal"] . "'>" . $row_result["categoryanimal"] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    商品分類名稱
                                                </td>
                                                <td>
                                                    <select class="form-control" name="categoryname" id="categoryname">
                                                        <?php
                                                        $sql_query2 = "SELECT categoryname FROM category GROUP BY categoryname";
                                                        $result2 = $db_link->query($sql_query2);
                                                        while ($row_result2 = $result2->fetch_assoc()) {
                                                            if ($row_result["categoryname"] == $categoryname) {
                                                                echo "<option value='" . $row_result2["categoryname"] . "'selected>" . $row_result2["categoryname"] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row_result["categoryname"] . "'>" . $row_result["categoryname"] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productname">商品名稱</label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="productname" id="productname" placeholder="請輸入商品名稱" aria-describedby="productnameHelpId" value="<?php echo $productName; ?>">
                                                    <small id="productnameHelpId" class="text-danger"></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productprice">商品單價</label>
                                                </td>
                                                <td>
                                                    <input type="number" name="productprice" id="productprice" class="form-control" placeholder="請輸入商品單價" aria-describedby="productpriceHelpId" value="<?php echo $productPrice; ?>">
                                                    <small id="productpriceHelpId" class="text-danger"></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productstock">商品庫存量</label>
                                                </td>
                                                <td>
                                                    <input type="number" name="productstock" id="productstock" class="form-control" placeholder="請輸入商品單價" aria-describedby="productstockHelpId" value="<?php echo $productStock; ?>">
                                                    <small id="productstockHelpId" class="text-danger"></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productdiscount">商品折扣</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="productdiscount" id="productdiscount">
                                                        <option value="1" <?php echo ($productDiscount == 1) ? 'selected' : '' ?>>原價</option>
                                                        <option value="0.95" <?php echo ($productDiscount == 0.95) ? 'selected' : '' ?>>95折</option>
                                                        <option value="0.9" <?php echo ($productDiscount == 0.9) ? 'selected' : '' ?>>9折</option>
                                                        <option value="0.85" <?php echo ($productDiscount == 0.85) ? 'selected' : '' ?>>85折</option>
                                                        <option value="0.8" <?php echo ($productDiscount == 0.8) ? 'selected' : '' ?>>8折</option>
                                                        <?php
                                                        echo '<option id="discountOther" ';
                                                        if ($productDiscount != 1 && $productDiscount != 0.95 && $productDiscount != 0.9  && $productDiscount != 0.85 && $productDiscount != 0.8) {
                                                            echo "value=" . $productDiscount . " selected>其他</option>";
                                                        } else {
                                                            echo "value=''>其他</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                                    if ($productDiscount != 1 && $productDiscount != 0.95 && $productDiscount != 0.9 && $productDiscount != 0.85 && $productDiscount != 0.8) {
                                                        echo '<input type="number" id="discountOtherText" value="' . $productDiscount * 10 . '">折';
                                                    } else {
                                                        echo '<input type="number" id="discountOtherText" value="" disabled="true">折';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productstatus">物品狀態</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="productstatus" id="productstatus">
                                                        <option value="新品" <?php echo ($productStatus == "新品") ? 'selected' : '' ?>>新品</option>
                                                        <option value="特價" <?php echo ($productStatus == "特價") ? 'selected' : '' ?>>特價</option>
                                                        <option value="一般" <?php echo ($productStatus == "一般") ? 'selected' : '' ?>>一般</option>
                                                        <option value="售完" <?php echo ($productStatus == "售完") ? 'selected' : '' ?>>售完</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="onlinedate">上架日期</label>
                                                </td>
                                                <td>
                                                    <input type="date" name="onlinedate" id="onlinedate" value=<?php echo $onlineDate; ?> class="form-control" placeholder="" aria-describedby="onlinedateHelpId">
                                                    <small id="onlinedateHelpId" class="text-danger"></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="offlinedate">下架日期</label>
                                                </td>
                                                <td>
                                                    <input type="date" name="offlinedate" id="offlinedate" value=<?php echo $offlineDate; ?> class="form-control" placeholder="" aria-describedby="offlinedateHelpId">
                                                    <small id="offlinedateHelpId" class="text-danger"></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productvote">備註</label>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="productvote" id="productvote" rows="3"><?php echo $productVote; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productnews">活動訊息</label>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="productnews" id="productnews" rows="3"><?php echo $productNews; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productshowimg">展示圖片</label>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control-file" name="productshowimg" id="productshowimg" placeholder="" aria-describedby="productshowimgHelpId">
                                                    <img src='../../img/product/200x200/<?php echo $productShowImg; ?>'>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="productimg">圖片集:</label>
                                                </td>
                                                <td>

                                                    <input type="file" class="form-control-file" name="productimg[]" id="productimg1" placeholder="" aria-describedby="productimgHelpId1">
                                                    <input type="file" class="form-control-file" name="productimg[]" id="productimg2" placeholder="" aria-describedby="productimgHelpId2">
                                                    <input type="file" class="form-control-file" name="productimg[]" id="productimg3" placeholder="" aria-describedby="productimgHelpId3">
                                                    <input type="file" class="form-control-file" name="productimg[]" id="productimg4" placeholder="" aria-describedby="productimgHelpId4">
                                                    <?php
                                                    $sql_query3 = "SELECT filename FROM productimg  WHERE productsID =" . $productsID;
                                                    $result3 = $db_link->query($sql_query3);
                                                    // echo "<td>";
                                                    while ($row_result3 = $result3->fetch_assoc()) {
                                                        echo "<img src='../../img/product/200x200/" . $row_result3["filename"] . "'>";
                                                    }
                                                    // echo "</td>";
                                                    ?>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td colspan="2" align="center">
                                                    <input name="productsID" type="hidden" value="<?php echo $productsID; ?>">
                                                    <input name="action" type="hidden" value="update">
                                                    <a href="./dataProductV.php" class="btn btn-secondary mx-3">返回訂單查詢</a>
                                                    <input class="btn btn-info mx-3 delete-btn" type="submit" name="button" id="button" value="修改商品資料">

                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    </form>
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
    <script>
        $(function() {
            // 其他則扣顯示計算
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
<?php
$db_link->close();
?>