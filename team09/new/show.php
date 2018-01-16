<?php
$value=$_GET['value'];
$_SESSION['hi']=$value;
var_dump($_SESSION);
//echo $_SESSION['hi'];
header("Refresh:3;url=administrator.php");
//header("Location:administrator.php");
?>