<?php
include("connMysqlObj2.php");
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


</head>

<body>

    <?php
    require '../navBar.php';



    // $result = $db_link->query("SELECT * FROM news");
    // $result = $db_link->query("SELECT * FROM news WHERE newsdate >= NOW() AND newstatus != 5");
    $result = $db_link->query("SELECT * FROM news WHERE newstatus != 5");

    //圖片存放資歷夾，須改
    $imgfolder = "../../front/news_img/";

    // 活動編輯頁面，須改
    $eventUpdate = "./updateEvent.php?newsID=";
    $eventDelete = "./deleteEventC.php?newsID=";
    $eventAdd = "./addEvent.php";
    ?>


    <div class="home-section">
        <nav>

            <div class="sidebar-button">
                <i class="fas fa-align-justify sidebarBtn"></i>

            </div>
            <h2> <i class="fas fa-sticky-note" style="display: block; justify-content: left;">最新消息</i></h2>
            <div class="profile-details">
                <!-- <img src="./img/profile.jpg" alt=""> -->
                <span class="admin_name">管理者:root</span>
            </div>
        </nav>

        <div style="height:100px;">

        </div>


        <div class="mh-portfolio" id="mh-portfolio">
            <div class="container">
                <div class="row">

                    <br><br><br><br><br><br>
                    <div class="newpart col-sm-12">
                        <div class="portfolio-nav col-sm-12 " id="filter-button">
                            <ul>
                                <li data-filter="*" class="current">
                                    <span class="btn btn-warning">所有活動</span>
                                </li>

                                <li data-filter=".active">
                                    <span class="btn btn-warning">進行中</span>
                                </li>

                                <li data-filter=".ended">
                                    <span class="btn btn-warning">結束/已滿</span>
                                </li>

                                <li data-filter=".mockup">
                                    <span class="btn btn-warning">系統公告</span>
                                </li>
                                <li data-filter="*" class="current">
                                    <a class="btn btn-success join-news-btn">新增公告</a>
                                </li>

                            </ul>
                        </div>

                        <div class="mh-project-gallery col-sm-12" id="project-gallery">
                            <div class="portfolioContainer row">

                            <?php

                            // 新增活動按鈕
                            // echo "<div class='grid-item col-md-4 active ended mockup'>".
                            // "<figure class='newsItem'>".
                            //     "<figcaption class='fig-caption' style='height: 433.5px;'>".
                            //         "<a href='" . $eventAdd . "' style='text-decoration:none;'>".
                            //             // "<div class='align-middle' style='font-size: 2rem; height: 433px;'>新增活動</div>".
                            //             "<div style='display: flex; flex-direction: column;justify-content: center;text-align: center;height: 380px;'>".
                            //                 "<div style='font-size: 20px;color: #3498db;'>新增活動</div>".
                            //             "</div>".
                            //         "</a>".
                            // "</figcaption></figure></div>";
                            


                            while ($row_result = $result->fetch_assoc()) {
                                // echo $row_result["newstitle"] . ", " . $row_result["newscontent"] . ", " . $row_result["newsdate"] . ", " . $row_result["newstatus"] . ", " . $row_result["newsimg"] . "<br>" ;
                                
                                //isotope的活動狀態，放入底下grid-item div的class 
                                $newsta;
                                if($row_result["newstatus"]==1)
                                    $newsta = "";
                                else if($row_result["newstatus"]==2 && $row_result["newsdate"] > date("Y-m-d"))
                                    $newsta = "active";
                                else if($row_result["newstatus"]==3 || $row_result["newsdate"] < date("Y-m-d"))
                                    $newsta = "ended";
                                else
                                    $newsta = "mockup";
                                    
                                
                                //把$row_result["newsdate"]的日期格式轉成無特殊符號用以給isotope排序
                                $newsdate_to_ezdate = str_replace("-", '', $row_result["newsdate"]);



                                echo "<div class='grid-item col-md-4 " . $newsta . "'>".
                                        "<figure class='newsItem'>".
                                            "<img src='" . $imgfolder . $row_result["newsimg"] . "' alt='' style='height:200px'>".
                                            "<figcaption class='fig-caption'>";

                                if($row_result["newstatus"]==3 || $row_result["newsdate"] < date("Y-m-d"))
                                    echo        "<span class='upNews'>ended</span>";

                                echo            "<p class='endDate' style='display:none'>" . $newsdate_to_ezdate . "</p>".
                                                "<p class='renew'>到 " . $row_result["newsdate"] . " 日</p>".
                                                "<h2 class='title' style='height: 50px;'>" . $row_result["newstitle"] . "</h2>".
                                                "<p class='newsDate'>活動內容：<br>".
                                                "<p class='date' style='height: 70px;'>" . $row_result["newscontent"] . "</p>".


                                                // 修改按鈕
                                                "<div style='display: flex; justify-content: center;'>".
                                                    "<a href='" . $eventUpdate . $row_result["newsID"] . "' class='btn btn-secondary mx-3 renew-btn'>修改</a>".
                                                    // "<a href='" . $eventDelete . $row_result["newsID"] . "' class='btn btn-danger delete-btn'>刪除</a>".
                                                    "<a id='" . $row_result["newsID"] . "' class='btn btn-danger delete-btn newsidgive'>刪除</a>".
                                                    // "<input id='newsidvalue' type='hidden' value='" . $row_result["newsID"] . "' >".
                                                "</div>".
                                "</figcaption></figure></div>";

                            }
                            ?>

                                <!-- <div class="grid-item col-md-4 user-interface">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=1" alt="">
                                        <figcaption class="fig-caption">

                                            <p class="renew">08.29更新<span class="upNews">NEWS</span></p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div> -->

                                <!-- <div class="grid-item col-md-4 ui user-interface">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=1" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新<span class="upNews">NEWS</span></p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="grid-item col-md-4 user-interface">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=1" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新<span class="upNews">NEWS</span></p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="grid-item col-md-4 user-interface">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=1" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新<span class="upNews">NEWS</span></p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="grid-item col-md-4 branding">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=2" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新</p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="grid-item col-md-4 branding">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=2" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新</p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="grid-item col-md-4 ui">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=7" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新</p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="grid-item col-md-4 mockup">
                                    <figure class="newsItem">
                                        <img src="https://picsum.photos/323/213?random=8" alt="">
                                        <figcaption class="fig-caption">
                                            <p class="renew">08.29更新</p>
                                            <h1 class="title">寵愛LEE最新活動</h1>
                                            <p class="newsDate">活動日期 <br>
                                                2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                            <p class="newsDate">活動內容 <br>
                                            <p class="date">這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                                這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?這個我跟你說就是寫文稿就對了，沒有點進去的畫面好嗎?
                                            </p>
                                            <div style="display: flex; justify-content: center;">
                                                <a class="btn btn-secondary mx-3 renew-btn">修改</a>
                                                <a class="btn btn-danger delete-btn">刪除</a>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ----------------------- 消息設定視窗 ---------------------------- -->

    <form action="addEventC.php" method="POST" name="eventFormAdd" id="eventFormAdd" enctype="multipart/form-data">

    <div class="new-comfirm-box">
        <div class="new-lightbox active">
            <div class="new-lightbox__inner">
                <h3 class="my-3">新增公告</h3>
                <div style="display: flex; ">
                    <div style="display: inline-flex; flex-direction: column; align-items: center;">
                        <label for="usr">公告類型:</label>
                        <div class="m-3" style="flex-direction: row;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="1">不分類
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="2">進行中
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="3">結束/已滿
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="newstatus" value="4">系統公告
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="title">標題:</label>
                            <input type="text" class="form-control" id="newstitle" name="newstitle">
                            <!-- <label for="">開始日期:</label>
                            <input type="date" class="form-control" id=""> -->
                            <label for="">到期日:</label>
                            <input type="date" class="form-control" id="" name="newsdate">
                            <label for="">活動內容:</label>
                            <textarea class="form-control mb-2" rows="5" id="" name="newscontent"></textarea>
                            <label for="">展示圖片:</label>
                            <input type="file" class="form-control" id="customFile" name="eventshowimg"/>
                        </div>

                    </div>
                </div>
                <div class="btns">
                    <a href="#" class="btn btn-secondary new-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-success new-comfirm-btn m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------- 消息確認視窗 ---------------------------- -->
    <div class="new-comfirm-box-sec">
        <div class="new-lightbox-sec active">
            <div class="new-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">確定新增消息？</h3>
                <div class="btns">
                    <button class="btn btn-danger new-comfirm-btn1 m-3">確定</button>
                </div>
            </div>
        </div>
    </div>

    </form>


    <!-- ----------------------- 消息修改視窗 ---------------------------- -->
    
    <!-- <form action="updateEventC.php" method="POST" name="eventFormAdd" id="eventFormAdd" enctype="multipart/form-data">

    <div class="renew-comfirm-box">
        <div class="renew-lightbox active">
            <div class="renew-lightbox__inner">
                <h3 class="my-3">新增消息</h3>
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
                </div>
            </div>
        </div>
    </div> -->

    <!-- ----------------------- 消息確認視窗 ---------------------------- -->
    <!-- <div class="renew-comfirm-box-sec">
        <div class="renew-lightbox-sec active">
            <div class="renew-lightbox__inner-sec">
                <img src="./img/柯基圈2.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">消息修改成功~</h3>
                <div class="btns">
                    <a href="#" class="btn btn-danger renew-comfirm-btn1 m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    </form> -->


    <!-- ----------------------- 消息刪除視窗 ---------------------------- -->
    
    <form action="deleteEventC.php" method="POST" name="eventFormAdd" id="eventFormAdd" enctype="multipart/form-data">

    <div class="delete-comfirm-box">
        <div class="delete-lightbox active">
            <div class="delete-lightbox__inner">
                <h3 class="my-3">刪除消息</h3>
                <img src="./img/貓咪問號.png" style="height: 180px; width: 180px;" alt="">
                <h3 class="my-3">確定要刪除此消息嗎?</h3>
                <label class="my-2">注意:刪除後將無法復原!!!!!</label>
                <div class="btns">
                    <a href="#" class="btn btn-danger delete-cancel-btn m-3">取消</a>
                    <a href="#" class="btn btn-secondary delete-comfirm-btn m-3">確定</a>
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
                    <a id='deleteConfirm' href="" class="btn btn-danger delete-comfirm-btn1 m-3">確定</a>
                </div>
            </div>
        </div>
    </div>

    </form>





    <!-- ================ -->

    <script>
        // 刪除確認的href填入
        $(document).on('click', '.newsidgive', function () {
            $('#deleteConfirm').attr("href", "./deleteEventC.php?newsID="+$(this).attr('id'));
            console.log($('#deleteConfirm').attr("href"));
            
        });


        // 打開新增消息設定視窗
        $(document).on('click', '.join-news-btn', function () {
            $('.new-comfirm-box').addClass('new-surface')
        });

        //取消新增消息設定視窗
        $(document).on('click', '.new-cancel-btn', function () {
            $('.new-comfirm-box').removeClass('new-surface')
        });

        //關閉新增消息設定視窗並且打開補貨確認視窗
        $(document).on('click', '.new-comfirm-btn', function () {
            $('.new-comfirm-box').removeClass('new-surface')
            $('.new-comfirm-box-sec').addClass('new-surface-sec')
        });

        //關閉新增消息確認視窗
        $(document).on('click', '.new-comfirm-btn1', function () {
            $('.new-comfirm-box-sec').removeClass('new-surface-sec')
        });
    </script>

    <!-- ================ -->

    <!-- <script>
        // 打開修改設定視窗
        $(document).on('click', '.renew-btn', function () {
            $('.renew-comfirm-box').addClass('renew-surface')
        });

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
    </script> -->

    <!-- ================ -->
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



    <!-- ==================== 分類 ======================= -->
    <script>
        $(document).ready(function () {
            $(window).on('load', function () {
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        queue: true
                    }
                });

                $('.portfolio-nav li').click(function () {
                    $('.portfolio-nav .current').removeClass('current');
                    $(this).addClass('current');
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            queue: true
                        }
                    });
                    return true
                });
                // $('#portfolio-item').mixItUp();
            })


            //   文字變化
            $('.myAll').click(function () {
                $('.nes').hide();
                $('.lates').hide();
                $('.even').hide();
                $('.all').fadeIn(3000);
            })
            $('.myEven').click(function () {
                $('.all').hide();
                $('.nes').hide();
                $('.lates').hide();
                $('.even').fadeIn(3000);
            })
            $('.myNew').click(function () {
                $('.even').hide();
                $('.lates').hide();
                $('.all').hide();
                $('.nes').fadeIn("slow");
            })
            $('.myLates').click(function () {
                $('.even').hide();
                $('.nes').hide();
                $('.all').hide();
                $('.lates').fadeIn("slow");
            })
            //   loding消失時間
            setTimeout(function () {
                $('.skContainer').fadeOut();
            }, 1000)
        });



        AOS.init();
    </script>

    <!-- <script src="./js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script> -->
    <!-- <script src="./js/jquery-3.5.1.js"></script> -->
    <!-- <script src="./js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="./js/dataTables.bootstrap5.min.js"></script> -->
    <script src="./js/script.js"></script>
</body>

</html>