<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="menuc.css">
    <title>熱映電影</title>
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
                                <a href=".. ">首頁</a>
                            </li>
                        </li>
                        <li class="mainLink">
                            <a href="../MovieIntroduction/film_intro.php"> 電影介紹</a>
                        </li>
                        <?php  //如果未登入則顯示登入選項
                        if(empty($_SESSION['admid'])&&empty($_SESSION['Custid'])){
                            echo"
                            <li class='mainLink'>
                                <a href='../custm/cust_loggin.php'>登入</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../custm/cust_signin.php'>注冊</a>
                            </li>";
                        }
                        elseif(!empty($_SESSION['Custid'])){//會員登入  
                            echo"                                                               
                            <li class='mainLink'>
                                <a href='../custm/cust_Home.php'> 會員專區</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../custm/cust_logout.php'> 登出</a>
                            </li>";
                        }
                        else{   //管理者登入
                            echo"                                          
                            <li class='mainLink'>
                                <a href='../adm/index.php'> 管理者專區</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../adm/admloggout.php'>管理員登出</a>
                            </li>";
                        }
                        ?> 
                    </ul>
                   
                </div>
                
        <div id="title">熱銷中</div>
        <div id="search">
            <form action="#"method="post" >
                <input type="date" name="day" id="search_text">
                <input type="submit" name="search" value"查找" id="butt">
            </form>
        </div>       
        <div class="all_movie">
        <?php
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
$now = date("Y/m/d"); //今天日期

$search=0;
$sql = "SELECT FilmNumber FROM Session WHERE SecDate >= '$now' ORDER BY SecDate ASC"; //查詢今後還有場次的電影編號
if(isset($_POST['day'])){
    $day=$_POST['day'];
    if(strtotime($day)>=strtotime($now)){
       $search=1;//日期輸入正確,查找到當日場次
       $sql = "SELECT FilmNumber FROM Session WHERE SecDate = '$day' ORDER BY SecDate";
    }
    else{
        echo"<script>alert('只能查詢今天以後的日期')</script>";
    }
}
$result0 = mysqli_query($conn, $sql);
$fnArr= array();
if(mysqli_num_rows($result0)>0){
    while($row0=mysqli_fetch_assoc($result0)){
        array_push($fnArr, $row0["FilmNumber"]);
    }
}
else{
    if($search==1){//搜索日期沒有場次
        $search=0;
        echo"<script>alert('當天沒有電影放映哦，看看其它的吧')</script>";
        $sql = "SELECT FilmNumber FROM Session WHERE SecDate >= '$now' ORDER BY SecDate ASC"; //查詢今後還有場次的電影編號
        $result0 = mysqli_query($conn, $sql);
        $fnArr= array();
        if(mysqli_num_rows($result0)>0){
            while($row0=mysqli_fetch_assoc($result0)){
                array_push($fnArr, $row0["FilmNumber"]);
            }
        }
        else{
            array_push($fnArr, "查無結果");
        } 
    }
    else{
        array_push($fnArr, "查無結果");
    }  
}
$fnArr = array_unique($fnArr); //用array_unique()去掉重複的結果
foreach ($fnArr as $key => $fn){
    $sql = "SELECT * FROM Film WHERE FilmNumber = '$fn' ORDER BY FilmRealsed DESC";
    $result1 = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result1)>0){
        while($row1=mysqli_fetch_assoc($result1)){
            echo '
            <div class="movie_list">
            <div class="Mshow">
            <div class="Mphoto">
                <img src="http://www.fathomdelivers.com/wp-content/uploads/2012/05/film.jpg " width="100%">
            </div>
            <div class="Mtitle">
                <h1>'.$row1["FilmName"].'</h1> 
                <h2>';
            if($row1["FilmRating"]==1){
                echo '<font color="#58B530">普遍級</font>';
            }elseif($row1["FilmRating"]==2){
                echo '<font color="#00A0E9">保護級</font>';
            }elseif($row1["FilmRating"]==3){
                echo '<font color="#FDD000">輔12級</font>';
            }elseif($row1["FilmRating"]==4){
                echo '<font color="#EE7700">輔15級</font>';
            }elseif($row1["FilmRating"]==5){
                echo '<font color="#E60012">限制級</font>';
            }
            echo ' '.$row1["FilmRuntime"].'分鐘</h2>
                </div>';
            $sdArr = array();
            $sql = "SELECT SecDate FROM Session WHERE FilmNumber ='$fn' AND SecDate >= '$now' ORDER BY SecDate ASC";
            if($search==1){//如果進行搜索且當日有場次
                $sql = "SELECT SecDate FROM Session WHERE FilmNumber ='$fn' AND SecDate = '$day' ORDER BY SecDate ASC";
            }
            $result2 = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result2)>0){
                while($row2=mysqli_fetch_assoc($result2)){
                    array_push($sdArr, $row2["SecDate"]);
                }
            }
            $sdArr = array_unique($sdArr);
            $counter = 0;
            foreach ($sdArr as $key => $sd){
                if(++$counter > 2){ //最多列出2天的場次
                    break;
                }
                echo'
                <div class="Mtime2">
                    <ul>
                        <li>'.$sd.'</li>
                ';
                $sql = "SELECT * FROM Session WHERE FilmNumber = '$fn' AND SecDate ='$sd' ORDER BY SecStart ASC";
                $result3 = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result3)>0){
                    while($row3=mysqli_fetch_assoc($result3)){
                        echo'
                        <li>'.$row3["SecStart"].'</li>                  
                        ';
                    }
                }
                echo'
                    </ul>
                </div>
                ';
            }
        }
    }
    echo'
                    <div id="button">
                    <a href="Ticket_purchase.php?fn='.$fn.'"><input type="button" value="購票去" class="button"></a>
            </div>  
        </div>
    </div>
    ';
}    
mysqli_close($conn);
?>
        </div>
        <div class="block">
        <p>測試中</p>    
        </div>      
            <footer class="Footer">
            <section class="copyright">
            <p>copyright @第七組 </p>
            </section>    
           </footer>
        </div>
</body>

</html>