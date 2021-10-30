<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>

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

        .QA {
            width: 80%;
            margin: 10px auto;
            border: 1px solid #607d8b;
            border-radius: 5px;
            font-size: 16px;
            line-height: 3rem;
        }

        .QA span {
            color: red;
        }
    </style>
</head>

<body>

    <?php include('./header.php'); ?>

    <div class="Bookmark">
        <a href="./index.php">寵愛NEE</a>
        <span>/</span>
        <a href="">常見問題</a>
    </div>
    <section class="QA">
        <h1><b>問與答FAQ</b></h1>
        <div class="mt-3 mb-4">
            <b>會員權益</b>
            <div class="mb-3">
                <b>如何註冊成為會員？</b>
                <div class="mb-3">
                    只要完成以下幾個簡單的步驟，你就可以註冊成為寵愛NEE線上購物會員：
                </div>
                <ol>
                    <li>
                        點選首頁右上方的「登入」。
                    </li>
                    <li>輸入「姓名」「手機」並確認「驗證碼」及設定「密碼」後，根據網站導引進行註冊，點選「加入會員」。</li>
                    <li>待資料送出後，系統會自動發出會員確認信函，您即可成為正式會員。</li>
                </ol>
            </div>
            <div class="mb-3">
                <b>如何修改會員資料及密碼?</b>
                <div>
                    點選首頁右上方的「登入」，登入會員後在「會員專區」的「基本資料」修改編輯您的基本資料即可。（提醒您：生日無法修改）
                </div>
            </div>
            <div class="mb-3">
                <b>忘記密碼怎麼辦？</b>
                <div>
                    點選首頁右上方的「登入」，於「登入」頁面，直接點選「忘記密碼」， 系統將透過E-mail發送新密碼提醒至您的信箱。若仍有問題，煩請聯絡客服信箱或客服專線
                    <span>04-XXX XXX</span> 。
                </div>
            </div>
            <div class="mb-3">
                <b>手機帳號及驗證碼有問題怎麼辦？</b>
                <div>
                    請聯繫客服專線 <span>04-XXX XXX</span> ，將有專人為您服務。
                </div>
            </div>
            <div class="mb-3">
                <b>生日輸入錯誤怎麼辦？</b>
                <div>
                    如需更改生日，請聯繫客服專線 <span>04-XXX XXX</span> ，並提供證明文件。
                </div>
            </div>
        </div>
        <div class="mb-3">
            <b>訂單查詢</b>
            <div class="mb-3">
                <b>如何查詢訂單？</b>
                <div>
                    您可至「會員專區」的「訂單資料」查詢。
                </div>
            </div>
            <div class="mb-3">
                <b>訂單確認後是否可以修改？</b>
                <div>訂單成立後即無法再修改訂單內容，若有異動， 須來電請於訂單成立後的隔日早上9點前致電寵愛NEE線上購物客服專線 <span>04-XXXX XXXX</span> ； 申請退訂，並重新訂購。
                </div>
            </div>
            <div class="mb-3">
                <b>沒有收到訂單確認信/ 簡訊怎麼辦？</b>
                <div>
                    請聯繫客服專線 <span>04-XXXX XXXX</span> ，將有專人為您服務。
                </div>
            </div>
            <div class="mb-3">
                <b>網路上訂購可以享實體店面的活動優惠嗎？</b>
                <div>
                    線上購物優惠與實體店面不完全相同，請以公告為準。
                </div>
            </div>
            <div class="mb-3">
                <b>如何取消訂單？</b>
                <div>
                    訂單送出後無法取消。如有訂單問題，請聯繫客服信箱及客服專線 <span>04-XXXX XXXX</span> ，將有專人為您服務。
                </div>
            </div>
        </div>
        <div class="mb-3">
            <b>付款發票</b>
            <div class="mb-3">
                <b>若付款完成後，沒有收到確認Email，應該怎麼處理?</b>
                <div>付款完成後，我們將會發送訂單確認信至你的電子信箱；如未接獲確認Email，請檢查「垃圾郵件匣」。 如仍無法尋獲相關Email，請聯繫客服信箱及寵愛NEE線上購物客服專線 <span>04-XXXX XXXX</span> 。
                </div>
            </div>
            <div class="mb-3">
                <b>線上購物可使用紙本優惠券或禮券嗎?</b>
                <div>
                    我們目前只接受刷卡付款，無法使用禮券或優惠券，請見諒。
                </div>
            </div>
            <div class="mb-3">
                <b>線上購物提供哪些發票選擇?</b>
                <div class="mb-3">
                    寵愛NEE線上購物使用電子發票，提供的類型有：
                </div>
                <ol>
                    <li>
                        二聯式電子發票(個人消費者（自然人）、無統一編號的機關團體、外國公司)： 將於商品出貨後 1-2 日之內，以Email方式發送發票開立通知。由於電子發票是以託管方式管理，不會隨貨附上發票。
                    </li>
                    <li>
                        三聯式電子發票 (統一編號的公司、機關團體)：將於商品出貨後 1-2 日之內，以Email方式發送發票開立通知。 由於電子發票是以託管方式管理，不會隨貨附上發票。
                    </li>
                    <li>
                        電子發票紙本發票索取：申請後將於商品出貨後7-10日以平信的方式寄出，不會隨貨附上紙本發票。發票日期將以出貨日期為準。
                    </li>
                </ol>

                ※根據財政部令「電子發票實施作業要點」，於寵愛NEE線上購物消費將開立 「二聯式電子發票」，不主動寄送紙本發票，寵愛NEE線上購物亦會將發票號碼上傳至「財政部電子發票整合服務平台」。 您可依據選擇之載具查詢，相關資料請參考該平台網站說明
                <a href="https://www.einvoice.nat.gov.tw">https://www.einvoice.nat.gov.tw</a>

            </div>
            <div class="mb-3">
                <b>一筆訂單可以開立多張發票嗎?</b>
                <div>
                    由於配合整個電子請款結帳，故一筆訂單對應一張發票，恕無法分別開立多張 發票。
                </div>
            </div>
            <div class="mb-3">
                <b>電子發票可否指定開立日期、更改品名或金額?</b>
                <div>
                    因訂單發票印製為系統自動作業，發票上之產品名稱將依訂購的品名和金額進行開立， 恕無法指定開立特定日期、更改品名或金額。
                </div>
            </div>
            <div class="mb-3">
                <b>電子發票可否申請換開為二聯式(個人戶)或三聯事(企業戶)電子發票?</b>
                <div>
                    依統一發票使用辦法規定，只有書寫錯誤才能換開；電子發票無論二聯或三聯式是無法換開。 發票一經開立，對於買方名稱及統一編號不得任意更改或應買方要求改開其他營利事業及統一編號，煩請填寫時，特別留意。
                </div>
            </div>
            <div class="mb-3">
                <b>電子發票沒有顯示抬頭，是否可以加開抬頭?</b>
                <div>
                    配合財政部新版電子發票格式，目前電子發票證明聯一律無抬頭欄位，恕無法 加開抬頭，請見諒。
                </div>
            </div>
            <div class="mb-3">
                <b>收到發票，但是統一編號有錯怎麼辦?</b>
                <div>
                    發票一經開立，即無法進行變更。線上購物之發票若因寵愛NEE線上購物原因導致發票抬頭、內容或金額錯誤， 請於發票開立日的次月五日前聯繫客服人員為你安排更換發票事宜，往返快遞費用由寵愛NEE線上購物承擔。 若因顧客個人原因導致發票內容錯誤，我們將無法提供發票重開，煩請填寫時，特別留意。
                </div>
            </div>
        </div>
        <div class="mb-3">
            <b>商品問題</b>
            <div class="mb-3">
                <h6>線上購物的商品庫存?</h6>
                <div>
                    系統自動更新的實際存貨量為準。
                </div>
            </div>

            <div class="mb-3">
                <b>是否顯示缺貨產品?</b>
                <div>
                    目前缺貨商品無法於線上訂購，可選擇至鄰近有貨專櫃購買，或等待到貨時進行線上下單。
                </div>
            </div>
            <div class="mb-3">
                <b>如果訂錯商品或是想退補差額換購商品，是否提供換貨服務嗎?</b>
                <div>
                    目前尚未提供換貨服務或是退補差額換購其它商品之服務，請見諒。 若訂錯商品或商品不滿意，可於收到商品的次日起，計算七個工作日，可申請退貨 。
                </div>
            </div>
            <div class="mb-3">
                <b>如果商品有瑕疵，是否提供換貨服務嗎?</b>
                <div>
                    若收到商品有任何瑕疵，煩請聯繫寵愛NEE線上購物客服專線 <span>04-XXX XXX</span> ， 將由專人為您服務，若超過七日鑑賞期 (含例假日) 內，請恕無法接受換貨服務。為免爭議發生，請於到貨後確實驗收。
                </div>
            </div>
            <div class="mb-3">
                <b>官網的商品售價與各分店是否一致?</b>
                <div>
                    是的，商品售價一致。
                </div>
            </div>
            <div class="mb-3">
                <b>補貨中的商品何時進貨？</b>
                <div>
                    進貨時間依各商品有所不同，如您喜歡的商品顯示補貨中，須待商品進貨時系統會自動補貨上架。
                </div>
            </div>
            <div class="mb-3">
                <b>請問商品使用後如果有維修需求該如何處理？</b>
                <div class="mb-3">
                    若商品尚在保固期間內而本身有瑕疵(非外力造成的損壞)，請聯繫各區維修中心，將有專員為您服務。
                </div>
                <ul>
                    <li>
                        台北維修中心 (02) 2627-2199
                    </li>
                    <li>
                        新竹聯絡處(03)553-4998
                    </li>
                    <li>
                        台中聯絡處(04)2381-8388
                    </li>
                    <li>
                        高雄聯絡處(07)550-5398
                    </li>
                </ul>
            </div>
            <div class="mb-3">
                <b>商品保固期有多久？</b>
                <div>
                    各類商品之維修與保固依原廠規定。如有相關問題，請聯繫客服信箱或客服專線 <span>04-XXXXXX</span> ，將有專人為您服務。
                </div>
            </div>
        </div>
        <div class="mb-3">
            <b>退貨退款</b>
            <div class="mb-3">
                <h6></h6>
                <div></div>
            </div>
            <div class="mb-3">
                <b>退貨處理</b>
                <div class="mb-3">
                    依照消費者保護法規定，寵愛NEE線上購物皆享有商品到貨「七天鑑賞期」之權益。收到商品的次日起，計算七個工作日，可申請退貨。
                    <br /> 若收到商品有任何瑕疵，煩請聯繫寵愛NEE線上購物客服專線 <span>04-XXX XXX</span> ，將由專人為您服務， 若超過七日鑑賞期 (含例假日) 內，請恕無法接受換貨服務。為免爭議發生，請於到貨後確實驗收。
                </div>
                <div>※提醒您：</div>
                <ol>
                    <li>
                        商品退貨時必須為全新狀態且完整包裝(包含商品主體、附件、內外包裝、隨附文件、贈品等）， 故需請您保持商品、附件、包裝、廠商紙箱及所有隨附文件資料的完整，以寄送時的包裝再原封備妥， 若有相關贈品請一併退回，原廠外盒損毀、商品缺件、超過7天鑑賞期或是包材不完整、明顯有組裝痕跡致無法再次進行銷售者， 恕無法受理退貨及退款。
                    </li>
                    <li>
                        寵愛NEE線上購物目前未提供換貨服務，請於收到商品的次日起，計算七個工作日，可申請退貨。
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
                <div>
                    ※下列情形將可能影響您的退貨權益：
                </div>
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
                <b>退款須知</b>
                <ul>
                    <li class="mb-3">
                        訂單成立後部分退貨：
                        <div class="mt-1">
                            若訂單金額使用折價優惠，則無法再次使用折價券，並於退款金額扣除訂單折價優惠。
                        </div>
                    </li>
                    <li class="mb-3">
                        ※提醒您：<br /> 訂單成立後全部退貨：
                        <div class="mt-1">
                            若訂單金額使用折價優惠，則無法再次使用折價券，並於退款金額扣除訂單折價優惠。
                        </div>
                    </li>

                    <li class="mb-3">
                        訂單取消退貨：
                        <div class="mt-1">
                            原訂單折價優惠(含生日優惠、行銷優惠等)恕不返還再次使用。
                        </div>
                    </li>

                    <li class="mb-3">
                        訂單成立後有合購組合商品/滿額加價購/多件優惠價時：
                        <div class="mt-1">
                            您必須將活動商品全數退貨，恕無法接受單一品項退貨。
                        </div>
                    </li>
                </ul>
            </div>

            <div class="mb-3">
                <b>物流取貨</b>
                <div>
                    我們將於 <span>3</span>個工作天通知物流公司與您收取商品，收回商品後確認退貨商品完整及相關資料無誤進行刷退。
                </div>
            </div>

            <div class="mb-3">
                <b>退款處理</b>
                <div>
                    退貨包裏完成收件後，約 <span>XXXX</span> 個工作天完成退款作業。 <br /> 退刷至原信用卡帳戶中，由於完成退刷後，銀行間的作業處理約需7~14天， 也因個人信用卡的結帳週期不同而影響退刷款項完成時間（負項可能會列在下期的帳單上）。 關「店家已刷退後的作業時間」，可洽詢您的信用卡發卡行。
                </div>
            </div>
        </div>

    </section>


    <?php include('./footer.php') ?>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>