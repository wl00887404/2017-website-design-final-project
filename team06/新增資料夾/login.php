<?php
include_once( "mysql_connect.php");
session_start();
//啟動 session

?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8" />
    <title>會員登入</title>

</head>
<style>
    form {
        border:#aaa solid 1px;
        margin:20px auto;
        padding:30px;
        width:300px;
    }
    .error{
        color:red;
    }
</style>
<body>
    <?php
         

        //使用 isset()方法，判別有沒有此變數可以使用，以及為已經登入
        if(isset($_SESSION['is_user']) && $_SESSION['is_user'] == TRUE):
                
               //使用php header 來轉址到後台
                     header('Location: userend.php');

        elseif(isset($_SESSION['is_admin ']) && $_SESSION['is_admin'] == TRUE):
            header('Location: adminend.php');
       




        else:
    ?>
    <form method="POST" action="checkuser.php">
        <?php
            if(isset($_GET['msg'])){
                echo "<p class='error'>{$_GET['msg']}</p>";
            }
        ?>
        <label>帳號</label> <input type="text" width="80px" height="30px" placeholder="請填入您的帳號" name="username" autofocus></input> 
        <br><br>
        <label>密碼</label> <input type="password" width="80px" height="30px" placeholder="請填入您的密碼" name="pw"></input> 
        <br><br>
       <input type="submit" value="login"></input>
    </form>
    
    <?php endif;
    
    ?>
</body>
</html>
