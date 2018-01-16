<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>訂單查詢</title>
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
			<link ref="stylesheet" href="css/checkbox_style.css" />
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
		$data=mysqli_query($conn,"select * from T_order where id = '$id'"); 
	?>
	<body>
			
	<!-- Header -->
	<header id="header">
		<h1><a href="index.html">E-ticket</a></h1>
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
						<h2>訂單查詢</h2>
						<p>以下為您所購買的商品</p>
					</header>

							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>遊樂園名稱</th>
											<th>票種</th>
											<th>價格</th>
											<th>數量</th>
											<th>小計</th>
											<th>購買日期</th>
										</tr>
									</thead>
									<tbody>

		<?php
          //如果購物車是空的，則顯示 "目前購物車內沒有任何商品及數量" 的訊息
          if (empty($data))
          {
            echo "<tr align='center'>";
            echo "<td colspan='6'>目前購物車內沒有任何商品及數量！</td>";	
            echo "</tr>";
          }
          else
          {
			$total=0;
			for($i=1;$i<=mysqli_num_rows($data);$i++){
			$rs=mysqli_fetch_row($data);
			echo '<tr>';
    		echo '<td>'.$rs[1]."</td>";
    		echo '<td>'.$rs[2].'</td>';
    		echo '<td>'.$rs[3].'</td>';
			echo '<td>'.$rs[4].'</td>';
			$sub_total=$rs[3]*$rs[4];
			$total += $sub_total;
			echo'<td>'.$sub_total.'</td>';
			echo'<td>'.$rs[6].'</td>';
			echo"</tr>";
			}
		}
          
      ?>
										
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5"></td>
											<td>總計：<?php echo $total?></td>
										</tr>
									</tfoot>
								</table>
		
							</div>

						<header class="major">
						<a href="index.html" class="button big alt">回首頁</a>
					</header>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<!--<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Lorem ipsum dolor</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Nesciunt itaque, alias possimus</a></li>
									<li><a href="#">Optio rerum beatae autem</a></li>
									<li><a href="#">Nostrum nemo dolorum facilis</a></li>
									<li><a href="#">Quo fugit dolor totam</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Culpa quia, nesciunt</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Reiciendis dicta laboriosam enim</a></li>
									<li><a href="#">Corporis, non aut rerum</a></li>
									<li><a href="#">Laboriosam nulla voluptas, harum</a></li>
									<li><a href="#">Facere eligendi, inventore dolor</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Neque, dolore, facere</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Distinctio, inventore quidem nesciunt</a></li>
									<li><a href="#">Explicabo inventore itaque autem</a></li>
									<li><a href="#">Aperiam harum, sint quibusdam</a></li>
									<li><a href="#">Labore excepturi assumenda</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Illum, tempori, saepe</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Recusandae, culpa necessita nam</a></li>
									<li><a href="#">Cupiditate, debitis adipisci blandi</a></li>
									<li><a href="#">Tempore nam, enim quia</a></li>
									<li><a href="#">Explicabo molestiae dolor labore</a></li>
								</ul>
							</section>
						</div>
					</section>-->
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