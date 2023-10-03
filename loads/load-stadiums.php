<?php
    require_once "../connect.php";

    $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $stadiums = $connection->query("SELECT * FROM Stadiums");
    $connection->close();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Miasto</th>";
    echo "<th>Stadion</th>";
    echo "<th>Edytuj</th>";
    echo "<th>Usuń</th>";
    echo "</tr>";
    while($rows=$stadiums->fetch_assoc()){
        echo "<tr>";
        echo "<td>";
        echo $rows['StadiumID'];
        echo "</td>";
        echo "<td>";
        echo $rows['Name'];
        echo "</td>";
        echo "<td>";
        echo $rows['City'];
        echo "</td>";
        echo "<td onclick='getStadiumID(this); update_stadium()'>";
        echo "<img src='../icons/edytuj.jpg'>";
        echo "</td>";
        echo "<td onclick='getStadiumIDDelete(this); delete_stadium()'>";
        echo "<img src='../icons/kosz.png'>";
        echo "</td>";
        echo "</tr>";
    }
    $stadiums->data_seek(0);