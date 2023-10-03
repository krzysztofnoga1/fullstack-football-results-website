<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $id=$_POST['update_id'];
            $home=$_POST['home'];
            $away=$_POST['away'];
            $home_goals=$_POST['home_goals'];
            $away_goals=$_POST['away_goals'];
            $ref=$_POST['ref'];
            $stadium=$_POST['stad'];
            $played=$_POST['played'];
            $date=$_POST['udate'];
            $time=$_POST['utime'];
            $week=$_POST['uweek'];
            $connection->query("UPDATE matches SET MatchID='$id', HomeTeamID='$home', AwayTeamID='$away', HomeTeamGoals='$home_goals', 
            AwayTeamGoals='$away_goals', Week='$week', MatchDate='$date', MatchTime='$time', Played='$played', RefereeID='$ref',
            StadiumID='$stadium' WHERE matches.MatchID='$id'");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
