<?php
include_once("mysql_connect.php");
$check=$_POST['checkbox'];


foreach($check as $value){
$sql="delete from `sort` where s_id=$value;";
mysqli_query($link,$sql);
}

header("location:adminpage.php");
mysqli_close($link);
?>
