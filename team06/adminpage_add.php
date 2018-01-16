<?php
include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>藝文廣場</title>
    <link rel="stylesheet" type="text/css" href="adminpage_style.css">
    <link rel="stylesheet" type="text/css" href="adminpage_add_style.css">

<style>
.footer{
    height: 50%;
　position: relative;
　margin-top: -100px;
}


</style>



</head>
<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

$("#login-button").click(function(event){
		 event.preventDefault();
	 
	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
});

</script>

<body>
<div class="wrapper">
	<div class="container">
        <center><h1 style="top:0px" >新增票務資訊</h1>
        
        <form method="POST" action="do_add_ticket.php" class="form" enctype="multipart/form-data">
       
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">展覽名稱:</label>
        <br>
        <input type="text" style="width:400px;height:40px;margin:10px;" name="sort_name" autocomplete="off" required ></input>
        <br>
        
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">票價:</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="sort_price"  autocomplete="off" required></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">展覽資訊:</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="sort_info"  autocomplete="off" required></input>
        <br> 
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">供票張數</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="sort_sum"  autocomplete="off"></input>
        <br>
          <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">地點:</label>
        <br>
        <input type="text" style="width:400px;height:40px;" name="sort_place"  autocomplete="off" required></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">舉辦單位:</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="sort_hold"  autocomplete="off" required></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">展期:</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="sort_time"  autocomplete="off" required></input>
        <br>
      
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">展覽廣告圖:</label> 
        <br>
        <input type="file" name="photo" style="width:400px;height:40px;" name="sort_img"  autocomplete="off" required ></input>
        <br>
        
      
       <input type="submit" value="新增" style="margin:15px;width:80px"></input>
        </form>

  <div class=footer>



</div>      
    </div>


</div>








  
</body>




</html> 

<?php
    //結束mysql連線
    mysqli_close($conn);
    ?>