$(function () {

    // 贈送商品
    let rewardProducts = ["KAKO寵物背帶", "MINI罐頭", "KIKI潔牙骨", "KAKO逗貓棒", "MISO肉泥", "77乳加"];

    let randNumP = Math.floor(Math.random() * 6);

    // 抽中商品
    let rewardProduct = rewardProducts[randNumP];

    // 商品條碼
    let rewardNum = RandomNum();

    // 抽中商品 進 input id=selectProduct
    selectProduct.value = rewardProduct;
    
    // 商品條碼 進 input id=rewardNum
    $('#rewardNum').val(rewardNum);

    // 亂數產生6個英數字
    function RandomNum() {
        let randNum = "";
        let possible = "1234567890ABC1234567890DEFGHIJKL123MNOPQRST4567890UVWXYZ";
        for (let i = 0; i < 6; i++){
            randNum += possible.charAt(Math.floor(Math.random() * possible.length));
        }
     
        return randNum;
    
    }




    var signFun = function () {

        // 處理sql 的select 到的日期
        let sqlData = $('#sqlData').val().split(','); //以，為陣列
        sqlData.pop();//去除最後一個陣列 空值




        for (let i = 0; i < sqlData.length; i++) {
            // 重新處理陣列欄位 每筆日期數-1 對應陣列從0起算
            sqlData[i] = sqlData[i].substring(sqlData[i].length - 2) - 1;
        }

        console.log("123213", sqlData);




        var dateArray = sqlData; // 將處理好的陣列塞入 JS 日期語法

        // var dateArray = [1, 2, 4, 6] // 假設已簽到天數，X月的2,3,5,7號

        var $dateBox = $("#js-qiandao-list"), // ul 日期清單
            $currentDate = $(".current-date"),  //顯示今天日期處
            $qiandaoBnt = $("#js-just-qiandao"), //簽到按鈕
            _html = '',
            _handle = true,
            myDate = new Date();


        $currentDate.text(myDate.getFullYear() + '年' + parseInt(myDate.getMonth() + 1) + '月' + myDate.getDate() + '日');

        // monthFirst 顯示每月的第一天在星期幾 0~6
        var monthFirst = new Date(myDate.getFullYear(), parseInt(myDate.getMonth()), 1).getDay();

        var d = new Date(myDate.getFullYear(), parseInt(myDate.getMonth() + 1), 0);
        var totalDay = d.getDate(); //取得當月共幾天

        for (var i = 0; i < 42; i++) {
            _html += ' <li><div class="qiandao-icon"></div></li>'
        }
        $dateBox.html(_html) //將li 塞入 ul 清單

        var $dateLi = $dateBox.find("li");

        for (var i = 0; i < totalDay; i++) {
            $dateLi.eq(i + monthFirst).addClass("date" + parseInt(i + 1));
            for (var j = 0; j < dateArray.length; j++) {

                if (i == dateArray[j]) { //判斷dateArray 已簽到陣列
                    // 加入 .qiandao CSS
                    $dateLi.eq(i + monthFirst).addClass("qiandao");
                }
            }
        } //生成当月的日历且含已签到

        $(".date" + myDate.getDate()).addClass('able-qiandao');


        $dateBox.on("click", "li", function () {

            // 判斷是否簽到 
            if ($(this).hasClass('able-qiandao') && _handle) {
                //    有 則加入 .qiandao CSS
                $(this).addClass('qiandao');
                qiandaoFun();

            }
        }) //签到


        $qiandaoBnt.on("click", function () {
            if (!$qiandaoBnt.hasClass('actived')) {

                if (_handle) {
                    qiandaoFun();
                    
                }
            }
        }); //签到



        function qiandaoFun() {
            $qiandaoBnt.addClass('actived');
            openLayer("qiandao-active", qianDao);
            _handle = false;

            let url = `./control/updateRewardC.php?action=rewardAdd&memberID=${$('#memberID').val()}`;

            $.ajax({
                url: url,
                type: "GET",
                data:{
                    selectProduct:$('#selectProduct').val(),
                    rewardNum:$('#rewardNum').val()
                },
                success: function (res) {
                    console.log(res);
                }
            });


        }

        function qianDao() {
            $(".date" + myDate.getDate()).addClass('qiandao');
        }
    }();

    function openLayer(a, Fun) {
        $('.' + a).fadeIn(Fun)
    } //打开弹窗

    var closeLayer = function () {
        $("body").on("click", ".close-qiandao-layer", function () {
            $(this).parents(".qiandao-layer").fadeOut()
            location.reload();
        })
    }() //关闭弹窗

    $("#js-qiandao-history").on("click", function () {
        openLayer("qiandao-history-layer", myFun);

        function myFun() {
            console.log(1)
        } //打开弹窗返回函数
    })

})
