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


if(!empty($_POST['userAccount'])&&!empty($_POST['userPassword'])&&!empty($_POST['userNewPassword'])&&!empty($_POST['ConUserNewPassword'])){//表單中的account,password不為空
    $account=$_POST['userAccount'];
    $password=$_POST['userPassword'];
    $newpassword=$_POST['userNewPassword'];
    $ConUserNewPassword=$_POST['ConUserNewPassword'];
    $log=$_SESSION['account'];//判斷是不是現在登入的帳號
    //echo $log;
    if($account!=$log){
        echo'錯誤帳號';
        header("Refresh:2;url=revise.php");
    }
    if($newpassword!=$ConUserNewPassword)//確認密碼
    {
        echo '密碼錯誤';
        header("Refresh:2;url=revise.php");
    }
    $id=$_SESSION["id"];//確認登入者

    if($id==1)//管理者
    {
        $sql="UPDATE Administrator SET a_password='$newpassword' WHERE a_account='$account' AND a_password='$password'";
        $result=mysqli_query($conn,$sql);
        if($result)
        echo'update';
        else
        echo 'no';
    }
    else//client
    {
        $sql="UPDATE client SET c_password='$newpassword' WHERE c_account='$account' AND c_password='$password'";
        $result=mysqli_query($conn,$sql);
        if($result)
        echo'update';
        else
        echo 'np';
    }
header("Location:home.php");//修改成功跳回主葉面

    
}
else{
    header("Location:revise.php");//失敗跳回修改的葉面
}
?>