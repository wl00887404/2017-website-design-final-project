<?php
require_once("connectserver.php");

$price=$_POST['t_price'];
$rest=$_POST['t_rest'];
$name=$_POST['t_name'];

$sql="UPDATE ticket SET t_price='$price',t_rest='$rest' WHERE t_name='$name'";
$result=mysqli_query($conn,$sql);
echo'修改成功';
header("Refresh:3;url=update.php");
?>