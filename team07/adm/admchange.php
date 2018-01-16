<?php
session_start();
if(empty($_SESSION['admid'])==true){
    header("location: index.php");
}
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
$id = $_SESSION['admid'];
$sql = "SELECT * FROM Administrator WHERE AdmiId = '$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $oname = $row["AdmiName"];
    $ocode = $row["AdmiPassword"];
    $ophone = $row["AdmiPhone"];
  }
}
else{
  echo "登入失敗<BR>";
}
    
mysqli_close($conn); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="info.css">
    <title>修改管理員資料</title>
</head>
<body>
        <div class="wrap">
                <div class="topArea">
                        <ul class="Menu">
                            <li class="logo">
                                <a>Team7</a>
                            </li>
                            <?php include 'inhead.php'; ?>
                        </ul>
                    </div>
             <div id="title">修改管理員資料</div>
             <div class="customblock">
             <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>修改管理員資料</h1>
        註:若欄位留白則會照舊<br><br>
        <a>原密碼:</a> <input type="text" name="oldcode" value="必填"> <br>
        <a>新密碼:</a> <input type="text" name="code" value=""> <br>
        <a>姓名:</a> <input type="text" name="name" value=""> <br>
        <a>電話:</a> <input type="text" name="phone"> <br> 
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
if(empty($oldcode)==true){
    echo "請填寫原密碼<br>";
}elseif($oldcode !== $ocode){
    echo "原密碼錯誤<br>";
}else{
    if(empty($code)==true){
        $code = $ocode;
    }
    if(empty($name)==true){
        $name = $oname;
    }
    if(empty($phone)==true){
        $phone = $ophone;
    }
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

    
    //sql to insert data
    $sql = "UPDATE Administrator SET  AdmiName='$name', AdmiPassword='$code', AdmiPhone='$phone' WHERE AdmiID='$id'";
  
    if(mysqli_query($conn, $sql)){
      echo "修改成功<BR>";
    }
    else{
      echo "修改失敗<BR>";
      if(mysqli_error($conn)==="Duplicate entry '$id' for key 'PRIMARY'"){
        echo "該帳號名稱已被註冊<BR>";
      }elseif(mysqli_error($conn)==="Data too long for column 'AdmiId' at row 1"){
        echo "帳號過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'AdmiName' at row 1"){
        echo "姓名過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'AdmiPassword' at row 1"){
        echo "新密碼過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'AdmiPhone' at row 1"){
        echo "電話過長<BR>";       
      }else{
        echo "連線錯誤<BR>"; 
      }
    }
      
    mysqli_close($conn); 
  }
?>
    <br>
    <div class="botmenu">
    <a href="../adm/index.php"> 回管電影管理</a>
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
