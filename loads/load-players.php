<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $players = $connection->query("SELECT *  FROM Players 
                JOIN Teams ON Players.TeamID=Teams.TeamID
                JOIN Nationalities ON Players.Nationality=Nationalities.Country
                ORDER BY PlayerID ASC");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Imię</th>";
    echo "<th>Nazwisko</th>";
    echo "<th>Klub</th>";
    echo "<th>Pozycja</th>";
    echo "<th>Bramki</th>";
    echo "<th>Narodowość</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$players->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['PlayerID'];
        echo "</td>";
        echo "<td>";
        echo $rows['Name'];
        echo "</td>";
        echo "<td>";
        echo $rows['Surname'];
        echo "</td>";
        echo "<td>";
        echo $rows['TeamName'];
        echo "</td>";
        echo "<td>";
        echo $rows['Position'];
        echo "</td>";
        echo "<td>";
        echo $rows['Goals'];
        echo "</td>";
        echo "<td>";
        echo $rows['Country'];
        echo "</td>";
        echo "<td onclick='getPlayerID(this); update_player()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='getPlayerIDDelete(this); delete_player()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $players->data_seek(0);
