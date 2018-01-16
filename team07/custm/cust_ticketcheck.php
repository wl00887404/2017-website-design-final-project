<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" type="text/css" href="cust_book.css">
   <title>電影票詳情</title>
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
                    <a href="..">首頁</a>
                </li>
            </li>
            <li class="mainLink">
                <a href="../MovieIntroduction/film_intro.php"> 電影介紹</a>
            </li>
            <?php  //未登入則顯示登入選項
                if(empty($_SESSION['Custid'])){
                    echo"
                    <li class='mainLink'>
                        <a href='../custm/cust_loggin.php'>登入</a>
                    </li>
                    <li class='mainLink'>
                        <a href='../custm/cust_signin.php'>注冊</a>
                    </li>";
                }else{   //登入則顯示會員專區
                    echo"                                          
                    <li class='mainLink'>
                        <a href='../custm/cust_Home.php'> 會員專區</a>
                    </li>
                    <li class='mainLink'>
                        <a href='../custm/cust_logout.php'> 登出</a>
                    </li>";
                }
            ?> 
        </ul>               
    </div>
<div id="title">影票詳情</div>
<div class=block>
    <div class="bookinfo">


<?php                                      

function print_book($row_tc,$row_sinfo,$bn){                     //表頭
    $string='<table class="t_info" border="solid">'."<tr><th>訂單號</th><th>電影名稱</th><th>場次</th><th>單價</th><th>票號</th><th>座位</th><th>操作</th></tr>";
    $rowspan=count($row_tc);
    $string=$string.'<tr>';
    $string=$string.'<td rowspan="'.$rowspan.'">'.$bn.'</td>';
    foreach($row_sinfo['0'] as $key=>$value){      
        if($key=="SecDate"){
            $string=$string.'<td rowspan="'.$rowspan.'">'.$value."\n".$row_sinfo[0]['SecStart']."\n".$row_sinfo[0]['SecTheater'].'廳'.'</td>';       
        }
        if($key=="FilmName"||$key=="SecPrice"){
            $string=$string.'<td rowspan="'.$rowspan.'">'.$value.'</td>';           
        }
    }
    foreach($row_tc as $key=>$value){
        if($key==1||$key==2){
            $string=$string."<tr>";
        }
        foreach($row_tc[$key] as $skey=>$sval){
            if($skey=="TickRefund"){
                $tn=$row_tc[$key]["TickNumber"];
                $stime=$row_sinfo[0]["SecDate"];
                $tmp_s='<form method="post" action="ticketdelete.php" ><input type="hidden" name="tn" value="'.$tn.'"><input type="hidden" name="stime" value="'.$stime.'"><input type="hidden" name="bn_" value="'.$bn.'"><input type="hidden" name="bn" value="'.$bn.'"><input type="submit" name="refund" value="退票"></form>'; 
                $string=$string.'<td>'.$tmp_s.'</td>';          
            }
            else{
                $string=$string.'<td>'.$sval.'</td>';
            }
        }
            
        $string=$string."</tr>";    

    }
    $string=$string."</table>";
    return $string;
       
}
       



/*
------------------运行----------------------------------
*/
if(empty($_SESSION['Custid'])){
    echo"<script>alert('please log in first')</script>";
    echo'<div class="botmenu">
            <a href="../custm/cust_loggin.php"> 由此登入</a>
         </div>';
 }
else{//已登入
    //creat&check connection
    $id=$_SESSION['Custid'];
    include("Mysql_connect.php");//購票資料
    
    $bn=$_GET['bn'];
    //票务资料
    $sql1="SELECT TickNumber,TickSeat,TickRefund FROM Ticket WHERE BookNumber='$bn'";
    $result1=mysqli_query($conn,$sql1);
    //场次
    $sql2="SELECT SecNumber  FROM  Book WHERE BookNumber='$bn'";
    $result2=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result2);
    $sn=$row['SecNumber'];
    //场次资料
    $sql3="SELECT f.FilmName,s.SecDate,s.SecStart,s.SecTheater,s.SecPrice FROM Session as s,Film as f WHERE s.SecNumber='$sn' AND f.FilmNumber=s.FilmNumber";
    $result3=mysqli_query($conn,$sql3);

    if(!$result1&&!$result2&&!$result3){  
       echo"沒有訂票";
    }
    else{  
        $row_tc=array();
        while($row=mysqli_fetch_assoc($result1)){
            $row_tc[]=$row;
        }
        $row_sinfo=array();
        while($row=mysqli_fetch_assoc($result3)){
            $row_sinfo[]=$row;
        }

        print_r(print_book($row_tc,$row_sinfo,$bn));
   
   mysqli_close($conn);
  }echo'<div class="botmenu">
    <a href="../custm/cust_bookcheck.php"> 回訂單查詢</a>
        </div>'; 
} 
?>


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
      

     

      






