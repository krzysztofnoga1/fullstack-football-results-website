<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $referees = $connection->query("SELECT * FROM Referees");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Imię</th>";
    echo "<th>Nazwisko</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$referees->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['RefereeID'];
        echo "</td>";
        echo "<td>";
        echo $rows['Name'];
        echo "</td>";
        echo "<td>";
        echo $rows['Surname'];
        echo "</td>";
        echo "<td onclick='getRefereeID(this); update_referee()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='getIDRefereeDelete(this); delete_referee()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $referees->data_seek(0);





