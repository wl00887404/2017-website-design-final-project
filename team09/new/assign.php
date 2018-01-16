<?php
//session_start();//session start
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

if(!empty($_POST['userAccount'])&&!empty($_POST['userPassword'])&&!empty($_POST['userName'])&&!empty($_POST['userEmail'])){//表單中的account,password不為空
  $account=$_POST['userAccount'];
  $password=$_POST['userPassword'];
  $name=$_POST['userName'];
  $email=$_POST['userEmail'];
  $ConUserPassword=$_POST['ConUserPassword'];
                  //////* 表單部分將這個if去掉註解就可以使用 *//////

  mysql_query("set names utf8");
  $sql1="SELECT * FROM `client` WHERE c_account='$account'";//sql指令，判斷是否為client
  $sql2="SELECT * FROM `Administrator` WHERE a_account='$account'";//sql指令，判斷是否為Administrator
  $result=mysqli_query($conn,$sql1);//做第一道指令
  $num=mysqli_num_rows($result);
  if($num==1){//是client
    echo '帳號已存在';
  //header("location: ");//帳號重複跳到其他頁面
  }
    else{
      $result=mysqli_query($conn,$sql2);//做第二道指令
      $num=mysqli_num_rows($result);
      if($num==1){//是管理者
        echo '帳號已存在';
        //header("location: ");//帳號重複跳到其他頁面
      }
      else{
        $sql3="INSERT INTO `client` (c_name,c_email,c_account,c_password) VALUES ('$name','$email','$account','$password')";
        $result=mysqli_query($conn,$sql3);//做第三道指令
        echo "帳號已註冊";
        //header("location: ");//註冊玩跳到其他頁面
      }
    } 
  
}
else{//有資料為空，三秒後跳回原液面
  echo'不可流空';
  header("Refresh:3;url=register.php");
}

?>