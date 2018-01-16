<?php
    include 'Announcement.php';
    session_start();
    $id = $_SESSION["id"];
    $check = $_POST['checkbox'];
    

    if(count($check)!=0){
    foreach($check as $value){ 
        $re = explode("+",$value);      
        $sql = "DELETE FROM  ticket WHERE AP_name = '$re[0]' and T_name = '$re[1]'";
        mysqli_query($conn, $sql);    
    }
    echo "刪除成功，三秒後跳轉...";
    header("Refresh: 3; url=view_ticket.php" );
    }
    else
    {
        echo "你沒有選擇任何項目，三秒後回上一頁";
        header("Refresh: 3; url=view_ticket.php" );
    }
?>