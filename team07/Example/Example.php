<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Example.css">
    <title>首頁</title>
</head>
<body>
    <div class="wrap">
            <div class="topArea">
                    <ul class="Menu">
                        <li class="logo">
                            <a>Team7</a>
                        </li>
                        <li>
                            <li class="mainLink">
                                <a href="../team07/index.php">首頁</a>
                            </li>
                        </li>
                        <li class="mainLink">
                            <a href="../team07/MovieIntroduction/film_intro.php"> 電影介紹</a>
                        </li>
                        <?php  //如果未登入則顯示登入選項
                        if(empty($_SESSION['Custid'])){
                            echo"
                            <li class='mainLink'>
                                <a href='../team07/custm/cust_loggin.php'>會員登入</a>
                            </li>
                            <li class='mainLink'>
                                <a href='../team07/custm/cust_signin.php'>注冊</a>
                            </li>";
                        }else{   //登入則顯示會員專區
                            echo"                                          
                            <li class='mainLink'>
                                <a href='../team07/custm/cust_Home.php'> 會員專區</a>
                            </li>";
                        }
                        ?> 
                    </ul>
                </div>
                  <h1>現正熱映</h1>
        <div class="slider_container">
	<div>
		<img src="image/image1.jpg" alt="pure css3 slider" />
		<span class="info">絕命終結站5</span>
	</div>
	<div>
		<img src="image/image2.jpg" alt="pure css3 slider" />
		<span class="info">絕命終結站</span>
	</div>
	<div>
		<img src="image/image3.jpg" alt="pure css3 slider" />
		<span class="info">歌喉戰3</span>
	</div>
        <div>
		<img src="image/image4.jpg" alt="pure css3 slider" />
		<span class="info">STAR WARS：最後的絕地武士</span>
	</div>
        <div>
		<img src="image/image5.jpg" alt="pure css3 slider" />
		<span class="info">東方快車謀殺案</span>
	</div>
</div>

             <section class="indexNews">
            <h2>最新公告</h2>
             <ul>

          <li>

 <time>2017/12/32</time><a href="../team07/annoucement.php">2018/01/32 會員系統維護公告</a>
          </li>

          <li>
            <time>2017/12/32</time><a href="../team07/annoucement.php">反詐騙宣導公告</a>
          </li>

          <li>
            <time>2017/12/32</time><a href="../team07/annoucement.php">TEAM7出版</a>
          </li>

          <li>
            <time>2017/12/32</time><a href="../team07/annoucement.php">場次開放時間說明</a>
          </li>

        </ul>
      </section>
      <div class="block">
        <p></p>    
        </div>  
     </div>
     <footer class="Footer">
        <section class="copyright">
        <p>copyright @第七組 組員:123455676777</p>
        </section>    
    </footer>
     
</body>
</html>