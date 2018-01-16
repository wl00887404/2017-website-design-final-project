<?php
$w = $_POST['Namead'];
$h = $_POST['Messagead'];
$servername = "140.123.175.101";
$username = "team09";
$password = "iphone";
$dbname = "team09";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("連接失敗" . $conn->connect_error);
}
$sql ="UPDATE myn SET re=N'$h' WHERE id='$w'";
if ($conn->query($sql) === TRUE) {
    echo "提交成功";
    header("Location:adshow.php"); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>