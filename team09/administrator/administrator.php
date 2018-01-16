<?php
session_start();
?>

<!DOCTYPE HTML>
<head>
<title>管理介面</title>
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
					</ul>
				</div>
					<div class="account_desc">
						<ul>
							<li><a href="register.php">註冊</a></li>
							<li><a href="#" onclick="out();"><?php require_once("logout.php");?></a></li>
							<li><?php require_once("alter.php"); ?>修改資料</a></li>
							<script type="text/javascript">
							 function out(){
								window.location="out.php";	
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
						<a href="administrator.php"><img src="images/logo.png" alt="" /></a>
					</div>
			 <div class="clear"></div>
  		</div>     				
                <div class="header_bottom">
					<div class="header_bottom_left">				
						<div class="categories">
						   <ul>
						  	   <h3>Categories</h3>
							      <li><a href="#" onclick="add();return false;">新增</a></li>
							      <li><a href="#" onclick="update();return false;">編輯</a></li>
							       <li><a href="#" onclick="record();">銷售紀錄</a></li>
							       <li><a href="#" onclick="message();return false;">訊息</a></li>
								   <?php //var_dump($_SESSION); ?>
						  	 </ul>
						</div>					
		  	         </div>	  
                       <script type="text/javascript">
                       function add(){
                       var value=0;
                       location.href="add.php?value="+value;
                       }

                       function update(){
                        var value=1;
                       location.href="update.php?value="+value;
                       }

                       function see(){
                        var value=2;
                       location.href="see.php?value="+value;
                       }

                       function record(){
                        var value=3;
                       location.href="record.php?value="+value;
                       }

                       function message(){
                        var value=4;
                       location.href="adshow.php?value="+value;
                       }
                       </script>  
						<!------End Slider ------------>
			         </div>
                     <div class="clear"></div>
			</div>
   		</div>
   </div>
   <!------------End Header ------------>
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

