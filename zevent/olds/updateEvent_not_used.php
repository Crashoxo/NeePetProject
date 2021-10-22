<?php
include("connMysqlObj2.php");
// $sql_select = "SELECT productsID,productshowimg,categoryanimal,categoryname,productname,productprice,productdiscount,productstock,productstatus,onlinedate,offlinedate FROM products as p JOIN category as c  ON c.categoryid = p.categoryid WHERE productsID = ? ";
$sql_select = "SELECT * FROM news WHERE newsID = ?";
$stmt = $db_link->prepare($sql_select);
$stmt->bind_param("i", $_GET["newsID"]);
$stmt->execute();
$stmt->bind_result($a, $newstitle, $newscontent, $newsdate, $newstatus, $newsimg,$a);


$stmt->fetch();
$stmt->close();

// $sql_select2 = "SELECT filename FROM productimg  WHERE productsID =" . $_GET["productsID"];
// $filenameResult = $db_link->query($sql_select2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./kit/fontAwesome/font-awesome-4.7.0/css/font-awesome.css">

    <title>活動資訊編輯</title>
</head>

<body>
    <h1 align="center">活動資訊編輯</h1>
    <p align="center"><a href="">回主畫面</a></p>
    <form action="updateEventC.php" method="POST" name="eventFormUp" id="eventFormUp" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="newstitle" id="newstitle" placeholder="請輸入公告名稱" value="<?php echo $newstitle; ?>">
                    <!-- <small id="productnameHelpId" class="text-danger"></small> -->
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newscontent">公告內容</label>
                </td>
                <td>
                    <textarea type="text" class="form-control" name="newscontent" id="newscontent" placeholder="請輸入公告內容"><?php echo $newscontent; ?></textarea>
                    <!-- <small id="productpriceHelpId" class="text-danger"></small> -->
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newsdate">公告時間</label>
                </td>
                <td>
                    <input type="date" class="form-control" name="newsdate" id="newsdate" value=<?php echo $newsdate;?> placeholder="">
                    <!-- <small id="onlinedateHelpId" class="text-danger"></small> -->
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newstatus">公告狀態</label>
                </td>
                <td>
                    <select class="form-control" name="newstatus" id="newstatus">
                        <option value="1" <?php echo ($newstatus == 1) ? 'selected' : '' ?>>不分類</option>
                        <option value="2" <?php echo ($newstatus == 2) ? 'selected' : '' ?>>進行中</option>
                        <option value="3" <?php echo ($newstatus == 3) ? 'selected' : '' ?>>結束/已滿</option>
                        <option value="4" <?php echo ($newstatus == 4) ? 'selected' : '' ?>>系統公告</option>
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
                    <input name="action" type="hidden" value="update">
                    <input name="nID" type="hidden" value="<?php echo $_GET["newsID"];?>">
                    <input type="submit" name="button" id="button" value="更新資料">
                    <input type="reset" name="button2" id="button2" value="重新填寫">
                </td>
            </tr>
        </table>
    </form>





    <!-- script input-->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
        // $(function() {

        //     $('#productdiscount').click(function() {

        //         if (discountOther.selected) {
        //             $('#discountOtherText').prop("disabled", false);
        //             $('#discountOtherText').blur(function() {
        //                 let discount = `0.${discountOtherText.value}`;
        //                 discountOther.value = discount;
        //             });
        //         } else {
        //             $('#discountOtherText').prop("disabled", true);
        //             $('#discountOtherText').prop('value', '');
        //         }
        //     });

        // });
    </script>
</body>

</html>
<?php

// $stmt2->close();
$db_link->close();
?>