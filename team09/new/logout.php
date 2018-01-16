<?php
//session_start();
//session_unset();
?>

<?php
    //
    if(!empty($_SESSION["id"])){
        $log=1;//為登出按鈕
    }
    else $log=0;//登入按鈕

    if($log==1){
       //echo '<a href="home.php">';
       echo '登出';
       //session_unset();
    }
    else
    {
        //echo '<a href="sign.php">';//到登入葉面
    echo '登入';
    }
    
    //$_SESSION["log"]=$log;
?>