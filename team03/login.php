<?php
include 'Announcement.php';

$userid = $_POST["userid"];
$password = $_POST["password"];

$SQL = "SELECT `id`, `password` FROM `member` WHERE id = '".$userid."' and password = '".$password."'";

$userid = strtoupper($userid);
if (mysqli_num_rows(mysqli_query($conn,$SQL)) > 0 && $userid=="PETER") {
	session_start();
	$_SESSION["id"]=$userid;
	$_SESSION["password"] = $password;
	$_SESSION['loggedin'] = true;
 	header("Refresh: 0.005; url=manager_index.php" );//0.005秒之後跳轉到管理員介面
}else if(mysqli_num_rows(mysqli_query($conn,$SQL)) > 0){
	session_start();
	$_SESSION["id"]=$userid;
	$_SESSION["password"] = $password;
	$_SESSION['loggedin'] = true;	
 	header("Refresh: 0.005; url=index.html" );//0.005秒之後跳轉到首頁
}else{
	   echo '<script>alert("帳號或密碼錯誤");history.go(-1);</script>';//提示錯誤後跳轉到登入頁面 
}
mysqli_close($conn);
?>

