
<!DOCTYPE HTML>
<head>
<title>註冊</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
							<li><a href="#" onclick="out();"><?php require_once("logout.php");?></a></li>
							<li><a href="revise.php">修改資料</a></li>
							<li><a href="#">購物車</a></li>
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
						<a href="home.html"><img src="images/logo.png" alt="" /></a>
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
 <div class="main">
 	<div class="wrap">
     <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="register-form">
				  	<h2>註冊</h2>
                        <form action="assign.php" method="post" >
					    	<div>
						    	<span><label>姓名</label></span>
						    	<span><input name="userName" type="text" class="textbox" ></span>
						    </div>
						    <div>
						    	<span><label>信箱</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>帳號</label></span>
						    	<span><input name="userAccount" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>密碼</label></span>
							    <span><input name="userPassword" type="password" class="textbox"></span>
						   </div>
						   <div>
							<span><label>確認密碼</label></span>
							<span><input name="ConUserPassword" type="password" class="textbox"></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="註冊"  class="mybutton"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
						<h2>我們的位置</h2>
							 <div class="map">
									  <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14628.901664499792!2d120.4760852!3d23.5603463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346ebe56d7077847%3A0x1ea97cc03ed110a4!2z5ZyL56uL5Lit5q2j5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1514183744081"></iframe>
							 </div>
					 </div>
      			<div class="company_address">
					<h2>資訊 :</h2>
					<p>62102</p>
					   <p>嘉義縣民雄鄉大學路一段168號</p>
					   <p>中華民國</p>
			        <p>電話:05-2720411</p>
			        <p>傳真:(05)272-3358</p>
				   </div>
				 </div>
			  </div>		
         </div> 
    </div>
 </div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<!-- <div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="#">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="home.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div> -->
			</div>
			 <div class="copy_right">
				<p>版權所有翻譯必究</p>
		   </div>			
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

