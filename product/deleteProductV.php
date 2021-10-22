<?php 
	include("connMysqlObj2.php");
    include("./control/deleteProductC.php");
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
        <div style="height: 40px;">
        </div>

        <main class="mt-5 pt-3">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header" style="background-color:white;">
                                <div style="display: flex;">
                                    <h2> <i class="fas fa-sticky-note"
                                            style="display: block; justify-content: left;">商品明細</i></h2>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="product_table" class="table  table-striped table-bordered "
                                        style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>欄位名稱</th>
                                                <th>商品資料</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>商品編號</td>
                                                <td><?php echo $productsID;?></td>
                                            </tr>
                                            <tr>
                                                <td>展示圖片</td>
                                                <td><img src="../../img/product/200x200/<?php echo $productShowImg;?>"></td>
                                            </tr>
                                            <tr>
                                                <td>寵物項目</td>
                                                <td><?php echo $categoryAnimal;?></td>
                                            </tr>
                                            <tr>
                                                <td>商品分類名稱</td>
                                                <td><?php echo $categoryName;?></td>
                                            </tr>
                                            <tr>
                                                <td>商品名稱</td>
                                                <td><?php echo $productName;?></td>
                                            </tr>
                                            <tr>
                                                <td>原價</td>
                                                <td><?php echo $productPrice;?>元</td>
                                            </tr>
                                            <tr>
                                                <td>特價</td>
                                                <td><?php echo ceil($productDiscount*$productPrice);?>元</td>
                                            </tr>
                                            <tr>
                                                <td>商品庫存</td>
                                                <td><?php echo $productStock;?></td>
                                            </tr>
                                            <tr>
                                                <td>物品狀態</td>
                                                <td><?php echo $productStatus;?></td>
                                            </tr>
                                            <tr>
                                                <td>上架日期</td>
                                                <td><?php echo $onlineDate;?></td>
                                            </tr>
                                            <tr>
                                                <td>下架日期</td>
                                                <td><?php echo $offlineDate;?></td>
                                            </tr>
                                        </tbody>

                                    </table>
                              
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center; padding: 0 0 10px 0;">
                                <a href="./dataProductV.php" class="btn btn-secondary mx-3">返回訂單查詢</a>
                                <a class="btn btn-danger mx-3 delete-btn">刪除商品資料</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </section>

    <!-- ----------------------- 消息刪除視窗 ---------------------------- -->
    <div class="delete-comfirm-box">
        <div class="delete-lightbox active">
            <div class="delete-lightbox__inner">
                <h3 class="my-3">新增消息</h3>
                <img src="./img/貓咪問號.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">確定要刪除此消息嗎?</h3>
                <label class="my-2">注意:刪除後將無法復原!!!!!</label>
                <div class="btns">
                    <a href="#" class="btn btn-secondary delete-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-danger delete-comfirm-btn m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------- 消息刪除確認視窗 ---------------------------- -->
    <div class="delete-comfirm-box-sec">
        <div class="delete-lightbox-sec active">
            <div class="delete-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">消息刪除成功~</h3>
                <div class="btns">
                    <form action="" method="post" name="formDel" id="formDel">
                        <input name="productsID" type="hidden" value="<?php echo $productsID;?>">
                        <input name="action" type="hidden" value="delete">
                        <button type="submit"  class="btn btn-danger delete-comfirm-btn1 m-3">確定</button>
                    </form>
                </div>
            </div>
        </div>
    </div>








    <script>
        // 打開刪除詢問視窗
        $(document).on('click', '.delete-btn', function () {
            $('.delete-comfirm-box').addClass('delete-surface')
        });

        //取消刪除詢問視窗
        $(document).on('click', '.delete-cancel-btn', function () {
            $('.delete-comfirm-box').removeClass('delete-surface')
        });

        //關閉刪除詢問視窗並且打開刪除確認視窗
        $(document).on('click', '.delete-comfirm-btn', function () {
            $('.delete-comfirm-box').removeClass('delete-surface')
            $('.delete-comfirm-box-sec').addClass('delete-surface-sec')
        });

        //關閉刪除確認視窗
        $(document).on('click', '.delete-comfirm-btn1', function () {
            $('.delete-comfirm-box-sec').removeClass('delete-surface-sec')
        });
    </script>



    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/script.js"></script>


</body>

</html>