<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>寵愛NEE</title>

    
</head>
<body>
    <div id="member-userinfo">
        <div id="member-container">
            <div class='member-page-profile'>
                <div class="create-item">
                    <h1 class='member-title-text'>我的信用卡</h1>
                    <button v-on:click='aaa' class='create-btn'style="position: relative;z-index: 49;"><i class="fa fa-plus" aria-hidden="true" ></i>新增信用卡</button>
                </div>
                <div class="member-userinfo-part">
                    <form action="" method="" class="member-form-tab" id="newPwd" name="myForm"style="background-color: white;position: relative;z-index: 50;">
                        <div class="card-container">
                            <div class="visa-img">
                                <img src="./img/visa.png" alt="">
                                <p>VISA</p>
                            </div>
                            <div class="form__div">
                                <input id="change"  type="password" class="member-form-inputt card-num" placeholder="" required pattern="" disabled='disabled'>
                                <label  for="" class="member-form-label"></label>
                            </div>
                        </div>
                        <div class="delete-card">
                            <button type="button" onclick="cclear()" class="delete-btn">刪除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- 新增信用卡 -->
        <div id="app" class="aaa">
            <div class="mycontainer">
        
                <div class="mycard-container">
                    <div class="front">
                        <div class="image">
                            <img src="./img/chip.png" alt="">
                            
                            <!-- <img src="image/visa.png" alt=""> -->
                        </div>
                        <div class="card-number-box" id="cardNumber"></div>
                        <div class="flexbox">
                            <div class="box">
                                <span>card holder</span>
                                <div class="card-holder-name" id="holderName"></div>
                            </div>
                            <div class="box">
                                <span class="sss">expires</span>
                                <div class="expiration">
                                    <span class="exp-month" id='monthInput'></span>
                                    <span class="exp-year" id="yearInput"></span>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="back">
                        <div class="stripe"></div>
                        <div class="box">
                            <span>cvv</span>
                            <div class="cvv-box"style="font-size: 15px;" id='cvvBox'></div>
                            <!-- <img src="image/visa.png" alt=""> -->
                        </div>
                    </div>
        
                </div>
        
                <form action="addCardC.php" method="POST" id="addcard" name="addcard">
                    <div class="closeIcon">
                        <i onclick="closeBtn()" class="fa fa-times" aria-hidden="true"></i>
                    </div>

                    <div class="form__div">
                        <label for="" class="lable-card-num">信用卡號</label>
                        <input oninput="cin()" id='cardNumberin' name="cardNumberin" v-model='cardNumber' required pattern="[0-9]{16}" title="請輸入16個數字" type="text" class="form-card-num" placeholder=" " onclick="turnfront()" style="text-transform:lowercase;">
                    </div>

                   

                    <div class="form__div">
                        <label for="" class="lable-card-name">持卡人姓名</label>
                        <input oninput="hin()" id='holderNamein' name="holderNamein" v-model='holderName' required pattern="[A-Za-z\s]{2,30}" title="請輸入正確姓名格式" type="text" class="form-card-name" placeholder=" " onclick="turnfront()" style="text-transform:lowercase;">
                    </div>
                    
                    <div class="flexbox">
                        <div class="inputBox">
                            <span>到期月</span>
                            <select onchange="min()" id='monthInputin' v-model='monthInput' name="monthInputin"  class="month-input" onclick="turnfront()">
                                <!-- <option value="month" selected disabled>month</option> -->
                                <option value="01" selected>01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>到期年</span>
                            <select onchange="yin()" id='yearInputin' v-model='yearInput' name="yearInputin" class="year-input" onclick="turnfront()">
                                <!-- <option value="year" selected disabled>year</option> -->
                                <option value="2021" selected>2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>cvv</span>
                            <input oninput='cvvin()' id='cvvBoxin' name="cvvBoxin" v-model='cvvBox' type="text" maxlength="4" required pattern="[0-9]{2,4}" title="請輸入正確格式" class="cvv-input" onclick="turnback()">
                        </div>
                    </div>
                    <input type="button" onclick="cpaste()" value="確認新增" class="submit-btn">
                </form>
        
            </div>    
        </div>
    </div>
</body>
</html>