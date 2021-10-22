<?php
include("connMysqlObj2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./kit/fontAwesome/font-awesome-4.7.0/css/font-awesome.css">

  <title>新增活動</title>
</head>

<body>
  <h1 class="text-center">
    新增活動
  </h1>
  <p align="center"><a href="">回主畫面</a></p>
  <form action="addEventC.php" method="POST" name="eventFormAdd" id="eventFormAdd" enctype="multipart/form-data">
    <table border="1" align="center" cellpadding="4">
      <tr>
        <th>欄位</th>
        <th>資料</th>
      </tr>

      <tr>
        <td>
          <label for="newstitle">公告名稱</label>
        </td>
        <td>
          <input type="text" class="form-control" name="newstitle" id="newstitle" placeholder="請輸入公告名稱">
          <!-- <small id="productnameHelpId" class="text-danger"></small> -->
        </td>
      </tr>
      <tr>
        <td>
          <label for="newscontent">公告內容</label>
        </td>
        <td>
          <textarea type="text" class="form-control" name="newscontent" id="newscontent" placeholder="請輸入公告內容" value=""></textarea>
          <!-- <small id="productpriceHelpId" class="text-danger"></small> -->
        </td>
      </tr>
      <tr>
        <td>
          <label for="newsdate">到期時間</label>
        </td>
        <td>
          <input type="date" class="form-control" name="newsdate" id="newsdate" placeholder="">
          <!-- <small id="onlinedateHelpId" class="text-danger"></small> -->
        </td>
      </tr>
      <tr>
        <td>
          <label for="newstatus">公告狀態</label>
        </td>
        <td>
          <select class="form-control" name="newstatus" id="newstatus">
            <option value="1">不分類</option>
            <option value="2">進行中</option>
            <option value="3">結束/已滿</option>
            <option value="4">系統公告</option>
          </select>
        </td>
      </tr>


      <tr>
        <td>
          <label for="eventshowimg">展示圖片</label>
        </td>
        <td>
          <input type="file" class="form-control-file" name="eventshowimg" id="eventshowimg" placeholder="">
          <!-- <input type="text" class="form-control-file" name="productshowimg" id="productshowimg" placeholder="" aria-describedby="productshowimgHelpId"> -->
          <!-- <small id="productshowimgHelpId" class="form-text text-danger"></small> -->
        </td>
      </tr>




      <tr>
        <td colspan="2" align="center">
          <input name="action" type="hidden" value="add">
          <input type="submit" name="button" id="button" value="新增活動">
          <input type="reset" name="button2" id="button2" value="重新填寫">
        </td>
      </tr>
    </table>
  </form>





  <!-- script input-->
  <!-- <script src="./js/jquery.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script> -->
</body>

</html>