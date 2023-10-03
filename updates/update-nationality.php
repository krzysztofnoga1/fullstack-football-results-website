<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $id=intval($_POST['update_id']);
            $country=$_POST['country'];
            $flagpath=$_POST['flagpath'];
            $connection->query("UPDATE nationalities SET CountryID='$id', Country='$country', FlagPath='$flagpath' WHERE nationalities.CountryID='$id'");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
