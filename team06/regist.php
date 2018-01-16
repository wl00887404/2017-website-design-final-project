<?php
include('connect.php');
$account=$_POST['account'];
$pw=$_POST['pw'];
$username=$_POST['name'];
$sql="insert into user(username,pw,name,admin_identify) values ('".$account."','".$pw."','".$username."','0')";

if(mysqli_query($conn,$sql))
{
    echo '新增成功!,回到主頁面囉~';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
else
{
        echo '新增失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
