<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聯絡我們</title>

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
        
        .Contact_us {
            width: 80%;
            height: 60vh;
            margin: 10px auto;
            border: 1px solid #607d8b;
            border-radius: 5px;
            font-size: 16px;
            line-height: 3rem;
        }
    </style>
</head>

<body>
    <?php include('./header.php'); ?>

    <div class="Bookmark">
        <a href="./homepage.html">寵愛NEE</a>
        <span>/</span>
        <a href="">聯絡我們</a>
    </div>
    <section class="Contact_us">
        <h1 class="text-center"><b>聯絡我們</b></h1>
        <b>您可選擇以下方式與我們聯繫：</b>
        <ol>
            <li>撥打市話：(04)8888-8888。</li>
            <li>發送電子信箱：Help@Support.Lovenee.Tw。 </li>
            <li>亦或是至服務據點找尋專人為您服務。</li>
        </ol>
    </section>


        <?php include('./footer.php') ?>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>