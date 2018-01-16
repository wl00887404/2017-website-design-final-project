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
    <link rel="stylesheet" type="text/css" href="table.css">
    <title>檢視及刪除場次</title>
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
        <div id="title">檢視及刪除場次</div>
    <div class="customblock">
    <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>查詢場次</h1>
        <a>場次ID: </a><input type="text" name="id"><br>
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
        <a>日期:</a><input type="date" name="mindate" style="width:150px"> ~ <input type="date" name="maxdate" style="width:150px"><br>
        <a>時間:</a><input type="time" name="minstart" style="width:150px"> ~ <input type="time" name="maxstart" style="width:150px"><br>
        <a>廳: </a><select name="theater">
        <option value="">---</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        </select><br>
        <a>價格: </a><input type="text" name="minprice" style="width:100px"> ~ <input type="text" name="maxprice" style="width:100px"><br>
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
$arr = array();
if(empty($id)!==true){
    array_push($arr, "SecNumber = '$id'");
}
if(empty($film)!==true){
    array_push($arr, "FilmNumber = '$film'");
}
if(empty($mindate)!==true){
    array_push($arr, "SecDate >= '$mindate'");
}
if(empty($maxdate)!==true){
    array_push($arr, "SecDate <= '$maxdate'");    
}
if(empty($mintime)!==true){
    array_push($arr, "SecStart >= '$mindate'");
}
if(empty($maxtime)!==true){
    array_push($arr, "SecStart <= '$maxdate'");
}
if(empty($theater)!==true){
    array_push($arr, "SecTheater = '$theater'");
}
if(empty($minprice)!==true){
    array_push($arr, "SecPrice >= '$minprice'");
}
if(empty($maxprice)!==true){
    array_push($arr, "SecPrice <= '$maxprice'");
}
$arrmix ="";
if(count($arr)>0){
    $arrmix = implode(" AND ", $arr);
    $arrmix = "WHERE ".$arrmix;
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

$sql = "SELECT * FROM Session $arrmix ORDER BY SecNumber DESC LIMIT 50";
$result1 = mysqli_query($conn, $sql);
if(mysqli_num_rows($result1)>0){
    echo '<div>
<table class="info" border="solid">
<tr>
    <th>場次ID</th>
    <th>電影ID</th>
    <th>電影名稱</th>
    <th>日期</th>
    <th>時間</th>
    <th>廳次</th>
    <th>價格</th>
    <th>修改</th>
    <th>刪除</th>
</tr>';
    while($row=mysqli_fetch_assoc($result1)){
        echo '<tr>
        <td>'.$row["SecNumber"].'</td>
        <td>'.$row["FilmNumber"].'</td>
        ';
        $n = $row["FilmNumber"];
        $sql = "SELECT FilmName FROM Film WHERE FilmNumber = '$n'";
        $result2 = mysqli_query($conn, $sql);   
        if(mysqli_num_rows($result2)>0){
          while($row2=mysqli_fetch_assoc($result2)){
            echo "<td>".$row2["FilmName"]."</td>";
          }
        }
        else{
          echo "<td>無</td>";
        }
        echo '
        <td>'.$row["SecDate"].'</td>
        <td>'.$row["SecStart"].'</td>
        <td>'.$row["SecTheater"].'</td>
        <td>'.$row["SecPrice"].'</td>
        <td><a href="Secupdate.php?id='.$row["SecNumber"].'">修改</a></td>
        <td><a href="Secdelete.php?id='.$row["SecNumber"].'">刪除</a></td>
        </tr>';
    }
    echo '</table></div>';
}else{
  echo "無相符結果<BR>";
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