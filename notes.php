<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物須知</title>

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

        .Notes {
            width: 80%;
            margin: 10px auto;
            border: 1px solid #607d8b;
            border-radius: 5px;
            font-size: 16px;
            line-height: 3rem;
        }

        .Notes span {
            color: red;
        }
    </style>
</head>

<body>
    <?php include('./header.php'); ?>
    <div class="Bookmark">
        <a href="./index.php">寵愛NEE</a>
        <span>/</span>
        <a href="">購物須知</a>
    </div>
    <section class="Notes">
        <h1><b>購物須知</b></h1>
        <div class="mb-3">
            <b>購物流程 (須再與夏木樂確認購物流程)</b>
            <div class="p-3">
                <div class="mb-3">
                    Step1．選購商品：您可以透過網頁引導或搜尋的方式找到您要的商品，再點選 加入購物車。
                </div>
                <div class="mb-3">
                    Step2．確認身份：如已是會員請輸入帳號及密碼。非會員請先註冊成為寵愛NEE線上購物會員。
                </div>
                <div class="mb-3">
                    Step3．選擇運送、付款方式：選擇您所需的付款及運送方式並確認各項訂購及 出貨資料。
                </div>
                <div class="mb-3">
                    Step4．完成結帳：完成訂單結帳流程並詳閱注意事項。
                </div>
                <div class="mb-3">
                    ※如您訂購大型家電/崁入式家電，專員將於訂購內 <span>3</span>個工作日與您電話聯絡確認訂單內容。
                </div>
            </div>
        </div>
        <div class="mb-3">
            <b>註冊會員</b>
            <div>
                請先點選頁面下方<br /> 輸入您的「姓名 」、「手機」、「Email」、設定一組「密碼」便完成註冊。
            </div>
        </div>

        <div class="mb-3">
            <b>付款方式</b>
            <div>
                我們的付款方式有二種：線上刷卡或是超商代碼，您可以選擇最便利的方式付款。
                <div class="p-3">
                    <b>線上刷卡/分期付款</b>
                    <div class="mb-3">
                        線上刷卡: 線上信用卡付款可使用VISA、Master、JCB信用卡進行線上刷卡付款或滿額分期付款， 僅限以銀行信用卡付款(不受理郵政金融卡；銀行VISA卡視各銀行是否與聯合信用卡中心合作而定)
                    </div>
                    <div>
                        ※使用分期付款之訂單如需退貨，僅接受整筆訂單所有商品退貨，無法接受部分 商品退貨。
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <b>七天鑑賞期</b>
            <div>
                依照消費者保護法規定<br /> 寵愛NEE線上購物皆享有商品到貨「七天鑑賞期」之權益。 收到商品的次日起，計算七個工作日，可申請退貨若收到商品有任何瑕疵， 煩請聯繫客服信箱或客服專線 <span>04-XXX XXX</span> ，將由專人為您服務，若超過七日鑑賞期 (含例假日) 內， 請恕無法接受換貨服務。為免爭議發生，請於到貨後確實驗收。
            </div>
        </div>
        <div class="mb-3">
            <b>※提醒您： </b>
            <ol>
                <li>商品退貨時必須為全新狀態且完整包裝(包含商品主體、附件、內外包裝、隨附文件、贈品等）， 故需請您保持商品、附件、包裝、廠商紙箱及所有隨附文件資料的完整，以寄送時的包裝再原封備妥， 若有相關贈品請一併退回，原廠外盒損毀、商品缺件、超過7天鑑賞期或是包材不完整、 明顯有組裝痕跡致無法再次進行銷售者，恕無法受理退貨及退款。
                </li>
                <li>
                    寵愛NEE線上購物目前未提供換貨服務，請於收到商品的次日起，計算七個 工作日，可申請退貨 。
                </li>
                <li>
                    需保留原購買發票。
                </li>
                <li>
                    已安裝的大小家電，將無法辦法退貨。
                </li>
                <li>
                    已配送後的崁入式家電/大家電，因運送服務屬勞務性質，基本安裝費、吊車費用、舊家電回收費將無法退還。
                </li>
                <li>
                    辦理崁入式家電/大家電退貨，請於收到商品七日內來信客服或撥打寵愛NEE客服專線，我們將由專人為您服務。
                </li>
                <li>
                    寵愛NEE線上購物有權拒絕超出退貨期限寄送的商品，或商品狀態與所收到狀態不相同的退貨。
                </li>
                <li>
                    目前恕不接受至實體門市或取貨點辦理退貨。
                </li>
            </ol>
        </div>
        <div class="mb-3">
            <b>※下列情形將可能影響您的退貨權益： </b>
            <ol>
                <li>
                    商品包裝毀損、封條移除、吊牌拆除、貼膠移除、標籤拆除或已安裝家電、使用等情形。
                </li>
                <li>
                    其他逾越檢查之必要或可歸責於買受人或收件人之事由，致商品有毀損、滅失或變更者。
                </li>
                <li>
                    <span>鑑賞期非試用期</span>，若您收到商品經必要之檢視後有任何不合意之處，請勿拆開使用，請依照退貨規定辦理退貨。
                </li>
            </ol>
        </div>
        <div class="mb-3">
            <b>訂購前注意事項</b>
            <ol>
                <li>
                    基本運費：$2,000(含)以上宅配免運；$2,000以下酌收$150宅配費用。 <br /> 以訂單為計算單位，以一次運送為基準。 <br /> 在一般情況下，宅配商品將在訂單完成後 <span>3</span>個工作日內完成運送。<br /> ※基本運費包含小型家電/生活用品/廚房器具/配件耗材/
                    <span>福利出清</span> <br /> 大型家電/崁入式家電免運費
                </li>
                <li>
                    如您訂購大型家電/崁入式家電，專員將於訂購內 <span>3</span>個工作日與您電話聯絡確認訂單內容。
                </li>
                <li>
                    訂單成立後即無法再修改訂單內容，若有異動，須來電請於訂單成立後的隔日早上9點前 致電寵愛NEE線上購物客服專線 <span>04-XXXXX</span> 申請退訂，並重新訂購。
                </li>
                <li>
                    結帳前請您務必確認訂單內容以及是否接受配送貨運所需等待時間，避免耽誤配貨及運送狀況。
                </li>
                <li>
                    因拍攝燈光、電腦解析度、可能會造成實品與網頁上商品有些許色差，商品以收到的實品為主。
                </li>
                <li>
                    訂購前請確認商品尺寸，大型物件因為人工丈量，難免有些許誤差值(約正負2cm)，詳細尺寸以實品為主。
                </li>
                <li>
                    如您付款方式為分期付款，因銀行端無法配合部分分期退款，故我們僅提供訂單整筆全部退款／退貨服務。
                </li>
            </ol>
        </div>

    </section>

    <?php include('./footer.php') ?>


</body>

</html>