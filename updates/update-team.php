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
            $name=$_POST['teamname'];
            $logopath=$_POST['logopath'];
            $coachid=$_POST['coach'];
            $connection->query("UPDATE teams SET TeamID='$id', TeamName='$name', CoachID='$coachid', TeamLogoPath='$logopath' WHERE teams.TeamID='$id'");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
