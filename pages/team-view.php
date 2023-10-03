<?php
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts=parse_url($url);
    parse_str($parts['query'], $query);
    $club=$query['Club'];
    $position=$query['Position'];
    require_once "../connect.php";

    if(session_status()===PHP_SESSION_NONE)
        session_start();

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_error());
        }else{
            $team=$connection->query("SELECT * FROM Teams 
            JOIN Coaches ON Teams.CoachID=Coaches.CoachID
            JOIN Nationalities ON Coaches.Nationality=Nationalities.Country
            WHERE Teams.TeamName='$club'");
            $res=$connection->query("SELECT Teams.TeamID FROM Teams WHERE Teams.TeamName='$club'");
            $res=$res->fetch_array();
            $id=intval($res[0]);
            $goalkeepers=$connection->query("SELECT * FROM Players
            JOIN Nationalities ON Players.Nationality=Nationalities.Country
            WHERE Players.TeamID='$id' AND Players.Position='Bramkarz'");
            $defenders=$connection->query("SELECT * FROM Players
            JOIN Nationalities ON Players.Nationality=Nationalities.Country
            WHERE Players.TeamID='$id' AND Players.Position='Obrońca'");
            $midfielders=$connection->query("SELECT * FROM Players
            JOIN Nationalities ON Players.Nationality=Nationalities.Country
            WHERE Players.TeamID='$id' AND Players.Position='Pomocnik'");
            $strikers=$connection->query("SELECT * FROM Players
            JOIN Nationalities ON Players.Nationality=Nationalities.Country
            WHERE Players.TeamID='$id' AND Players.Position='Napastnik'");
            $played=$connection->query("SELECT HomeTeamGoals, AwayTeamGoals,
            t1.TeamName AS home, t2.TeamName AS away, t1.TeamLogoPath AS logo1, t2.TeamLogoPath AS logo2 FROM Matches
            JOIN Teams AS t1 ON Matches.HomeTeamID=t1.TeamID
            JOIN Teams AS t2 ON Matches.AwayTeamID=t2.TeamID
            WHERE Played='1' AND (Matches.HomeTeamID='$id' OR Matches.AwayTeamID='$id')
            ORDER BY Matches.Week DESC");
            $upcoming=$connection->query("SELECT HomeTeamGoals, AwayTeamGoals,
            t1.TeamName AS home, t2.TeamName AS away, t1.TeamLogoPath AS logo1, t2.TeamLogoPath AS logo2 FROM Matches
            JOIN Teams AS t1 ON Matches.HomeTeamID=t1.TeamID
            JOIN Teams AS t2 ON Matches.AwayTeamID=t2.TeamID
            WHERE Played='0' AND (Matches.HomeTeamID='$id' OR Matches.AwayTeamID='$id')
            ORDER BY Matches.Week ASC");
            $connection->close();
        }
    }catch(Exception $e){
            echo 'Błąd serwera:'.$e;
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $club;?></title>
    <link rel="stylesheet" href="../css/team-style.css">
</head>
<body>
<div class="background">
    <div class="navbar">
        <img src="../icons/eklapalogo.png">
        <ul>
            <li><a href="index.php">STRONA GŁÓWNA</a></li>
            <li><a href="schedule.php">TERMINARZ</a></li>
            <li><a href="table-view.php">TABELA</a></li>
            <li>
                <?php
                if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                    ?>
                    <a href="profile-view.php">MOJE KONTO</a>
                    <?php
                }
                else{
                    ?>
                    <a href="login1.php">ZALOGUJ SIĘ</a>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>

    <div class="teambox">
        <div class="top-div">
            <?php
                $rows=$team->fetch_assoc();
                $team->data_seek(0);
            ?>
            <img src="<?php echo $rows['TeamLogoPath'];?>">
            <div class="info-div">
                <p class="team-name"><?php echo $rows['TeamName'];?></p>
                <p class="table-position"><?php echo 'Pozycja w tabeli: '.$position;?></p>
            </div>
        </div>
        <div class="buttonbox">

            <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
            <script type="text/javascript">
                $(document).on('click', 'button', function(){
                    $(this).addClass('selected').siblings().removeClass('selected')
                })
            </script>

            <script type = "text/javascript">
                function replace1() {
                    document.getElementById("squad").style.display="block";
                    document.getElementById("played").style.display="none";
                    document.getElementById("upcoming").style.display="none";
                }
            </script>

            <script type = "text/javascript">
                function replace2() {
                    document.getElementById("squad").style.display="none";
                    document.getElementById("played").style.display="block";
                    document.getElementById("upcoming").style.display="none";
                }
            </script>

            <script type = "text/javascript">
                function replace3() {
                    document.getElementById("squad").style.display="none";
                    document.getElementById("played").style.display="none";
                    document.getElementById("upcoming").style.display="block";
                }
            </script>

            <button class="selected" onclick="replace1()">SKŁAD</button>
            <button onclick="replace2()">WYNIKI</button>
            <button onclick="replace3()">MECZE</button>
        </div>

        <div class="squad-tablebox" id="squad">
            <p>Trener</p>
            <table class="table-style">
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$team->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $rows['Name'].' '.$rows['Surname'];?></td>
                        <td><img src="<?php echo $rows['FlagPath'];?>"</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <p>Bramkarze</p>
            <table class="table-style">
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$goalkeepers->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $rows['Name'].' '.$rows['Surname'];?></td>
                        <td><img src="<?php echo $rows['FlagPath'];?>"</td>
                    </tr>
                    <?php
                    }
                ?>
            </table>
            <p>Obrońcy</p>
            <table class="table-style">
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$defenders->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $rows['Name'].' '.$rows['Surname'];?></td>
                        <td><img src="<?php echo $rows['FlagPath'];?>"</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <p>Pomocnicy</p>
            <table class="table-style">
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$midfielders->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $rows['Name'].' '.$rows['Surname'];?></td>
                        <td><img src="<?php echo $rows['FlagPath'];?>"</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <p>Napastnicy</p>
            <table class="table-style">
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$strikers->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $rows['Name'].' '.$rows['Surname'];?></td>
                        <td><img src="<?php echo $rows['FlagPath'];?>"</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>



        <script type="text/javascript">
            function getID2(element){
                let tr=element.rowIndex;
                let table=document.getElementById('table_upcoming');
                let val=table.rows[tr].cells[0].innerHTML;
                let val2=table.rows[tr].cells[4].innerText;
                location.href="match-view.php?Home="+val+"&Away="+val2;
            }
        </script>


        <script type="text/javascript">
            function getID1(element){
                let tr=element.rowIndex;
                let table=document.getElementById('table_played');
                let val=table.rows[tr].cells[0].innerHTML;
                let val2=table.rows[tr].cells[4].innerText;
                location.href="match-view.php?Home="+val+"&Away="+val2;
            }
        </script>

        <div class="played-tablebox" id="played">
            <table class="matches-table" id="table_played">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$played->fetch_assoc()){
                    ?>
                    <tr class="clickable-row" onclick="getID1(this)">
                        <td><?php echo $rows['home'];?></td>
                        <td><img src="<?php echo $rows['logo1'];?>"</td>
                        <td><?php echo $rows['HomeTeamGoals'].':'.$rows['AwayTeamGoals'];?></td>
                        <td><img src="<?php echo $rows['logo2'];?>"</td>
                        <td><?php echo $rows['away'];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="played-tablebox" id="upcoming">
            <table class="matches-table" id="table_upcoming">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while($rows=$upcoming->fetch_assoc()){
                    ?>
                    <tr class="clickable-row" onclick="getID2(this)">
                        <td><?php echo $rows['home'];?></td>
                        <td><img src="<?php echo $rows['logo1'];?>"</td>
                        <td><?php echo $rows['HomeTeamGoals'].':'.$rows['AwayTeamGoals'];?></td>
                        <td><img src="<?php echo $rows['logo2'];?>"</td>
                        <td><?php echo $rows['away'];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>



