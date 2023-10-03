<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_error());
        }else {
            $result=$connection->query("SELECT * FROM Teams ORDER BY Points DESC");

            $connection->close();
        }
    }catch(Exception $e){
        echo 'Błąd serwera:'.$e;
    }
?>