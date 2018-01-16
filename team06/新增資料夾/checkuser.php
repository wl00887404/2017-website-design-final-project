<?php
   include_once ("mysql_connect.php");
	//啟動 session
	session_start();
	//假設的有效會員帳號
	// $db_user = "a";
	// $db_password = "a";
    $username=$_POST['username'];
    $pw=$_POST['pw'];
	$sql="select * from user where username='$username' and pw='$pw';";//搜尋資料庫資料
	
	$result=mysqli_query($link,$sql);  

	//使用 isset 判別有沒有此變數可以使用
	if(isset($username) && isset($pw)){
		//直接對傳過來的帳號密碼做比對

		if(mysqli_num_rows($result)>0){	
			
		      
			//如果密碼一樣，以及帳號一樣，那就代表正確，所以顯示登入成功
			//將 session 加入一個已經登入的紀錄
			
            if($username=="admin000" && $pw="000"){
				$_SESSION['is_admin']=true;
				header('Location:adminend.php');
			}
			else{
				$_SESSION['is_user'] = true;
				//使用php header 來轉址 前往一般使用者後台
				header('Location: userend.php');
			}
			
			
		}
		else{
			
            if($username=="admin000" && $pw="000"){
				$_SESSION['is_admin']=false;
				header('Location: login.php?msg=登入失敗，請確認帳號密碼');
			}
			else{
				$_SESSION['is_user'] = false;
				header('Location: login.php?msg=登入失敗，請確認帳號密碼');
			}

		}
		 
	}
	else{
		//安全一點，若沒有用 POST 傳 username 跟 password
		//就使用php header 來轉址 返回登入頁，並在警告一下
		header('Location: login.php?msg=請正確登入');
	}


	mysqli_close($link);
?>
