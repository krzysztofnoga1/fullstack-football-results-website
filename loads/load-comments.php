<?php
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts=parse_url($url);
    parse_str($parts['query'], $query);
    $id=$query['ID'];

    require_once "../connect.php";

    $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result=$connection->query("SELECT * FROM Comments WHERE MatchID='$id'");
    $connection->close();

    while($rows=$result->fetch_assoc()){;
        echo '<div class=comment><p>';
        echo $rows['UserName'].' | '.$rows['CommentDate']."<br><br>";
        echo nl2br($rows['Content']);
        echo '</p></div>';
    };

