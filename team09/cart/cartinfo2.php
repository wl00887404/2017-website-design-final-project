<?php 
//session_start(); ?>



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

//include ("mysql_connect.php");
$sql = "select b_account,b_ticket,b_quantity,id from buyerticket";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{

echo '

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
							<li><a href="#">購物車</a></li>
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
						  	   <p><span>Cart</span><div id="dd" class="wrapper-dropdown-2"> (empty)
						  	   	<ul class="dropdown">
										<li>you have no items in your Shopping cart</li>
								</ul></div></p>
						  </div>
						 <div class="clear"></div>
					</div>
						  <script type="text/javascript">
								function DropDown(el) {
									this.dd = el;
									this.initEvents();
								}
								DropDown.prototype = {
									initEvents : function() {
										var obj = this;
					
										obj.dd.on('click', function(event){
											$(this).toggleClass('active');
											event.stopPropagation();
										});	
									}
								}
					
								$(function() {
					
									var dd = new DropDown( $('#dd') );
					
									$(document).click(function() {
										// all dropdowns
										$('.wrapper-dropdown-2').removeClass('active');
									});
					
								});
					    </script>
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

<div>
<form>
<table cellpadding = "7" width="500" border = "1">
<tr><th colspan = "4"><center> <h1><b>購物車清單</b> </h1></center></th></tr>
<tr>
  <th><b><div>購買者</div></b></th>
  <th><b><div>展覽</div></b></th>
  <th><b><div>數量</div></b></th>
  <th><b><div style="background-color:#FF3333;">移除</div></b></th>
</tr></body>
</html>';

while($row = mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["b_account"]."</td><td>".$row["b_ticket"]."</td><td>".$row["b_quantity"]."</td>".
      '<td><div style="background-color:#FF3333;"><center><input type = "checkbox" name ="checkbox[]" value='.$row["id"].' /></center></div></td></tr>';}


?>