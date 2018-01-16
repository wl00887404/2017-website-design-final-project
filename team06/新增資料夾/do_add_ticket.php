<?php
include_once("mysql_connect.php");


    $s_name=$_POST['s_name'];
    $s_period=$_POST['s_period'];
    $s_site=$_POST['s_site'];
    $s_intro=$_POST['s_intro'];
    $s_num=$_POST['s_num'];
    $add_sql="insert into `sort` (`s_id`,`s_name`,`s_period`,`s_site`,`s_intro`,`s_num`) values('','$s_name',' $s_period','$s_site',' $s_intro','$s_num');";
    $result=mysqli_query($link, $add_sql);
  if(isset($s_name) && isset($s_period) && isset($s_site) && isset($s_intro) && isset($s_num)){

        if($result){
          echo "<br>成功新增資料";
           header('location: adminpage.php');

        }else{
        echo "錯誤:".$add_sql."<br>".$link->error;
        }
 }
 else{
   echo "新增發生錯誤";
 }



?>






<?php
//結束mysql連線
mysqli_close($link);
?>
