<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $nationalities = $connection->query("SELECT * FROM Nationalities");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Kraj</th>";
    echo "<th>Flaga</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$nationalities->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['CountryID'];
        echo "</td>";
        echo "<td>";
        echo $rows['Country'];
        echo "</td>";
        echo "<td>";
        echo $rows['FlagPath'];
        echo "</td>";
        echo "<td onclick='getNationalityID(this); update_nationality()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='getNationalityIDDelete(this); delete_nationality()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $nationalities->data_seek(0);