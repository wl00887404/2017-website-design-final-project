<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改資料</title>
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
                                <a href="../index.php">首頁</a>
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
    <div id="title">修改資料</div>
      <div class="cust_revinfo"> 
        <div class="info">                   
          <form action="changeinfo.php" method="post" enctype="multipart/form-data">
            <h1>新的會員資料</h1>
            <a>姓名:</a> <input type="text" name="newname" value=""> <br/>
            <a>密碼:</a> <input type="text" name="npw" value=""> <br/>
            <a>郵箱:</a> <input type="text" name="newemail" value=""> <br/>
            <a>生日:</a> <input type="date" name="newbirth" value=""> <br/>       
            <input type="submit" name="submit" class="button" value="確認修改">
          </form>
          <div class="botmenu">
            <a href="../custm/cust_Home.php"> 回會員專區</a>
          </div>
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

<?php

if($_POST){
    extract($_POST);
    if(!empty($_SESSION['Custid'])){//確認是否登入
        include("Mysql_connect.php");

        if(!$newname&&!$newemail&&!$newbirth&&!$npw){
            echo"<script>alert('沒有任何改動')</script>"."<br/>";
        }
        else{  //有改動

            $id=$_SESSION['Custid'];    
            $sql="SELECT * FROM Customer WHERE CustId = '$id'";
            $result=mysqli_query($conn,$sql);

            //把沒有修改的欄位賦予原值，避免把資料修改為空值
            while($row=mysqli_fetch_assoc($result)){
                if(!$newname){
                      $newname=$row["CustName"];
                 }
                if(!$newbirth){
                        $newbirth=$row["CustBirthday"];
                }
                if(!$newemail){
                        $newemail=$row["CustEmail"];
                }
                if(!$npw){
                        $newemail=$row["CustPassword"];
                }
            }
    
            //update
            $sql = "UPDATE Customer SET CustName='$newname',CustEmail='$newemail',CustBirthday='$newbirth',CustPassword='$npw'
                     WHERE CustId='$id'";
            if(mysqli_query($conn,$sql)){
                echo"<script>alert('修改成功')</script>"."<br/>";
            }
            else{
                echo"<script>alert('修改失敗')</script>";
            }
           
           
        }

        echo "Closing connection<BR>";  
        mysqli_close($conn); 

    }

    else{
        echo"<script>alert('請先登入')</script>";
    }
}
