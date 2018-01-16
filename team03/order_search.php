<?php
include 'Announcement.php';
session_start();
$id = $_SESSION["id"];

$sql = "select * from T_order where id = '$id'";
$result = mysqli_query($conn,$sql);
$orderlist;
for($i=0;$i<mysqli_num_rows($result);$i++){
    $orderlist[$i] = mysqli_fetch_row($result);
}

echo '<center><h1>您的訂單</h1>';
echo "姓名:".$orderlist[0][0];
echo '<table border = "1">';
for($i = 0; $i < count($orderlist); $i++)
{
   echo '<tr>';
   for($j = 0; $j < count($orderlist[$i]); $j++){
        if($j == 0)
            continue;
        else{
        echo '<td>';
        echo $orderlist[$i][$j];
        echo '</td>';
        }
   }
   echo '</tr>';
}
echo '</table></center>';
?>