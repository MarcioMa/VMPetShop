<?php
    $url='localhost';
    $username='root';
    $password='';
    
    $conn = mysqli_connect($url, $username, $password, "db_petshop");
    if(!$conn){
        die('Error ao conectar: ' .mysql_error());
    }


