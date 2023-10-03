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
            $games_played=$_POST['matches_played'];
            $points=$_POST['points'];
            $goals_scored=$_POST['goals_scored'];
            $goals_conceded=$_POST['goals_conceded'];
            $connection->query("UPDATE teams SET Points='$points', GamesPlayed='$games_played', GoalsScored='$goals_scored', GoalsConceded='$goals_conceded' WHERE teams.TeamID='$id'");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
