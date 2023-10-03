<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $country=$_POST['country'];
            $flagpath=$_POST['flagpath'];

            $connection->query("INSERT INTO nationalities(Country, FlagPath) VALUES ('$country', '$flagpath')");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
