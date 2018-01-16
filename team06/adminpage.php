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
</head>
<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();


</script>





<?php
$sql="select * from sort;";
$result=mysqli_query($conn,$sql);
$photo = '';
if(isset($_FILES['photo']))
{
  //print_r($_FILES);
  /**
   * //檔案的陣列有以下索引值
   * $_FILES['設定的name鍵值']['name'] 原本的檔名
   * $_FILES['設定的name鍵值']['tmp_name'] 暫存在server上面的檔名，會被重新命名過
   * $_FILES['設定的name鍵值']['type'] 檔案型態
   * $_FILES['設定的name鍵值']['size'] 檔案大小
   * $_FILES['設定的name鍵值']['error'] 錯問代碼
   */
  //如果有傳 photo 索引值的檔案來
  //檢查上傳到server的暫存檔案是否存在
  if(file_exists($_FILES['photo']['tmp_name']))
  {
    // move_uploaded_file 這個方法可以將上傳的檔案，移動到你目標的資料夾。
    $targetFolder = "file/";
    move_uploaded_file($_FILES['photo']['tmp_name'], $targetFolder . $_FILES['photo']['name']);

    //將目標資料夾與檔案名稱組再一起，就是在server上的檔案位置了。
    $photo = $targetFolder.$_FILES['photo']['name'];
    //echo "檔案存在，可以搬移";
  }
  else
  {
    echo "上傳檔案失敗，暫存檔不在，請確認資料夾寫入權限。或php.ini上傳檔案容量限制是否太小。";
  }
}

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
                            <th><label style=color:#1f1f2e;font-weight:bolder;> 票價 </label></th>
                            <th><label style=color:#1f1f2e;font-weight:bolder;> 展覽資訊 </label></th>
                            <th><label style=color:#1f1f2e;font-weight:bolder;> 供票張數 </label></th>
                            <th><label style=color:#1f1f2e;font-weight:bolder;> 地點 </label></th>
					        <th><label style=color:#1f1f2e;font-weight:bolder;> 舉辦單位 </label></th>
					        <th><label style=color:#1f1f2e;font-weight:bolder;> 展期 </label></th>
                  <th><label style=color:#1f1f2e;font-weight:bolder;> 展覽廣告圖</label></th>
                  
                  <th><label style=color:#1f1f2e;> </label></th>
                </tr>
             
              </thead>
               
              <tbody class="tbl-content">';
                  while($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>
                          <td>" . $row["sort_name"]. "</td>
                          <td>" . $row["sort_price"]. "</td>
                          <td>" . $row["sort_info"]. "</td>
                          <td >" . $row["sort_sum"]. "</td>
                          <td>" . $row["sort_place"]. "</td>
                          <td>" . $row["sort_hold"]. "</td>
                          <td>" . $row["sort_time"]. "</td>
                          <td >" . $row["sort_info"]. "</td>
                          <td><img src='{$photo}'></td>
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

</html> 

<?php
    //結束mysql連線
    mysqli_close($conn);
    ?>