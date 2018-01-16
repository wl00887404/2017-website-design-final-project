<?php
session_start();
if(empty($_SESSION['Custid'])==true){
    header("location: index.php");
}
include("Mysql_connect.php");

/*  --------- 退票------------
 */
if(isset($_POST['refund'])){
    $tn=$_POST['tn'];
    $bn_=$_POST['bn_'];
    $stime=strtotime($_POST['stime']);
    $now=strtotime(date("y-m-d H:i:s"));
    $limit=24*60*60;    //電影開場前24時内不可退票;
    $gap=$stime-$now;
    if($gap>$limit){
        //echo"<script>alert('你確定要退票嗎？')</script>";
        $sql="DELETE FROM Ticket WHERE TickNumber='$tn'";
        $sql2="SELECT BookAmount FROM Book Where BookNumber='$bn_'";
        if(mysqli_query($conn,$sql)&&$result=mysqli_query($conn,$sql2)){
            $row=mysqli_fetch_assoc($result);
            $bamount=$row["BookAmount"]-1;

            if($bamount==0){
                $sql="DELETE FROM Book WHERE BookNumber='$bn_'";
                echo"<script>alert('退票成功')</script>";
                echo " <script language = 'javascript' type = 'text/javascript' > "; 
                echo " window.location.href = 'cust_bookcheck.php' "; 
                echo " </script > ";
            }
            else{
                $sql="UPDATE Book SET BookAmount='$bamount' WHERE BookNumber='$bn_'";
            }
            if(mysqli_query($conn,$sql)){   
                echo"<script>alert('退票成功')</script>";
            }
            else{
                echo"<script>alert('退票失敗book')</script>";
            }
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