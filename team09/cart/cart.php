<?php 
session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("connectserver.php");

$b_account = $_SESSION["account"];
$b_name = $_SESSION["name"];

$t_name = $_POST['t_name'];
$t_price = $_POST['t_price'];
$t_rest = $_POST['t_rest'];
$t_num = $_POST['t_num'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($t_num != null )
{
        //新增資料進資料庫語法
         $sql="INSERT INTO buyerticket (b_name,b_account,b_ticket, b_quantity) VALUES ('$b_name', '$b_account', '$t_name', '$t_num')";
        //echo $sql;

        $sql2="INSERT INTO saleshistory2 (buyername,buyeraccount,ticketname, ticketquantity) VALUES ('$b_name', '$b_account', '$t_name', '$t_num')";
        
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
if($result)

        {
                if($result2){
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
                }
        }
        else
        {
                echo '新增失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo '請輸入數量!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=home.php>';
}
?>