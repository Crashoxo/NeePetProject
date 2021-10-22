<?php
include("connMysqlObj2.php");
// $sql_select = "SELECT productsID,productshowimg,categoryanimal,categoryname,productname,productprice,productdiscount,productstock,productstatus,onlinedate,offlinedate FROM products as p JOIN category as c  ON c.categoryid = p.categoryid WHERE productsID = ? ";
$sql_select = "SELECT * FROM news WHERE newsID = ?";
$stmt = $db_link->prepare($sql_select);
$stmt->bind_param("i", $_GET["newsID"]);
$stmt->execute();
$stmt->bind_result($a, $newstitle, $newscontent, $newsdate, $newstatus, $newsimg,$a);


$stmt->fetch();
$stmt->close();

// $sql_select2 = "SELECT filename FROM productimg  WHERE productsID =" . $_GET["productsID"];
// $filenameResult = $db_link->query($sql_select2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 寵愛NEE後台管理 </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/new.css">

    <!-- Boxicons CDN Link -->
    <script src="./js/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link rel="icon" href="./img/LOGO100x100.png">
    <script src="./js/script.js"></script>
    <script>
        // 打開修改設定視窗
        // $(document).on('click', '.renew-btn', function () {
        //     $('.renew-comfirm-box').addClass('renew-surface')
        // });

        //取消修改設定視窗
        $(document).on('click', '.renew-cancel-btn', function () {
            $('.renew-comfirm-box').removeClass('renew-surface')
        });

        //關閉修改設定視窗並且打開修改確認視窗
        $(document).on('click', '.renew-comfirm-btn', function () {
            $('.renew-comfirm-box').removeClass('renew-surface')
            $('.renew-comfirm-box-sec').addClass('renew-surface-sec')
        });

        //關閉修改確認視窗
        $(document).on('click', '.renew-comfirm-btn1', function () {
            $('.renew-comfirm-box-sec').removeClass('renew-surface-sec')
        });
    </script>
</head>


<form action="updateEventC.php" method="POST" name="eventFormAdd" id="eventFormAdd" enctype="multipart/form-data">

    <div class="renew-comfirm-box renew-surface">
        <div class="renew-lightbox active">
            <div class="renew-lightbox__inner">
            <h3 class="my-3">修改公告</h3>
                <div style="display: flex; ">
                    <div style="display: inline-flex; flex-direction: column; align-items: center;">
                        <label for="usr">公告類型:</label>
                        <div class="m-3" style="flex-direction: row;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="1" <?php echo ($newstatus == 1) ? 'checked' : '' ?>>不分類
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="2" <?php echo ($newstatus == 2) ? 'checked' : '' ?>>進行中
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="3" <?php echo ($newstatus == 3) ? 'checked' : '' ?>>結束/已滿
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="4" <?php echo ($newstatus == 4) ? 'checked' : '' ?>>系統公告
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="title">標題:</label>
                            <input type="text" class="form-control" id="newstitle" name="newstitle"  value="<?php echo $newstitle; ?>">
                            <!-- <label for="">開始日期:</label>
                            <input type="date" class="form-control" id=""> -->
                            <label for="">到期日:</label>
                            <input type="date" class="form-control" id="" name="newsdate" value=<?php echo $newsdate;?>>
                            <label for="">活動內容:</label>
                            <textarea class="form-control mb-2" rows="5" id="" name="newscontent"><?php echo $newscontent; ?></textarea>
                            <label for="">展示圖片:</label>
                            <input type="file" class="form-control" id="customFile" name="eventshowimg"/>
                        </div>

                    </div>
                </div>
                <div class="btns">
                    <a href="./news.php" class="btn btn-secondary renew-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-success renew-comfirm-btn m-3">確定</a>
                </div>
                <!-- <h3 class="my-3">新增消息</h3>
                <div style="display: flex; ">
                    <div style="display: inline-flex; flex-direction: column; align-items: center;">
                        <label for="usr">消息類型:</label>
                        <div class="m-3" style="flex-direction: row;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">活動公告
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">系統公告
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="title">標題:</label>
                            <input type="text" class="form-control" id="">
                            <label for="">開始日期:</label>
                            <input type="date" class="form-control" id="">
                            <label for="">結束日期:</label>
                            <input type="date" class="form-control" id="">
                            <label for="">活動內容:</label>
                            <textarea class="form-control mb-2" rows="5" id=""></textarea>
                            <input type="file" class="form-control" id="customFile" />
                        </div>

                    </div>
                </div>
                <div class="btns">
                    <a href="#" class="btn btn-secondary renew-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-success renew-comfirm-btn m-3">確定</a>
                </div> -->
            </div>
        </div>
    </div>

    <!-- ----------------------- 消息確認視窗 ---------------------------- -->
    <div class="renew-comfirm-box-sec">
        <div class="renew-lightbox-sec active">
            <div class="renew-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">消息修改成功~</h3>
                <div class="btns">
                    <input name="nID" type="hidden" value="<?php echo $_GET["newsID"];?>">
                    <button class="btn btn-danger renew-comfirm-btn1 m-3">確定</button>
                </div>
            </div>
        </div>
    </div>

    </form>