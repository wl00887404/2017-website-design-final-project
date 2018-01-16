<?php
include 'Announcement.php';
session_start();
$re0 = $_SESSION["re0"];	
$re1 = $_SESSION["re1"];      
$AP_name= $_POST["AP_name"];
$T_name = $_POST["T_name"];
$T_price = $_POST["T_price"];
$SQL="UPDATE `ticket` SET `AP_name`='$AP_name',`T_name`='$T_name',`T_price`='$T_price' WHERE AP_name = '$re0' and T_name = '$re1'";
mysqli_query($conn,$SQL);
echo "<script>alert('修改成功');</script>";
header('location: view_ticket.php');
mysqli_close($conn);
?>