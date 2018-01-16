<?php
session_start();
if(empty($_SESSION['admid'])==true){
    header("location: index.php");
}
$servername = "140.123.175.101";
$username = "team07";
$password = "gg";
$dbname = "team07";
  
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if(!$conn){
  die ("Connection failed: " . mysqli_connect_error() . "<BR>");       
}
$id = $_GET['id'];

/**$sql = "UPDATE Ticket SET TickRefund='1' WHERE Session.FilmNumber = '$id' AND Book.SecNumber =Session.SecNumber AND Ticket.BookNumber=Session.BookNumber";
if(mysqli_query($conn, $sql)){
    echo "Ticket退票成功<BR>";*/
    $sql = "DELETE FROM Session WHERE FilmNumber = '$id'";
    if(mysqli_query($conn, $sql)){
      echo "Session刪除成功<BR>";
      $sql = "DELETE FROM Film WHERE FilmNumber = '$id'";
      if(mysqli_query($conn, $sql)){
        echo "Film刪除成功<BR>";
      }
      else{
        echo "Film刪除失敗<BR>";
      }
    }
    else{
      echo "Session刪除失敗<BR>";
    }
/*}
else{
  echo "Ticket退票失敗<BR>";
}*/
header("location: filmcheck.php#");
mysqli_close($conn); 
?>