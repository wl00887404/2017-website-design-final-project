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
<body>

<form method="POST" action="do_edit_ticket.php">
<label >票場名稱:</label>
<input type="text" style="width:200px;" name="s_name" autocomplete="off" required></input>
<br>
<label >展期:</label>
<input type="text" style="width:200px;"  name="s_period"  autocomplete="off" required></input>
<br>
<label >地點:</label>
<input type="text" style="width:200px;" name="s_site"  autocomplete="off" required></input>
<br>
<label >展覽簡介:</label> 
<input type="text" style="width:200px;" name="s_intro"  autocomplete="off" required ></input>
<br>
<label >供票張數</label>
<input type="text" style="width:200px;"  name="s_num"  autocomplete="off"></input>
<br>
<input type="submit" value="edit"></input>
</form>
</body>
</html>
';


mysqli_close($link);
?>