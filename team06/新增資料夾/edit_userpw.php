
<?php
include 'mysql_connect.php';

echo '
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改使用者密碼/忘記密碼</title>
    <link rel="stylesheet" type="text/css" href="adminpage_add_style.css">
</head>
<body>
       <div class="wrapper">
       <div class="container">
           <center><h1 style="top:0px" >會員專區</h1>
           
           <form method="POST" action="do_edit_userpw.php" class="form">
          
           <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">原本帳號</label>
           <br>
           <input type="text" style="width:400px;height:40px;margin:10px;" name="username" autocomplete="off" required ></input>
           <br>
           <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">修改密碼</label>
           <br>
           <input type="text" style="width:400px;height:40px;"  name="e_pw1"  autocomplete="off" required></input>
           <br>
           <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">請在確認一次密碼</label>
           <br>
           <input type="text" style="width:400px;height:40px;" name="e_pw2"  autocomplete="off" required></input>
           <br>
           <label style="font-family:微軟正黑體;font-weight:bolder;letter-spacing:8px;">我不是機器人</label> 
           <br>
          <input type="submit" value="送出" style="margin:15px;width:80px"></input>
           </form>
   
           
       </div>
   
   </div>
   


</form>
</body>
</html>
';
?>