<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $coaches = $connection->query("SELECT * FROM Coaches");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Imię</th>";
    echo "<th>Nazwisko</th>";
    echo "<th>Narodowość</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$coaches->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['CoachID'];
        echo "</td>";
        echo "<td>";
        echo $rows['Name'];
        echo "</td>";
        echo "<td>";
        echo $rows['Surname'];
        echo "</td>";
        echo "<td>";
        echo $rows['Nationality'];
        echo "</td>";
        echo "<td onclick='getCoachID(this); update_coach()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='getCoachIDDelete(this); delete_coach()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $coaches->data_seek(0);
