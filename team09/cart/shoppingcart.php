<?php
session_start();
?>

<!DOCTYPE HTML>
<head>
<title>主頁</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
	<div class="header">
		 <div class="headertop_desc">
			<div class="wrap">
				<div class="nav_list">
					<ul>
						<li><a href="home.php">主頁</a></li>
						<li><a href="contact.php">聯絡我們</a></li>
					</ul>
				</div>
					<div class="account_desc">
						<ul>
							<li><a href="register.php">註冊</a></li>
							<li><?php require_once("logout.php"); ?></a></li>
							<li><?php require_once("alter.php"); ?>修改資料</a></li>
							<li><a href="shoppingcart.php">購物車</a></li>
						</ul>
					</div>
				<div class="clear"></div>
			</div>
	  	</div>
  	  		<div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="home.html"><img src="images/logo.png" alt="" /></a>
					</div>
						<div class="header_top_right">
						  <div class="cart">
						  <a href="home.php"><p><span>繼續購買</span></p></a>
						  </div>
						 <div class="clear"></div>
					</div>
			 <div class="clear"></div>
  		</div>     
				
			</div>
   		</div>
   </div>
   <!------------End Header ------------>
  <div class="main">
  	<div class="wrap">
      <div class="content">
    	<div class="content_movie">
    		<div class="heading">
			<a name="movie"><h3>購物車</h3></a>
    		</div>
    	</div>
		 <?php require("cartinfo.php"); ?> 	         
		</div>
  </div>



  
    
</body>
</html>

