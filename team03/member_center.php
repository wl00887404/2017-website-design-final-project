<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>會員中心</title>
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
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		}else{
				echo '<script language="javascript">';
				echo 'alert("please login")';
				echo '</script>';	
				header("Refresh: 0.05; url=login.html" );
				exit();
		}
		$id = $_SESSION["id"];
		$data=mysqli_query($conn,"SELECT `id` FROM `member` WHERE id = '$id'"); 
	?>
	<body>
			
		<!-- Header -->
			<header id="header">
				<h1><a>會員中心</a></h1>
				<nav id="nav">
					<ul>
							<li><a href="search.html" class="icon fa-search"></a></li>
							<li><a href="index.html">Home</a></li>
							<li><a href="member_center.php">Membership</a></li>
							<li><a href="my_cart.php">Cart</a></li>
							<li><a href="logout.php" class="button special" id="logoutbuttom">log out</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2><?php echo $id?>你好</h2>
					</header>
					<center>
                        <ul>
                            <h3>會員資料</h3>
                        
							<input type="button" value = "修改會員資料" onclick = 'location = "change.php"'>
                            <p>修改姓名、email...等個人資料</p>
                        
                        
                        
                        
                            <h3>交易紀錄</h3>
                        
							<input type="button" value = "訂單查詢" onclick = 'location = "shopping_list.php"'>
							<p>訂單處理狀況查詢</p>

							<h3>留言版</h3>
                        
							<input type="button" value = "留言查詢" onclick = 'location = "show.php"'>
                            <p>留言紀錄查詢</p>
                        
                        </ul> 
					</center>
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
