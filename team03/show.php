<?php 
require("Announcement.php");
session_start();
$data=mysqli_query($conn,'select * from message order by time');//讓資料由最新呈現到最舊
$data2=mysqli_query($conn,'select * from R_message order by R_time');

?>


<!DOCTYPE html PUBLIC >
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
<title>留言板</title>

</style>
</head>

<body>
  		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">遊樂園購票系統</a></h1>
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

      
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
for($i=1;$i<=mysqli_num_rows($data);$i++){
for($i=0;$i<=mysqli_num_rows($data2);$i++){
  $rs2=mysqli_fetch_assoc($data2);
  $rs=mysqli_fetch_assoc($data);
?>
<div class="container">
  <div class="CSSTableGenerator">
      <table align="center">
	  <?php if($rs['id']==NULL)break?> 
            <tr>
              <td width="25%">帳號</td>
              <td width="75%"><?php echo $rs['id']?></td>
            </tr>
            <tr>
              <td>留言內容</td>
              <td><?php echo $rs['context']?></td>
            </tr>
			<tr>
			<?php if($rs2['R_message']!=NULL){?>
              <td>站長回覆</td>
              <td><?php echo $rs2['R_message']?></td>
            </tr>
			<?php } ?>
			<?php if($rs2['R_message']==NULL){?>
				<td>站長回覆</td>
              <td><?php echo NULL ?></td>
            </tr>
			<?php } ?>
        </table>
 </div>
</div>
<br />
<?php } ?>
<?php } ?>
 <center><a href="post.html"><input type="button" value="我要留言" onclick=""></a></center>
</body>
</html>