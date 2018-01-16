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

  //echo "Connected successfully";
?>