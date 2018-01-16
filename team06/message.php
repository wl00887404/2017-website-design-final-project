<?php
    session_start();
    require_once('connect.php');

?>
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
                <a class="navbar-brand" href="index.php" style="font-size:30px; color:white;position: absolute; top: 50%; transform: translateY(-50%)">藝文廣場</a>
                </div>
                <div>
                    <ul class="nav navbar-nav pull-right">
                        <!-- 购物车按钮-->
                        <li>
                        <a href="cart2.php" class="glyphicon glyphicon-shopping-cart" style="color:white; padding-top:25px; font-size:30px"></a>
                        <!--<span class="btn__badge">current_cart.products.count</span>-->
                        </li>
                        <li>
                            <a href="message.php" style="padding-top:20px"><img src="message.png" width="30px" ></a>
                        </li>
                        <li style="font-size:20px; padding-top:10px; padding-bottom:10px"><a class="navfont"  href="#"> 登入</a></li>
                        <li><a class="navfont" href="#" style="font-size:20px; padding-top:25px">註冊</a></li>
                        <li><img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.2081-6/c0.0.51.51/p50x50/14365540_180484242386565_647877825_n.png?oh=4e12707e438e8adc17489467f65bb884&oe=5AC5BD32" style="height: 3em; width: 3em; border-radius:50%"></li>
                    </ul>
                </div>
            </nav>
            <div style="text-align:center;">
                <div class="table_div">
                    <h3>留言板</h3>
                    <div>
                        <div>
                            <form method="post" action="message.php">
                                <span>標題</br></span>
                                <input type="text" name="subject" style="width:25em"></br>
                                <span>內容</br></span>
                                <textarea name="content" cols="50" rows="2"></textarea></br>
                                <button type="subimt" name="addm">送出</button>
                            </form>
                        </div>
<?php
    if(isset($_POST['addm'])){
        $subject=$_POST['subject'];
        $content=$_POST['content'];
    
?>
                        <table>
                            <tr>
                                <th>標題</th>
                                <th>內容</th>
                            </tr>
                            <tr>
                                <td><?php echo $subject;?></td>
                                <td><?php echo $content;?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
<?php 
     }  
?>

<style>
h3{
    color:white;
}
.table_div{
    display:inline-block;
    text-align:center;
    width:500px;
}
table {
	margin:15px 0;
    border:0;
    opacity:0.8;
    text-align:center;
    width:100%;
    color:black;
}
th {
    text-align:center;
	font-weight:bold;
	background-color:rgb(27, 58, 53);
	color:white;
}
td {
	font-size:0.95em;
	text-align:center;
	padding:4px;
    border-collapse:collapse;
    height:5em;
    word-break: break-all;
}
    
td {
	border: 1px solid #ffffff;
	border-width:1px
}
th {
	border: 1px solid #e7f6fe;
	border-width:1px 0 1px 0
}
td {
	border: 1px solid #eeeeee;
	border-width:1px 0 1px 0
}
tr {
	border: 1px solid #ffffff;
}
.total{
    text-align:right;
}
tr:nth-child(odd){
	background-color:#f7f7f7;
}
tr:nth-child(even){
	background-color:#ffffff;
}

form{
    font-size:15px;
    text-align:center;
    color:black;
}
form span{
    color:white;
}


</style>
</body>
</html>
