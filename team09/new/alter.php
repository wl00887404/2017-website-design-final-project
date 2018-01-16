<?php
//session_start();//session start
?>


<?php //var_dump($_SESSION); ?>
<?php

if(empty($_SESSION["id"]))
echo"<a href='home.php'>";
else
echo"<a href='revise.php'>";

//$_SESSION['good']='good';
?>