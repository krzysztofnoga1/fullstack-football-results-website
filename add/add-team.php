<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $teamname=$_POST['teamname'];
            $logopath=$_POST['logopath'];
            $coach=intval($_POST['coach']);
            $connection->query("INSERT INTO teams(TeamName, CoachID, TeamLogoPath) VALUES ('$teamname','$coach', '$logopath')");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }