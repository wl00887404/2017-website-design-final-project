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
//include("shop_fin.php");
//check connection
if(!$conn){
  die ("Connection failed: " . mysqli_connect_error());       
}

$account=$_SESSION['account'];

mysqli_set_charset($conn,"utf8");
//$sql = "select * from buyerticket";
//$sql2 = "DELETE *from buyerticket";
$sql = "delete from buyerticket where b_account='$account'";
//$result = mysqli_query($conn,$sql);
//$result2 = mysqli_query($conn,$sql2);

if(mysqli_query($conn,$sql)){
 
//echo '已成功刪除內容 1秒後回主選單.....';
header("Refresh: 3; url=home.php" );

}else{
  echo '結帳失敗';
  header("Refresh: 1; url=home.php" );
}

?>