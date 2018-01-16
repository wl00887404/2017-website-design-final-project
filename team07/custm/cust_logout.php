<html>
<head>
    <meta charset="UTF-8">
    <title>登出</title>
</head>
</html>
<?php
session_start();
unset($_SESSION['Custid']);
header("location:..");
?>