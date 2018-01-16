<!DOCTYPE html>
<?php
require_once('connect.php');
?>
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
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link href="modal2.css" rel="stylesheet">

    <title>藝文廣場</title>

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
                        <li>
                            <a href="ShoppingCart.html" class="glyphicon glyphicon-shopping-cart" style="color:white; padding-top:25px; font-size:30px"></a>
                        </li>
                        <li>
                            <a href="#" class="glyphicon glyphicon-search" style="color:white; padding-top:25px; font-size:30px"></a>
                        </li>
                        <li style="font-size:20px; padding-top:10px; padding-bottom:10px">
                            <a class="navfont" href="#"> 登陸</a>
                        </li>
                        <li>
                            <a class="navfont" href="#" style="font-size:20px; padding-top:25px">註冊</a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.2081-6/c0.0.51.51/p50x50/14365540_180484242386565_647877825_n.png?oh=4e12707e438e8adc17489467f65bb884&oe=5AC5BD32"
                                    style="height: 3em; width: 3em; border-radius:50%">
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!--轮播图-->
        <div style="position:relative; margin:0px">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position:absolute">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <img src="https://www.huashan1914.com/WebUPD/huashan1914/Index/做你的白日夢-banner-華山_1920x430px.jpg">
                        <div class="carousel-caption">
                            <button type="button" id="myButton" class="btn btn-primary" autocomplete="off">
                                BUY TICKETS NOW!
                            </button>
                        </div>
                    </div>
                    <div class="item  active">
                        <img src="https://www.huashan1914.com/WebUPD/huashan1914/Index/華山媒體素材-03_1920x430.jpg">
                        <div class="carousel-caption">
                        </div>
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


        <div class="container" style="position:relative; margin-top:318px; margin-bottom:20px">
                <?php
                $sql="select * from sort ";
                $query=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($query)){
                ?>
                <div class="col-md-2 img hovereffect ">
                    <img class="img-responsive" src="<?php echo $row['sort_img']?>">
                    <div class="overlay">
                        <button type="button" class="info" data-toggle="modal" data-target="#<?php echo $row['sort_no']?>">
                                點擊查看 
                        </button>
                    </div>
                </div>
            <div class="modal fade" id="<?php echo $row['sort_no']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">活動詳情</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <li>活動名稱：<?php echo $row['sort_name']?></li>
                        <li>活動地點:<?php echo $row['sort_place']?></li>
                        <li>活動時間:<?php echo $row['sort_time']?></li>
                        <li>主辦單位:<?php echo $row['sort_hold']?></li>
                        <li>價格資訊:<?php echo $row['sort_price']?></li>
                        <li>活動介紹:</li>
                        <?php echo $row['sort_info']?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">加入購物車</button>
                    </div>
                </div>
            </div>
            </div>
                <?php
                }       
                ?> 
        </div>
        <div class="footer ">
            <div class="container">
                <div class="row footer-top" >
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <style>
        .footer {
            border-top: 1px solid #e5e5e5;
            color: #777;
            padding: 19px 0;
            margin-bottom: 0px;

        }

        .img {
            margin-right: 20px;
            margin-top: 40px;
            margin-bottom: 10px;
            height: 230px;
            width: 230px;
            overflow: hidden;
        }

        .lastimg {
            margin-left: 0px;
            margin-top: 20px;
            margin-bottom: 20px;
            height: 250px;
            width: 250px;
            overflow: hidden;
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
</body>
</html>