<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $name=$_POST['playername'];
            $surname=$_POST['playersurname'];
            $nationality=$_POST['nationality'];
            $position=$_POST['position'];
            $club=intval($_POST['club']);
            $connection->query("INSERT INTO players(TeamID, Name, Surname, Position, Nationality) VALUES ('$club','$name', '$surname', '$position', '$nationality')");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }

