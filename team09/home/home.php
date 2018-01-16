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
						<li><?php require_once("adhome.php");?></a></li>
						<li><a href=<?php if(empty($_SESSION['id'])) echo "sign.php";else if($_SESSION["id"]==1) echo "adshow.php";else if($_SESSION["id"]==2) echo "show.php"; ?>>查看留言</a></li>
					</ul>
				</div>
					<div class="account_desc">
						<ul>
							<li><a href="register.php">註冊</a></li>
							<li><a href="#" onclick="out();"><?php require_once("logout.php");?></a></li>
							<li><?php require_once("alter.php"); ?>修改資料</a></li>
							<li><a href="shoppingcart.php">購物車</a></li>
							<li><a href=<?php if(empty($_SESSION['id'])) echo "sign.php";else  echo "shoppinghistory.php"; ?>>購物歷史</a></li>
							<script type="text/javascript">
							 function out(){
								window.location="out.php";	
                       		}
							   function alart(){
								   alert('請先登入或註冊');
							   }
							</script>
						</ul>
					</div>
				<div class="clear"></div>
			</div>
	  	</div>
  	  		<div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="home.php"><img src="images/logo.png" alt="" /></a>
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
			<a name="movie"><h3>展覽總覽</h3></a>
    		</div>
    	</div>
		 <?php require_once("getticket.php"); ?> 	         
		</div>
  </div>


  
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>

