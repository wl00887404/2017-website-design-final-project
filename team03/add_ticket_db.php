<?php
include 'Announcement.php';

session_start();
$id = $_SESSION["id"];
$AP_name = $_POST["AP_name"];
$T_name = $_POST["T_name"];
$T_price = $_POST["T_price"];

$temp = 0;

if($AP_name == "" || $T_name == "" || $T_price == "")
{
    $temp++;
    echo '<script>alert("欄位不得為空"); history.go(-1)</script>';
}

$sql = "select AP_name,T_name from ticket";
$result = mysqli_query($conn,$sql);

foreach ($result as $value)
{
    if($value["AP_name"] === $AP_name && $value["T_name"] === $T_name && $temp != 1)
    {
        $temp ++;
        echo '<script>alert("此項目已存在"); history.go(-1)</script>';
    }
}

if($temp != 1)
{
    $sql = "INSERT INTO `ticket`(`AP_name`, `T_name`, `T_price`) VALUES ('$AP_name','$T_name','$T_price')";
    $result = mysqli_query($conn,$sql);
    echo "<script>alert('新增成功');location = 'view_ticket.php';</script>";
}



?>