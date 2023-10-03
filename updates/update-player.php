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
            $name=$_POST['playername'];
            $surname=$_POST['playersurname'];
            $nationality=$_POST['nationality'];
            $position=$_POST['position'];
            $club=$_POST['club'];
            $goals=$_POST['goals'];
            $connection->query("UPDATE players SET PlayerID='$id', TeamID='$club', Name='$name', Surname='$surname', Position='$position',
            Goals='$goals', Nationality='$nationality' WHERE players.PlayerID='$id'");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
