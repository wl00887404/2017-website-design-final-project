<?php
session_start();
if(empty($_SESSION['admid'])==true){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="info.css">
    <title>新增場次</title>
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
             <div id="title">新增場次</div>
             <div class="customblock">
             <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>新增場次</h1>
        <a>電影名稱:</a><select name="film">
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
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        </select><br>
        <a>價格: </a><input type="text" name="price"><br>
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
if(empty($film)||empty($date)||empty($date)||empty($start)||empty($price)==true){
    echo "請確實填寫所有資訊<br>";
}elseif(is_numeric("$price")===false || $price<0){
    echo "價格需為正數<br>";
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
    else{
    }
    $check = 0; //檢查時間是否衝突，預設0代表沒衝突，大於0代表有衝突

    $sql = "SELECT FilmRuntime FROM Film WHERE FilmNumber = '$film'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $t= $row["FilmRuntime"];
      }
    }
    else{
      echo '輸入異常';
    }
    
    $sql = "SELECT S.SecStart, F.FilmRuntime 
            FROM Session AS S, Film AS F 
            WHERE S.FilmNumber = F.FilmNumber 
            AND S.Sectheater ='$theater'
            AND S.secDate ='$date'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $r= $row["FilmRuntime"];
        $s =$row["SecStart"];
        if($s<=$start && strtotime("$s+$r minutes+10 minutes")<=strtotime("$start")){

        }elseif($s>$start && strtotime("$start+$t minutes+10 minutes")<=strtotime("$s")){

        }else{
          $check++;
        }
      }
    }else{
    }

    if($check==0){
      $sql = "INSERT INTO Session (FilmNumber, SecDate, SecStart, SecTheater, SecPrice) VALUES ('$film', '$date', '$start', '$theater', '$price')";
      if(mysqli_query($conn, $sql)){
        $last_id = mysqli_insert_id($conn);
        echo "新增成功，此場次ID為$last_id<BR>";
      }
      else{
        echo "新增失敗，";
        if(mysqli_error($conn)==="Data too long for column 'SecPrice' at row 1"){
          echo "價格過高<BR>"; 
        }else{
          echo "連線錯誤<BR>"; 
        }
      }
    }else{
      echo "新增失敗，時間衝突<BR>";
    }
    
    mysqli_close($conn); 
  }
?>
    <br>
    <div class="botmenu">
    <a href="../adm/index.php"> 回電影管理</a>
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
