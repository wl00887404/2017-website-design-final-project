<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>select的js示範</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<a href="http://javascript.john650914.com/documentation/select.php">Javascript-select物件參數列表</a>
<h3>1.第二組的寫法</h3>
<select onChange="fun1(this.value)">
<option value="1">選項A</option>
<option value="2">選項B</option>
<option value="3">選項C</option>
</select>
<a id="val1">未選取</a><!--注意這裡是用id，讓getElementById()可以找到它-->
<br>
<br>
<h3>2.讓一個選項影響另一個選項</h3>
<a>語言:</a>
<select onChange="change(this.value)">
<option value="">---</option>
<option value="C">中文</option>
<option value="E">English</option>
</select>
<a>數字:</a>
<select id="counting">
<option value="">---</option>
</select>
<br>
<br>
<h3>3.加上資料庫</h3>
javascript本身也有連結資料庫的函式，<br>
但script是未編譯的明碼，只要查看網頁原始碼就能看。<br>
為了防止資料庫資訊外流，連結資料庫的部分用php寫比較好。<br>
<br>
javascript呼叫PHP的方法:&nbsp;
<a href="https://www.w3schools.com/xml/ajax_php.asp">XML</a>&nbsp;&nbsp;
<a href="https://stackoverflow.com/questions/15757750/how-can-i-call-php-functions-by-javascript">jQuery</a><br>
<br>
<a>電影:</a><select name="fm" onChange="filmchange(this.value)">
<option value="">---</option>
<?php
    $servername = "140.123.175.101";
    $username = "team07";
    $password = "gg";
    $dbname = "team07";
       
    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $fnArr = array();
    $now = date("Y/m/d"); //今天日期
    $sql = "SELECT FilmNumber FROM Session WHERE SecDate >= '$now' ORDER BY SecDate ASC"; //查詢今後還有場次的電影編號
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        array_push($fnArr, $row["FilmNumber"]);
      }
    }
    else{
        array_push($fnArr, "查無結果");
    }
    $fnArr = array_unique($fnArr); //用array_unique()去掉重複的結果
    foreach ($fnArr as $key => $value) { //把每個結果列出來，$value是電影編號
        $sql = "SELECT FilmName FROM Film WHERE FilmNumber = '$value'"; //從Film查詢各電影編號代表的電影名稱
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<option value=\"".$value."\">".$row["FilmName"]."</option>";
            }
        }
    }
    mysqli_close($conn);
?>
</select>
<a>日期:</a><select id="dt" name="date">
<option value="">---</option>
</select>

<p>PHP回傳值: <span id="showtxt"></span></p> <!--這行只是方便debug用的，可以直接看php回傳的值-->

</body>
<script type="text/javascript">
    //第二組的寫法
    function fun1(v1){
        document.getElementById("val1").innerHTML= "目前選擇第"+v1+"個選項";
        //v1是選中option的value
    }

    //讓選擇的語言影響數字的選項
    function change(lan){
        var selectA = document.getElementById("counting");
        remove(selectA); //呼叫清空select的方法，先把選項清空，以免每次重新選擇後選項越來越多
        if(lan=="C"){ //如果選中文
            //新增3筆選項
            selectA.add(new Option("一", "1"));
            selectA.add(new Option("二", "2"));
            selectA.add(new Option("三", "3"));
        }else if(lan=="E"){ //如果選英文
            //新增2筆選項
            selectA.add(new Option("one", "1"));
            selectA.add(new Option("two", "2"));
        } 
    }

    //清空select的方法
    function remove(slc){
        //從最後一個選項開始刪，刪到只剩一個選項(預設的---選項)
        for(var i = slc.length-1 ; i>=1 ; i--){
        slc.remove(i);
        }
    }
    //加上資料庫
    //我是用XML的AJAX，也可以用jQuery
    function filmchange(filmslc){
        var slcD = document.getElementById("dt");
        remove(slcD);
        //呼叫PHP
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() { //確認伺服器回應，詳情:https://www.w3schools.com/xml/ajax_xmlhttprequest_response.asp
            if (this.readyState == 4 && this.status == 200) {
                var text =this.responseText; //responseText是php回傳的值(字串型式)
                eval(text); //eval函數可以執行字串內容
                document.getElementById("showtxt").innerHTML = text; //這行只是方便debug用的，可以直接看php回傳的值
            }
        };
        //將Request傳到exa2.php，並把filmslc(電影選單的值)儲存在網址參數f  
        xmlhttp.open("GET", "exa2.php?f="+filmslc, true);
        xmlhttp.send();
    }

</script>
</html>