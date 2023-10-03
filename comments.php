<?php
    require_once "connect.php";

    function setComments(){
        if(isset($_POST['commentSubmit'])){
            $connection=mysqli_connect(HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $username=$_POST['username'];
            $matchid=$_POST['matchid'];
            $txt=$_POST['txtarea'];
            $date=date('Y-m-d H:i:s');
            $result=$connection->query("INSERT INTO Comments(MatchID, UserName, Content, CommentDate) VALUES ('$matchid', '$username', '$txt', '$date')");
            $connection->close();
        }
    }

    function getComments($matchid){
        $connection=mysqli_connect(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $result=$connection->query("SELECT * FROM Comments WHERE MatchID='$matchid'");
        $connection->close();

        while($rows=$result->fetch_assoc()){
            echo '<div class=comment><p>';
            echo $rows['UserName'].' | '.$rows['CommentDate']."<br><br>";
            echo nl2br($rows['Content']);
            echo '</p></div>';
        }
    }
