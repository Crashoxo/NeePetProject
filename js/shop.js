$(document).ready(function() {

    $("#placeOrder").submit(function(e) {
        console.log(e); //event
        e.preventDefault(); //preventDefault 終止「預設」行為
        $.ajax({
            url: './testShop/action.php',
            method: 'post',
            // serializes the form's elements.
            // https://www.ucamc.com/articles/332-%E5%A6%82%E4%BD%95%E4%BD%BF%E7%94%A8jquery-ajax-submit-%E5%82%B3%E9%80%81form%E8%A1%A8%E5%96%AEserialize-%E6%96%B9%E6%B3%95
            data: $('form').serialize() + "&action=order",
            success: function(response) {
                $("#order").html(response);
            }
        })
    })

    load_cart_item_number() //抓資料庫的值顯示在#cart-item

    // 增加購物車 旁邊的數量
    // ajax可以接收又可回傳
    function load_cart_item_number() {
        $.ajax({
            url: './testShop/action.php',
            method: 'get',
            // get:比較方便使用(不適合機密，會顯示網址列) ; post:表單用比較麻煩
            // date物件 屬性 cartItem(key) : "cart_item"(vaule) 用get 傳給 'action.php'
            // date前都是請求(req)
            data: { // 1.透過get方式將資料送出action.php請求 2.內含資料後送到success
                cartItem: "cart_item" // 物件屬性(接收action $row) ; "cart_item"放進 cartItem
            },

            //success以下回應(res)
            success: function(response) { //　success 這邊接收到 $row ; 
                $("#cart-item").html(response); //　新增數量在#cart-item
            }
        });
    }
});