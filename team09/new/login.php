<?php 
session_start();
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

if(!empty($_POST['userAccount'])&&!empty($_POST['userPassword'])){//表單中的account,password不為空
  $account=$_POST['userAccount'];
  $password=$_POST['userPassword'];
                  //////* 表單部分將這個if去掉註解就可以使用 *//////
 //$account="asd";
 //$password="www";

  mysql_query("set names utf8");
  $sql1="SELECT * FROM `client` WHERE c_account='$account' AND c_password ='$password'";//sql指令，判斷是否為client
  $sql2="SELECT * FROM `Administrator` WHERE a_account='$account' AND a_password ='$password'";//sql指令，判斷是否為Administrator
  $result=mysqli_query($conn,$sql1);//做第一道指令
  $num=mysqli_num_rows($result);
  if($num==1){//是client登入
    $id=2;//判斷身分
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);//取得資料，"MYSQLI_BOTH"陣列中可以用數字跟名字為索引直記錄到session中
    $_SESSION["name"]=$row[0];
    $_SESSION["email"]=$row[1];
    $_SESSION["account"]=$row[2];
    $_SESSION["password"]=$row[3];
    $_SESSION["id"]=$id;
    header("Location:home.php");//跳回使用者
  }
    else{
      $result=mysqli_query($conn,$sql2);//做第二道指令
      $num=mysqli_num_rows($result);
      if($num==1){//是管理者
        $id=1;//判斷身分
        $row=mysqli_fetch_array($result,MYSQLI_BOTH);//取得資料，"MYSQLI_BOTH"陣列中可以用數字跟名字為索引直
        $_SESSION["name"]=$row[0];
        $_SESSION["email"]=$row[1];
        $_SESSION["account"]=$row[2];
        $_SESSION["password"]=$row[3];
        $_SESSION["id"]=$id;
        

        header("Location:administrator.php");
      }
      else{
        echo"登入錯誤";
        header("Location:sign.php");
      }
    } 
}else{
  echo"登入錯誤";
  header("Location:sign.php");
}

?>