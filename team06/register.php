<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
        <link href="hoverEffect.css" rel="stylesheet">
        <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <title>藝文廣場</title>
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
    <body background="larm-rmah-273854.jpg">
        <div style="margin:0px; padding:0px"> 
        <nav class="navbar navbar-default" role="navigation" style="background-color:rgb(27, 58, 53); position: relative; margin:0px">
        <div class="navbar-header">
            <a class="navbar-brand" href="userend.php" style="font-size:30px; color:white;position: absolute; top: 50%; transform: translateY(-50%)">藝文廣場</a>
        </div>
        <div>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="cart2.php" class="glyphicon glyphicon-shopping-cart" style="color:white; padding-top:25px; font-size:30px"></a>
                </li>
                <li>
                    <a href="message.php" style="padding-top:20px"><img src="message.png" width="30px" ></a>
                </li>
                <li style="font-size:20px; padding-top:10px; padding-bottom:10px">
                    <a class="navfont" href="login.php"> 登入</a>
                </li>
                <li>
                    <a class="navfont" href="orders.php" style="font-size:20px; padding-top:25px">訂單紀錄</a>
                </li>

            </ul>
        </div>
    </nav>
    </div style="margin:100px;">
    <div style="text-align:center">
      <div style="display:inline-block">
        <form method="post" action="regist.php" style="color:black">
        <span style="color:white">帳號</span><input type="text" name="account"></br>
        <span style="color:white">密碼</span><input type="text" name="pw"></br>
        <span style="color:white">姓名</span><input type="text" name="name"></br>
        <button type="submit" style="color:black" >註冊</button>
        </form>
      </div>
    </div>
</body>
</html>