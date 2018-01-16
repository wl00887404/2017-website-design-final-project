<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>搜尋 E-ticket
            
        </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/checkbox_style.css" />
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />			
		</noscript>
		<script src="js/custom.js"></script>

		<style>
		body{
			 font-family:微軟正黑體;
		}
		</style>
	</head> 	 	

	<?php 
		include 'Announcement.php';
		$key = $_POST["keyword"];
		$searchway =  $_POST["orderby"];
        
	?>
	<body>
			<!-- Header -->
	<header id="header">
	<h1><a >Search</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="search.html" class="icon fa-search"></a></li>
			<li><a href="index.html">Home</a></li>
			<li><a href="member_center.php">Membership</a></li>
			<li><a href="my_cart.php">Cart</a></li>
			<li><a href="login.php" class="button special" id="loginbuttom">Sign Up</a></li>
		</ul>
	</nav>
</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>查詢結果</h2>
					</header>

						<div class="table-wrapper">
						<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>遊樂園名稱</th>
											<th>票種</th>
											<th>價格</th>
										</tr>
									</thead>
									<tbody>
                            <!-- <form action="search.php" method="post">
                                請輸入欲查詢關鍵字:
                                <input type="text" name = "keyword"/>
                                排序依據:
                                <select name="orderby">
                                    <option value="none">無</option>
                    　              <option value="pricehightolow">價格高到低</option>
                    　              <option value="pricelowtohigh">價格低到高</option>
                    　              <option value="type">票種</option>
                                </select><br>
                                <input type="button" value = "搜尋" onclick = 'location = "search.php"'>
                            </form> -->
							<?php							
                            if($key != "")
                            {
								switch($searchway){
									case "none":
									$sql = "select * from ticket where AP_name like '%$key%' or  T_name like '%$key%' or T_price like '%$key%'";
									break;
									case "pricehightolow":
									$sql = "select * from ticket where AP_name like '%$key%' or  T_name like '%$key%' or T_price like '%$key%' order by T_price desc";
									break;
									case "pricelowtohigh":
									$sql = "select * from ticket where AP_name like '%$key%' or  T_name like '%$key%' or T_price like '%$key%' order by T_price asc";
									break;
									default:
									break;
								}
								//echo $sql;
								$data = mysqli_query($conn,$sql);
								if (empty($data))
								{
									"<script>alert('找不到符合搜尋字詞「$key」的文字，請重新搜尋');history.go(-1);</script>";
								}
								else
								{
									
									for($i=1;$i<=mysqli_num_rows($data);$i++){
									$rs=mysqli_fetch_row($data);
									
									echo '<tr>';
									echo '<td>'.$rs[0]."</td>";
									echo '<td>'.$rs[1]."</td>";
									echo '<td>'.$rs[2].'</td>';
									echo"</tr>";
									}
								}
                            }
                            else{
                                echo '<script>alert("請輸入關鍵字");history.go(-1);</script>';
                            }
							?>
							</tbody>									
								</table>
								<?php
									echo '<br><br><center>';
									echo '<input type="button" value="回首頁" onclick="'."location='index.html'".'">';
									echo '<input type="button" value="回搜尋" onclick="'."location='search.html'".'">';			
									echo '</center>'; 
								?>
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

