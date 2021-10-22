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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="./js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <title>寵愛NEE</title>
    

</head>

<body>

        <div id="member-userinfo">
            <div id="member-container">
                <div class='member-page-profile'>
                    <div class="member-userinfo-part">
                        <h1 class='member-title-text'>訂單查詢</h1>
                        <form action=""  class="member-form-tab">
                        <?php
                        // 待改，取session
                        $mID = 4;

                        $result = $db_link->query("SELECT password FROM member WHERE memberID = $mID");
                        $row_result = $result->fetch_assoc();
                        // echo $row_result["name"];
                        ?>

                            <div class="user-email">手機號碼  &emsp; <p style="text-transform:lowercase;">0912345678</p></div>
                            <div class="member-userinfo-form">
                                <input id="phone-form" required type="tel" class="form__input" placeholder=" " disabled maxlength="11" pattern="09\d{2}\d{6}" title="請至少輸入正確號碼">
                                <label for="" class="form__label">手機號碼</label>
                            </div>

                           

                            
                            <div class="order-button-div">
                                <input id="store-btn" style="border: none;" type="submit" class="form-order-button" value="送出" >

                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

    
    



   


    



    
    
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="./js/usersajax.js"></script>
   
   
</body>

</html>