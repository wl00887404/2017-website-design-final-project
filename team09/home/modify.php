<?php
$numb = $_POST['numb'];
$name1 = $_POST['name1'];
$content1 = $_POST['content1'];
?>
<html lang="zh-tw">
<head>
    <title>修改留言</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
</head>
<script type="text/javascript">
function check(){
	if(comment.Messagead.value == ""){
		alert("請輸入內容")
	}
	else comment.submit();
}
</script>
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
							<li><a href="revise.php">修改資料</a></li>
							<li><a href="shoppingcart.php">購物車</a></li>
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
						<a href="home.php"><img src="images/logo.png" alt="" /></a>
					</div>						  
			    <div class="clear"></div>
  		    </div>     				
   		</div>
   </div>
 <div class="main">
 	<div class="wrap">
     <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="message-form">
          <h2>修改留言</h2>

<form  name="comment" action="testup3.php" method="post">
<div>
<span><label>原本留言內容：<?php echo $content1 ?></label></span><br>
</div>
        <div>
        <span><label></label><input name="Namead" type="hidden" class="textbox" 
						    		value="<?php echo $numb ?>" readonly = true;  ></span>
        
        </div>
        <div>
         <span><label>修改</label></span>   
             <span><textarea name="Messagead" ></textarea></span>
             </div>
      <input type="button" name="Send" value="送出留言" onClick="check()">
      <input type="reset" name="Reset" value="重設欄位">
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
   
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>