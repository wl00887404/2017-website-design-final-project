<?php 
//session_start();
 ?>


<?php
$servername = "140.123.175.101";
$username = "team09";
$password = "iphone";
$database = "team09";
//create connection
$conn = mysqli_connect($servername, $username, $password,$database);

//check connection
if(!$conn){
  die ("Connection failed: " . mysqli_connect_error());       
}

//include ("mysql_connect.php");
$account=$_SESSION['account'];

$sql = "select b_account,b_ticket,b_quantity,id from buyerticket WHERE b_account='$account'";
//$sql2= "select buyername,buyeraccount,ticketname, ticketquantity, id from saleshistory WHERE buyeraccount='$account'";

$result = mysqli_query($conn,$sql);
//$result2 = mysqli_query($conn,$sql2);

if(mysqli_num_rows($result)>0){
    echo' 
    <div class="cart-form">
    <form method="post" action="delete_fin.php">
    <table id="cart-table" cellpadding = "7" width="700" border = "1">
    <tr><th colspan = "4"><center> <h1><b>購物車清單</b> </h1></center></th></tr>
    <tr>
        <th><b><div>購買者</center></div></b></th>
        <th><b><div>展覽</div></b></th>
        <th><b><div>數量</div></b></th>
        <th><b><div style="background-color:#FF3333;">移除</div></b></th>
    </tr>';
    while($row = mysqli_fetch_assoc($result) ){
        
          echo "<tr><th>".$row["b_account"]."</th><th>".$row["b_ticket"]."</th><th>".$row["b_quantity"]."</th>".
               '<th><div style="background-color:#FF3333;"><center><input type = "checkbox" name ="checkbox[]" value='.$row["id"].' /></center></div></th></tr>';
           }
        
       }
    echo' 
    </table>
    <div>
    <center>
    <span><input type = "submit" value = "刪除物品" class="mycartbutton"></span>
    <span><a href="shop_fin.php">確認購買</a></span>
    </center>
    </div>
    </form>
    </div>';
?>