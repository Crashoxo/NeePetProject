<?php
include('header.php');
if (isset($_SESSION['name']))
    header("Location: ./homepage.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======================== link font or icon setting =============================  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">


    <!-- ======================== CSS setting =============================  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="./css/style.css" rel="stylesheet">


    <!-- ======================== JS setting =============================  -->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="./js/loading.js"></script> -->
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

    <!-- ======================== title icon setting =============================  -->
    <link rel="icon" href="./img/logo2.jpg">

    <title>寵愛NEE</title>

    <style>
        /* .header-nav {
            position: relative;
        } */
    </style>

</head>


<body>
    <section class="BgImg">
        <div class="Login">
            <div class="ImgBox">
                <img src="./img/布偶貓3.png" alt="">
            </div>
            <div class="ContenBox">
                <div class="FormBox">
                    <h2>登入</h2>
                    <form action="loginC.php" method="POST" id='login' name='login'>
                        <div class="InputBox BorderBox">
                            <span>會員信箱</span>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="InputBox">
                            <span>會員密碼</span>
                            <div class="SeeBox">
                                <input type="password" name="password" id="userpassword" required>
                                <i class="fa fa-eye-slash" aria-hidden="true" id="SeeMe"></i>
                            </div>
                        </div>
                        <div class="Remember">
                            <!-- <label><input type="checkbox" name="" id="">記住我</label> -->
                            <?php

                            // 忘記密碼用
                            if (isset($_GET["password"]))
                                echo "<span>您的密碼是：" . $_GET['password'] . "</span>";
                            if (isset($_GET["error"]))
                                if ($_GET["error"] == 0)
                                    echo "<span style='color:red;'>該信箱未註冊！</span>";
                                else
                                    echo "<span style='color:red;'>密碼錯誤！</span>";
                            ?>
                            <div class="Forget">
                                <p><a onclick="ForgetMyPassword()">忘記密碼?</a></p>
                            </div>
                        </div>
                        <div class="InputBox BorderBox">
                            <input type="submit" value="登入" name="" id="">
                        </div>
                        <div class="InputBox BorderBox">
                            <p>沒有會員? <a onclick="register()">註冊</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="Register">
            <div class="ContenBox">
                <div class="FormBox">
                    <h2>註冊</h2>
                    <form action="regisC.php" method="POST" id='regis' name='regis' onsubmit="return check_data2();">
                        <div class="InputBox BorderBox">
                            <span>會員姓名*</span>
                            <input type="text" name="name" id="" required>
                        </div>
                        <div class="InputBox BorderBox">
                            <span>會員信箱*</span>
                            <input type="email" name="email" id="" required>
                        </div>
                        <div class="InputBox">
                            <span>會員密碼*</span>
                            <div class="SeeBox">
                                <input type="password" name="password" id="userpassword2" required>
                                <i class="fa fa-eye-slash" aria-hidden="true" id="SeeMe2"></i>
                            </div>
                        </div>
                        <div class="InputBox">
                            <span>確認密碼*</span>
                            <div class="SeeBox">
                                <input type="password" name="password_check" id="userpassword3" required>
                                <i class="fa fa-eye-slash" aria-hidden="true" id="SeeMe3"></i>
                            </div>
                        </div>
                        <div class="InputBox BorderBox">
                            <p>已經有帳號了? <a onclick="login1()">登入</a></p>
                        </div>
                        <hr>
                        <div class="Agree">
                            <!-- <span><a id="opener" onclick="OpenAgree()">服務條款</a></span> -->
                            <span><a id="opener">服務條款</a></span>
                            <label><input type="checkbox" required>我同意</label>
                        </div>
                        <div class="InputBox">
                            <input type="submit" value="註冊" name="" id="RegisterBtn">
                        </div>

                    </form>
                </div>
            </div>
            <div class="ImgBox">
                <img src="./img/馬爾1.jpg" alt="">
            </div>
        </div>
        <div class="ForgetMyPassword">
            <div class="ContenBox">
                <div class="FormBox">
                    <h2>忘記密碼</h2>
                    <form action="forgotC.php" method="POST" id='forgot' name='forgot'>
                        <div class="InputBox BorderBox">
                            <span>電子信箱*</span>
                            <input type="email" name="email" id="" required>
                        </div>
                        <div class="InputBox BorderBox">
                            <span>電話號碼*</span>
                            <input type="text" name="phone" pattern="[0-9]{10}" id="" title="請輸入手機號碼" required>
                        </div>

                        <div class="InputBox BorderBox">
                            <input type="submit" value="取得密碼" name="" id="">
                        </div>
                        <div class="InputBox BorderBox">
                            <p><a onclick="login2()">回登入畫面</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ImgBox">
                <img src="./img/貓貓.jpg" alt="">
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-menus">
            <div class="footer-menu__item">

                <div>

                    <img src="./img/logo2.jpg" alt="" width='190px' height='70px'>
                    <h3 class="word">輕鬆買對毛好物</h3>

                </div>

                <div>
                    <h6 class="word"><i class="fas fa-map-marker-alt mr-1"></i> 台中市南屯區公益路二段51號18樓
                    </h6>


                    <h6 class="word"><i class="fas fa-phone mr-1"></i> 02-8888-8888
                    </h6>
                    <h6 class="word">
                        平日：9:30-12:00 / 13:30-17:30
                    </h6>
                    <a href=""><i class="fab fa-instagram IG"></i></a>
                    <a href=""><i class="fab fa-facebook-square FB"></i></i></a>

                </div>
            </div>

            <div class="footer-menu__item divNone">
                <div class="footer-menu__items">
                    <div class="footer-new">
                        <a href="">最新消息</a>
                        <a href="">關於我們</a>
                        <a href="">銷售據點</a>
                        <a href="">聯絡我們</a>
                    </div>
                    <div class="footer-new">
                        <a href="">會員權益</a>
                        <a href="">購物須知</a>
                        <a href="">配送服務</a>
                        <a href="">常見問題</a>
                    </div>
                    <div class="footer-new">
                        <a href="">會員專區</a>
                        <a href="">購物條款</a>
                        <a href="">隱私權條款</a>
                        <a href="">免責聲明</a>
                    </div>
                </div>
            </div>
            <div class="footer-menu__item divNone">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.6044320422593!2d120.64881961482347!3d24.15052618439368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d9650422ae1%3A0x334dfd5796c49ff6!2z6LOH562W5pyDLeaVuOS9jeaVmeiCsueglOeptuaJgC3kuK3ljYDoqJPnt7TkuK3lv4M!5e0!3m2!1szh-TW!2stw!4v1629882259019!5m2!1szh-TW!2stw" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <div class="copyright">
            <h6>
                COPYRIGHT@2021 寵愛NEE 版權所有 All RIGHTS RESERVED
            </h6>
        </div>
    </footer>
    <div id="AgreeBox" class="AgreeBox">
        <div id="Agree_Box">
            <h1>服務條款</h1>
            <p>
                1. 引言<br> 1.1 歡迎使用寵愛NEE平台 (下稱「本網站」)。使用本網站或開設寵愛NEE帳戶 (下稱「帳戶」) 前請詳細閱讀以下服務條款，以瞭解您對於新加坡商蝦皮娛樂電商有限公司台灣分公司、其關係企業及子公司 (個別及統稱為「寵愛NEE」、「我們」或「我們的」) 的法律權利與義務。我們提供的服務（下稱「本服務」）包括 (a) 本網站、(b) 本網站及透過本網站提供使用之寵愛NEE用戶端軟體所提供的服務，以及 (c) 透過本網站或其相關服務所提供的所有資訊、連結網頁、功能、資料、文字、影像、相片、圖形、音樂、聲音、影片、訊息、標籤、內容、程式設計、軟體、應用程式服務
                (包括但不限於任何行動應用服務) (下稱「內容」)。本服務的任何新增或增強功能亦應受本服務條款的約束。這些服務條款規範您對於我們寵愛NEE所提供之服務的使用行為。
                <br> 1.2 本服務包含提供一個線上的平台服務，以為買家 (「買家」) 與賣家 (「賣家」) (統稱「您」、「使用者」或「買賣雙方」) 間的商品交易提供場所及機會。實際的銷售合約存在於買家及賣家之間，寵愛NEE不是該合約或買家與賣家其他合約之間的主體，且寵愛NEE對這些合約均不承擔義務。買賣雙方將承擔有關其間銷售合約、商品刊登、購物擔保及類似事項之全部責任。寵愛NEE不涉入使用者間之交易。寵愛NEE得預先篩選使用者或使用者所提供之內容或資訊。寵愛NEE保留依第6.4條移除任何您透過本網站所提供之內容或資訊的權利。寵愛NEE並不能確保使用者會確實完成交易。
                <br> 1.3 在成為本網站的使用者之前，您必須閱讀並接受本服務條款所包含、及連結至本服務條款之所有條款，且您必須同意隱私權政策（連結至本服務條款）中有關於處理您的個人資料之規定。<br> 1.4 寵愛NEE保留隨時因應法規要求或符合誠信原則而變更、修改、暫停或中止本網站或服務一部或全部的權利。寵愛NEE可能會以試用版發行某些服務或其功能，這些服務或功能可能無法正確運作或
                <br>如同最終發行版本般運作。寵愛NEE亦可因應法規要求或符合誠信原則而對某些功能設定限制，或限制您存取部分或全部本網站或服務之權限。<br> 1.5 寵愛NEE保留拒絕提供您存取本網站或服務之權限或允許您因任何原因開設帳戶之權利。<br> 如您使用寵愛NEE服務或開設帳戶，表示您不可撤回地接受與同意本協議之條款，包括本協議提及/或本協議超連結所提供的額外條款及政策。

                <br> 如果您不同意這些條款，請勿使用我們的服務或存取本網站。如果您未滿 18 歲或根據您所屬國家適用之法律規定得同意本協議之法定年齡（下稱「法定年齡」），您必須取得父母或法定監護人的許可方可開設帳戶，且該父母或法定監護人必須同意本協議的條款。如果您不確定是否已達到法定年齡，或不瞭解本條款所述內容，您應先尋求父母或法定監護人的協助及同意，方可開設帳戶。如果您是欲開設帳戶之未成年人的父母或法定監護人，您必須代表該名未成年人接受本協議的條款，並且承擔對本帳戶或公司服務之一切使用的責任，無論該帳戶目前已開設或稍後才會建立。
                <br> 2. 隱私權 <br> 2.1 寵愛NEE非常重視您的隱私權。為更有效地保護您的權利，我們特別在隱私權政策中詳細說明我們的隱私權作法。請審閱該隱私權政策，以瞭解寵愛NEE如何收集並使用有關您的帳戶及/或您使用服務的資訊。如您使用本服務或在本網站提供資訊，即表示您：
                <br> (a) 同意讓寵愛NEE根據隱私權政策所述方式收集、使用、揭露及/或處理您的內容和個人資料；<br> (b) 同意並了解使用者資訊的財產上權利由您與寵愛NEE共同擁有；且<br> (c) 未經寵愛NEE事前書面同意，您不得直接或間接向第三人揭露您的使用者資訊或允許任何第三人接觸或使用您的使用者資訊。<br> 2.2 使用本服務而持有其他使用者個人資料之使用者（下稱「接受方」）同意將(i) 遵守所有與該個人資料相關之個人資料保護法規；(ii) 允許被接受方收集個人資料之使用者（下稱「揭露方」）得自接受方之資料庫移除他/她的資料；以及(iii)
                允許揭露方檢視其被收集方收集之資料為何。在上述(ii)及(iii)之情形，遵守或依適用法規辦理。
                <br> 3. 有限授權 <br> 3.1 寵愛NEE授予您遵照本服務條款之條款與條件存取及使用本服務的有限且可撤回之權利。本網站中所顯示之所有專屬內容、商標、服務標章、品牌名稱、標誌及其他智慧財產（下稱「智慧財產」），均屬寵愛NEE及本網站標示之第三方所有者 (如適用) 的財產。我們並未直接或間接授予存取本網站的任一方使用或重製任何智慧財產的權利或授權，存取本網站的任一方均不得要求與其相關之任何權利、所有權或權益。使用或存取本服務即表示您同意遵守保護本服務、網站及其內容之著作權、商標、服務標章及所有其他適用的法律。您同意不得複製、散布、再發行、傳輸、公開展示、公開表演、修改、調整、租賃或販售本服務、網站或其內容之任何部分，亦不得據此創作衍生作品。如未事先獲得我們的書面同意，您亦不得用鏡像或框架方式將本網站的任何部分或完整內容放置於任何其他伺服器上或作為任何其他網站的一部分展示。此外，您同意如未事先獲得我們的書面同意（在搜尋網站使用標準的搜尋引擎技術引導網路使用者至本網站時，視為已取得我們的同意），您不會使用任何機器人程式、蜘蛛程式或任何其他自動裝置或手動程序來監視或複製我們的內容。
                <br> 3.2 我們歡迎您從您的網站連結至本網站，但前提是您的網站並未暗示獲得寵愛NEE的任何背書或與其有任何關聯。您瞭解寵愛NEE可隨時因應法規要求或符合誠信原則中止提供部分或全部的本服務。<br> 4. 軟體<br> 我們作為服務之一部分提供給您的任何軟體，均須受本服務條款之規範約束。寵愛NEE保留寵愛NEE在此未明確授予的所有權利。任何本服務連結或引用的第三方指令碼或程式碼，均是由擁有該指令碼或程式碼的第三方 (而非寵愛NEE) 授權給您使用。<br> 5.
                帳戶與安全
                <br> 5.1 本服務的部分功能必須註冊帳戶方可使用，註冊帳戶時您需要選取一組獨特的使用者識別碼 (下稱「使用者 ID」) 和密碼，並提供一些個人資訊。如果您選擇的使用者 ID 被寵愛NEE單方認定是令人反感或不適當的，寵愛NEE有權暫停或終止您的帳戶。您可以使用您的帳戶來存取我們已啟用其存取權限或與我們有聯盟或合作關係的其他產品、網站或服務。寵愛NEE未審核任何第三方內容、功能、安全、服務、隱私權政策或這些產品、網站或服務的其他規範。如果您這麼做，則這些產品、網站或服務的服務條款，包括其各自的隱私權政策
                (若與我們的服務條款及/或隱私權政策有所差異)，亦適用於您對這些產品、網站或服務之使用。
                <br> 5.2 您同意 (a) 對您的密碼保密且只在登入時使用您的使用者 ID 與密碼，(b) 確保在每次網站使用階段結束時登出您的帳戶，(c) 在您的帳戶、使用者 ID 及/或密碼遭受未經授權的使用時立即通知寵愛NEE，以及(d) 確保你的帳號資訊正確且即時。您必須對在您的使用者 ID 和帳戶下所發生的所有活動負完全的責任，即使您並非該活動或使用的執行者。對於任何因密碼遭到非授權使用而產生的損失或損害，依第32.15條之規定負擔。
                <br> 5.3 您同意寵愛NEE可因應法規要求或符合誠信原則另行通知您立即終止您的帳戶和您的使用者ID，並將與您的帳戶和使用者ID有關的任何內容自本網站上移除，撤銷任何對您的補助，取消與您的帳戶和您的使用者ID有關的交易，暫停或情節嚴重時永久停止任何撥款或退款，及/或其他任何寵愛NEE認為必要的措施。寵愛NEE亦將向您說明採取這類措施的理由，包括但不限於寵愛NEE認定存在或合理懷疑有下列任何情形之一：(a)長時間不活動（指您未登入您的帳戶）；(b)違反本服務條款的約定；(c)有相當事證足認使用者有詐欺、騷擾、誹謗、威脅、侮辱或其他非法行為；(d)擁有多個使用者帳戶；(e)支付款項經法院裁定或檢察官命令扣押；(f)使用者提交虛偽之身分認證資料，經查證屬實；(g)為了商業轉售目的而於本網站購買商品；(h)異常或過量地向同一賣家或有關聯的賣家採購商品；(i)濫用折扣碼(包括但不限於出售折扣碼予第三人、面額顯著加價後轉售折扣碼或其他儲值點數、異常或過量地於本網站使用折扣碼)；或(j)有害於其他使用者、第三方或寵愛NEE商業利益的行為(例如虛偽買賣、濫用免運或折扣等)。若您將帳戶用於詐欺、騷擾、誹謗、威脅、侮辱或其他非法之用途，我們可在未通知您的情況下向執法機關呈報。
                <br> 5.4 消費者得依雙方約定之方式隨時終止契約。如果使用者想要終止其帳戶，可以書面方式 (電子郵件請寄至：help@support.lovenee.tw) 通知寵愛NEE。即使帳戶已終止，使用仍應對任何未完成的交易 (無論是在終止之前或之後展開的交易)、產品運送、支付產品款項或類似事宜負責，且使用者必須在其根據本服務條款迅速且有效地履行及完成所有未完成交易後，聯絡寵愛NEE。對於根據本條款而採取之行動所產生的任何損害，寵愛NEE概不負責。使用者放棄任何及所有對寵愛NEE所採取之任何這類行動的索賠。
                <br> 5.5 您得使用本服務及/或開設帳戶，如您位於我們目前許可的國家之一。<br> 6. 使用條款 <br> 6.1 本網站和服務的使用授權在終止前皆有效。如發生本服務條款所載之終止事由或是您未遵循本服務條款之任何條款或條件的情況時，此授權將會終止。在這些情況下，寵愛NEE可另行通知您逕行終止授權。<br> 6.2 您同意不會：<br> (a) 上傳、張貼、傳送或以任何其他形式提供任何違法、傷害、威脅、侮辱、騷擾、危言聳聽、令人痛苦、扭曲、誹謗、粗俗、淫穢、詆毀、侵犯他人隱私、憎恨、種族歧視或在道德上或其他方面令人反感的內容；<br> (b) 違反任何法律（包括但不限於進出口限制相關法規）、第三方權利或我們的「禁止和限制商品政策」；<br> (c) 上傳、張貼、傳送或以任何其他形式提供未成年人獨處或由其主導的內容，以任何方式使用本服務傷害未成年人；<br> (d) 使用本服務冒充任何人或實體，或虛報您與任何人或實體的關係；<br> (e) 偽造標題或操弄識別方式，以混淆透過本服務傳送之任何內容的來源；<br> (f) 從本網站上移除任何所有權標示；<br> (g) 在未經寵愛NEE明確許可的情況下，致使、准許或授權修改、創作衍生著作或翻譯本服務；<br> (h) 為任何第三方之利益或非本條款授予許可的任何方式使用本服務；<br> (i) 將本服務使用於詐欺用途；<br> (j) 註冊及/或使用多個使用者帳戶，與任何違反本服務條款文義或規範精神之活動有關；<br> (k) 以非寵愛NEE官方硬體或軟體(包括但不限於模擬器、仿真器、機器人或其他類似硬體或軟體)使用寵愛NEE平台、註冊使用者帳戶或登入使用者帳戶；<br> (l) 操控任何商品價格或干擾其他使用者的刊登行為；<br> (m) 採取任何會破壞反饋或排名系統的行動；<br> (n) 試圖解碼、反向工程、拆解或駭入本服務 (或其任何部分)，或試圖破解寵愛NEE針對本服務及/或寵愛NEE所傳輸、處理或儲存之資料所採取的任何加密技術或安全措施；<br> (o) 採集或收集有關其他帳戶所有人的任何資訊，包括但不限於任何個人資料或資訊；<br> (p) 上傳、以電子郵件寄送、張貼、傳送或以其他形式提供任何您依據任何法律或契約或信任關係(例如由於僱傭關係和依據保密合約所得知或披露之內部資訊、專屬及機密資料) 無權提供之內容；<br> (q) 上傳、以電子郵件寄送、張貼、傳送或以任何其他形式提供侵害任一方之任何專利、商標、營業祕密、著作權或其他專屬權利的任何內容；<br> (r) 上傳、以電子郵件寄送、張貼、傳送或以其他形式提供任何未經請求或未經授權的廣告、促銷資料、垃圾郵件、廣告信件、連鎖信、金字塔騙局或其他任何未經授權形式的推銷內容；<br> (s) 上傳、以電子郵件寄送、張貼、傳送或以其他形式提供任何含有意圖直接或間接干擾、操縱、中斷、破壞或限制任何電腦軟體、硬體、資料或通訊設備功能或完整性之電腦病毒、蠕蟲、木馬或任何其他電腦代碼、常式、檔案或程式的資料；
                <br> (t) 破壞正常的對話流程、造成螢幕快速捲動致使本服務其他使用者無法打字，或對其他使用者參加即時交流的能力造成負面影響；<br> (u) 干擾、操縱或破壞本服務或與本服務連線之伺服器或網路或任何其他使用者對本服務之使用或享受，或不遵守本網站連線網路之任何規定、程序、政策或規範；<br> (v) 採取或參與任何可能直接或間接造成本服務或與本服務連線之伺服器或網路損害、癱瘓、負載過重或效能降低的行動或行為；<br> (w) 使用本服務以蓄意或非蓄意地違反任何適用的當地、州、國家或國際法律、規定、守則、指令、準則、政策或規範，包括但不限於任何與反洗錢或反恐怖主義相關的法律和規定
                (無論是否具有法律效力)；
                <br> (x) 以違反或規避由美國財政部外國資產管制辦公室、聯合國安全理事會、歐盟或其財政機關所主管或執行之處罰或禁運的方式使用本服務；<br> (y) 使用本服務侵犯他人隱私、跟蹤或以其他方式騷擾他人；<br> (z) 侵犯寵愛NEE的權利，包括智慧財產權和相關仿冒行為；<br> (aa) 以前述禁止之行為和活動使用本服務以收集或儲存其他使用者之個人資料；及/或<br> (bb) 刊登侵犯第三方著作權、商標或其他智慧財產權的項目，或以侵害他人智慧財產權的方式來使用本服務；<br> (cc) 聯繫寵愛NEE客服時，使用具攻擊性、不雅、猥褻意涵之字句，或涉及對寵愛NEE及所屬員工進行騷擾、誹謗、侮辱、言論攻擊等影響寵愛NEE客服作業的行為。<br> 6.3 您瞭解所有內容，無論其為公開張貼或私下傳送，均為該內容提供者之責任。亦即，您應對您透過本網站上傳、張貼、以電子郵件寄送、傳送或以其他方式提供之所有內容(包括但不限於內容之任何錯誤或遺漏)負完全責任，而非寵愛NEE。您瞭解使用本網站時，您可能會接觸到具攻擊性、不雅或令人不悅之內容。
                <br> 6.4 您理解寵愛NEE和其受託人有權 (但無義務且不因此對您承擔任何責任)因應法規要求或符合誠信原則預先篩選、拒絕、刪除、移除或移動任何透過本網站提供的內容（包括但不限於您透過本網站所提供之內容或資訊），例如寵愛NEE和其受託人有權移除任何 (i) 違反本服務條款或禁止和限制商品政策的內容；(ii) 遭其他使用者投訴的內容；(iii) 我們收到其侵害智慧財產權之通知或指控或其他要求或請求移除的法律指示之內容；或 (iv) 會造成他人反感的內容。此外，我們亦可能為了保護本服務或我們的使用者，或為了實行本條款與條件之規定，而封鎖進出本服務的通訊傳遞
                (包括但不限於狀態更新、貼文、訊息及/或聊天室)。您同意您了解且已評估使用任何內容的所有相關風險，包括但不限於對於這類內容之正確性、完整度或實用性的倚賴
                <br> 6.5 您承認、允許並同意，若依法律要求，或根據法院命令或對寵愛NEE有管轄權之任何政府或監督主管機關之合法處分，或基於善意及誠信原則認有合理之必要性時，寵愛NEE得存取、保存及/或揭露您的帳戶資訊和內容予任何法定或政府主管機關、相關權利人或其他第三方，以：(a) 遵守法律程序；(b) 執行本服務條款或禁止和限制商品政策；(c) 回應任何侵害第三方權利（包括智慧財產權）的內容之申訴；(d) 回應您的客戶服務請求；或者 (e) 保護寵愛NEE、其使用者及公眾的權利、財產或人身安全。
                <br> 7. 違反我們的服務條款 <br> 7.1 違反此政策可能導致一系列處分動作，包括但不限於下列任何或全部項目：<br> - 刪除刊登商品<br> - 限制帳戶權限<br> - 中止帳戶及隨後終止<br> - 刑事訴訟<br> - 民事求償，包括但不限於請求損害賠償及/或聲請保全處分<br> 7.2 如果您發現本網站的任何使用者違反本服務條款，請聯絡 help@support.lovenee.tw 。<br> 8. 侵害智慧財產權之通知 <br> 8.1 如前述，寵愛NEE不允許刊登項目侵害屬於品牌或智慧財產權所有人（下稱「IPR所有人」）之智慧財產權。<br> 8.2 除另有明示排除外，使用者為獨立的個體或事業，與寵愛NEE無任何關聯，且寵愛NEE非使用者的代理人或代表人，亦不持有或擁有任何本網站上刊登的商品。<br> 8.3 如果您為IPR所有人或取得IPR所有人合法授權的代理人（下稱「IPR代理人」），且您認為您或您的委託人的作品 (在本服務中) 遭到複製、展示或散布之情形已構成侵害智慧財產權已遭受侵害之行為，請以電子郵件通知我們：help@support.lovenee.tw，另請提供下列所需資料以支持您的主張。請給予我們時間處理資料，寵愛NEE將於可行範圍內盡速回覆您的通知。
                <br> 8.4 依本條所為的侵權通知必須以寵愛NEE指定的格式（寵愛NEE得隨時更新）提供，並確實附上至少下列所有資料：(a)IPR所有人或IPR代理人代理人（下合稱「通知者」）的實體或電子簽名；(b) 主張遭到侵害之智慧財產權的種類和本質的描述，以及該權利的證明；(c) 對主張遭到侵害之智慧財產權本質的描述需附上充分細節足以讓寵愛NEE評估侵權通知; (d) 包含所指侵權內容的具體刊登商品URL網址連結；(e) 可讓寵愛NEE聯絡到通知者的資訊，例如通知者的實際地址、電話號碼和電子郵件地址；(f)
                通知者基於誠信提出侵權通知，且所通知之智慧財產權使用方式經IPR所有人之授權或合法之聲明；(g) 通知者聲明此通知所載之資訊均真實無誤，如有不實，通知者願賠償寵愛NEE因通知者所提供資料造成的任何損失，且通知者具有合法適當權限或已被授權代表IPR所有人處理與此侵權通知一切相關事宜。
                <br> 8.5 寵愛NEE了解廠商為其產品簽訂獨家經銷協議或最低廣告價格協議的權利，然而違反此等協議不構成智慧財產權之侵害。此等協議的強制執行屬於廠商與銷售者之間事務，寵愛NEE不協助這方面的強制執行活動且不執行獨家經銷權或價格控制事宜，除非所在國法律明確規範選擇性配銷或獨家經銷。
                <br> 8.6 賣家同意擔保寵愛NEE及其關係企業免於承擔因依據或與侵害智慧財產權主張相關移除內容或刊登商品而導致任何主張、請求、求償及裁判所造成的損害。<br> 9. 購買與付款 <br> 9.1 寵愛NEE或其合作之金流服務商在其運營的國家支援一種或多種下列付款方式：<br> (i) 信用卡<br> 信用卡付款是透過第三方支付管道處理款項，而這些支付管道所接受的信用卡類型會因您所在的管轄地不同而有差異。

                <br> (ii) 貨到付款（COD）<br> 寵愛NEE或其合作之金流服務商在其選定的國家提供COD服務，買家得於收到購買的商品時直接給付現金給運送人。

                <br> (iii) 銀行轉帳<br> 買家可透過自動提款機或網路銀行轉帳 (下稱「銀行轉帳」) 將款項匯入我方指定的寵愛NEE履約保證帳戶 (如第 11 條所定義)。買家必須透過寵愛NEE或其合作之金流服務商應用程式中的「上傳收據」功能，向寵愛NEE或其合作之金流服務商提供轉帳單據或付款交易參考，以供查驗。如果寵愛NEE或其合作之金流服務商未在三天內收到付款確認，將會取消買家訂單。
                <br> 9.2 買家只能在付款前變更付款方式。<br> 9.3 買家支付完成前，應依寵愛NEE提供的再確認機制確認支付指示是否正確。因不可歸責於消費者的事由而發生支付錯誤時，寵愛NEE或其合作之金流服務商將協助消費者更正並提供其他必要之協助。因可歸責於寵愛NEE或其合作之金流服務商的事由而發生支付錯誤時，寵愛NEE或其合作之金流服務商將於知悉時立即更正，並同時以電子郵件、簡訊或App推播等方式通知消費者。因可歸責於消費者的事由而發生支付錯誤時，例如輸入錯誤之金額或輸入錯誤之收款方，經消費者通知後，寵愛NEE或其合作之金流服務商將立即協助處理。我們有權查核買家是否具備使用特定付款方式之充分授權，並可在授權獲得確認之前暫停交易，或在未能獲得確認的情況下取消相關交易。買家完成每筆款項支付後，寵愛NEE將以電子郵件、簡訊或App推播等方式通知買家支付明細，並於買家的蝦皮錢包即時顯示支付明細供買家查詢。
                <br> 9.4 目前寵愛NEE或其合作之金流服務商僅透過銀行轉帳方式支付給使用者的款項，故使用者應提供其銀行帳戶資料給寵愛NEE以取得商品銷售金額或退款。<br>


            </p>
            <div id="IagreeBox">
                <!-- <button id="Iagree" onclick="CloseAgree()"><span>我同意</span></button> -->
                <button id="Iagree"><span>我同意</span></button>
            </div>
        </div>
    </div>
    <script>
        //轉註冊畫面
        function register() {
            $('.Login').css({
                'animation-name': 'MoveOut1',
                'animation-duration': '3s',
                'animation-iteratio-count': 'infinite',
            });
            $(".Login").fadeOut();
            // setTimeout( ` $('.Login').hide()`, 1500)
            $('.Register').css({
                'zIndex': '5'
            })
            $('.ForgetMyPassword').css({
                'zIndex': '1'
            })
        }
        //轉登入畫面
        function login1() {
            $('.Login').fadeIn();
            $('.Login').css({
                'animation-name': 'MoveIn1',
                'animation-duration': '1s',
                'animation-iteratio-count': 'infinite',
            });
        }
        //轉登入畫面
        function login2() {
            $('.Login').fadeIn();
            $('.Login').css({
                'animation-name': 'MoveIn2',
                'animation-duration': '1s',
                'animation-iteratio-count': 'infinite',
            });
        }
        //轉忘記密碼畫面
        function ForgetMyPassword() {
            $('.Login').css({
                'animation-name': 'MoveOut2',
                'animation-duration': '3s',
                'animation-iteratio-count': 'infinite',
            });
            $(".Login").fadeOut();
            // setTimeout( ` $('.Login').hide()`, 1500)
            $('.Register').css({
                'zIndex': '1'
            })
            $('.ForgetMyPassword').css({
                'zIndex': '5'
            })
        }
        //密碼顯示/消失
        $('#SeeMe').click(function() {
            var Close = $('#SeeMe').hasClass('fa-eye-slash');
            if (Close == true) {
                $('#SeeMe').removeClass('fa-eye-slash');
                $('#SeeMe').addClass('fa-eye');
                $('#userpassword').attr('type', 'text');
            } else if (Close == false) {
                $('#SeeMe').removeClass('fa-eye');
                $('#SeeMe').addClass('fa-eye-slash');
                $('#userpassword').attr('type', 'password');
            }
        })
        $('#SeeMe2').click(function() {
            var Close = $('#SeeMe2').hasClass('fa-eye-slash');
            if (Close == true) {
                $('#SeeMe2').removeClass('fa-eye-slash');
                $('#SeeMe2').addClass('fa-eye');
                $('#userpassword2').attr('type', 'text');
            } else if (Close == false) {
                $('#SeeMe2').removeClass('fa-eye');
                $('#SeeMe2').addClass('fa-eye-slash');
                $('#userpassword2').attr('type', 'password');
            }
        })
        $('#SeeMe3').click(function() {
            var Close = $('#SeeMe3').hasClass('fa-eye-slash');
            if (Close == true) {
                $('#SeeMe3').removeClass('fa-eye-slash');
                $('#SeeMe3').addClass('fa-eye');
                $('#userpassword3').attr('type', 'text');
            } else if (Close == false) {
                $('#SeeMe3').removeClass('fa-eye');
                $('#SeeMe3').addClass('fa-eye-slash');
                $('#userpassword3').attr('type', 'password');
            }
        })

        //確認註冊密碼兩者正確
        $checkk = false;
        $('#RegisterBtn').click(function() {
            // alert( $('#userpassword2').prop('value') )
            var password1 = $('#userpassword2').prop('value');
            var password2 = $('#userpassword3').prop('value');
            if (password1 != password2) {
                alert("輸入的密碼不同");
            } else
                $checkk = true;
        })

        function check_data2() {
            return $checkk;
        }


        //跳窗畫面
        // function OpenAgree() {
        //     var Box = document.getElementById('AgreeBox');
        //     Box.style.visibility = 'visible';
        //     Box.style.zIndex = '1500';
        // }

        // function CloseAgree() {
        //     var Box = document.getElementById('AgreeBox');
        //     Box.style.visibility = 'hidden';
        //     Box.style.zIndex = '-1'; //不加有延遲問題
        // }

        $(document).on('click', '#opener', function() {
            $('#AgreeBox').addClass('AgreeBox_visibility');
            console.log('ok')
        });
        $(document).on('click', '#Iagree', function() {
            $('#AgreeBox').removeClass('AgreeBox_visibility')
        });
    </script>

    <script src="./js/js.js"></script>
    <script src="./js/shop.js"></script>

</body>

</html>