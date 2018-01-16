<?php 

include('Announcement.php');

session_start();
$data=mysqli_query($conn,'select * from message order by time');//讓資料由最新呈現到最舊
/*$id=$_SESSION['id'];*/
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

<title>訊息總覽</title>

<style>
.top{
 margin:auto;
 width:60vw;
 text-align:center;
 padding:30px 0 0 0;
 font-family:微軟正黑體;
 font-size:18px;
}
/*.nav{
 background-color:#339;
 padding: 10px 0px;
 }*/
.nav a {
  color: #5a5a5a;
  font-size: 11px;
  font-weight: bold;
  text-transform: uppercase;
}

.nav li {
  display: inline;
}
.CSSTableGenerator {
 margin:auto;
 padding:0px;
 width:60vw;
 }
 .CSSTableGenerator table{
    border-collapse: collapse;
    border-spacing: 0;
 width:100%;
 height:100%;
 margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
 -moz-border-radius-bottomright:9px;
 -webkit-border-bottom-right-radius:9px;
 border-bottom-right-radius:9px;
}
.CSSTableGenerator table tr:first-child td:first-child {
 -moz-border-radius-topleft:9px;
 -webkit-border-top-left-radius:9px;
 border-top-left-radius:9px;
}
.CSSTableGenerator table tr:first-child td:last-child {
 -moz-border-radius-topright:9px;
 -webkit-border-top-right-radius:9px;
 border-top-right-radius:9px;
 
}.CSSTableGenerator tr:last-child td:first-child{
 -moz-border-radius-bottomleft:9px;
 -webkit-border-bottom-left-radius:9px;
 border-bottom-left-radius:9px;
 
}.CSSTableGenerator a{
 background-color:#005fbf;
 color:white;
}

}.CSSTableGenerator tr:hover td{
 background-color:#005fbf;
 color:white;
}
.CSSTableGenerator td{
 vertical-align:middle;
 background-color:#e5e5e5;
 border:1px solid #999999;
 border-width:0px 1px 1px 0px;
 text-align:left;
 padding:8px;
 font-size:16px;
 font-family:Arial,微軟正黑體;
 font-weight:normal;
 color:#000000;
}.CSSTableGenerator tr:last-child td{
 border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
 border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
 border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
  background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%); 
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
  background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf"); 
  background: -o-linear-gradient(top,#005fbf,005fbf);
  background-color:#005fbf;
  text-align:center;
  font-size:20px;
  font-family:Arial, 微軟正黑體;
  font-weight:bold;
  color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
  background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%); 
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
  background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf"); 
  background: -o-linear-gradient(top,#005fbf,005fbf);
  background-color:#005fbf;
}
/*.CSSTableGenerator:last-child{
  display:none;
}*/
 
</style>
</head>

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

<div class="top">
 <h3>訊息總覽</h3>
</div>
      
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
for($i=0;$i<=mysqli_num_rows($data);$i++){
for($i=0;$i<=mysqli_num_rows($data2);$i++){
  $rs2=mysqli_fetch_assoc($data2);
  $rs=mysqli_fetch_assoc($data);
?>
<div class="container">
  <div class="CSSTableGenerator">
      <table align="center">
      <?php if($rs['id']==NULL)break?> 
            <tr>
              <td></td>
              <td><a href="reply.php?id=<?php echo $rs['id'] ?>">回覆</a>
            </tr>
            <tr>
              <td width="25%">帳號</td>
              <td width="75%"><?php echo $rs['id']?></td>
            </tr>
            <?php if($rs['context']==NULL)?>
              
            <tr>
              <td>留言內容</td>
              <td><?php echo $rs['context']?></td>
            </tr>
            <?php if($rs2['R_message']!=NULL){?>
            <tr>
              <td colspan="2" style="background:#999; color:white; text-align:center">站長回覆</td>
            </tr>
            <tr>
              <td colspan="2"><?php echo $rs2['R_message']?></td>
            </tr>
            <?php } ?>
            <?php if($rs2['R_message']==NULL){?>
            <tr>
              <td colspan="2" style="background:#999; color:white; text-align:center">站長回覆</td>
            </tr>
            <tr>
              <td colspan="2"><?php echo NULL ?></td>
            </tr>
            <?php } ?>
      </table>
      </div>
</div>
<br />
<?php } ?>
<?php } ?>



</body>
</html>