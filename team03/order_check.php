<?php
include 'Announcement.php';
session_start();
$id = $_SESSION["id"];

$search = "select * from SP_cart where id = '$id'";
$search_result = mysqli_query($conn,$search);
$search_arr;
for($i=0;$i<mysqli_num_rows($search_result);$i++){
    $search_arr[$i] = mysqli_fetch_row($search_result);
}


/************debug************/

// foreach($search_arr as $value)
// {
//     foreach($value as $v2)
//     echo $v2;
// }

/************debug************/  



date_default_timezone_set("Asia/Taipei");
$datetime = date ("Y-m-d H:i:s");
//echo $datetime;  

for ($i = 0;$i<count($search_arr);$i++){
$temp;
for($j = 0; $j < count($search_arr[$i]);$j++)
{
    $temp[$j] = $search_arr[$i][$j];
}





$sql = "INSERT INTO T_order(id, AP_name, T_name, T_price, number, T_no, date) VALUES ('$temp[0]','$temp[1]','$temp[2]','$temp[3]','$temp[4]','$temp[5]','$datetime')";
$result = mysqli_query($conn,$sql);
}

$sql = "DELETE FROM `SP_cart` WHERE id = '$id'";
mysqli_query($conn,$sql);

echo '<script>alert("訂購完成");window.location.replace("shopping_list.php");</script>';
?>