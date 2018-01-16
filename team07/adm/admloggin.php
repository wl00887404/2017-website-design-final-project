<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="info.css">
    <title>管理員登入</title>
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
                              <a href="../Example/Example.html">首頁</a>
                            </li>
                            </li>
                            <li class="mainLink">
                              <a href="../adm/admloggin.php">管理員登入</a>
                            </li>
                            <li class="mainLink">
                              <a href="../adm/admreg.php">管理員註冊</a>
                            </li>
                        </ul>
                    </div>
             <div id="title">管理員登入</div>
             <div class="customblock">
             <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>管理員登入</h1>
        <a>帳號:</a> <input type="text" name="id" value=""> <br/>
        <a>密碼:</a> <input type="text" name="code" value=""> <br/>    
        <input type="submit" name="submit" class="button"value="確認">
    </form>
    <?php
extract ($_POST);
if(empty($id)||empty($code)==true){
    echo "請確實填寫所有資訊<br>";
}else{
    $servername = "140.123.175.101";
    $username = "team07";
    $password = "gg";
    $dbname = "team07";
  
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check connection
    if(!$conn){
      die ("Connection failed: " . mysqli_connect_error() . "<BR>");       
    }
    
    $sql = "SELECT * FROM Administrator WHERE AdmiId = '$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        if($row["AdmiId"]==$id&& $row["AdmiPassword"]==$code){
          echo "登入成功<BR>";
          $_SESSION['admid'] = $id;  //將帳號寫入session，方便驗證使用者身份
          header("location: index.php");
        }else{
          echo "登入失敗<BR>"; //密碼錯誤
        }
      }
    }
    else{
      echo "登入失敗<BR>";
    }
    
    
    mysqli_close($conn); 
  }
?>
    <br>
    <div class="botmenu">
    <a href="../adm/index.php"> 回管理員目錄</a>
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


