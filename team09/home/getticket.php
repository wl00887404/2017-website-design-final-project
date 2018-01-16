<?php
require_once("connectserver.php");
$sql="SELECT * FROM ticket";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){//擷取資料並新增
     echo '<div class="grid_1_of_5 images_1_of_5">';
     echo '<div class="E_image">';
     echo '<img src='.$row["t_info"].' alt="" />';
     echo '</div>';
     echo '<div class="exhibition-form">';
     echo '<form method="post" action="cart.php">';
     echo '<div>';
     echo '<span><label>展覽</label></span>';
     echo '<span><input name="t_name" type="text" class="textbox" value='.$row["t_name"].' readonly="readonly"></span>';
     echo '</div>';
     echo '<div>';
     echo '<span><label>票價</label></span>';
     echo '<span><input name="t_price" type="text" class="textbox" value='.$row["t_price"].' readonly="readonly"></span>';
     echo '</div>';
     echo '<div>';
     echo '<span><label>剩餘張數</label></span>';
     echo '<span><input name="t_rest" type="text" class="textbox" value='.$row["t_rest"].' readonly="readonly"></span>';
     echo '</div>';
     echo '<div>';
     echo '<span><label>預購票數</label></span>';
     echo '<span><input name="t_num" type="text" class="textbox"></span>';
     echo '</div>';
     echo '<div>';
     echo '<span><input type="submit" value="送出" class="mybutton"></span>';
     echo '</div>';
     echo '</form>';
     echo '</div>';
     echo '</div>';
 }   

?>