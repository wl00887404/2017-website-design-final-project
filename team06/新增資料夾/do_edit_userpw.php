<?php
include_once( "mysql_connect.php");
// session_start();
$username=$_POST['username'];

$e_pw1=$_POST['e_pw1'];
$e_pw2=$_POST['e_pw2'];
$sql='update user set pw=$e_pw2 where username=$username; ';


$result=mysqli_query($link,$sql);  

if(isset($e_pw2)){

    if($result){
      echo "成功修改密碼";
     

    }else{
    echo "錯誤:".$sql."<br>".$link->error;
    }
}
else{
echo "所設定的密碼不存在";
}









?>