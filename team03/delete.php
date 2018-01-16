<?php 

include("Announcement.php");
session_start();
$id=$_SESSION['id'];
$id=$_GET['id'];

mysqli_query($conn,"delete from R_message where R_id = '$id'");

header("location:admin.php");
?>