<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>修改會員資料</title>
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
        $check = $_POST['checkbox'];          
        if(count($check)!=0){
            foreach($check as $value){ 
                $re = explode("+",$value);   
                $data=mysqli_query($conn,"SELECT * FROM `ticket` where AP_name = '$re[0]'and T_name = '$re[1]'"); 
                $_SESSION["re0"] = $re[0];	
                $_SESSION["re1"] = $re[1];               
            }
            }
            else
            {
                echo "你沒有選擇任何項目，三秒後回上一頁";
                header("Refresh: 3; url=view_ticket.php" );
            }
	?>
	<body>
			
		<!-- Header -->
			<header id="header">
				<h1><a>編輯票種</a></h1>
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
						<p>以下為您所選取的票種</p>
					</header>
							<div class="table-wrapper">
								<table class="alt">
									<thead>
                                    <?Php
                                        for($i=1;$i<=mysqli_num_rows($data);$i++){
                                        $rs=mysqli_fetch_row($data);
                                        echo '
                                        <form action="ticket_update.php" method = "POST">
                                        樂園名稱:<br/>
                                        <input type="text" name="AP_name" value = '.$rs[0].'>
                                        票種:<br/>
                                        <input type="text" name="T_name" value = '.$rs[1].'>
                                        票價:<br/>
                                        <input type="text" name="T_price" value = '.$rs[2].'>
                                        <br/>
                                        <br/>
                                        <center>
                                        <input type="button" value="回首頁" onclick="'."location='manager_index.html'".'">
                                        <input type="submit" value="確認修改">
                                        </center>
                                        </form>';
                                        }
                                    ?>
									</thead>
									<tbody>
									</tbody>
								</table>
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