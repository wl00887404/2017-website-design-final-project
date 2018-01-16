<?php
    // include database configuration file
    include 'dbConfig.php';

    // initializ shopping cart class
    include 'Cart.php';
    $cart = new Cart;

    // redirect to home if cart is empty
    if($cart->total_items() <= 0){
        header("Location: index.php");
    }
    //echo $_SESSION['userid'];
    //$loggedinUserID = $_SESSION['userid'];

    // set customer ID in session
    //$_SESSION['sessCustomerID'] = $loggedinUserID;

    // get customer details by session customer ID
    $query = $connect->query("SELECT * FROM customer WHERE c_id = ".$_SESSION['userid']);
    $custRow = $query;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
	<link href="css/cartstyle.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .table{float: center;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' '; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' '; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' '; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    
    <div class="footBtn">
        <a href="index.php" class="btn btn-warning">Continue Shopping</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order</a>
    </div>
</div>
</body>
</html>