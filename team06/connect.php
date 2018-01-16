<?php
$servername="140.123.175.101";
$username="team06";
$password="ff";
$dbname="team06";

$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed: ".mysql_connect_error());
}
mysqli_query($conn, 'SET NAMES utf8');
?>
