<?php
//creat connection
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
    else{
      //echo "Connected successfully<BR>";
    }
    
?>