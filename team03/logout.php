<?php
include'announcement.php';

session_start(); 

	echo '<script language="javascript">';
	echo 'alert("See you , '.$_SESSION['id'].'")';
	echo '</script>';	

unset($_SESSION['id']); //清除單一變數 
unset($_SESSION['password']);
unset($_SESSION['loggedin']);


header('location: index.html'); 

?>