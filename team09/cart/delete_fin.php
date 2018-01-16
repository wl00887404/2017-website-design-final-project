<?php
session_start();//session_start();//session start
?>


<?php
$servername = "140.123.175.101";
$username = "team09";
$password = "iphone";
$database = "team09";
//create connection
$conn = mysqli_connect($servername, $username, $password,$database);

//check connection
if(!$conn){
  die ("Connection failed: " . mysqli_connect_error());       
}



mysqli_set_charset($conn,"utf8");


$check = $_POST['checkbox'];

foreach($check as $value){
$sql = "delete from buyerticket where id = $value";
$sql2 = "delete from saleshistory2 where id = $value";
mysqli_query($conn,$sql);
mysqli_query($conn,$sql2);
}

//echo "已成功刪除內容 1秒後回主選單.....";
header("Refresh: 0; url=shoppingcart.php" );


?>