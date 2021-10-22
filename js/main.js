$(function () {
    var signFun = function () {

        var dateArray = [] // 已簽到日數

        var $dateBox = $("#js-qiandao-list"),
            $currentDate = $(".current-date"),
            $qiandaoBnt = $("#js-just-qiandao"),
            _html = '',
            _handle = true,
            myDate = new Date();
        $currentDate.text(myDate.getFullYear() + '年' + parseInt(myDate.getMonth() + 1) + '月' + myDate.getDate() + '日');

        var monthFirst = new Date(myDate.getFullYear(), parseInt(myDate.getMonth()), 1).getDay();
        var d = new Date(myDate.getFullYear(), parseInt(myDate.getMonth() + 1), 0);
        var totalDay = d.getDate(); //當月的天數有幾天


        for (var i = 0; i < 42; i++) {
            _html += ' <li><div class="qiandao-icon"></div></li>'
        }
        $dateBox.html(_html) //生成日曆格子

        var $dateLi = $dateBox.find("li");

        for (var i = 0; i < totalDay; i++) {
            $dateLi.eq(i + monthFirst).addClass("date" + parseInt(i + 1));
            for (var j = 0; j < dateArray.length; j++) {
                if (i == dateArray[j]) {
                    $dateLi.eq(i + monthFirst).addClass("qiandao");
                }
            }
        } //生成當月的日曆含已簽到



        $(".date" + myDate.getDate()).addClass('able-qiandao');

        $dateBox.on("click", "li", function () {
            if ($(this).hasClass('able-qiandao') && _handle) {
                $(this).addClass('qiandao');
                qiandaoFun();
            }
        }) //簽到


        $qiandaoBnt.on("click", function () {
            if (_handle) {
                qiandaoFun();
            }
        }); //簽到

        function qiandaoFun() {
            $qiandaoBnt.addClass('actived');
            openLayer("qiandao-active", qianDao);
            _handle = false;
        }

        function qianDao() {
            $(".date" + myDate.getDate()).addClass('qiandao');
        }
    }();

    function openLayer(a, Fun) {
        $('.' + a).fadeIn(Fun)
    } //打開簽到彈窗

    var closeLayer = function () {
        $("body").on("click", ".close-qiandao-layer", function () {
            $(this).parents(".qiandao-layer").fadeOut()
        })
    }() //關閉彈窗

    $("#js-qiandao-history").on("click", function () {
        openLayer("qiandao-history-layer", myFun);

        function myFun() {
            console.log(1)
        } //打開紀錄彈窗返回函數
    })

})
