<?php
    include("connMysqlObj2.php");

    $cardNumberin = $_POST["cardNumberin"];
    $holderNamein = $_POST["holderNamein"];
    $monthInputin = $_POST["monthInputin"];
    $yearInputin = $_POST["yearInputin"];
    $cvvBoxin = $_POST["cvvBoxin"];

    echo $cardNumberin.$holderNamein.$monthInputin.$yearInputin .$cvvBoxin;

    // $sql_query = "INSERT INTO news (newstitle, newscontent, newsdate, newstatus, newsimg, newsother) VALUES (?,?,?,?,?,?)";
    // $stmt = $db_link->prepare($sql_query);
    // $stmt->bind_param("s", $newsother);
    // $stmt->execute();

    // $stmt->close();


    header("Location: ./users-html.php");
?>
