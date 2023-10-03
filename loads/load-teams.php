<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $teams = $connection->query("SELECT * FROM Teams JOIN Coaches ON Teams.CoachID=Coaches.CoachID");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Klub</th>";
    echo "<th>Trener</th>";
    echo "<th>Punkty</th>";
    echo "<th>Rozegrane mecze</th>";
    echo "<th>Bramki zdobyte</th>";
    echo "<th>Bramki stracone</th>";
    echo "<th>Logo</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Statys.</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$teams->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['TeamID'];
        echo "</td>";
        echo "<td>";
        echo $rows['TeamName'];
        echo "</td>";
        echo "<td>";
        echo $rows['Name'].' '.$rows['Surname'];
        echo "</td>";
        echo "<td>";
        echo $rows['Points'];
        echo "</td>";
        echo "<td>";
        echo $rows['GamesPlayed'];
        echo "</td>";
        echo "<td>";
        echo $rows['GoalsScored'];
        echo "</td>";
        echo "<td>";
        echo $rows['GoalsConceded'];
        echo "</td>";
        echo "<td>";
        echo $rows['TeamLogoPath'];
        echo "</td>";
        echo "<td onclick='getTeamID(this); update_team()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='getTeamIDStats(this); update_stats()'><img src='../icons/staty.png'></td>";
        echo "<td onclick='getTeamIDDelete(this); delete_team()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $teams->data_seek(0);
