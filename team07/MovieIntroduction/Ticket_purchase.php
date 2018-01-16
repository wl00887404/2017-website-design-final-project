<?php
session_start();
if(empty($_SESSION['Custid'])&&empty($_SESSION['admid'])){//未登入
    echo"<script>alert('請先登入')</script>";
    echo " <script language = 'javascript' type = 'text/javascript' > "; 
    echo " window.location.href = '../custm/cust_loggin.php' "; 
    echo " </script > "; 
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>購票</title>
    <link rel="stylesheet" type="text/css" href="../MovieIntroduction/purchase.css">
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
    <div id="title">購票</div>
    <div class="info">
    <div class="in">
    <?php
//已登入
include("../custm/Mysql_connect.php");
$fn=$_GET["fn"];
$sql="SELECT * FROM  Film WHERE FilmNumber = '$fn'";//獲取該電影的資訊
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){//電影簡介
    $row=mysqli_fetch_assoc($result);
    echo'
   <div class="Mshow">
     <div class="Mphoto">
        <img src="http://www.fathomdelivers.com/wp-content/uploads/2012/05/film.jpg" width="100%">
     </div>
     <div class="Mtitle">
        <h1>'.$row["FilmName"].'</h1>
        <h3>';
        if($row["FilmRating"]==1){
            echo '<font color="#58B530">普遍級</font>';
        }elseif($row["FilmRating"]==2){
            echo '<font color="#00A0E9">保護級</font>';
        }elseif($row["FilmRating"]==3){
            echo '<font color="#FDD000">輔12級</font>';
        }elseif($row["FilmRating"]==4){
            echo '<font color="#EE7700">輔15級</font>';
        }elseif($row["FilmRating"]==5){
            echo '<font color="#E60012">限制級</font>';
        }
        echo ' '.$row["FilmRuntime"].'分鐘</h3>';
        echo '<h3>導演：'.$row["FilmDirector"].'</h3>';
        echo '<h3>主演：'.$row["FilmMain"].'</h3>';
        echo '<a><strong>内容简介：</strong>'.$row["FilmBrief"].'</a>';
}
$sql="SELECT SecPrice FROM Session WHERE FilmNumber = '$fn'";//獲取該電影的資訊
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){//電影簡介
    $row=mysqli_fetch_assoc($result);
      echo'<h4>票價：'.$row["SecPrice"].'</h4>
     </div>
   </div>';
}
?>  
 <form action="#" method="post" class="number" enctype="multipart/form-data">
    <a>日期:
    <select name="date" onChange="filmchange(this.value)">           
        <option value="">---</option>
        <?php  
        include("../custm/Mysql_connect.php");
        $fn=$_GET['fn'];
        $sdArr = array();
        $now = date("Y/m/d"); 
        $sql = "SELECT SecDate FROM Session WHERE SecDate >= '$now' AND FilmNumber='$fn' ORDER BY SecDate ASC"; //查詢今後還有場次的電影編號
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            $sdArr[]=$row["SecDate"];
          }
        }
        else{
            array_push($sdArr, "查無結果");
        }
        $sdArr = array_unique($sdArr); //用array_unique()去掉重複的結果
        foreach ($sdArr as $key => $value){
            echo '<option value="'.$value.'">'.$value."</option>";
        }
    
        ?>
    </select>
    場次:
    <select id="time" name="sectime">
        <option value="">---</option>
    </select >      
    <?php
        $stimeArr=array();
        foreach ($sdArr as $key => $value) { //$value是場次日期
            $sql = "SELECT SecDate,SecStart,SecTheater FROM Session WHERE SecDate = '$value' AND FilmNumber='$fn'"; //從session查詢一個日期對應的時間
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $stimeArr[]=$row;
                }          
            }
            else{
                echo"<option>"."wrong"."</option>";
            }
        }
        //$stimeArr = array_unique($stimeArr); //用array_unique()去掉重複的結果
                 
       
    ?>
    <script type="text/javascript">
        function remove(slc){
        //從最後一個選項開始刪，刪到只剩一個選項(預設的---選項)
            for(var i = slc.length-1 ; i>=1 ; i--){
                slc.remove(i);
            }
        }
        function filmchange(d){
            var slcD = document.getElementById("time");
            remove(slcD);
            //呼叫PHP
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() { 
                if (this.readyState == 4 && this.status == 200) {
                    var text =this.responseText; //responseText是php回傳的值(字串型式)
                    eval(text); //eval函數可以執行字串內容
                }
            };
            var fn= <?php echo"$fn";?>;
            //將Request傳到purchase_search.php，並把d(日期)儲存在網址參數d  
            xmlhttp.open("GET", "purchase_search.php?d="+d+"&fn="+fn, true);
            xmlhttp.send();
        }
    </script>       
    數量: <input type="text" name="amount" value="" class="num"> </a>
        <input type="submit" name="submit" class="button "value="確認">
</form>

    </div>
    </div>
</div>

<footer class="Footer">
                <section class="copyright">
                <p>copyright @第七組</p>
                </section>    
        </footer>        
</body>
</html>

<?php
if(extract($_POST)){
    //檢查資料是否填寫完整
    if(!$date||!$sectime){    
        echo"<script>alert('請選擇場次')</script>";
    }
    elseif(empty($amount)){
        echo"<script>alert('請填寫數量')</script>";
    }    
    elseif(!is_numeric($amount)&&$amount>0){
        echo"<script>alert('請輸入正確的數字')</script>";
    }
    else{
        $id=$_SESSION['Custid'];
        $sql_sn="SELECT SecNumber FROM Session WHERE FilmNumber='$fn' AND SecDate='$date'AND SecStart='$sectime'";
        $sess=0;
        if($result=mysqli_query($conn,$sql_sn)){
            $row=mysqli_fetch_assoc($result);
            print_r($row);
            $sess=$row["SecNumber"];
            
            $sql = "INSERT INTO Book (CustId, BookDate, SecNumber, BookAmount) VALUES ('$id', '$now', '$sess','$amount')";
            if(mysqli_query($conn,$sql)){
                if($booknum=mysqli_insert_id($conn)){//获得刚创建的订单号        
                    for($i=1;$i<=$amount;$i++){//根据票种数量生成电影票
                        $seat="A"."$i";
                        $sql = "INSERT INTO Ticket (BookNumber, TickSeat,TickRefund) VALUES ('$booknum', '$seat' ,'0')";
                        mysqli_query($conn,$sql);
                    }       
                }
                echo"<script>alert('购买成功')</script>";
            }  
            else{
                echo"<script>alert('购买失败')</script>";;
            }        
        }
        else{
            echo"<script>alert('error')</script>";
        }
        

        mysqli_close($conn); 
    }
 }
?>




