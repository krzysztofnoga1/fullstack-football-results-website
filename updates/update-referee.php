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
            $name=$_POST['refname'];
            $surname=$_POST['refsurname'];
            $connection->query("UPDATE referees SET RefereeID='$id', Name='$name', Surname='$surname' WHERE referees.RefereeID='$id'");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
