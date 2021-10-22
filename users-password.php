<?php
include("connMysqlObj2.php");

// 更改內容：userajax.js
// 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/jquery-3.4.1.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <title>Document</title>


</head>

<body>
    <div id="member-userinfo">
        <div id="member-container">
            <div class='member-page-profile'>
                <div class="member-userinfo-part">
                    <h1 class='member-title-text' style="position: relative;z-index:10 ;">更改密碼</h1>
                    <p class='member-subtitle-text' style="position: relative;z-index:10 ;">為了保護你帳號的安全，請不要分享你的密碼給其他人</p>
                    <form action="passwordChangeC.php" method="POST" class="member-form-tab" id="newPwd" name="myForm" onsubmit="return check_data();"style="background-color: white;position: relative;z-index: 100;">

                        <!-- <div class="form-password-div">
                            <input id="chenge-new-password" name="password" type="password" class="member-form-input"
                                placeholder="新的密碼" required pattern="[A-Za-z]{3,}[0-9][0-9]{2,}" title="請至少輸入3個英文字母及3位數字"
                                style="text-transform:lowercase;" value="">
                            <i id="eyseOpen-3" class="fa fa-eye" aria-hidden="true"></i>
                            <i id="eyseOpen-4" class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div> -->
                        
                        <div class="form-password-div">
                            <input name="oldpassword" type="password" class="member-form-input"
                                placeholder="舊密碼" required pattern="[a-zA-Z0-9]{3,20}" title="請輸入3到20個大小寫英文字及數字"
                                style="text-transform:lowercase;" value="" onblur='checkAccount()'>
                            <label id="oldpassword" name="oldpassword" for="" class="member-form-label">舊密碼</label>    
                        </div>
                        
                        <div class="form-password-div">
                            <input id="chenge-new-password" name="password" type="password" class="member-form-input"
                                placeholder="新的密碼" required pattern="[a-zA-Z0-9]{3,20}" title="請輸入3到20個大小寫英文字及數字"
                                style="text-transform:lowercase;" value="">
                            <label for="" class="member-form-label">新的密碼 </label>
                            <i id="eyseOpen-3" class="fa fa-eye" aria-hidden="true"></i>
                            <i id="eyseOpen-4" class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div>

                        <div class="form-password-div">
                            <input id="cfm-password" name="re_password" type="password" class="member-form-input"
                                placeholder="確認密碼" required pattern="[a-zA-Z0-9]{3,20}" title="請輸入3到20個大小寫英文字及數字"
                                style="text-transform:lowercase;" value="">
                            <label for="pwd" class="member-form-label"> 確認密碼</label>
                            <i id="eyseOpen-5" class="fa fa-eye" aria-hidden="true"></i>
                            <i id="eyseOpen-6" class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div>


                        <!-- <input style="border: none;" id="store-btn" type="submit" class="form__button" value="確認"
                            onclick="check_data()"> -->
                        <!-- <button style="border: none;" type="submit" id="store-btn" class="form__button">確認</button> -->
                        <button style="border: none;" id="renew-btn" class="form__button">確認</button>
                        <!-- <button style="border: none;" id="renew-btn" class="form__button" onclick="renew(this)">更改</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>




</body>

</html>