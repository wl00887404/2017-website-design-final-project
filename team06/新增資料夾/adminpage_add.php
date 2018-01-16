<?php
include_once('mysql_connect.php');

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
        
        <form method="POST" action="do_add_ticket.php" class="form">
       
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">票場名稱:</label>
        <br>
        <input type="text" style="width:400px;height:40px;margin:10px;" name="s_name" autocomplete="off" required ></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">展期:</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="s_period"  autocomplete="off" required></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">地點:</label>
        <br>
        <input type="text" style="width:400px;height:40px;" name="s_site"  autocomplete="off" required></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">展覽簡介:</label> 
        <br>
        <input type="text" style="width:400px;height:40px;" name="s_intro"  autocomplete="off" required ></input>
        <br>
        <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">供票張數</label>
        <br>
        <input type="text" style="width:400px;height:40px;"  name="s_num"  autocomplete="off"></input>
        <br>
       <input type="submit" value="新增" style="margin:15px;width:80px"></input>
        </form>

        
    </div>








</div>

  
</body>
</html> 

<?php
    //結束mysql連線
    mysqli_close($link);
    ?>