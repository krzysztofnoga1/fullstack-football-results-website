<?php
    require_once "connect.php";
    $connection=mysqli_connect(HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());
    }
