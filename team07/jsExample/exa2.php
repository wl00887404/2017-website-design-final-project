<?php
    $film = $_REQUEST["f"]; //取用網址參數f
    $dateArr = array(); //用來存放查詢結果的array
    $servername = "140.123.175.101";
    $username = "team07";
    $password = "gg";
    $dbname = "team07";
       
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
          
    $sql = "SELECT SecDate FROM Session WHERE FilmNumber = '$film'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        array_push($dateArr, $row["SecDate"]);
      }
    }
    else{
        array_push($dateArr, "查無結果");
    }
    mysqli_close($conn);
    $dateArr = array_unique($dateArr); //用array_unique()去掉重複的結果
    foreach ($dateArr as $key => $value) { //把每個結果列出來
        echo 'slcD.add(new Option("'.$value.'", "'.$value.'"));'; //回傳給exa1.php的值
    }
?>