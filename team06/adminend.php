<?php
include_once ("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>藝文廣場</title>
    <link rel="stylesheet" type="text/css" href="adminpage_style.css">




</head>
<body>
<h2>管理員介面</h2>    
<?php
			//使用 isset()方法，判別有沒有此變數可以使用，以及為已經登入
			if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == TRUE):
	  ?>

		<div class="result">
		<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="hoverEffect.css" rel="stylesheet">
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();


</script>
    <!-- <style>
    .footer {
    border-top: 1px solid #e5e5e5;
    color: #777;
    padding: 19px 0;
    margin-bottom: 0px;
    }
    .img {
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 20px;
        height: 250px;
        width: 250px;
        overflow:hidden;
    }
    .lastimg {
        margin-left:0px;
        margin-top: 20px;
        margin-bottom: 20px;
        height: 250px;
        width: 250px;
        overflow:hidden; 
    }
    .navfont {
        color: white;
    }
    .navfont :hover {
        color: white;
    }
    .btn__badge {
        background: #ff9500;
        color: white;
        font-size: 10px;
        position: relative;
        padding: 3px 6px;
        top: -25px;
        right: 20px;
        border-radius: 15px;
    } 
    </style>-->
</head>
<body>
 <div style=""> 
    <!--navbar-->
  <div style="margin:0px; padding:0px"> 
   <nav class="navbar navbar-default" role="navigation" style="background-color:rgb(27, 58, 53); position: relative; margin:0px">
   <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="font-size:30px; color:white;position: absolute; top: 50%; transform: translateY(-50%)">藝文廣場</a>
   </div>
   <div>
      <ul class="nav navbar-nav pull-right">
          <!-- 购物车按钮-->
         <!-- <li>
               <a href="#" class="glyphicon glyphicon-shopping-cart" style="color:white; padding-top:25px; font-size:30px"></a>
               <!--<span class="btn__badge">current_cart.products.count</span>-->
         </li> -->
		 <li style="font-size:20px; padding-top:10px; padding-bottom:10px"><a class="navfont"  href="javascript:if(confirm('你確定要登出嗎?')) location.href='logout.php'"> 登出</a></li>
<!-- 		 
         <li><a class="navfont" href="#" style="font-size:20px; padding-top:25px">註冊</a></li>
         <li><a href="#"><img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.2081-6/c0.0.51.51/p50x50/14365540_180484242386565_647877825_n.png?oh=4e12707e438e8adc17489467f65bb884&oe=5AC5BD32" style="height: 3em; width: 3em; border-radius:50%"></li> -->
      </ul>
   </div>
</nav>
</div>




<?php
$sql="select * from sort;";
$result=mysqli_query($conn,$sql);

echo "<body>";
	if (mysqli_num_rows($result) > 0) { //如果select的資料大於0筆,就輸出資料並含核取方塊checkbox(以便刪除)，還有確認送出紐，完成後POST到delete.php

	    echo '
        <center><h1 >票務管理</h1>
            
            <a href="adminpage_add.php" target="_self" style="text-decoration:none;padding:50px;font-family:微軟正黑體;font-weight:bolder;font-size:25px;"> 新增</a>
            <a href="adminpage_edit.php" target="_self" style="text-decoration:none;padding:50px;font-family:微軟正黑體;font-weight:bolder;font-size:25px;"> 修改</a>
            <a href="adminpage_delete.php" target="_self" style="text-decoration:none;padding:50px;font-family:微軟正黑體;font-weight:bolder;font-size:25px;"> 刪除</a>
          </center>

        
        <form method="POST" >
         
		        <table cellpadding="0px"; cellspacing="0px"; border="0px"; >
             
              <thead class="tbl-header">
              
                <tr> 
					        <th><label style=color:#1f1f2e;font-weight:bolder;> 展覽名稱 </label></th>
					        <th><label style=color:#1f1f2e;font-weight:bolder;> 展覽期間 </label></th>
					        <th><label style=color:#1f1f2e;font-weight:bolder;> 地點 </label></th>
                  <th><label style=color:#1f1f2e;font-weight:bolder;> 簡介 </label></th>
                  <th><label style=color:#1f1f2e;font-weight:bolder;> 供票數量</label></th>
                  <th><label style=color:#1f1f2e;> </label></th>
                </tr>
             
              </thead>
               
              <tbody class="tbl-content">';
                  while($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>
                          <td>" . $row["sort_no"]. "</td>
                          <td>" . $row["sort_name"]. "</td>
                          <td>" . $row["sort_price"]. "</td>
                          <td >" . $row["sort_info"]. "</td>
                          <td>" . $row["sort_sum"]. "</td>
                          <td>" . $row["sort_place"]. "</td>
                          <td>" . $row["sort_hold"]. "</td>
                          <td>" . $row["sort_time"]. "</td>
                          <td>" . $row["sort_img"]. "</td>
                          
                              </tr>";
        
                  }
                  

             echo "</tbody>
            </table>";
	    
	   	echo "</form>";
	} else {
	    echo "0 results";
	}
echo "</body>";



?>


        <div class="row footer-bottom">
            <ul class="list-inline text-center">
                <li>Copyright &copy;2017. n Software All Rights Reserved.</li>
            </ul>
        </div>
    </div>
</div>
 </div>
</body>
</html>	







		</div>








		

		<?php
			else:

			
				header('Location: login.php');
			endif;
		?>

</body>
</html>