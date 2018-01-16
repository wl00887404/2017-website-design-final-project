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
</head>
<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();


</script>

<?php
$sql="select s_id,s_name,s_period,s_site,s_intro,s_num from sort;";
$result=mysqli_query($link,$sql);


echo "<body>";
	if (mysqli_num_rows($result) > 0) { //如果select的資料大於0筆,就輸出資料並含核取方塊checkbox(以便刪除)，還有確認送出紐，完成後POST到delete.php

	    echo '
        <center><h1 >票務管理</h1>
        <a href="adminpage_add.php" target="_self" style="text-decoration:none;padding:50px;font-family:微軟正黑體;font-weight:bolder;font-size:25px;"> 新增</a>
        <a href="adminpage_edit.php" target="_self" style="text-decoration:none;padding:50px;font-family:微軟正黑體;font-weight:bolder;font-size:25px;"> 修改</a>
        <a href="adminpage_delete.php" target="_self" style="text-decoration:none;padding:50px;font-family:微軟正黑體;font-weight:bolder;font-size:25px;"> 刪除</a>
          </center>

        
        <form method="POST" action="do_delete_ticket.php">
          
		   <table cellpadding="0px"; cellspacing="0px"; border="0px"; >
             <thead class="tbl-header">
                <tr> 
					<th><label style=color:#1f1f2e;font-weight:bolder;> 展覽名稱 </label></th>
					<th><label style=color:#1f1f2e;font-weight:bolder;> 展覽期間 </label></th>
					<th><label style=color:#1f1f2e;font-weight:bolder;> 地點 </label></th>
                    <th><label style=color:#1f1f2e;font-weight:bolder;> 簡介 </label></th>
                    <th><label style=color:#1f1f2e;font-weight:bolder;> 供票數量</label></th>
                    <th><input type="submit" value="確認刪除" id="submit"/></th>
                </tr>
                </thead>
                </table>
           
              
              ';
        echo ' 
        <table cellpadding="0" cellspacing="0" border="0">
        <tbody class="tbl-content">';
		while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $row["s_name"]. "</td>
            <td>" . $row["s_period"]. "</td>
            <td>" . $row["s_site"]. "</td>
            <td >" . $row["s_intro"]. "</td>
			<td>" . $row["s_num"]. "</td>
            
			<td><input type='checkbox' name='checkbox[]' value='" . $row["s_id"] . "' /></td>
            </tr>";
           
	    }   
          

	    echo "</tbody></table>";
	    
	   	echo "</form>";
	} else {
	    echo "0 results";
	}
echo "</body>";



?>



  
</body>
</html> 

<?php
    //結束mysql連線
    mysqli_close($link);
    ?>