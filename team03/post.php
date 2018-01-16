<?php
include("Announcement.php");
session_start();
$id = $_SESSION["id"];

date_default_timezone_set("Asia/Taipei");
$guestTime = date("Y:m:d H:i:s");
$guestName=$_POST['guestName'];
$guestContent=$_POST['guestContent'];

if(isset($guestName)){
$sql = "INSERT INTO message( id, time,context) VALUES ('$guestName','$guestTime','$guestContent')";
$result = mysqli_query($conn,$sql);
header("location:show.php");}


?>
