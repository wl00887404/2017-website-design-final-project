﻿<?php 
	$servername = "140.123.175.101"; //伺服器名稱
	$username = "team03"; //使用者名稱(用root即可)
	$password = "coffee"; //密碼(如果沒有更改，則用空字串即可)
	$dbname = "team03"; //資料庫名稱

	// 建立連線
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// 確認連線
	if (!$conn) {  //連線失敗，則顯示錯誤訊息
    	die("Connection failed: " . mysqli_connect_error());
	}
	// echo "Connected successfully"; //連線成功，則印出此行

	//設置mysql執行編碼為utf-8
	mysqli_query($conn,"set names utf8"); 
?>	