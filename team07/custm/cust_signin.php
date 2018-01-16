<?php
 session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>注冊</title>
    <link rel="stylesheet" type="text/css" href="changeinfo.css">
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
                            </li>";
                        }
                        ?> 
                    </ul>
    </div>
    <div id="title">會員注冊</div>
    <div class="cust_revinfo">  
        <div class="info">  
            <h1>註冊會員帳號</h1>
            <form action="#" method="post" enctype="multipart/form-data">
                帳號: <input type="text" name="id" value=""> <br/>
                姓名: <input type="text" name="name" value=""> <br/>
                密碼: <input type="text" name="code" value=""> <br/>
                生日: <input type="date" name="birth" value=""> <br/>
                郵箱: <input type="text" name="phone" value=""> <br/>
                <input type="submit" name="submit" class="button "value="提交">
            </form>
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

<?php
if(extract($_POST)){
   //檢查資料是否填寫完整
   if(empty($id)||empty($name)||empty($code)){
    echo"<script>alert('資訊需要填寫完整')</script>";
    }
   else{
     //creat&check connection
     include("Mysql_connect.php");
     //sql to insert data
     $sql = "INSERT INTO Customer (CustId, CustName, CustPassword, CustBirthday, CustEmail) VALUES ('$id', '$name', '$code', '$birth','$phone')";
     if(mysqli_query($conn,$sql)){
        echo"<script>alert('注冊成功')</script>";
        $_SESSION['Custid']=$id;
        echo " <script language = 'javascript' type = 'text/javascript' > "; 
        echo " window.location.href = 'cust_Home.php' "; 
        echo " </script > ";
     }
     else{
         echo"<script>alert('該帳號名稱已被註冊')</script>";
     }
     
    mysqli_close($conn); 
    }
}
?>