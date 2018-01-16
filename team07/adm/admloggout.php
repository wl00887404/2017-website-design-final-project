<html>
<head>
    <meta charset="UTF-8">
    <title>管理員登出</title>
</head>
</html>
<?php
session_start();
unset($_SESSION['admid']);
echo "正在登出";
header("location: index.php");
?>