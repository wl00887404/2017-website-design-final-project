<?php
include_once ("mysql_connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>藝文廣場</title>
	

</head>


<body>
<h2>使用者介面</h2>    
<?php
			//使用 isset()方法，判別有沒有此變數可以使用，以及為已經登入
			if(isset($_SESSION['is_user']) && $_SESSION['is_user'] == TRUE):
	  ?>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="hoverEffect.css" rel="stylesheet">
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <style>
    .footer {
    border-top: 1px solid #e5e5e5;
    color: #777;
    padding: 19px 0;
    margin-bottom: 0px;
    }
    .img {
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 20px;
        height: 250px;
        width: 250px;
        overflow:hidden;
    }
    .lastimg {
        margin-left:0px;
        margin-top: 20px;
        margin-bottom: 20px;
        height: 250px;
        width: 250px;
        overflow:hidden; 
    }
    .navfont {
        color: white;
    }
    .navfont :hover {
        color: white;
    }
    .btn__badge {
        background: #ff9500;
        color: white;
        font-size: 10px;
        position: relative;
        padding: 3px 6px;
        top: -25px;
        right: 20px;
        border-radius: 15px;
    }
    </style>
</head>
<body>
 <div style="background-image:url(larm-rmah-273854.jpg)"> 
    <!--navbar-->
  <div style="margin:0px; padding:0px"> 
   <nav class="navbar navbar-default" role="navigation" style="background-color:rgb(27, 58, 53); position: relative; margin:0px">
   <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-size:30px; color:white;position: absolute; top: 50%; transform: translateY(-50%)">藝文廣場</a>
   </div>
   <div>
      <ul class="nav navbar-nav pull-right">
          <!-- 购物车按钮-->
         <li>
               <a href="#" class="glyphicon glyphicon-shopping-cart" style="color:white; padding-top:25px; font-size:30px"></a>
               <!--<span class="btn__badge">current_cart.products.count</span>-->
         </li>
		 <li style="font-size:20px; padding-top:10px; padding-bottom:10px"><a class="navfont"  href="javascript:if(confirm('你確定要登出嗎?')) location.href='logout.php'"> 登出</a></li>
		 
         <li><a class="navfont" href="#" style="font-size:20px; padding-top:25px">註冊</a></li>
         <li><a href="#"><img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.2081-6/c0.0.51.51/p50x50/14365540_180484242386565_647877825_n.png?oh=4e12707e438e8adc17489467f65bb884&oe=5AC5BD32" style="height: 3em; width: 3em; border-radius:50%"></li>
      </ul>
   </div>
</nav>
</div>

<!--轮播图-->
<div style="position:relative; margin:0px">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position:absolute" >
  <!-- Indicators -->
          <ol class="carousel-indicators">
           <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
           <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol>

  <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item">
              <img src="https://www.huashan1914.com/WebUPD/huashan1914/Index/做你的白日夢-banner-華山_1920x430px.jpg" >
              <!--<div class="carousel-caption">
              <button type="button" id="myButton" class="btn btn-primary" autocomplete="off">
              BUY TICKETS NOW!
              </button>
              </div>-->
            </div>
          <div class="item  active">
            <img src="https://www.huashan1914.com/WebUPD/huashan1914/Index/華山媒體素材-03_1920x430.jpg" >
            <!--<div class="carousel-caption">
            <button type="button" id="myButton" class="btn btn-primary" autocomplete="off">
              BUY TICKETS NOW!
              </button>
            </div>-->
          </div>
          </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
           <span class="icon-prev" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
           <span class="icon-next" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
        </a>
</div>
</div>

<div calss="container" style="position:relative; margin-top:318px; margin-bottom:20px">
    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="col-md-2 img hovereffect ">
            <img class="img-responsive" src="https://www.huashan1914.com/WebUPD/huashan1914/Index/11_17121110554013417.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive" src="https://www.huashan1914.com/WebUPD/huashan1914/Index/4.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/2.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
                <a class="info" href="#">點擊查看</a>
            </div>
        </div>
    </div>
    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/11_17121110554013417.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/4.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/2.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
                <a class="info" href="#">點擊查看</a>
            </div>
        </div>
    </div>
    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/11_17121110554013417.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/4.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/2.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
                <a class="info" href="#">點擊查看</a>
            </div>
        </div>
    </div>
    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/11_17121110554013417.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/4.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/2.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
                <a class="info" href="#">點擊查看</a>
            </div>
        </div>
    </div>
    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/11_17121110554013417.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/4.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/2.jpg">
            <div class="overlay">
               <a class="info" href="#">點擊查看</a>
            </div>
        </div>
        <div class="col-md-2 img hovereffect">
            <img class="img-responsive"src="https://www.huashan1914.com/WebUPD/huashan1914/Index/3.jpg">
            <div class="overlay">
                <a class="info" href="#">點擊查看</a>
            </div>
        </div>
    </div>
</div>

<div class="footer ">
    <div class="container">
        <div class="row footer-top">
            <div class="col-sm-6 col-lg-6">
                <h4></h4>
                <p>歡迎購票,這裡有你想要的</p>
            </div>
            <div class="col-sm-6  col-lg-5 col-lg-offset-1">
                <div class="row about">
                    <div class="col-xs-3">
                        <h4>關於</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="">關於我們</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>聯繫方式</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a target="_blank" title="官方微博" href="">新浪微博</a>
                            </li>
                            <li>
                                <a href="">電子郵件</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row footer-bottom">
            <ul class="list-inline text-center">
                <li>Copyright &copy;2017. n Software All Rights Reserved.</li>
            </ul>
        </div>
    </div>
</div>
 </div>
</body>
</html>	









		<?php
			else:

				header('Location: login.php');
			endif;
		?>

</body>
</html>