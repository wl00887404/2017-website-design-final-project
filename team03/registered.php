<?php
include 'Announcement.php';

$userid = $_POST["userid"];
$password = $_POST["password"];
$email = $_POST["email"];
$birth = $_POST["birth"];
$sex = $_POST["sex"];
$county = $_POST["county"];
$M_name = $_POST["M_name"];

$sql = "select id from member where id = '$userid'";

$res = mysqli_query($conn,$sql);

$data = mysqli_fetch_row($res);

if(empty($data))
{
    $SQL="INSERT INTO `member`(`id`, `password`, `email`, `birth`, `sex`, `county`, `M_name`) VALUES ('$userid','$password','$email','$birth','$sex','$county','$M_name')";
mysqli_query($conn,$SQL);

mysqli_close($conn); //關閉資料庫連結
echo '<script>alert("註冊成功!");window.location.replace("login.html");</script>';
}
else {
    echo '<script>alert("此id已被使用!");history.go(-1);</script>';
}
?>
