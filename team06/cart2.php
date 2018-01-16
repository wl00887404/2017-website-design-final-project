<?php
    session_start();
    require_once('connect.php');
    if(isset($_SESSION['is_user']) && $_SESSION['is_user'] == TRUE):
        
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart2.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cart2.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="cart2.php"</script>';
                }
            }
        }
    }
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
                    <a class="navfont" href="#" style="font-size:20px; padding-top:25px">註冊</a>
                </li>
                <li>
                    <a href="#">
                      
                </li>
            </ul>
        </div>
    </nav>
        <div style="text-align:center;">
        <div class="table_div">
        <h3>購物車</h3>
        <div>
            <table>
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Item</th>
                </tr>
                <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value["item_name"]; ?></td>
                    <td><?php echo $value["item_quantity"]; ?></td>
                    <td>$ <?php echo $value["product_price"]; ?></td>
                    <td> $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                    <td><a href="cart2.php?action=delete&id=<?php echo $value["product_id"]; ?>"><spanclass="text-danger">Remove Item</span></a></td>
                </tr>
                <?php
                    $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                ?>
                <tr>
                    <td class="total" colspan="4" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <a href="checkout.php">送出訂單</a>
        </div>
        </div>
    </div>
    <style>
h3{
    color:white;
}
.table_div{
    display:inline-block;
    text-align:center;
}
table {
	width:100%;
	margin:15px 0;
    border:0;
    display:inline-block;
    opacity:0.8;
    text-align:center;
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
    border-collapse:collapse;}
    
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
</style>
</body>
</html>
<?php
			else:

				header('Location: login.php');
			endif;
		?>