<?php
 session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>登入</title>
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
                            <a href="../MovieIntroduction/film_intro.php">電影介紹</a>
                        </li>
                        <?php  
                        if(empty($_SESSION['Custid'])){//如果未登入則顯示登入選項
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
    <div id="title">登入</div>
    <div class="cust_revinfo">  
        <div class="info">  
            <h1>登入</h1>
            <form action="#" method="post" enctype="multipart/form-data">
                帳號: <input type="text" name="id" value="sss"> <br/>
                密碼: <input type="password" name="code"/> <br/>
                角色: <input type="radio" name="rolltype" value="cust"checked/>會員
                      <input type="radio" name="rolltype" value="admi">管理員
                <input type="submit" name="submit" class="button" value="登入">
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
    //確認資料填寫完整
    if(empty($id)&&!empty($code)){
        echo"<script>alert('請輸入用戶名')</script>"."<br/>";
    }
    else if(empty($code)&&!empty($id)){
        echo"<script>alert('請輸入密碼')</script>"."<br/>";
    }
    else if(empty($id)&&empty($code)){
        echo"<script>alert('請輸入用戶名和密碼')</script>"."<br/>";
    }
    
    else{ 
        //creat&check connection
        include("Mysql_connect.php");
       
        if($rolltype=="admi"){
            //管理者登入
            $sql = "SELECT * FROM Administrator WHERE AdmiId = '$id'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row["AdmiPassword"]==$code){
                        echo "登入成功<BR>";
                        $_SESSION['admid'] = $id;                
                        //跳轉到首頁
                        header("location:../adm/index.php");
                    }
                    else{
                        echo"<script>alert('密碼錯誤')</script>"."<br/>";                         //密碼錯誤
                    }
                }
            }
            else{
                echo"<script>alert('賬號不存在')</script>"."<br/>";   //賬號不存在
            }  
        }
        //會員登入
        if($rolltype=="cust"){   
            $sql = "SELECT * FROM Customer WHERE CustId = '$id'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row["CustId"]==$id && $row["CustPassword"]==$code){
                      $_SESSION['Custid'] = $id;                
                      //跳轉到首頁
                      header("location:../MovieIntroduction/film_intro.php");
                    }
                    else{
                        echo"<script>alert('密碼錯誤')</script>"."<br/>";     //密碼錯誤
                    }
                }
            }
            else{
                echo"<script>alert('賬號不存在')</script>"."<br/>";
            }      
        }
        echo "Closing connection<BR>";  
        mysqli_close($conn);
    }
}

?>
