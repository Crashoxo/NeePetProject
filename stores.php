<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>服務據點</title>

    <!-- ======================== link font or icon setting =============================  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">


    <!-- ======================== CSS setting =============================  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- ======================== JS setting =============================  -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/loading.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        .header-nav {
            position: relative;
        }
        /* 頁籤 */
        
        .Bookmark {
            width: 80%;
            margin: 20px auto;
        }
        
        .Bookmark a:not(:last-child),
        .Bookmark span {
            font-size: 16px;
            color: #000;
            text-decoration: none;
            margin: 5px;
        }
        
        .Bookmark a:last-child {
            font-size: 16px;
            color: rgb(155, 155, 155);
            text-decoration: none;
            margin: 5px;
        }
        /* 內容 */
        
        .Stores {
            width: 80%;
            margin: 10px auto;
            font-size: 16px;
            line-height: 3rem;
        }
    </style>
</head>

<body>
    <?php include('./header.php'); ?>

    <div class="Bookmark">
        <a href="./homepage.php">寵愛NEE</a>
        <span>/</span>
        <a href="">服務據點</a>
    </div>
    <section class="Stores">
        <h1 class="text-center"><b>展示中心</b></h1>
        <br>
        <div class="col-md-6 c-featured-store px-3 px-lg-6 mx-6">
            <img class="c-featured-store__image img-fluid" src="https://lyrademo.s3.amazonaws.com/ekshop/images/store/store-image1.jpg" alt="內湖CITYLINK店">

            <h4 class="c-featured-store__title mt-4">台中旗艦店</h4>

            <div class="c-featured-store__details">
                <div class="c-featured-store__biz-hours">
                    營業時間: 平日：9:30-12:00 / 13:30-17:30
                </div>

                <div class="c-featured-store__phone">
                    <span class="mr-3">
                    TEL: (04)8888-8888
                </span>
                    <span>
                    FAX: (09)852-9663
                </span>
                </div>

                <div class="c-featured-store__address">
                    地址: 台中市南屯區公益路二段51號18樓
                </div>
            </div>
    </section>

    <?php include('./footer.php') ?>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>