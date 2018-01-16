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
   <title>查詢訂單</title>
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
            <?php  //如果未登入則顯示登入選項
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
<div id="title">歷史訂單</div>
<div class=block>
    <div class="bookinfo">


<?php                                      
function tick_money($booknumber,$row_t,$secPrice){
   //找出一筆訂單的所有票,统计各種票數量并計算價格  参數：訂單號，一位用户的所有票務數據，票價
   $price=0;//总价
   foreach($row_t as $key=>$value){                      
      if($row_t[$key]["BookNumber"]==$booknumber){
        $price+=$secPrice;
       }
   }
   return $price;  
}
function print_book($ar,$row_t){
  
   //表头
   $string='<table class="info" border="solid">'."<tr><th>訂單編號</th><th>成交時間</th><th>電影</th><th>場次</th><th>時長(min)</th><th>票數</th><th>單價</th><th>總價</th><th>操作</th></tr>";
   foreach($ar as $key=>$value){
        $string=$string."<tr>";
        foreach($ar[$key] as $subkey=>$subvalue){
            
            /*
            elseif($subkey=="SecTheater"||$subkey="SecStart"){//與時間寫在一起合并為場次
               continue;
            }*/
            if($subkey=="SecDate"){
                $string=$string."<td>$subvalue ".$ar[$key]["SecStart"].$ar[$key]["SecTheater"]."廳</td>";
            }
            elseif($subkey=="SecPrice"){
               $string=$string.'<td>'.$subvalue.'</td>';  
               $bn=$ar[$key]["BookNumber"];           
               $price=tick_money($bn,$row_t,$subvalue);              
               //支付金額
               $string=$string."<td>$price</td>";
               $stime=$ar[$key]["SecDate"];
               $tmp_s='<form method="post" action="bookdelete.php"><input type="hidden" name="stime" value="'.$stime.'"><input type="hidden" name="bn" value="'.$bn.'"><input type="submit" name="delete" value="取消訂單"></form>'; 
               $string=$string."<td>$tmp_s</td>";
            }      
            elseif($subkey=="SecTheater"||$subkey=="SecStart"){//與時間寫在一起合并為場次
                continue;
            }
            elseif($subkey=="BookAmount"){
                $bn=$ar[$key]["BookNumber"];
                $string=$string."<td>".'<a href="cust_ticketcheck.php?bn='.$bn.'">'.$subvalue."</a>"."</td>";
            }
            else{
               $string=$string."<td>$subvalue</td>";
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
    echo"<script>alert('請先登入')</script>";
    echo " <script language = 'javascript' type = 'text/javascript' > "; 
    echo " window.location.href = 'cust_loggin.php' "; 
    echo " </script > ";
}
else{//已登入
   //creat&check connection
   $id=$_SESSION['Custid'];
   include("Mysql_connect.php");//購票資料
   $sql="SELECT b.BookNumber,b.BookDate,f.FilmName,s.SecDate,s.SecStart,s.SecTheater,f.FilmRuntime,
         b.BookAmount,s.SecPrice
   FROM Book as b, Session as s, Film as f
   WHERE b.CustId='$id' AND s.SecNumber=b.SecNumber AND f.FilmNumber=s.FilmNumber";

   $result=mysqli_query($conn,$sql);
   if(!$result){
      
       echo"查詢失敗";
   }
   elseif(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $row_b[]=$row;
         
        }
        //print_r($row_b);echo"<br/>";
        //选取每一笔订单对应的票(一笔订单可以对应多张票)
        $row_t=array();
        for($i=0;$i<count($row_b);$i++){
            $bn=$row_b[$i]["BookNumber"];
            $sql_t="SELECT * FROM Ticket  WHERE BookNumber='$bn'";
            $result=mysqli_query($conn,$sql_t);
            while($row=mysqli_fetch_assoc($result)){
                $row_t[]=$row;
            }           
        }
        //print_r($row_t);
     
       
     print_r(print_book($row_b,$row_t));
   }
   else{
       echo"沒有訂票記錄";
       
}
 
   
   mysqli_close($conn);
}  
?>
<div class="botmenu">
    <a href="../custm/cust_Home.php"> 回會員專區</a>
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
      

     

      






