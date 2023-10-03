<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $name=$_POST['coachname'];
            $surname=$_POST['coachsurname'];
            $natiionality=$_POST['coachnationality'];

            $connection->query("INSERT INTO coaches(Name, Surname, Nationality) VALUES ('$name', '$surname', '$natiionality')");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
}