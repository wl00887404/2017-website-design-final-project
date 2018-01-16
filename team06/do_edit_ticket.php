<?php
$button=$_POST['button'];

$username=$_POST['username'];
$s_name=$_POST['s_name'];
$s_period=$_POST['s_period'];
$s_site=$_POST['s_site'];
$s_intro=$_POST['s_intro'];
$s_num=$_POST['s_num'];


foreach($button as $value){
  $update_sql = "update `sort` set s_name='$s_name',s_period='$s_period',s_site='$s_site',s_intro='$s_intro',s_num='$s_num' ";  
  mysqli_query($link,$update_sql);
  }

header('location:choose_edit_ticket.php');
mysqli_close($link);
?>