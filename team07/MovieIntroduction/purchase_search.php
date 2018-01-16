<?php
    $date = $_REQUEST["d"]; //取用網址參數f
    $fn = $_REQUEST["fn"];
    $dateArr = array(); //用來存放查詢結果的array
    $servername = "140.123.175.101";
    $username = "team07";
    $password = "gg";
    $dbname = "team07";
       
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
          
    $sql = "SELECT SecStart ,SecTheater FROM Session WHERE SecDate = '$date' AND FilmNumber='$fn'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        $timeArr=array();
      while($row=mysqli_fetch_assoc($result)){
        $timeArr[]=$row;
      }
    }
    else{
        array_push($timeArr, "查無結果");
    }
    mysqli_close($conn);
    $timeArr = array_unique($timeArr); //用array_unique()去掉重複的結果
    foreach ($timeArr as $key => $value) { //把每個結果列出來
        $sval1=$timeArr[$key]['SecStart'];
        $sval=$sval1.$timeArr[$key]['SecTheater'];
        echo 'slcD.add(new Option("'.$sval.'", "'.$sval1.'"));'; //回傳給exa1.php的值
        
        
    }
?>