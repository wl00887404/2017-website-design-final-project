<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>修改會員資料</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>

		<style>
		body{
			 font-family:微軟正黑體;
		}
		</style>
	</head>
	<?php 
		include 'Announcement.php';
		session_start();
		$id = $_SESSION["id"];		
		$data=mysqli_query($conn,"SELECT * FROM `member` where id = '$id'");
	?>
	<body>
			
	<!-- Header -->
	<header id="header">
		<h1>
			<a href="index.html">E-ticket</a>
		</h1>
		<nav id="nav">
			<ul>
				<li><a href="manager_index.php">管理介面 :</a></li>				
				<li><a href="ticket_order.php">管理訂單</a></li>
				<li><a href="manage_ticket.php">票種管理</a></li>
				<li><a href="message_reply.php">訊息回復</a></li>
				<li><a href="logout.php" class="button special" id="logoutbuttom">log out</a></li>
			</ul>
		</nav>
	</header>	

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>會員資料</h2>
						<p>以下為您的詳細資料</p>
					</header>

							<div class="table-wrapper">
								<table class="alt">
									<thead>
<?Php
for($i=1;$i<=mysqli_num_rows($data);$i++){
$rs=mysqli_fetch_row($data);


echo '
<form action="update.php" method = "POST">
密碼:<br/>
<input type="text" name="password" value = '.$rs[1].'>
信箱:<br/>
<input type="text" name="email" value = '.$rs[2].'>
生日:<br/>
<input type="text" name="birth" value = '.$rs[3].'>
性別:<br/>
<input type="text" name="sex" value = '.$rs[4].'>
國家:<br/>
<input type="text" name="county" value = '.$rs[5].'>
姓名:<br/>
<input type="text" name="M_name" value = '.$rs[6].'>
<br/>
<br/>
<center>
<input type="button" value="回首頁" onclick="'."location='index.html'".'">
<input type="submit" value="確認修改">
</center>
</form>';
}
?>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						<header class="major">
						
					</header>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>