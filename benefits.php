<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員權益</title>

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

        .Benefits {
            width: 80%;
            margin: 10px auto;
            border: 1px solid #607d8b;
            border-radius: 5px;
            font-size: 16px;
            line-height: 3rem;
        }

        .Benefits span {
            color: red;
        }
    </style>
</head>

<body>
    <?php include('./header.php') ?>

    <div class="Bookmark">
        <a href="./index.php">寵愛NEE</a>
        <span>/</span>
        <a href="benefits.php">會員權益</a>
    </div>
    <section class="Benefits">

        <h1><b>會員權益</b></h1>
        <div class="mt-3 mb-4">
            <h4><b>會員優惠</b></h4>
            <div class="mb-3">
                <h3><b>首購禮</b> </h3>
                <ol>
                    <li>
                        新加入的會員，首次購物享運費全免。
                    </li>
                    <li>
                        完成會員登入流程，立即獲贈$200折扣券，消費滿$500即可使用。
                    </li>
                    <li>新會員折扣券有效期間30天。</li>
                </ol>
            </div>
        </div>
        <div class="mb-4">
            <h5><b>資料更新 (待與夏木樂確認修改會員資料流程)</b></h5>
            <div class="mb-3">
                <h5><b>如何修改會員資料及密碼?</b></h5>
                <div>
                    請至首頁右上方的「登入」，輸入手機號碼及密碼登入後，點選「會員資料」內的「基本資料」及「密碼」即可修改。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>忘記密碼怎麼辦？</b></h5>
                <div>
                    請於「登入」頁面，直接點選「忘記密碼」，並輸入驗證碼，將透過E-mail發送密碼提醒至您的信箱。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>手機帳號及驗證碼有問題時怎麼辦？</b></h5>
                <div>
                    請聯絡客服信箱或客服專線 <span>04-xxxxxxx</span> ，將有專人為您服務。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>生日錯誤有問題時怎麼辦？</b></h5>
                <div>
                    請聯絡客服信箱或客服專線 <span>04-xxxxxxx</span> ，將有專人為您服務。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>訂單管理</b></h5>
                <div>
                    購物明細將以Email方式通知，如需查閱或修改訂單可至「會員專區」。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>訂單成立後欲修改、取消及加購的方式 ?</b></h5>
                <ol>
                    <li>
                        訂單成立後即無法再修改訂單內容，若有異動，須來電請於訂單成立後的隔日早上9點前 致電寵愛NEE線上購物客服專線 <span>04-xxxxxxx</span> 申請退訂，並重新訂購。
                    </li>
                    <li>
                        訂單內將提供物流配送狀態查詢， 若須取消訂單，請您於收到商品後至 「會員專區」選擇「訂單資料」欲取消按鈕進行退貨作業即可。
                    </li>
                    <li>
                        由於訂單請款與退款作業會分開兩次作業，若已過您的當月銀行結帳日， 則於下一期信用卡結帳日退還，實際退還日期請洽詢發卡銀行。
                    </li>
                </ol>
            </div>
        </div>
        <div class="mb-4">
            <h5>※提醒您：</h5>
            <div class="mb-3">
                <h5><b>訂單成立後全部退貨</b></h5>
                <div>
                    若訂單金額使用折價優惠，則無法再次使用折價券，並於退款金額扣除訂單折價優惠。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>訂單取消退貨</b></h5>
                <div>
                    原訂單折價優惠(含生日優惠、行銷優惠等)恕不返還再次使用。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>訂單成立後有合購組合商品/滿額加價購/多件優惠價時</b></h5>
                <div>
                    您必須將活動商品全數退貨，恕無法接受單一品項退貨。
                </div>
            </div>
            <div class="mb-3">
                <h5><b>顧客服務</b></h5>
                <div>
                    如您有其他關於訂購、退換、款項、會員等問題，請至「 <span>XX XXXX</span> 」詢問 <br /> 或Email至我們的寵愛NEE線上購物客服信箱： <span>XXX@ke.kenk.com.tw</span> <br /> 或致電寵愛NEE線上購物客服專線： <span>04-XXX XXX</span> <br /> 我們將有專人為您處理線上購物相關問題。
                </div>
            </div>
            <div class="mb-3">
                我們的客服服務時間為: 週一至週五09:30~12:00 / 13:30~17:30，例假日公休
            </div>
        </div>
    </section>


    <?php require('./footer.php'); ?>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>