<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    echo '<li><a> ';
    echo "Hi, " . $_SESSION['id'] ;
    echo '</a></li>';   

    echo '<li><a href="logout.php" class="button special">Log out</a></li>'; //id="logoutbuttom"
}
else{
    echo '<li><a href="login.html" class="button special" id="loginbuttom2">Sign Up</a></li>';
}
?>