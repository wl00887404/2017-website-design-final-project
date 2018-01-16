<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>票種查看</title>
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
		$data=mysqli_query($conn,"select * from ticket"); 
	?>
	<body>
		<!-- Header -->
		<header id="header">
			<h1>
				<a href="index.html">E-ticket</a>
			</h1>
			<nav id="nav">
				<ul>
					<li><a href="manager_index.php">管理介面 :</a></li>				
					<li><a href="ticket_order.php">管理訂單</a></li>
					<li><a href="manage_ticket.php">票種管理</a></li>
					<li><a href="message_reply.php">訊息回復</a></li>
					<li><a href="logout.php" class="button special" id="logoutbuttom">log out</a></li>
				</ul>
			</nav>
		</header>	

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>票種查看</h2>
						<p>以下為所有票種</p>
					</header>

						<div class="table-wrapper">
							<?php
								echo '<form action = "ticket_delete.php" method = "post" >';
								echo '<table class="alt">';
								echo '<thead>';
                                echo '<tr>';
                                echo '<th>選取</th>';
								echo '<th>遊樂園名稱</th>';
								echo '<th>票種</th>';
								echo '<th>價格</th>';
								echo '</tr>';
								echo '</thead>';
								echo '<tbody>';
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
										echo '<td><center><input type="checkbox" name="checkbox[]" value='.$rs[0]."+".$rs[1].'></center></td>';
    									echo '<td>'.$rs[0]."</td>";
    									echo '<td>'.$rs[1].'</td>';
    									echo '<td>'.$rs[2].'</td>';
										echo"</tr>";
									}
								}
								echo '</tbody>';
								echo '</table>';
								echo '<br><br><center>';
								echo '<input type="button" value="回首頁" onclick="'."location='manager_index.php'".'">';
								echo '<input type="submit" value="刪除所選項目">';
                                echo '<input type="button" value="新增票種" onclick="'."location='add_ticket.php'".'">';			
								echo '</center>';
								echo '</form>'; 
							?>
						</div>
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