<?php 
    $server = 'localhost';
    $username = 'rtgydcjwhx';
    $password = 'TEbnV4Yrft';
    $db = 'rtgydcjwhx';

    $link = mysqli_connect($server,$username,$password,$db);

    if(!$link){
        die('Database connection error '.mysqli_connect_error());
    }
?>