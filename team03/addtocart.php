<?php
include("Announcement.php");
session_start();
//enthu problem
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
	$id = $_SESSION["id"];
} else {
	// echo "Please log in first to see this page.";
	header("Refresh: 0.05; url=login.html" );	
}
//chec vol !empty
if(empty($_POST['volume'])){
	//if number null
	echo '<script language="javascript">';
	echo 'alert("please select volume")';
	echo '</script>';	
	header("Refresh: 0.05; url=index.html#one" );
	exit();
}
//insert start
//get $no
$sql="SELECT MAX(T_no) FROM SP_cart";
$data = mysqli_query($conn, $sql);

$no = mysqli_fetch_array($data)['MAX(T_no)'];
if(isset($no)){
	$no++;
}else{
	$no = 0;
}
$ap =$_POST['AP_name'];
$na =$_POST['T_name'];
$pr =$_POST['T_price'];
$vol = $_POST['volume'];
// $sql2="INSERT INTO 'SP_cart' ('id', 'AP_name', 'T_name', 'T_price', 'number', 'T_no') 
// VALUES ('$id', '$ap', '$na', '$pr', '$vol', '$no'	 )";

$sql2 = "INSERT INTO SP_cart(id, AP_name, T_name, T_price , number, T_no) VALUES ('$id', '$ap', '$na', '$pr', '$vol', '$no')";
mysqli_query($conn, $sql2);

// while($row = mysqli_fetch_array($res)){g
// 	foreach($row as $k)
// 		echo $k;
// }

mysqli_close($conn);

// direc to cart

header("Refresh: 0.05; url=my_cart.php" );

?>
