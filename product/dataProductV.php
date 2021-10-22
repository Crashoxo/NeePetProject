<?php
include("./control/dataProductC.php");
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
                                    <h2><i class="fas fa-shopping-bag" style="display: block; justify-content: left;">商城系統-上架中(<?php echo $total_records; ?>)</i></h2>
                                    <a href="./addProductV.php" class="btn btn-success mx-3">新增商品</a>
                                    <a href="./dataProductOFFV.php" class="btn btn-danger mx-3">下架專區</a>
                                </div>



                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="product_table" class="table table-striped table-bordered data-table " style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>商品編號</th>
                                                <!-- <th>寵物項目</th> -->
                                                <!-- <th>商品分類名稱</th> -->
                                                <th>商品名稱</th>
                                                <th>原價</th>
                                                <th>特價</th>
                                                <!-- <th>展示圖片</th> -->
                                                <th>上架日期</th>
                                                <th>下架日期</th>
                                                <th>物品狀態</th>
                                                <th>商品庫存</th>
                                                <th data-sortable="false">操作功能</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($row_result = $result->fetch_assoc()) :
                                            ?>
                                                <tr>
                                                    <td> <?= $row_result["productsID"] ?></td>
                                                    <td> <?= $row_result["productname"] ?></td>
                                                    <td> <?= $row_result["productprice"] ?></td>
                                                    <td> <?= ceil($row_result["productprice"] * $row_result["productdiscount"]) ?></td>
                                                    <td> <?= $row_result["onlinedate"] ?> </td>
                                                    <td> <?= $row_result["offlinedate"] ?> </td>
                                                    <td> <?= $row_result["productstatus"] ?></td>
                                                    <td> <?= $row_result["productstock"] ?></td>
                                                    <td>
                                                        <!-- <a href='./control/updateProductC.php?&action=offProduct&productsID=<?= $row_result["productsID"] ?>'><button>下架</button></a> -->

                                                        <!-- <a class="btn btn-success universal-online-btn">上架</a> -->
                                                        <a class="btn btn-warning universal-deleted-btn" onclick="downProduct(<?= $row_result['productsID'] ?>)">下架</a>
                                                        <a class="btn btn-primary universal-purchase-btn" onclick="editNum(<?= $row_result['productsID'] ?>)">補貨</a>
                                                        <a href="updateProductV.php?productsID=<?= $row_result["productsID"] ?>" class="btn btn-secondary">修改</a>
                                                        <a href="deleteProductV.php?productsID=<?= $row_result["productsID"] ?>" class="btn btn-info">明細</a>


                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>

                                            <!-- <tr>
                                                <td>#0002</td>
                                                <td>玩具</td>
                                                <td>500</td>
                                                <td>450</td>
                                                <td>2021/09/23</td>
                                                <td>2021/09/23</td>
                                                <td>80</td>
                                                <td>販售中</td>
                                                <td>
                                                    <a class="btn btn-success universal-online-btn">上架</a>
                                                    <a class="btn btn-warning universal-deleted-btn">下架</a>
                                                    <a class="btn btn-primary universal-purchase-btn">補貨</a>
                                                    <a href="./修改商品.html" class="btn btn-secondary">修改</a>
                                                    <a href="./刪除商品.html" class="btn btn-info">明細</a>
                                                </td>
                                            </tr> -->
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


    <!-- ----------------------- 下架視窗詢問視窗 ---------------------------- -->
    <div class="Off-comfirm-box">
        <div class="Off-lightbox active">
            <div class="Off-lightbox__inner">
                <img src="./img/貓咪問號.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">確定要下架此商品嗎?</h3>
                <label class="my-2">注意:下架後將無法復原!!!!!</label>
                <div class="btns">
                    <a href="#" class="btn btn-secondary universal-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-danger universal-comfirm-btn m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------- 下架確認視窗 ---------------------------- -->
    <div class="Off-comfirm-box-sec">
        <div class="Off-lightbox-sec active">
            <div class="Off-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">已將商品下架!!汪!</h3>
                <div class="btns">
                    <a id="downCheckBtn" href="#" class="btn btn-danger universal-comfirm-btn1 m-3">確定</a>
                </div>
            </div>
        </div>
    </div>


    <!-- ----------------------- 上架設定視窗 ---------------------------- -->
    <div class="on-comfirm-box">
        <div class="on-lightbox active">
            <div class="on-lightbox__inner">

                <h3 class="my-3">請設定上架日期!!</h3>
                <div style="display: flex; ">
                    <img src="./img/推眼鏡貓.png" style="height: 180px; width: 180px;" alt="">
                    <div style="display: inline-flex; flex-direction: column;">
                        <h6 class="mt-3" style="display: flex;">上架日期：</h6>
                        <input type="date">
                        <h6 class="mt-3" style="display: flex;">下架日期：</h6>
                        <input type="date">
                    </div>
                </div>

                <div class="btns">
                    <a href="#" class="btn btn-secondary on-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-danger on-comfirm-btn m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------- 上架確認視窗 ---------------------------- -->
    <div class="on-comfirm-box-sec">
        <div class="on-lightbox-sec active">
            <div class="on-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">已經設定好上架日期囉~</h3>
                <div class="btns">
                    <a href="#" class="btn btn-danger on-comfirm-btn1 m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------- 補貨設定視窗 ---------------------------- -->
    <div class="restock-comfirm-box">
        <div class="restock-lightbox active">
            <div class="restock-lightbox__inner">

                <h3 class="my-3">請設定補貨數量!!</h3>
                <div style="display: flex; ">
                    <img src="./img/推眼鏡貓.png" style="height: 180px; width: 180px;" alt="">
                    <div style="display: inline-flex; align-items: center;">
                        <h6 class="mt-3" style="display: flex;">補貨數量：</h6>
                        <form id="formNum">
                            <input type="number" name="productstockNum" id="productstockNum">
                            <input type="hidden" name="getPID" id="getPID">
                        </form>
                    </div>
                </div>

                <div class="btns">
                    <a href="#" class="btn btn-secondary restock-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-danger restock-comfirm-btn m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------- 補貨確認視窗 ---------------------------- -->
    <div class="restock-comfirm-box-sec">
        <div class="restock-lightbox-sec active">
            <div class="restock-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">已經設定補貨數量囉~</h3>
                <div class="btns">
                    <a href="#" class="btn btn-danger restock-comfirm-btn1 m-3" id='submitNum'>確定</a>
                </div>
            </div>
        </div>
    </div>








    <script>
        // 打開上架設定視窗
        $(document).on('click', '.universal-online-btn', function() {
            $('.on-comfirm-box').addClass('on-surface')
        });

        //取消上架詢問視窗
        $(document).on('click', '.on-cancel-btn', function() {
            $('.on-comfirm-box').removeClass('on-surface')
        });

        //關閉上架設定視窗並且打開上架確認視窗
        $(document).on('click', '.on-comfirm-btn', function() {
            $('.on-comfirm-box').removeClass('on-surface')
            $('.on-comfirm-box-sec').addClass('on-surface-sec')
        });

        //關閉上架確認視窗
        $(document).on('click', '.on-comfirm-btn1', function() {
            $('.on-comfirm-box-sec').removeClass('on-surface-sec')
        });
    </script>


    <script>
        // 打開下架詢問視窗
        $(document).on('click', '.universal-deleted-btn', function() {
            $('.Off-comfirm-box').addClass('Off-surface')
        });

        //取消下架詢問視窗
        $(document).on('click', '.universal-cancel-btn', function() {
            $('.Off-comfirm-box').removeClass('Off-surface')
        });

        //關閉詢問視窗並且打開下架確認視窗
        $(document).on('click', '.universal-comfirm-btn', function() {
            $('.Off-comfirm-box').removeClass('Off-surface')
            $('.Off-comfirm-box-sec').addClass('Off-surface-sec')
        });

        //關閉下架確認視窗
        $(document).on('click', '.universal-comfirm-btn1', function() {
            $('.Off-comfirm-box-sec').removeClass('Off-surface-sec')
        });
    </script>


    <script>
        // 打開補貨設定視窗
        $(document).on('click', '.universal-purchase-btn', function() {
            $('.restock-comfirm-box').addClass('restock-surface')
        });

        //取消補貨設定視窗
        $(document).on('click', '.restock-cancel-btn', function() {
            $('.restock-comfirm-box').removeClass('restock-surface')
        });

        //關閉補貨設定視窗並且打開補貨確認視窗
        $(document).on('click', '.restock-comfirm-btn', function() {
            $('.restock-comfirm-box').removeClass('restock-surface')
            $('.restock-comfirm-box-sec').addClass('restock-surface-sec')
        });

        //關閉補貨確認視窗
        $(document).on('click', '.restock-comfirm-btn1', function() {
            $('.restock-comfirm-box-sec').removeClass('restock-surface-sec')
        });
    </script>

    <script>
        // 下架抓productID值
        function downProduct(productID) {
            console.log("下架抓productID值", productID);
            // 塞連結+productID進下架確認紐
            $('#downCheckBtn').prop('href', `./control/updateProductC.php?&action=offProduct&productsID=${productID}`);

        }

        // 補貨進資料庫撈數量
        function editNum(productID) {
            $.ajax({
                url: "./control/updateProductC.php?action=selectNum&productID=" + productID,
                type: "GET",
                success: function(res) {
                    let getRes = res.split("-");
                    console.log(getRes);
                    $('#getPID').val(getRes[0]);
                    $('#productstockNum').val(getRes[1]);
                }
            })
        };
        //更改資料庫的商品 數量  
        $('#submitNum').on('click', function() {
            let data = $('#formNum').serialize();
            $.ajax({
                url: "./control/updateProductC.php",
                method: 'post',
                data: data + '&action=updateNum',
                success: function(res) {
                    console.log(res);
                    setTimeout(() => {
                        location.reload();
                    }, 300);
                }
            });
        });
    </script>








    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/script.js"></script>


</body>

</html>