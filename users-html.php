<?php
include("connMysqlObj2.php");

// 更改內容：userajax.js
// 
include('header.php');


if (!isset($_SESSION['name']))
    header("Location: ./login.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="./js/jquery-3.4.1.js"></script>
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <title>寵愛NEE</title>



</head>

<body>
    <img class="cloud" src="./img/雲.png" alt="">
    <div class="sun">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <p class="click-me">點我</p>
    </div>

    <div class="member-system-section">
        <div class="member-system-tab" style="position: relative;z-index: 1;">
            <div class="member-system-part">
                <i class='bx bx-user i-color'></i><a href="./users-html.php" class="member-current member-tab-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    個人檔案</a>
            </div>
            <div class="member-system-part">
                <i class='bx bxs-paint i-color'></i><a href="./users-password.php" class="member-tab-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    變更密碼</a>
            </div>
            <div class="member-system-part">
                <i class='bx bx-credit-card i-color'></i>
                <a href="./credit-card.php" class="member-tab-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    銀行帳號/信用卡</a>
            </div>

            <div class="member-system-part-new">
                <i class="fa fa-book i-color" aria-hidden="true"></i>
                <a href="./orders/OrderDetail.php" class=" member-tab-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    訂單查詢</a>
            </div>
            <div class="member-system-part-new">
                <i class="fa fa-book i-color" aria-hidden="true"></i>
                <a href="./SearchBooking.php" class=" member-tab-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    預約查詢</a>
            </div>

        </div>

        <div id="member-userinfo">
            <div id="member-container">
                <div class='member-page-profile'>
                    <div class="member-userinfo-part">
                        <h1 class='member-title-text' style="position: relative;z-index: 100;">我的檔案</h1>
                        <p class='member-subtitle-text' style="position: relative;z-index: 100;">管理帳戶以保持青春永駐</p>
                        <hr>

                        <form action="userChangeC.php" method="POST" class="member-form-tab" id='userChange' name="userChange" style="background-color: white;position: relative;z-index: 100;">

                            <?php
                            // 待改，取session
                            $mID = $_SESSION['memberID'];

                            $result = $db_link->query("SELECT name, email, phone, address FROM member WHERE memberID = $mID");
                            $row_result = $result->fetch_assoc();
                            // echo $row_result["name"];
                            ?>

                            <div class="user-name">使用者姓名 : &emsp; <p><?php echo $row_result["name"]; ?></p>
                            </div>
                            <input type="checkbox" id="burger">
                            <div class="member-userinfo-form">
                                <input id="name-form" required type="text" class="member-form-input" placeholder="姓名" style="text-transform:lowercase;" name="mname">
                                <label for="" class="member-form-label">姓名</label>
                            </div>

                            <div class="user-email">使用者帳號 : &emsp; <p style="text-transform:lowercase;"><?php echo $row_result["email"]; ?></p>
                            </div>
                            <div class="member-userinfo-form">
                                <input id="email-form" required type="email" class="member-form-input" placeholder="新電子信箱" style="text-transform:lowercase;" name="memail">
                                <label for="" class="member-form-label">電子信箱</label>
                            </div>

                            <div class="user-email">手機號碼 : &emsp; <p style="text-transform:lowercase;"><?php echo $row_result["phone"]; ?></p>
                            </div>
                            <div class="member-userinfo-form">
                                <input id="phone-form" required type="tel" class="member-form-input" placeholder="新手機號碼" pattern="09\d{2}\d{6}" title="請輸入正確手機號碼" name="mphone">
                                <label for="" class="member-form-label">手機號碼</label>
                            </div>

                            <div class="user-email">地址 : &emsp; <p style="text-transform:lowercase;"><?php echo $row_result["address"]; ?></p>
                            </div>
                            <div class="member-userinfo-form">
                                <input id="phone-form" required type="text" class="member-form-input" placeholder="新地址" name="maddr">
                                <label for="" class="member-form-label">新地址</label>
                            </div>

                            <!-- <div class="user-sex">性別 : &emsp; <p>男</p>
                            </div>
                            <div class="member-userinfo-form">
                                <input type="radio" id="sex-boy" name="gender" checked class="sex-radio form-check-input">
                                <label for="sex-boy" class='sex form-check-label'>男性</label>
                                <input type="radio" id="sex-gril" name="gender" class="sex-radio form-check-input">
                                <label for="sex-gril" class='sex form-check-label'>女性</label>
                            </div> -->



                            <div class="member-div-btn">
                                <input id="store-btn" style="border: none; display:none;" type="submit" class="form__button" value="儲存">
                                <input id="renew-btn" style="border: none;" type="button" class="form__button" value="更改資料" onclick="personal(); change_state();" style="display: block;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scene" style="padding-top: 160px;">
        <!-- <div class="sun"></div> -->
        <div class="bg">
            <img src="./img/狗主人去背.gif" alt="" class="people">
            <img src="./img/會員中心車.png" alt="" class="car2">
            <img src="./img/會員中心狗.gif" alt="" class="dog-run">
        </div>
    </div>
    <div id="app"></div>

    <!-- <div class="bubbels">
        <img src="./img/狗主人去背.gif" alt="">
    </div> -->
    <?php include('./footer.php') ?>


    <!-- <script src="https://unpkg.com/vue/dist/vue.js"></script> -->
    <script src="./js/js.js"></script>
    <script src="./js/usersajax.js"></script>
    <script src="./js/users-dark-light.js"></script>
    <script src="./js/shop.js"></script>

    <script>
        function change_state() {
            document.getElementById('store-btn').style.display = 'block';
        }
    </script>
</body>

</html>