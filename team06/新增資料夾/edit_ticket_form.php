<?php
//  (顯示所有的票，選擇要編輯的票)，再連到表單，表單再傳給資料庫更改資料庫內容 
include 'mysql_connect.php';

// $username=$_POST['username'];
// $s_name=$_POST['s_name'];
// $s_period=$_POST['s_period'];
// $s_site=$_POST['s_site'];
// $s_intro=$_POST['s_intro'];
// $s_num=$_POST['s_num'];
// $check=$_POST['checkbox'];

echo'
<html>
<head>
<link rel="stylesheet" type="text/css" href="adminpage_style.css">
<link rel="stylesheet" type="text/css" href="adminpage_add_style.css">
</head>

<body>


<div class="wrapper">
	<div class="container">
        <center><h1 style="top:0px" >編輯票務資訊</h1>
        
        <form method="POST" action="do_edit_ticket.php" class="form">

        <input type="text" style="width:400px;height:40px;margin:10px;" name="s_name" autocomplete="off" required ></input>
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
       <input type="submit" value="編輯" style="margin:15px;width:80px"></input>
        </form>

        
    </div>

</div>


</body>
</html>









';











mysqli_close($link);
?>