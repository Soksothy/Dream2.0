<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dream_database";
   
    try {
        $conn = new PDO("mysql:host=$server; dbname=$database", $username,$password);
        // echo "conetion success";
    } catch (PDOException $e) {
        echo "connection failed: ". $e->getMessage();
    }
    

?>