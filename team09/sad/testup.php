<?php
session_start();
?>
<?php
header("Content-Type:text/html; charset=utf-8");
$w = $_POST['Name'];
$_SESSION['userAccount'] = $_POST['Name'];
$h = $_POST['Message'];
$servername = "140.123.175.101";
$username = "team09";
$password = "iphone";
$dbname = "team09";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連接失败: " . $conn->connect_error);
}

$sql = "INSERT INTO myn ( name,content,admin,re) VALUES ( N'$w',N'$h',N'管理員',N'請靜心等候我們會盡快回覆您')";

if ($conn->query($sql) === TRUE) {
    echo "提交成功";
    header("Location:show.php"); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
