<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $team=$_POST['team'];
            $id=$_POST['matchid'];
            $player=$_POST['player'];
            $minute=intval($_POST['minute']);
            $half=intval($_POST['half']);
            $event=intval($_POST['event']);
            $res2=$connection->query("SELECT TeamID FROM Teams WHERE Teams.TeamName='$team'");
            $res2=$res2->fetch_array();
            $teamid=intval($res2[0]);
            $res=$connection->query("SELECT PlayerID FROM Players WHERE Players.Surname='$player' AND Players.TeamID='$teamid'");
            $res=$res->fetch_array();
            $playerid=intval($res[0]);
            $connection->query("INSERT INTO MatchEvents(MatchID, TeamID, PlayerID, Minute, Half, EventType) VALUES ('$id', '$teamid', '$playerid', '$minute', '$half', '$event')");
            $connection->close();
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
