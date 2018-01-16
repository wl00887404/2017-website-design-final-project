<?php
    $conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8', "root", "ccumis");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $result=$conn->query('select * from dog;');
    // $data=$result->fetchAll();
    $conn->exec("insert into dog values (null,'楊楚玄',21);");

    // print_r($data);
?>
