<?php
require_once('connectserver.php');
?>
<?php
function getticketvalue($instruction){//get ticket value fron mysql
    $result=mysqli_query($conn,$instruction);
    if(!$result)
        printf("error in getvalue");
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);
}
?>