<?php

require_once("connectserver.php");

$t_name=$_POST['t_name'];
$t_price=$_POST['t_price'];
$t_rest=$_POST['t_rest'];
$t_info=$_POST['t_info'];



$add="INSERT INTO `ticket`(t_name,t_price,t_info,t_rest) VALUES ('$t_name','$t_price','$t_info','$t_rest')";
if(!mysqli_query($conn,$add))
{
   // header("Location:add.php");
    echo "<script> var myFunction=function() { alert('I am an alert box!');}  console.log(myFunction()); </script>";
    
}
header("Location:administrator.php");
//$row=mysqli_fetch_array($result,MYSQLI_BOTH);

?>