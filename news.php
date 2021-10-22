<?php
include('header.php');
include("connMysqlObj2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>寵愛NEE</title>
    <style>


    </style>
</head>

<body>



    <div class="information">
        <div class="mationImg fixed">
            <img src="https://picsum.photos/2880/340?random=1" alt="">
        </div>
        <div class="text">
            <h2 class="mytxt all" data-aos="fade-right" data-aos-duration="3000">所有活動</h2>
            <h2 class="mytxt even" data-aos="fade-right" data-aos-duration="3000">進行中</h2>
            <h2 class="mytxt nes" data-aos="fade-right" data-aos-duration="3000">結束/已滿</h2>
            <h2 class="mytxt lates" data-aos="fade-right" data-aos-duration="3000">系統公告</h2>
        </div>
    </div>




    <section class="mh-portfolio" id="mh-portfolio">
        <div class="container">
            <div class="row">
                <div class="newpart col-sm-12">
                    <div class="portfolio-nav col-sm-12 " id="filter-button">
                        <ul>
                            <li data-filter="*" class="current-btn">
                                <span class="mybtn myAll" data-aos="zoom-in" data-aos-duration="3000">所有活動</span>
                            </li>

                            <li data-filter=".active">
                                <span class="mybtn myEven" data-aos="zoom-in" data-aos-duration="4000">進行中</span>
                            </li>

                            <li data-filter=".ended">
                                <span class="mybtn myNew" data-aos="zoom-in" data-aos-duration="5000">結束/已滿</span>
                            </li>

                            <li data-filter=".mockup">
                                <span class="mybtn myLates" data-aos="zoom-in" data-aos-duration="6000">系統公告</span>
                            </li>
                        </ul>
                    </div>


                    <div class="mh-project-gallery col-sm-12" id="project-gallery">
                        <div class="portfolioContainer row">

                            <?php
                            // $result = $db_link->query("SELECT * FROM news");
                            // $result = $db_link->query("SELECT * FROM news WHERE newsdate >= NOW() AND newstatus != 5");
                            $result = $db_link->query("SELECT * FROM news WHERE newstatus != 5");

                            //圖片存放資歷夾，須改
                            $imgfolder = "./news_img/";

                            // 活動編輯頁面，須改
                            $eventUpdate = "./updateEvent.php?newsID=";
                            $eventDelete = "./deleteEventC.php?newsID=";
                            $eventAdd = "./addEvent.php";


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
                                if ($row_result["newstatus"] == 1)
                                    $newsta = "";
                                else if ($row_result["newstatus"] == 2 && $row_result["newsdate"] > date("Y-m-d"))
                                    $newsta = "active";
                                else if ($row_result["newstatus"] == 3 || $row_result["newsdate"] < date("Y-m-d"))
                                    $newsta = "ended";
                                else
                                    $newsta = "mockup";


                                //把$row_result["newsdate"]的日期格式轉成無特殊符號用以給isotope排序
                                $newsdate_to_ezdate = str_replace("-", '', $row_result["newsdate"]);



                                echo "<div class='grid-item col-md-4 " . $newsta . "'>" .
                                    "<figure class='newsItem'>" .
                                    "<img src='" . $imgfolder . $row_result["newsimg"] . "' alt='' style='height:200px'>" .
                                    "<figcaption class='fig-caption'>";

                                if ($row_result["newstatus"] == 3 || $row_result["newsdate"] < date("Y-m-d"))
                                    echo        "<span class='upNews'>ended</span>";

                                echo            "<p class='endDate' style='display:none'>" . $newsdate_to_ezdate . "</p>" .
                                    "<p class='renew'>到 " . $row_result["newsdate"] . " 日</p>" .
                                    "<h2 class='title' style='height: 50px;'>" . $row_result["newstitle"] . "</h2>" .
                                    "<p class='newsDate' style='height: 70px;'>" . $row_result["newscontent"] . "</p>" .

                                    // 修改按鈕
                                    // "<div class='box-description-btn'>".
                                    //     "<a href='" . $eventUpdate . $row_result["newsID"] . "' class='cart-btn'>修改</a>".
                                    //     "<a href='" . $eventDelete . $row_result["newsID"] . "' class='buy-btn'>刪除</a>".
                                    // "</div>".
                                    "</figcaption></figure></div>";
                            }
                            ?>


                            <!-- <div class="grid-item col-md-4 user-interface">
                                <figure class="newsItem">
                                    <img src="https://picsum.photos/323/213?random=1" alt="">
                                    <figcaption class="fig-caption">
                                        <span class="upNews">NEWS</span>
                                        <p class="renew">08.29更新</p>
                                        <h1 class="title">寵愛LEE最新活動</h1>
                                        <p class="newsDate">活動日期 <br>
                                            2021/08/27（五）中午 14：30 － 2021/09/02（四）下午 23：59</p>
                                        <p class="date">2021/08/29 14:12</p>
                                    </figcaption>
                                </figure>
                            </div> -->




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- 分頁 -->
    <!-- <div class="Change_Page">
        <div class="Change_Page_block">
            <div class="universal-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>
            </div>
            <div class="universal-page"> <span class="page-num">1</span></div>
            <div class="universal-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
        </div>
    </div> -->


    <?php include('./footer.php'); ?>


    <script>
        $(document).ready(function() {
            $(window).on('load', function() {
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    // sortBy: '.endDate'
                    // animationOptions: {
                    //     queue: true
                    // }
                });

                $('.portfolio-nav li').click(function() {
                    $('.portfolio-nav .current-btn').removeClass('current-btn');
                    $(this).addClass('current-btn');
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        // animationOptions: {
                        //     queue: true
                        // }
                    });
                    return true
                });
                // $('#portfolio-item').mixItUp();
            })


            //   文字變化
            $('.myAll').click(function() {
                $('.nes').hide();
                $('.lates').hide();
                $('.even').hide();
                $('.all').fadeIn(3000);
            })
            $('.myEven').click(function() {
                $('.all').hide();
                $('.nes').hide();
                $('.lates').hide();
                $('.even').fadeIn(3000);
            })
            $('.myNew').click(function() {
                $('.even').hide();
                $('.lates').hide();
                $('.all').hide();
                $('.nes').fadeIn("slow");
            })
            $('.myLates').click(function() {
                $('.even').hide();
                $('.nes').hide();
                $('.all').hide();
                $('.lates').fadeIn("slow");
            })
            //   loding消失時間
            setTimeout(function() {
                $('.skContainer').fadeOut();
            }, 1000)
        });



        AOS.init();
    </script>
    <script src="./js/js.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>