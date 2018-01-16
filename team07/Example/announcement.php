<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Example.css">
    <title>首頁</title>
</head>
<body>
    <div class="wrap">
            <div class="topArea">
                    <ul class="Menu">
                        <li class="logo">
                            <a>Team7</a>
                        </li>
                        <li>
                            <li class="mainLink">
                                <a href="../team07/index.php">首頁</a>
                            </li>
                        </li>
                        <li class="mainLink">
                            <a href="../team07/MovieIntroduction/film_intro.php"> 電影介紹</a>
                        </li>
                        <?php  //如果未登入則顯示登入選項
                        if(empty($_SESSION['Custid'])){
                            echo"
                            <li class='mainLink'>
                                <a href='../team07/custm/cust_loggin.php'>會員登入</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../team07/custm/cust_signin.php'>注冊</a>
                            </li>";
                        }else{   //登入則顯示會員專區
                            echo"                                          
                            <li class='mainLink'>
                                <a href='../team07/custm/cust_Home.php'> 會員專區</a>
                            </li>";
                        }
                        ?> 
                    </ul>
                </div>
                  <div class="annnouncement"><h1>會員系統維護公告</h1>
      <p>1/32是我們網站維護的日子，請大家不要上這個網站，謝謝。
        <div>     
     <footer class="Footer">
        <section class="copyright">
        <p>copyright @第七組 組員:123455676777</p>
        </section>    
    </footer>
     
</body>
</html>