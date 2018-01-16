<?php
session_start();
if(!empty($_SESSION['id'])){
    session_unset();
    //echo 'not empty';
    header("Location:home.php");
}
else{
    header("Location:sign.php");
}
?>