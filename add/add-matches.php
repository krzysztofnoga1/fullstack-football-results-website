<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_error());
        }
        else{
            $club1=$_POST['club1'];
            $club2=$_POST['club2'];
            $date1=$_POST['date1'];
            $hour1=$_POST['hour1'];
            $club3=$_POST['club3'];
            $club4=$_POST['club4'];
            $date2=$_POST['date2'];
            $hour2=$_POST['hour2'];
            $club5=$_POST['club5'];
            $club6=$_POST['club6'];
            $date3=$_POST['date3'];
            $hour3=$_POST['hour3'];
            $club7=$_POST['club7'];
            $club8=$_POST['club8'];
            $date4=$_POST['date4'];
            $hour4=$_POST['hour4'];
            $club9=$_POST['club9'];
            $club10=$_POST['club10'];
            $date5=$_POST['date5'];
            $hour5=$_POST['hour5'];
            $club11=$_POST['club11'];
            $club12=$_POST['club12'];
            $date6=$_POST['date6'];
            $hour6=$_POST['hour6'];
            $club13=$_POST['club13'];
            $club14=$_POST['club14'];
            $date7=$_POST['date7'];
            $hour7=$_POST['hour7'];
            $club15=$_POST['club15'];
            $club16=$_POST['club16'];
            $date8=$_POST['date8'];
            $hour8=$_POST['hour8'];
            $club17=$_POST['club17'];
            $club18=$_POST['club18'];
            $date9=$_POST['date9'];
            $hour9=$_POST['hour9'];

            $res=$connection->query("SELECT MAX(Week) FROM matches");
            $row=mysqli_fetch_array($res);
            $last_week=intval($row[0]);
            $current_week=$last_week+1;

            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club1', '$club2', '$current_week' ,'$date1', '$hour1')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club3', '$club4', '$current_week' ,'$date2', '$hour2')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club5', '$club6', '$current_week' ,'$date3', '$hour3')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club7', '$club8', '$current_week' ,'$date4', '$hour4')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club9', '$club10', '$current_week' ,'$date5', '$hour5')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club11', '$club12', '$current_week' ,'$date6', '$hour6')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club13', '$club14', '$current_week' ,'$date7', '$hour7')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club15', '$club16', '$current_week' ,'$date8', '$hour8')");
            $connection->query("INSERT INTO matches(HomeTeamID, AwayTeamID, Week, MatchDate, MatchTime) VALUES ('$club17', '$club18', '$current_week' ,'$date9', '$hour9')");
        }
    }catch(Exception $e){
        echo 'Wystąpił błąd.';
    }
