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
$sql = "SELECT * FROM Session WHERE SecNumber = '$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $ofilm = $row["FilmNumber"];
    $odate = $row["SecDate"];
    $ostart = $row["SecStart"];
    $otheater = $row["SecTheater"];
    $oprice = $row["SecPrice"];
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
    <title>修改場次資料</title>
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
        <div id="title">修改場次資料</div>
    <div class="customblock">
    <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>ID:<?php echo $id; ?></h1>
        <a>電影名稱:</a><select name="film">
        <option value="">---</option>
        <?php
            $servername = "140.123.175.101";
            $username = "team07";
            $password = "gg";
            $dbname = "team07";
          
            //create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            $sql = "SELECT FilmNumber, FilmName FROM Film WHERE FilmState = '1'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_assoc($result)){
                echo "<option value=\"".$row["FilmNumber"]."\">".$row["FilmName"]."</option>";
              }
            }
            else{
              echo "無<BR>";
            }
            mysqli_close($conn);
        ?>
        </select><br>
        <a>日期:</a><input type="date" name="date"><br>
        <a>時間:</a><input type="time" name="start"><br>
        <a>廳: </a><select name="theater">
        <option value="">---</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        </select><br>
        <a>價格: </a><input type="text" name="price"><br>
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
if(empty($film)===true){
    $film=$ofilm;
}
if(empty($date)===true){
    $date=$odate;
}
if(empty($start)===true){
    $start=$ostart;
}
if(empty($theater)===true){
    $theater=$otheater;
}
if(empty($price)===true){
    $price=$oprice;
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

$sql = "UPDATE Session SET 
        FilmNumber='$film', 
        SecDate='$date', 
        SecStart='$start', 
        SecTheater='$theater', 
        SecPrice='$price'
        WHERE SecNumber='$id'";
if(mysqli_query($conn, $sql)){
    $last_id = mysqli_insert_id($conn);
    echo "修改成功<BR>";
}else{
  echo "修改失敗，";
  if(mysqli_error($conn)==="Data too long for column 'SecPrice' at row 1"){
    echo "價格過高<BR>"; 
  }else{
    echo mysqli_error($conn)."連線錯誤<BR>"; 
  }
}
mysqli_close($conn); 

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