<?php
session_start();
?>
<?php
$db = mysqli_connect("140.123.175.101","team09","iphone");
mysqli_select_db($db, "team09"); 
$sql = "SELECT * FROM myn";
mysqli_query($db,"set names utf8");
$rows = mysqli_query($db, $sql); 
$num = mysqli_num_rows($rows); 
mysqli_close($db);
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
							       <li><a href="#" onclick="record();return false;">銷售紀錄</a></li>
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
			</div>
   		</div>
   </div>
   <!------------End Header ------------>

    <div class="main">
  	  <div class="wrap">
           <div class="content">
				<div class="adshow-form">
                             <?php
                             if ($num > 0) {
                             while ($row = mysqli_fetch_array($rows)) {
                                    $id = $row["id"];
                                    $name = $row["name"];
                                    $content = $row["content"];
                                    $admin = $row["admin"];
                                    $re = $row["re"];
                             ?>
                             <table id="adshow-table" cellpadding = "7" width="800" border = "1">
                             <tr>
                                 <th width="40"><div><?php echo $id."<br>" ?></div></th>
                                 <th width="55"><div><?php echo $name ?></div></th>
                                 <th width="352"><div><?php echo $content ?></div></th>
                                 <th width="50"><div><?php echo $admin ?></div></th>
                                 <th width="252"><div><?php echo $re ?></div></th>
                                 <form action="refine.php" method="post">
                                 <th width="47"><div><input type="submit" name="reply" value="回覆" ><input type="hidden" name="numb"  value = "<?php echo $id ?>"><input type="hidden" name="name1"  value = "<?php echo $name ?>"><input type="hidden" name="content1"  value = "<?php echo $content ?>"></div></th>
                                 </form>
                             </tr>
                             <?php } ?>
                             </table>
                             <?php
                             }
                             mysqli_free_result($rows);
                             ?> 
			      </div>
                     <div class="clear"></div>
		            
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

