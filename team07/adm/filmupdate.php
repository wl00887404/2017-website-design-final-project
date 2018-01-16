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
$id = $_GET['id'];
$sql = "SELECT * FROM Film WHERE FilmNumber = '$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $oname = $row["FilmName"];
    $orealsed = $row["FilmRealsed"];
    $orating = $row["FilmRating"];
    $oruntime = $row["FilmRuntime"];
    $odirector = $row["FilmDirector"];
    $omain = $row["FilmMain"];
    $ostate = $row["FilmState"];
    $obrief= $row['FilmBrief'];
  }
}
else{
  echo "載入失敗<BR>";
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
    <title>修改電影資料</title>
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
        <div id="title">修改電影資料</div>
    <div class="customblock">
    <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>ID:<?php echo $id; ?> <?php echo $oname; ?></h1>
        註:若欄位留白則會照舊<br><br>
        <a>新電影名稱: </a><input type="text" name="name"><br>
        <a>上映日期: </a><input type="date" name="released"><br>
        <a>分級: </a><select name="rating">
        <option value="">---</option>
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
        <a>狀態: </a><select name="state">
        <option value="">---</option>
        <option value="1">上映中</option>
        <option value="2">已下檔</option>
        </select><br>
        <a>新海報: </a><input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
if(empty($name)===true){
    $name=$oname;
}
if(empty($runtime)===true){
    $runtime=$oruntime;
}
if(empty($released)===true){
    $released=$orealsed;
}
if(empty($rating)===true){
    $rating=$orating;
}
if(empty($director)===true){
    $director=$odirector;
}
if(empty($main)===true){
    $main=$omain;
}if(empty($brief)===true){
    $brief=$obrief;
}if(empty($state)===true){
    $state=$ostate;
}
if(empty($_FILES["file"]["name"])===false){
    if(strpos($_FILES["file"]["type"],"image/")===false){
        echo "檔案格試錯誤";
    }
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

$sql = "UPDATE Film SET 
        FilmName='$name', 
        FilmRuntime='$runtime', 
        FilmRealsed='$released', 
        FilmRating='$rating', 
        FilmDirector='$director', 
        FilmMain='$main',
        FilmState='$state',
        FilmBrief= '$brief'
        WHERE FilmNumber='$id'";
if(mysqli_query($conn, $sql)){
    $last_id = mysqli_insert_id($conn);
    echo "修改成功<BR>";
    if(empty($_FILES["file"]["name"])===false){
        move_uploaded_file($_FILES["file"]["tmp_name"],"poster/".$id.".jpg");
    }
}else{
  echo "修改失敗<BR>";
  if(mysqli_error($conn)==="Data too long for column 'FilmName' at row 1"){
    echo "電影名稱過長<BR>"; 
  }elseif(mysqli_error($conn)==="Data too long for column 'FilmRuntime' at row 1"){
    echo "片長過長<BR>"; 
  }elseif(mysqli_error($conn)==="Data too long for column 'FilmDirector' at row 1"){
    echo "導演過長<BR>"; 
  }elseif(mysqli_error($conn)==="Data too long for column 'FilmMain' at row 1"){
    echo "主演過長<BR>"; 
  }elseif(mysqli_error($conn)==="Data too long for column 'FilmBrief' at row 1"){
    echo "简介過長<BR>"; 
  }elseif(strpos(mysqli_error($conn),'Incorrect integer value')!== false){
    echo "片長需為整數<BR>"; 
  }else{
    echo mysqli_error($conn)."連線錯誤<BR>"; 
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