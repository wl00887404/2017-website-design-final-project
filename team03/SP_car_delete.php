<?php
    include 'Announcement.php';
    session_start();
    $id = $_SESSION["id"];
    $check = $_POST['checkbox'];

    if(count($check)!=0){
    foreach($check as $value){       
        $sql = "DELETE FROM  SP_cart WHERE T_no = $value and id = '$id'";
        mysqli_query($conn, $sql);    
    }
    echo "刪除成功，三秒後跳轉...";
    header("Refresh: 3; url=my_cart.php" );
    }
    else
    {
        echo "你沒有選擇任何項目，三秒後回到購物車";
        header("Refresh: 3; url=my_cart.php" );
    }
?>