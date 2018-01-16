<?php
session_start();
if(empty($_SESSION['admid'])==true){
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="info.css">
    <title>上架電影</title>
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
        <div id="title">上架電影</div>
    <div class="customblock">
    <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>上架電影</h1>
        <a>電影名稱: </a><input type="text" name="name"><br>
        <a>上映日期: </a><input type="date" name="released"><br>
        <a>分級: </a><select name="rating">
        <option value="1">普遍級</option>
        <option value="2">保護級</option>
        <option value="3">輔12級</option>
        <option value="4">輔15級</option>
        <option value="5">限制級</option>
        </select><br>
        <a>片長: </a><input type="text" name="runtime"><br>
        <a>導演: </a><input type="text" name="director"><br>
        <a>主演: </a><input type="text" name="main"><br>
        <a>简介: </a><input type="text" name="brief"><br>
        
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
if(empty($name)||empty($runtime)||empty($released)||empty($rating)||empty($director)||empty($main)==true||empty($brief)==true){
    echo "請確實填寫所有資訊<br>";
}/*elseif(empty($_FILES["file"]["name"])===true){
    echo "未上傳海報";
elseif(strpos($_FILES["file"]["type"],"image/")===false){
    echo "檔案格試錯誤";
}*/else{
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

    $sql = "INSERT INTO Film (FilmName, FilmRuntime, FilmRealsed, FilmRating, FilmDirector, FilmMain,FilmBrief)
             VALUES ('$name', '$runtime', '$released', '$rating', '$director', '$main','$brief')";
    if(mysqli_query($conn, $sql)){
        $last_id = mysqli_insert_id($conn);
        echo "上傳成功，此電影ID為$last_id<BR>";
        //move_uploaded_file($_FILES["file"]["tmp_name"],$last_id.".jpg");
    }else{
      echo "上架失敗<BR>";
      if(mysqli_error($conn)==="Data too long for column 'FilmName' at row 1"){
        echo "電影名稱過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'FilmRuntime' at row 1"){
        echo "片長過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'FilmDirector' at row 1"){
        echo "導演過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'FilmMain' at row 1"){
        echo "主演過長<BR>"; 
      }elseif(mysqli_error($conn)==="Data too long for column 'FilmBrief' at row 1"){
        echo "主演過長<BR>"; 
      }elseif(strpos(mysqli_error($conn),'Incorrect integer value')!== false){
        echo "片長需為整數<BR>"; 
      }else{
        echo "連線錯誤<BR>"; 
      }
    }
      
    mysqli_close($conn); 
  }
?>
    <br>
    <div class="botmenu">
    <a href="../adm/index.php">回電影管理</a>
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