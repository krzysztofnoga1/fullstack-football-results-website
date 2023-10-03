<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $matches = $connection->query("SELECT MatchID, t1.TeamName AS home, t2.TeamName AS away,
                HomeTeamGoals, AwayTeamGoals, Week, Played, MatchDate, MatchTime, t3.Name AS stadium, t3.City AS city, t4.Name AS refname, t4.Surname as refsurname FROM Matches   
                JOIN Teams as t1 ON Matches.HomeTeamID=t1.TeamID
                JOIN Teams as t2 ON Matches.AwayTeamID=t2.TeamID
                JOIN Stadiums as t3 ON Matches.StadiumID=t3.StadiumID
                JOIN Referees as t4 ON Matches.RefereeID=t4.RefereeID
                ORDER BY MatchID ASC");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Gospodarze</th>";
    echo "<th>Goście</th>";
    echo "<th>Wynik</th>";
    echo "<th>Kolejka</th>";
    echo "<th>Data</th>";
    echo "<th>Godzina</th>";
    echo "<th>Sędzia</th>";
    echo "<th>Stadion</th>";
    echo "<th>Rozegrano</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Wydarz.</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$matches->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['MatchID'];
        echo "</td>";
        echo "<td>";
        echo $rows['home'];
        echo "</td>";
        echo "<td>";
        echo $rows['away'];
        echo "</td>";
        echo "<td>";
        echo $rows['HomeTeamGoals'].':'.$rows['AwayTeamGoals'];
        echo "</td>";
        echo "<td>";
        echo $rows['Week'];
        echo "</td>";
        echo "<td>";
        echo $rows['MatchDate'];
        echo "</td>";
        echo "<td>";
        echo $rows['MatchTime'];
        echo "</td>";
        echo "<td>";
        echo $rows['refname'].' '.$rows['refsurname'];
        echo "</td>";
        echo "<td>";
        echo $rows['stadium'];
        echo "</td>";
        echo "<td>";
        if($rows['Played']==1){
            echo 'TAK';
        }
        else{
            echo 'NIE';
        }
        echo "</td>";
        echo "<td onclick='getMatchID(this); update_match()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='addEventMatchID(this); add_event()'><img src='../icons/dodaj.png'></td>";
        echo "<td onclick='getMatchIDDelete(this); delete_match()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $matches->data_seek(0);