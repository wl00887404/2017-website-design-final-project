<?php 
session_start();
error_reporting(0);
include("Announcement.php");
$id=$_SESSION['id'];
$data=mysqli_query($conn,"select * from message");
$data2=mysqli_query($conn,"select id from message");
/*$user=mysqli_query($conn,"select id from message where id='$id'");*/

 $rs=mysqli_fetch_assoc($data2);


 $guestReply=$_POST['guestReply'];
 date_default_timezone_set("Asia/Taipei");
 $time=date("Y:m:d H:i:s");

 if(isset($_POST['guestReply'])){
$idd=  $_POST['clientid'];
 $sql = "INSERT INTO R_message( R_id, R_message,R_time) VALUES ('$idd','$guestReply','$time')";
 $result = mysqli_query($conn,$sql);

 header("location:admin.php");
}

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

<style>
.reply .container{
  margin:auto;
  background-color:#f5f5f5;
  width:58%;
  padding:20px 20px 40px;;
  font-size:20px;
  font-family:微軟正黑體;
  text-align:right;
 }
.reply .container .button{
  text-align:right;
  padding: 10px;
 }
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
/*.CSSTableGenerator tr:first-child td{
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
}*/
.CSSTableGenerator tr:first-child:hover td{
  background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%); 
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
  background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf"); 
  background: -o-linear-gradient(top,#005fbf,005fbf);
  background-color:#005fbf;
}

 
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


<br />
<br />
<?php
for($i=1;$i<=mysqli_num_rows($data);$i++){
 $rs=mysqli_fetch_assoc($data);
?>
<div class="container">
  <div class="CSSTableGenerator">
      <table align="center">

            <tr>
              <td width="25%" height="10%">帳號</td>
              <td width="75%" height="10%"><?php echo $rs['id']?></td>
            </tr>
            <tr>
              <td height="10%">留言內容</td>
              <td height="10%"><?php echo $rs['context']?></td>
            </tr>
            <tr>
              <td height="10%">留言時間</td>
              <td height="10%"><?php echo $rs['time']?></td>
            </tr>
        </table>
 </div>
</div>
<br />

<div class="reply">
 <div class="container">
     <form id="form1" name="form1" method="post" action="">
         <div class="form-group">
           <input type="hidden" name="clientid" value="<?php echo $rs['id']?>">
             <label for="guestReply" class="col-ms-6 control-label">回覆內容：</label>
                <div class="col-ms-6">
                 <textarea class="form-control" rows="8" id="guestReply" name="guestReply"/></textarea>
                </div>
            </div>
            <br />
            <input type="submit" value="回覆" class="btn">
            <!-- <div class="button"> -->
             <!-- <input type="submit" class="btn" value="回覆"/> -->
            <!-- </div> -->
        </form>
    </div>
</div>
<?php } ?>
</body>
</html>