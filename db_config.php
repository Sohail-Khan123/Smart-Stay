<?php

    $server = "localhost";
    $userName = "root";
    $pass = "";
    $database = "smart_stay";

    $con = new mysqli($server,$userName,$pass,$database);
    if(!$con){
        die("Connection Unsucessful" . mysqli_connect_error());
    }
    // echo "Connection Sucessful";
?>