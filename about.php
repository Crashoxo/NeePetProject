<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>關於我們</title>

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

        .AboutUs {
            width: 80%;
            height: 80vh;
            margin: 10px auto;
            border: 1px solid #607d8b;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php include('./header.php') ?>



    <div class="Bookmark">
        <a href="./index.php">寵愛NEE</a>
        <span>/</span>
        <a href="about.php">關於我們</a>
    </div>
    <section class="AboutUs">

        <div>
            <h1><b>關於我們</b></h1>
            2018年星辰企業成立「ALLSTARS星光商城」，承接既有多元化的商品、居家生活及鍋具代理品牌外，將以更全方位的市場敏銳度，持續引進優質與安 全合格的家用商品，滿足消費者在追求理想居家時尚的各種需求，帶來「在家是一種享受」的質感品味與生活態度，使在家無論是做家事或是悠閒時 光，都能享受居家生活的高度品質。
        </div>
    </section>



    <?php require('./footer.php'); ?>
    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>