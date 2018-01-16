<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>電影管理</title>
</head>
<body>
        <div class="wrap">
                <div class="topArea">
                        <ul class="Menu">
                            <li class="logo">
                                <a>Team7</a>
                            </li>
<?php 
if(empty($_SESSION['admid'])==false){
    echo '
    <li class="mainLink">'.
        $_SESSION['admid'].'，您好
    </li>
    <li>
    <li class="mainLink">
            <a href="../index.php">首頁</a>
    </li>
    </li>
    <li class="mainLink">
            <a href="admchange.php">修改管理員資料</a>
    </li>
    <li class="mainLink">
            <a href="admloggout.php">管理員登出</a>
    </li>';
}else{
    echo '
    <li>
    <li class="mainLink">
            <a href="../index.php">首頁</a>
    </li>
    </li>
    <li class="mainLink">
            <a href="admloggin.php">管理員登入</a>
    </li>
    <li class="mainLink">
            <a href="admreg.php">管理員註冊</a>
    </li>
    ';
}
?>
                        </ul>
                    </div>
             <div id="title">管理員中心</div>
             <div class="customblock">
<?php
if(empty($_SESSION['admid'])==false){
    echo '
    <div class="transaction"> 
    <h2>管理電影</h2>
    <div class="tra_informtion">
    <a href="filmupload.php">上架電影</a>
    <a href="filmcheck.php">檢視及下架電影</a>
    </div>    
</div>
<div class="cus_info">
       <h2>安排場次</h2>
       <div class="cust_rev">
       <a href="sessionupload.php">新增場次</a>
       <a href="sessioncheck.php">檢視及刪除場次</a>
       </div>      
</div> ';
}else{
    echo'             
    <div class="botmenu">
    <a href="../adm/admloggin.php"> 請先登入</a>
        </div>  ';
}
?>                 
        
         </div>  
         </div>
         <footer class="Footer">
                <section class="copyright">
                <p>copyright @第七組 組員:123455676777</p>
                </section>    
        </footer>          
</body>
</html>

