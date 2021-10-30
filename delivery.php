<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>配送服務</title>

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

        .Delivery {
            width: 80%;
            margin: 10px auto;
            border: 1px solid #607d8b;
            border-radius: 5px;
            font-size: 16px;
            line-height: 3rem;
        }

        .Delivery span {
            color: red;
        }
    </style>
</head>

<body>
    <?php include('./header.php'); ?>

    <div class="Bookmark">
        <a href="./index.php">寵愛NEE</a>
        <span>/</span>
        <a href="">配送服務</a>
    </div>
    <section class="Delivery">
        <h1><b>配送服務</b></h1>
        <div class="mt-3 mb-4">
            <b>配送費用</b>
            <h5>基本運費：</h5>
            <div class="mb-3">
                $2,000(含)以上宅配免運；$2,000以下酌收$150宅配費用。<br /> 以訂單為計算單位，以一次運送為基準。
                <br /> 在一般情況下，宅配商品將在訂單完成後3個工作日內完成運送。
                <br /> ※基本運費包含小型家電/生活用品/廚房器具/配件耗材
            </div>
            <div class="mb-2">
                大型家電/崁入式家電免運費 <br /> 大型家電/崁入式家電配送商品，將有專人透過電話與你聯繫安排運送日期與時段，並在訂單完成後7個工作日內完成運送， 如遇週末或國定例假日將不進行配送。
                <br /> 指定跨區：限花蓮、台東、外島(金、馬、澎)不提供配送。 <br /> 吊車費用：視現場情況額外收費。
                <br /> 預購商品：均以您下單時，專人所提供的出貨日為主，煩請多加留意。
            </div>
            <div>
                ※請見諒。如我們未能在訂購日起 <span style="color: red">3</span> 個工作日內與你取得聯繫並安排送貨，我們將取消該筆訂單。
            </div>
        </div>
        <div class="mb-3">
            <b>配送時間</b>
            <div class="mb-3">
                欲更改<strong>運送日期、時段</strong>或<strong>運送地址</strong>，請於訂單成立後即無法再修改訂單內容， 若有異動，須來電請於訂單成立後的 <span style="color: red">隔日早上9點</span> 前致電寵愛NEE線上購物客服專線
                <span style="color: red">04-XXXXX</span>；更改運送地址若導致運送服務費用的差異， 則需補足不足額之運送服務費用。
            </div>

            <div>
                ※ 提醒你，針對貨運配送商品，訂購商品若經配送一次無法送達，且經無法聯繫超過 <span style="color: red">3</span> 個工作日者，我們將與你聯繫安排退款事宜，但因運送服務屬勞務性質，
                <span style="color:red">運費部分將無法退還</span>。 若因送貨地址無人收貨而需重新安排送貨，顧客須負擔第二次配送的運費。
            </div>
        </div>
        <div class="mb-3">
            <b>安裝服務</b>
            <div>
                崁入式家電不含基本安裝費 <br> 大家電含基本安裝費-1.5公尺以內，其超過機器之電源線、進(排)水管延長與牆壁鑽洞部分，其他服務則視現場情況酌收工本費。 <br> 如有任何問題，請來信客服或撥打寵愛NEE線上購物客服專線，我們將由專人為您服務。
            </div>
        </div>

        <div class="mb-3">
            <b>搬運丈量服務</b>
            <div>
                大型家電/崁入式家電搬運時，將由專人為您提供尺寸丈量的需求。
            </div>
        </div>

        <div class="mb-3">
            <b>舊家電回收</b>
            <div>
                舊家電處理(洗衣機/電冰箱/其他)，將由專人與您電話聯繫，依現場狀況判讀是否酌收相關費用。<br /> 若需當地清潔隊協助回收，免付費清運專線0800-085-717。
            </div>
        </div>

        <div class="mb-3">
            <b>一般訂單配送</b>
            <div>
                小型家電/生活用品/廚房器具/配件耗材，將委由物流公司配送。 若訂單需要修改或是訂單中有商品短缺，我們會與您電話聯繫。
            </div>
        </div>

        <div class="mb-3">
            <b>大型家電/崁入式家電訂單配送</b>
            <div>
                大型家電/崁入式家電訂單，將由專員聯繫您確認相關尺寸，再委由物流公司聯絡配送時間與日期。<br /> 若訂單需要修改或是訂單中有商品短缺，我們會再與您電話聯繫。
                <br /> 物流可配送日期須視配送區域、配送車行程及商品庫存狀況而定。
            </div>
        </div>

    </section>


    <?php include('./footer.php') ?>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>