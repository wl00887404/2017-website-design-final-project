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
    <title>檢視及下架電影</title>
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
        <div id="title">檢視及下架電影</div>
    <div class="customblock">
    <div class="cust_revinfo"> 
    <div class="info">                   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>查詢電影</h1>
        <a>電影ID: </a><input type="text" name="id"><br>
        <a>電影名稱: </a><input type="text" name="name"><br>
        <a>上映日期: </a><input type="date" name="released"><br>
        <a>分級: </a><select name="rating">
        <option value="">---</option> 
        <option value="1">普遍級</option>
        <option value="2">保護級</option>
        <option value="3">輔12級</option>
        <option value="4">輔15級</option>
        <option value="5">限制級</option>
        </select><br>
        <a>片長: </a><input type="text" name="mintime" style="width:100px"> ~ <input type="text" name="maxtime" style="width:100px"><br>
        <a>導演: </a><input type="text" name="director"><br>
        <a>主演: </a><input type="text" name="main"><br>
        <a>狀態: </a><select name="state">
        <option value="">---</option>
        <option value="1">上映中</option>
        <option value="2">已下檔</option>
        </select><br>
        <input type="submit" name="submit" class="button"value="確認">
    </form>
<?php
extract ($_POST);
$arr = array();
if(empty($id)!==true){
    array_push($arr, "FilmNumber = '$id'");
}
if(empty($name)!==true){
    array_push($arr, "FilmName LIKE '%$name%'");
}
if(empty($mintime)!==true){
    array_push($arr, "FilmRuntime >= '$mintime'");
}
if(empty($maxtime)!==true){
    array_push($arr, "FilmRuntime <= '$maxtime'");
}
if(empty($released)!==true){
    array_push($arr, "FilmRealsed = '$released'");    
}
if(empty($rating)!==true){
    array_push($arr, "FilmRating = '$rating'");
}
if(empty($director)!==true){
    array_push($arr, "FilmDirector LIKE '%$director%'");
}
if(empty($main)!==true){
    array_push($arr, "FilmMain LIKE '%$main%'");
}if(empty($state)!==true){
    array_push($arr, "FilmState = '$state'");
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

$sql = "SELECT * FROM Film $arrmix ORDER BY FilmNumber DESC LIMIT 50";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    echo '<div>
<table class="info" border="solid">
<tr>
    <th>電影ID</th>
    <th>電影名稱</th>
    <th>上映日期</th>
    <th>分級</th>
    <th>片長(分鐘)</th>
    <th>導演</th>
    <th>主演</th>
    <th>狀態</th>
    <th>海報網址</th>
    <th>修改</th>
    <th>刪除</th>
</tr>';
    while($row=mysqli_fetch_assoc($result)){
        echo '<tr>
        <td>'.$row["FilmNumber"].'</td>
        <td>'.$row["FilmName"].'</td>
        <td>'.$row["FilmRealsed"].'</td>
        ';
        if($row["FilmRating"]==1){
            echo '<td>普遍級</td>';
        }elseif($row["FilmRating"]==2){
            echo '<td>保護級</td>';
        }elseif($row["FilmRating"]==3){
            echo '<td>輔12級</td>';
        }elseif($row["FilmRating"]==4){
            echo '<td>輔15級</td>';
        }elseif($row["FilmRating"]==5){
            echo '<td>限制級</td>';
        }
        echo '
        <td>'.$row["FilmRuntime"].'</td>
        <td>'.$row["FilmDirector"].'</td>
        <td>'.$row["FilmMain"].'</td>
        ';
        if($row["FilmState"]==1){
            echo '<td>上映中</td>';
        }elseif($row["FilmState"]==2){
            echo '<td>已下檔</td>';
        }
        echo '
        <td><a href="'.$row["FilmNumber"].'.jpg">檢視</a></td>
        <td><a href="filmupdate.php?id='.$row["FilmNumber"].'">修改</a></td>
        <td><a href="filmdelete.php?id='.$row["FilmNumber"].'">刪除</a></td>
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