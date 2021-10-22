<?php
require_once("./control/testProductC1.php");
$randNUM = rand(0, 999999); //瀏覽器編號製作 ; 
$_SESSION['randNUM'] = $randNUM; //瀏覽器編號製作
session_start();
@$memberID = $_SESSION['memberID']
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/style.css">

  <title>寵愛NEE</title>


</head>

<body>

  <!-- header section starts  -->

  <?php require 'header.php' ?>




  <!-- header section ends -->


  <div class="head-img" style="padding-top: 120px;">
    <img class="imgItem" src="../img/主食.png" alt="">
  </div>


  <!-- 通知有無成功加入購物車 -->
  <div id="message"></div>





  <section class="mh-portfolio" id="mh-portfolio">

    <!-- 左邊種類區塊 -->
    <div class="leftContainaer">
      <div class="leftItem">

        <a href="mall.php">
          <div class="itemOne ">所有產品</div>
        </a>

        <?php while ($row_RecCategory = $RecCategory->fetch_assoc()) { ?>
          <a href="mall.php?categoryname=<?= $row_RecCategory["categoryname"] ?>">
            <div class="itemOne "><?= $row_RecCategory["categoryname"] ?></div>
          </a>
        <?php } ?>
      </div>
    </div>









    <!-- 商品區塊 -->
    <div class="mall-container" id="Portfolio">

      <div class="mall-portfolio-nav">
        <div class="filter-part" id="filter-button">
          <a class="active thr btn-focus" href="mall.php?<?php echo keepURL2(); ?>">犬貓綜合</a>
          <a class="one btn-focus" href="mall.php?categoryanimal=狗<?php echo keepURL2(); ?>">狗</a>
          <a class="two btn-focus" href="mall.php?categoryanimal=貓<?php echo keepURL2(); ?>">貓</a>
        </div>

      </div>
      <div class="commodity-categories">
        <div class="categories-box-container portfolio-gallery">

          <?php
          require_once("./control/testProductC2.php");
          while ($row_RecProduct = $RecProduct->fetch_assoc()) {
          ?>
            <div class="box">

              <a href="products.php?id=<?= $row_RecProduct["productsID"] ?>">

                <?php if ($row_RecProduct["productshowimg"] == "") { ?>
                  <img src="images/nopic.png" alt="暫無圖片" width="120" height="120" border="0" />
                <?php } else { ?>
                  <img src="../../img/product/200x200/<?php echo $row_RecProduct["productshowimg"]; ?>" alt="<?php echo $row_RecProduct["productname"]; ?>" width="135" height="135" border="0" />
                <?php } ?>

              </a>



              <div class="box-description">
                <h1>
                  <a href="products.php?id=<?= $row_RecProduct["productsID"] ?>"><?php echo $row_RecProduct["productname"]; ?></a>
                </h1>
                <p><span>特價:<?php echo ceil($row_RecProduct["productprice"] * $row_RecProduct["productdiscount"]); ?></span><br><del>原價:<?= $row_RecProduct["productprice"] ?></del></p>
              </div>


              <div class="box-description-btn">
                <form action="" class="form-submit">
                  <input type="hidden" class="pid" value="<?= $row_RecProduct["productsID"]; ?>">
                  <input type="hidden" class="pname" value="<?= $row_RecProduct['productname'] ?>">
                  <input type="hidden" class="pprice" value="<?= $row_RecProduct['productprice'] ?>">
                  <input type="hidden" class="pimage" value="<?= $row_RecProduct['productshowimg'] ?>">
                  <button class="cart-btn addItemBtn">加入購物車</button>
                  <button class="buy-btn addItemBtn ">直接購買</button>
                </form>




                <!-- <a href="#" class="mall-buy-btn">直接購買</a> -->
                <!-- <a href="#" class="mall-buy-btn">直接購買</a> -->
              </div>
            </div>
          <?php } ?>

        </div>
      </div>

    </div>


  </section>


  <div class="pagination-container">
    <ul class="pagination">
      <?php if ($num_pages > 1) { // 若不是第一頁則顯示 
      ?>
        <li><a href="?page=1<?php echo keepURL(); ?>">|&lt;</a></li>
        <li><a href="?page=<?php echo $num_pages - 1; ?><?php echo keepURL(); ?>">&lt;&lt;</a></li>
      <?php } else { ?>
        <!-- <li> <a href="" class="active">|&lt; &lt;&lt;</a> </li> -->
      <?php } ?>
      <?php
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $num_pages) {
          echo "<li><a href='' class='pagination-active'>" . $i . "</a></li>";

          // echo '<li class="active" >' . $i . '</li>';
        } else {
          $urlstr = keepURL();
          echo "<li><a href=\"?page=$i$urlstr\">$i</a></li> ";
        }
      }
      ?>

      <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 
      ?>
        <li>
          <a href="?page=<?php echo $num_pages + 1; ?><?php echo keepURL(); ?>">&gt;&gt;</a>
        </li>
        <li>
          <a href="?page=<?php echo $total_pages; ?><?php echo keepURL(); ?>">&gt;|</a>
        </li>
      <?php } else { ?>
        <!-- <li><a href="" class="active"> &gt;&gt; &gt;|</a></li>  -->
      <?php } ?>
    </ul>
  </div>


  <?php include("./footer.php") ?>




  <!-- 分類JS -->
  <script>
    const filterButtons = document.querySelector("#filter-button").children;
    const items = document.querySelector(".portfolio-gallery").children;

    for (let i = 0; i < filterButtons.length; i++) {
      filterButtons[i].addEventListener("click", function() {
        for (let j = 0; j < filterButtons.length; j++) {
          filterButtons[j].classList.remove("active")
        }
        this.classList.add("active");
        const target = this.getAttribute("data-target")

        for (let k = 0; k < items.length; k++) {
          items[k].style.display = "none";
          if (target == items[k].getAttribute("data-id")) {
            items[k].style.display = "block";
          }
          if (target == "all") {
            items[k].style.display = "block";
          }
        }

      })
    }
  </script>






  <!-- <script>
    $(document).ready(function() {
      //   點擊貓犬更換圖片
      $('.thr').click(function() {
        $('.imgItem').fadeIn().attr("src", "./img/食品封面啦.png")
      })
      $('.one').click(function() {
        $('.imgItem').fadeIn().attr("src", "./img/主食.png")
      })
      $('.two').click(function() {
        $('.imgItem').slideDown().attr("src", "./img/主食封面狗.png")
      })
    });



    // 滾動視差
  </script> -->

  <script type="text/javascript">
    // 文件準備好才使用
    $(document).ready(function() {
      // 把　商品資料庫　資料傳入 加入　購物車資料庫
      // 使用addItemBtn傳入的值  AJAX用
      $(".addItemBtn").click(function(e) {
        //preventDefault 終止「預設」行為
        e.preventDefault();
        // closest 找到為止 ; 離當前元素最近的元素form-submit
        var $form = $(this).closest(".form-submit");
        // find 找標籤外的小孩 不找自己
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();

        // console.log(this);
        //是否有class
        if ($(this).hasClass("buy-btn")) {
          // $("#message").side("display:none");
          $("#message").hide();
          setTimeout(() => {
            location.href = "cart.php";
          }, 300); //reload資料變更即重整
        }

        setTimeout(() => {
          location.reload(true)
        }, 2000); //reload資料變更即重整



        $.ajax({ //AJAX可用來即時檢查帳號有無重複(舉例)
          url: 'action.php', //傳送到這,這裡判斷 購物車系統(處理購物車加入，無實體頁面)
          method: 'post', //方法(表單都是post)
          data: { //放入值
            pid: pid,
            pname: pname,
            pprice: pprice,
            pimage: pimage,
          },
          success: function(response) {
            $("#message").html(response); //新增訊息在#message
            window.scrollTo(0, 0); //如果新增商品成功，滾輪滾治最上
            load_cart_item_number(); //抓資料庫的值顯示在#cart-item
          }
        });
      });

      load_cart_item_number() //抓資料庫的值顯示在#cart-item


      // 1.增加購物車 旁邊的數量
      // 2.並判斷購物車內有東西才能結帳
      // ajax可以接收又可回傳
      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
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
            if (response > 0) {
              $(".checkout").removeClass("disabled"); // 並判斷購物車內有東西才能結帳
            }
          }
        });
      }

    });
  </script>
</body>
<script src="./js/js.js"></script>

</html>
<?php
$stmt->close();
$db_link->close();
?>