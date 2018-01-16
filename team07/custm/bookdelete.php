<?php
session_start();
if(empty($_SESSION['Custid'])==true){
    header("location: index.php");
}
include("Mysql_connect.php");

/*  --------- 退票------------
 */
if(isset($_POST['delete'])){
    $bn=$_POST['bn'];
    $stime=strtotime($_POST['stime']);
    $now=strtotime(date("y-m-d"));
    $limit=24*60*60;    //電影開場當天不可退票;
    $gap=$stime-$now;
    if($gap>$limit){
        
        $sql="DELETE FROM Ticket WHERE BookNumber='$bn'";
        $sql2="DELETE FROM Book WHERE BookNumber='$bn'";
        if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2)){
            echo"<script>alert('退票成功')</script>";
        }
        else{
            echo"<script>alert('退票失敗book')</script>";
        }
    }
    else{
        echo"<script>alert('電影開場當日00：00后不可退票')</script>";
    }
    echo " <script language = 'javascript' type = 'text/javascript' > "; 
    echo " window.location.href = 'cust_bookcheck.php' "; 
    echo " </script > ";            
}

mysqli_close($conn); 
?>