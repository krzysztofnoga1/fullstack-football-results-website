<?php
require_once "../connect.php";

mysqli_report(MYSQLI_REPORT_STRICT);
try{
    $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if($connection->connect_errno!=0){
        throw new Exception(mysqli_connect_error());
    }else {
        $matches=$connection->query("SELECT t1.TeamLogoPath AS logo1, t2.TeamLogoPath AS logo2,
            t1.TeamName AS home, t2.TeamName AS away,
            HomeTeamGoals, AwayTeamGoals, Week FROM Matches
            JOIN Teams as t1 ON Matches.HomeTeamID=t1.TeamID
            JOIN Teams as t2 ON Matches.AwayTeamID=t2.TeamID
            ORDER BY Matches.Week, Matches.MatchDate ASC");
        $connection->close();

        $data=array();

        while($row=$matches->fetch_assoc()){
            $data[]=$row;
        }

        echo json_encode($data);
    }
}catch(Exception $e){
    echo 'Błąd serwera:'.$e;
}
?>
