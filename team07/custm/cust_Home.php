<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="cust_home.css">
    <title>會員專區</title>
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
                                <a href="..">首頁</a>
                            </li>
                        </li>
                        <li class="mainLink">
                            <a href="../MovieIntroduction/film_intro.php"> 電影介紹</a>
                        </li>
                        <?php  //如果未登入則顯示登入選項
                        if(empty($_SESSION['Custid'])){
                            echo"
                            <li class='mainLink'>
                                <a href='../custm/cust_loggin.php'>登入</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../custm/cust_signin.php'>注冊</a>
                            </li>";
                        }else{   //登入則顯示會員專區
                            echo"                                          
                            <li class='mainLink'>
                                <a href='../custm/cust_Home.php'> 會員專區</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../custm/cust_logout.php'> 登出</a>
                            </li>";
                        }
                        ?> 
                    </ul>
            </div>
             <div id="title">會員中心</div>
             <div class="customblock">
             <div class="transaction"> 
                 <h2>交易紀錄</h2>
                 <div class="tra_informtion">
                 <a href="../custm/cust_bookcheck.php">查詢訂單</a>
                 </div>      
             </div>
             <div class="cus_info">
                    <h2>會員資料</h2>
                    <div class="cust_rev">
                    <a href="../custm/changeinfo.php">修改會員資料</a>
                    </div>      
             </div> 
                      
         </div>  
         </div>
         <footer class="Footer">
                <section class="copyright">
                <p>copyright @第七組 組員:123455676777</p>
                </section>    
        </footer>          
</body>
</html>