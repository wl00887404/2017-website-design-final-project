<?php
include_once("mysql_connect.php");




// $result=mysqli_query($link,$sql);
// $row = mysqli_fetch_assoc($result);

$s_name=$_POST['s_name'];
$s_period=$_POST['s_period'];
$s_site=$_POST['s_site'];
$s_intro=$_POST['s_intro'];
$s_num=$_POST['s_num'];
$submit=$_POST['submit'];
$s_idt=$_POST['s_id'];
$msg='';
// $sql=select s_id,s_name,s_period,s_site,s_intro,s_num from sort ;
if($submit=='編輯'){
  $update_sql = "update `sort` set `s_name`='$s_name',`s_period`='$s_period',`s_site`='$s_site',`s_intro`='$s_intro',`s_num`='$s_num' where `s_id`='$s_id'"; 
           $msg='編輯成功';
}
 else{
   $msg='編輯失敗';
 }        

mysqli_close($link);
?>