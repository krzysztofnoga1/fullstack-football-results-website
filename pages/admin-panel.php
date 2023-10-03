<?php
    require_once "../connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $connection = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($connection->connect_errno != 0) {
            throw new Exception(mysqli_connect_error());
        } else {
            $referees = $connection->query("SELECT * FROM Referees");
            $coaches = $connection->query("SELECT * FROM Coaches");
            $stadiums = $connection->query("SELECT * FROM Stadiums");
            $players = $connection->query("SELECT *  FROM Players 
            JOIN Teams ON Players.TeamID=Teams.TeamID
            JOIN Nationalities ON Players.Nationality=Nationalities.Country
            ORDER BY PlayerID ASC");
            $teams = $connection->query("SELECT * FROM Teams JOIN Coaches ON Teams.CoachID=Coaches.CoachID");
            $nationalities = $connection->query("SELECT * FROM Nationalities");
            $matches = $connection->query("SELECT MatchID, t1.TeamName AS home, t2.TeamName AS away,
            HomeTeamGoals, AwayTeamGoals, Week, Played, MatchDate, MatchTime, t3.Name AS stadium, t3.City AS city, t4.Name AS refname, t4.Surname as refsurname FROM Matches   
            JOIN Teams as t1 ON Matches.HomeTeamID=t1.TeamID
            JOIN Teams as t2 ON Matches.AwayTeamID=t2.TeamID
            JOIN Stadiums as t3 ON Matches.StadiumID=t3.StadiumID
            JOIN Referees as t4 ON Matches.RefereeID=t4.RefereeID
            ORDER BY MatchID ASC");
            $connection->close();
        }
    } catch (Exception $e) {
        echo 'Błąd serwera:' . $e;
    }
?>

<script src="../js/sidebarjs.js"></script>
<script src="../js/adminbuttonsjs.js"></script>
<script src="../js/updates.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="../js/deletes.js"></script>
<script src="../js/loaddata.js"></script>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="../css/admin-style.css">
</head>

<body>
    <div class="content-referees" id="referees">
        <button id="add_referee" onclick="add_referee()">DODAJ SĘDZIEGO</button>
        <table id="referees_table">
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
            <?php
            while($rows=$referees->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $rows['RefereeID'];?></td>
                    <td><?php echo $rows['Name'];?></td>
                    <td><?php echo $rows['Surname'];?></td>
                    <td onclick="getRefereeID(this); update_referee()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="getIDRefereeDelete(this); delete_referee()"><img src="../icons/kosz.png"></td>
                </tr>
                <?php
            }
            $referees->data_seek(0);
            ?>
        </table>
    </div>

    <div class="content-coaches" id="coaches">
        <button onclick="add_coach()">DODAJ TENERA</button>
        <table id="coaches_table">
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Narodowość</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
            <?php
            while($rows=$coaches->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $rows['CoachID'];?></td>
                    <td><?php echo $rows['Name'];?></td>
                    <td><?php echo $rows['Surname'];?></td>
                    <td><?php echo $rows['Nationality'];?></td>
                    <td onclick="getCoachID(this); update_coach()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="getCoachIDDelete; delete_coach()"><img src="../icons/kosz.png"</td>
                </tr>
                <?php
            }
            $coaches->data_seek(0);
            ?>
        </table>
    </div>

    <div class="content-stadiums" id="stadiums">
        <button onclick="add_stadium()">DODAJ STADION</button>
        <table id="stadiums_table">
            <tr>
                <th>ID</th>
                <th>Stadion</th>
                <th>Miasto</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
            <?php
            while($rows=$stadiums->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $rows['StadiumID'];?></td>
                    <td><?php echo $rows['Name'];?></td>
                    <td><?php echo $rows['City'];?></td>
                    <td onclick="getStadiumID(this); update_stadium()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="getStadiumIDDelete(this); delete_stadium()"><img src="../icons/kosz.png"</td>
                </tr>
                <?php
            }
            $stadiums->data_seek(0);
            ?>
        </table>
    </div>

    <div class="content-teams" id="teams">
        <button onclick="add_team()">DODAJ ZESPÓŁ</button>
        <table id="teams_table">
            <tr>
                <th>ID</th>
                <th>Klub</th>
                <th>Trener</th>
                <th>Punkty</th>
                <th>Rozegane mecze</th>
                <th>Bramki zdobyte</th>
                <th>Bramki stracone</th>
                <th>Logo</th>
                <th>Edytuj</th>
                <th>Statys.</th>
                <th>Usuń</th>
            </tr>
            <?php
                while($rows=$teams->fetch_assoc()){
                    ?>
                <tr>
                    <td><?php echo $rows['TeamID'];?></td>
                    <td><?php echo $rows['TeamName'];?></td>
                    <td><?php echo $rows['Name'].' '.$rows['Surname'];?></td>
                    <td><?php echo $rows['Points'];?></td>
                    <td><?php echo $rows['GamesPlayed'];?></td>
                    <td><?php echo $rows['GoalsScored'];?></td>
                    <td><?php echo $rows['GoalsConceded'];?></td>
                    <td><?php echo $rows['TeamLogoPath'];?></td>
                    <td onclick="getTeamID(this); update_team()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="getTeamIDStats(this); update_stats()"><img src="../icons/staty.png"></td>
                    <td onclick="getTeamIDDelete(this); delete_team()"><img src="../icons/kosz.png"></td>
                </tr>
                <?php
                }
                $teams->data_seek(0);
            ?>
        </table>
    </div>

    <div class="content-nations" id="nationalities">
        <button onclick="add_nationality()">DODAJ NARODOWOŚĆ</button>
        <table id="nations_table">
            <tr>
                <th>ID</th>
                <th>Kraj</th>
                <th>Flaga</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
            <?php
            while($rows=$nationalities->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $rows['CountryID'];?></td>
                    <td><?php echo $rows['Country'];?></td>
                    <td><?php echo $rows['FlagPath'];?></td>
                    <td onclick="getNationalityID(this); update_nationality()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="getNationalityIDDelete(this); delete_nationality()"><img src="../icons/kosz.png"</td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <div class="content-players" id="players">
        <button onclick="add_player()">DODAJ ZAWODNIKA</button>
        <table id="players_table">
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Klub</th>
                <th>Pozycja</th>
                <th>Bramki</th>
                <th>Narodowość</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
            <?php
            while($rows=$players->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $rows['PlayerID'];?></td>
                    <td><?php echo $rows['Name'];?></td>
                    <td><?php echo $rows['Surname'];?></td>
                    <td><?php echo $rows['TeamName'];?></td>
                    <td><?php echo $rows['Position'];?></td>
                    <td><?php echo $rows['Goals'];?></td>
                    <td><?php echo $rows['Country'];?></td>
                    <td onclick="getPlayerID(this); update_player()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="getPlayerIDDelete(this); delete_player()"><img src="../icons/kosz.png"></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <div class="content-matches" id="matches">
        <button onclick="add_matches()">DODAJ KOLEJKĘ</button>
        <table id="matches_table">
            <tr>
                <th>ID</th>
                <th>Gospodarze</th>
                <th>Goście</th>
                <th>Wynik</th>
                <th>Kolejka</th>
                <th>Data</th>
                <th>Godzina</th>
                <th>Sędzia</th>
                <th>Stadion</th>
                <th>Rozegrano</th>
                <th>Edytuj</th>
                <th>Wydarz.</th>
                <th>Usuń</th>
            </tr>
            <?php
            while($rows=$matches->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $rows['MatchID'];?></td>
                    <td><?php echo $rows['home'];?></td>
                    <td><?php echo $rows['away'];?></td>
                    <td><?php echo $rows['HomeTeamGoals'].':'.$rows['AwayTeamGoals'];?></td>
                    <td><?php echo $rows['Week'];?></td>
                    <td><?php echo $rows['MatchDate'];?></td>
                    <td><?php echo $rows['MatchTime'];?></td>
                    <td><?php echo $rows['refname'].' '.$rows['refsurname'];?></td>
                    <td><?php echo $rows['stadium'].' ('.$rows['city'].')';?></td>
                    <td>
                        <?php
                            if($rows['Played']==1){
                                echo 'TAK';
                            }else{
                                echo 'NIE';
                            }
                        ?>
                    </td>
                    <td onclick="getMatchID(this); update_match()"><img src="../icons/edytuj.jpg"></td>
                    <td onclick="addEventMatchID(this); add_event()"><img src="../icons/dodaj.png"</td>
                    <td onclick="getMatchIDDelete(this); delete_match()"><img src="../icons/kosz.png"</td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <div class="sidebar">
        <ul>
            <li class="sidebar-item" onclick="show_referees()"><img src="../icons/sedzia.png">Sędziowie</li>
            <li class="sidebar-item" onclick="show_coaches()"><img src="../icons/trener.png">Trenerzy</li>
            <li class="sidebar-item" onclick="show_players()"><img src="../icons/pilkarz.png">Zawodnicy</li>
            <li class="sidebar-item" onclick="show_matches()"><img src="../icons/mecz.png">Mecze</li>
            <li class="sidebar-item" onclick="show_teams()"><img src="../icons/klub.png">Zespoły</li>
            <li class="sidebar-item" onclick="show_nations()"><img src="../icons/flaga.png">Narodowości</li>
            <li class="sidebar-item" onclick="show_stadiums()"><img src="../icons/stadion.png">Stadiony</li>
            <li class="sidebar-item" onclick="redirect()"><img src="../icons/wyjscie.png">Wyjście</li>
        </ul>
    </div>

    <div class="darker-background" id="darker_background_matches">
        <div class="add-matches">
            <form id="matches-adding" method="post" action="../add/add-matches.php" target="hiddenFrame">
                <p class="big-p">Mecz 1</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club1" id="club1" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club2" id="club2" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date1" id="date1">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour1" id="hour1">
                    </div>
                </div>
                <p>Mecz 2</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club3" id="club3" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club4" id="club4" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date2" id="date2">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour2" id="hour2">
                    </div>
                </div>
                <p>Mecz 3</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club5" id="club5" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club6" id="club6" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date3" id="date3">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour3" id="hour3">
                    </div>
                </div>
                <p>Mecz 4</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club7" id="club7" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club8" id="club8" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date4" id="date4">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour4" id="hour4">
                    </div>
                </div>
                <p>Mecz 5</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club9" id="club9" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club10" id="club10" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date5" id="date5">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour5" id="hour5">
                    </div>
                </div>
                <p>Mecz 6</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club11" id="club11" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club12" id="club12" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date6" id="date6">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour6" id="hour6">
                    </div>
                </div>
                <p>Mecz 7</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club13" id="club13" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club14" id="club14" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date7" id="date7">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour7" id="hour7">
                    </div>
                </div>
                <p>Mecz 8</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club15" id="club15" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                   <div class="ms-new">
                       <p>Goście</p>
                       <select name="club16" id="club16" class="my-select">
                           <?php
                           while($rows=$teams->fetch_assoc()){
                               $teamname=$rows['TeamName'];
                               $teamid=$rows['TeamID'];
                               echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                           }
                           $teams->data_seek(0);
                           ?>
                       </select>
                   </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date8" id="date8">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour8" id="hour8">
                    </div>
                </div>
                <p>Mecz 9</p>
                <div class="matches-select">
                    <div class="ms-new">
                        <p>Gospodarze</p>
                        <select name="club17" id="club17" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Goście</p>
                        <select name="club18" id="club18" class="my-select">
                            <?php
                            while($rows=$teams->fetch_assoc()){
                                $teamname=$rows['TeamName'];
                                $teamid=$rows['TeamID'];
                                echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                            }
                            $teams->data_seek(0);
                            ?>
                        </select>
                    </div>
                    <div class="ms-new">
                        <p>Data</p>
                        <input type="date" name="date9" id="date9">
                    </div>
                    <div class="ms-new">
                        <p>Godzina</p>
                        <input type="time" name="hour9" id="hour9">
                    </div>
                </div>
                <button type="submit" onclick="show_successful_adding()">DODAJ</button>
                <button type="button" onclick="close_adding_matches()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_referee">
        <div class="add-referee-coach-stadium" id="add_referee">
            <form id="referee_adding" method="post" action="../add/add-referee.php" target="hiddenFrame">
                <p>Imię</p>
                <input type="text" name="refname" placeholder="Imię">
                <p>Nazwisko</p>
                <input type="text" name="refsurname" placeholder="Nazwisko">
                <input type="submit" value="DODAJ" onclick="show_successful_adding(); loadReferees()" id="add_ref">
                <button type="button" onclick="close_adding_referee()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_coach">
        <div class="add-coach" id="add_coach">
            <form id="coach_adding" method="post" action="../add/add-coach.php" target="hiddenFrame">
                <p>Imię</p>
                <input type="text" name="coachname" placeholder="Imię">
                <p>Nazwisko</p>
                <input type="text" name="coachsurname" placeholder="Nazwisko">
                <p>Narodowość</p>
                <input type="text" name="coachnationality" placeholder="Narodowość">
                <input type="submit" value="DODAJ" onclick="show_successful_adding()">
                <button type="button" onclick="close_adding_coach()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_stadium">
        <div class="add-referee-coach-stadium" id="add_stadium">
            <form id="stadium_adding" method="post" action="../add/add-stadium.php" target="hiddenFrame">
                <p>Nazwa stadionu</p>
                <input type="text" name="stadiumname" placeholder="Nazwa stadionu">
                <p>Miasto</p>
                <input type="text" name="city" placeholder="Miasto">
                <input type="submit" value="DODAJ" onclick="show_successful_adding()">
                <button type="button" onclick="close_adding_stadium()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_player">
        <div class="add-player" id="add_player">
            <form id="player_adding" method="post" action="../add/add-player.php" target="hiddenFrame">
                <p>Imię</p>
                <input type="text" name="playername" placeholder="Imię">
                <p>Nazwisko</p>
                <input type="text" name="playersurname" placeholder="Nazwisko">
                <p>Narodowość</p>
                <input type="text" name="nationality" placeholder="Narodowość">
                <p>Pozycja</p>
                <div class="custom-select">
                    <select name="position" id="position">
                        <option value="Bramkarz">Bramkarz</option>
                        <option value="Obrońca">Obrońca</option>
                        <option value="Pomocnik">Pomocnik</option>
                        <option value="Napastnik">Napastnik</option>
                    </select>
                </div>
                <p>Zespół</p>
                <div class="custom-select">
                    <select name="club" id="club">
                        <?php
                        while($rows=$teams->fetch_assoc()){
                            $teamname=$rows['TeamName'];
                            $teamid=$rows['TeamID'];
                            echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                        }
                        $teams->data_seek(0);
                        ?>
                    </select>
                </div>
                <input type="submit" value="DODAJ" onclick="show_successful_adding()">
                <button type="button" onclick="close_adding_player()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_team">
        <div class="add-team" id="add_team">
            <form id="team_adding" method="post" action="../add/add-team.php" target="hiddenFrame">
                <p>Nazwa zespołu</p>
                <input type="text" name="teamname" placeholder="Nazwa zespołu">
                <p>Ścieżka do herbu</p>
                <input type="text" name="logopath" placeholder="Ścieżka do herbu">
                <p>Trener</p>
                <div class="custom-select">
                    <select name="coach" id="coach">
                        <?php
                        while($rows=$coaches->fetch_assoc()){
                            $coachid=$rows['CoachID'];
                            $coachname=$rows['Name'];
                            $coachsurname=$rows['Surname'];
                            echo '<option value="'.$coachid.'">'.$coachname.' '.$coachsurname.'</option>';
                        }
                        $coaches->data_seek(0);
                        ?>
                    </select>
                </div>
                <input type="submit" value="DODAJ" onclick="show_successful_adding()">
                <button type="button" onclick="close_adding_team()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_nationality">
        <div class="add-nationality" id="add_nationality">
            <form id="nationality_adding" method="post" action="../add/add-nationality.php" target="hiddenFrame">
                <p>Kraj</p>
                <input type="text" name="country" placeholder="Kraj">
                <p>Ścieżka do flagi</p>
                <input type="text" name="flagpath" placeholder="Ścieżka do flagi">
                <input type="submit" value="DODAJ" onclick="show_successful_adding()">
                <button type="button" onclick="close_adding_nationality()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_referee">
        <div class="add-referee-coach-stadium" id="update_referee">
            <form id="referee_updating" method="post" action="../updates/update-referee.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="refupdateID">
                <p>Imię</p>
                <input type="text" name="refname" id="refname" placeholder="Imię">
                <p>Nazwisko</p>
                <input type="text" name="refsurname" id="refsurname" placeholder="Nazwisko">
                <input type="submit" value="EDYTUJ" onclick="show_successful_updating(); loadReferees()">
                <button type="button" onclick="close_updating_referee()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_coach">
        <div class="add-coach" id="update_coach">
            <form id="coach_updating" method="post" action="../updates/update-coach.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="coachupdateID">
                <p>Imię</p>
                <input type="text" name="coachname" id="coachname" placeholder="Imię">
                <p>Nazwisko</p>
                <input type="text" name="coachsurname" id="coachsurname" placeholder="Nazwisko">
                <p>Narodowość</p>
                <input type="text" name="coachnationality" id="coachnationality" placeholder="Narodowość">
                <input type="submit" value="EDYTUJ" onclick="show_successful_updating()">
                <button type="button" onclick="close_updating_coach()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_stadium">
        <div class="add-referee-coach-stadium" id="update_stadium">
            <form id="stadium_updating" method="post" action="../updates/update-stadium.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="stadiumupdateID">
                <p>Nazwa stadionu</p>
                <input type="text" name="stadiumname" id="stadiumname" placeholder="Nazwa stadionu">
                <p>Miasto</p>
                <input type="text" name="city" id="city" placeholder="Miasto">
                <input type="submit" value="EDYTUJ" onclick="show_successful_updating()">
                <button type="button" onclick="close_updating_stadium()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_team">
        <div class="add-team" id="update_team">
            <form id="team_updating" method="post" action="../updates/update-team.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="teamupdateID">
                <p>Nazwa zespołu</p>
                <input type="text" name="teamname" id="teamname" placeholder="Nazwa zespołu">
                <p>Ścieżka do herbu</p>
                <input type="text" name="logopath" id="logopath" placeholder="Ścieżka do herbu">
                <p>Trener</p>
                <div class="custom-select">
                    <select name="coach" id="coach">
                        <?php
                        while($rows=$coaches->fetch_assoc()){
                            $coachid=$rows['CoachID'];
                            $coachname=$rows['Name'];
                            $coachsurname=$rows['Surname'];
                            echo '<option value="'.$coachid.'">'.$coachname.' '.$coachsurname.'</option>';
                        }
                        $coaches->data_seek(0);
                        ?>
                    </select>
                </div>
                <input type="submit" value="EDYTUJ" onclick="show_successful_updating()">
                <button type="button" onclick="close_updating_team()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_stats">
        <div class="update-stats" id="update-stats">
            <form id="stats-updating" method="post" action="../updates/update-stats.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="stats_update_id">
                <p>Punkty</p>
                <input type="text" name="points" id="points" placeholder="0">
                <p>Rozegrane mecze</p>
                <input type="text" name="matches_played" id="matches_played" placeholder="0">
                <p>Bramki zdobyte</p>
                <input type="text" name="goals_scored" id="goals_scored" placeholder="0">
                <p>Bramki stracone</p>
                <input type="text" name="goals_conceded" id="goals_conceded" placeholder="0">
                <button type="submit" onclick="show_successful_updating()">EDYTUJ</button>
                <button type="button" onclick="close_updating_stats()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_nationality">
        <div class="add-nationality" id="add_nationality">
            <form id="nationality_updating" method="post" action="../updates/update-nationality.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="nationalityupdateid">
                <p>Kraj</p>
                <input type="text" name="country" id="country" placeholder="Kraj">
                <p>Ścieżka do flagi</p>
                <input type="text" name="flagpath" id="pathtoflag" placeholder="Ścieżka do flagi">
                <input type="submit" value="EDYTUJ" onclick="show_successful_updating()">
                <button type="button" onclick="close_updating_nationality()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_player">
        <div class="update-player" id="add_player">
            <form id="player_updating" method="post" action="../updates/update-player.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="playerupdateid">
                <p>Imię</p>
                <input type="text" name="playername" id="pname" placeholder="Imię">
                <p>Nazwisko</p>
                <input type="text" name="playersurname" id="psurname" placeholder="Nazwisko">
                <p>Narodowość</p>
                <input type="text" name="nationality" id="pnation" placeholder="Narodowość">
                <p>Bramki</p>
                <input type="text" name="goals" id="pgoals" placeholder="Bramki">
                <p>Pozycja</p>
                <div class="custom-select">
                    <select name="position" id="position">
                        <option value="Bramkarz">Bramkarz</option>
                        <option value="Obrońca">Obrońca</option>
                        <option value="Pomocnik">Pomocnik</option>
                        <option value="Napastnik">Napastnik</option>
                    </select>
                </div>
                <p>Zespół</p>
                <div class="custom-select">
                    <select name="club" id="club">
                        <?php
                        while($rows=$teams->fetch_assoc()){
                            $teamname=$rows['TeamName'];
                            $teamid=$rows['TeamID'];
                            echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                        }
                        $teams->data_seek(0);
                        ?>
                    </select>
                </div>
                <input type="submit" value="EDYTUJ" onclick="show_successful_updating()">
                <button type="button" onclick="close_updating_player()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_match">
        <div class="update-match" id="update_match">
            <form id="match_updating" method="post" action="../updates/update-matches.php" target="hiddenFrame">
                <input type="hidden" name="update_id" id="matchupdateid">
                <p>Gospodarze</p>
                <div class="custom-select">
                    <select name="home" id="home">
                        <?php
                        while($rows=$teams->fetch_assoc()){
                            $teamname=$rows['TeamName'];
                            $teamid=$rows['TeamID'];
                            echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                        }
                        $teams->data_seek(0);
                        ?>
                    </select>
                </div>
                <p>Goście</p>
                <div class="custom-select">
                    <select name="away" id="away">
                        <?php
                        while($rows=$teams->fetch_assoc()){
                            $teamname=$rows['TeamName'];
                            $teamid=$rows['TeamID'];
                            echo '<option value="'.$teamid.'">'.$teamname.'</option>';
                        }
                        $teams->data_seek(0);
                        ?>
                    </select>
                </div>
                <p>Bramki gospodarzy</p>
                <div class="in-div">
                    <input type="text" placeholder="0" name="home_goals">
                </div>
                <p>Bramki gości</p>
                <div class="in-div">
                    <input type="text" placeholder="0" name="away_goals">
                </div>
                <p>Sędzia</p>
                <div class="custom-select">
                    <select name="ref" id="ref">
                        <?php
                        while($rows=$referees->fetch_assoc()){
                            $refid=$rows['RefereeID'];
                            $refn=$rows['Name'];
                            $refs=$rows['Surname'];
                            echo '<option value="'.$refid.'">'.$refn.' '.$refs.'</option>';
                        }
                        $referees->data_seek(0);
                        ?>
                    </select>
                </div>
                <p>Stadion</p>
                <div class="custom-select">
                    <select name="stad" id="stad">
                        <?php
                        while($rows=$stadiums->fetch_assoc()){
                            $stadid=$rows['StadiumID'];
                            $stad=$rows['Name'];
                            $city=$rows['City'];
                            echo '<option value="'.$stadid.'">'.$stad.' ('.$city.')'.'</option>';
                        }
                        $stadiums->data_seek(0);
                        ?>
                    </select>
                </div>
                <p>Kolejka</p>
                <div class="in-div">
                    <input type="text" name="uweek" id="uweek">
                </div>
                <p>Data</p>
                <div class="in-div">
                    <input type="date" name="udate" id="udate">
                </div>
                <p>Godzina</p>
                <div class="in-div">
                    <input type="time" name="utime" id="utime">
                </div>
                <p>Rozegrano</p>
                <div class="custom-select">
                    <select name="played" id="played">
                        <option value="1">TAK</option>
                        <option value="0">NIE</option>
                    </select>
                </div>
                <button type="submit" onclick="show_successful_updating()">EDYTUJ</button>
                <button type="button" onclick="close_updating_match()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_add_event">
        <div class="add-event" id="add_event">
            <form id="event_adding" method="post" action="../add/add-event.php" target="hiddenFrame">
                <input type="hidden" name="matchid" id="event_match_id">
                <p>Zespół</p>
                <div class="custom-select">
                    <select name="team" id="team">

                    </select>
                </div>
                <p>Nazwisko zawodnika</p>
                <input type="text" name="player" id="player">
                <p>Minuta</p>
                <input type="text" name="minute" id="minute">
                <p>Połowa</p>
                <div class="custom-select">
                    <select name="half" id="half">
                        <option value="1">Pierwsza</option>
                        <option value="2">Druga</option>
                    </select>
                </div>
                <p>Wydarzenie</p>
                <div class="custom-select">
                    <select name="event" id="event">
                        <option value="1">Gol</option>
                        <option value="2">Gol(rzut karny)</option>
                        <option value="3">Żółta kartka</option>
                        <option value="4">Czerwona kartka</option>
                        <option value="5">Karny nietrafiony</option>
                    </select>
                </div>
                <button type="submit" onclick="show_successful_adding()">DODAJ</button>
                <button type="button" onclick="close_adding_event()">ANULUJ</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_match">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-match.php">
                <input type="hidden" name="id_delete" id="delete_match_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_match()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_referee">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-referee.php">
                <input type="hidden" name="id_delete" id="delete_referee_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_referee()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_coach">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-coach.php">
                <input type="hidden" name="id_delete" id="delete_coach_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_coach()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_stadium">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-stadium.php">
                <input type="hidden" name="id_delete" id="delete_stadium_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_stadium()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_team">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-team.php">
                <input type="hidden" name="id_delete" id="delete_team_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_team()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_nationality">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-nationality.php">
                <input type="hidden" name="id_delete" id="delete_nationality_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_nationality()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_player">
        <div class="confirm-delete" id="confirm_delete">
            <form method="post" target="hiddenFrame" action="../deletes/delete-player.php">
                <input type="hidden" name="id_delete" id="delete_player_id">
                <h1>Czy na pewno chcesz usunąć ten rekord?</h1>
                <button type="submit" onclick="show_successful_deleting()">TAK</button>
                <button type="button" onclick="close_deleting_player()">NIE</button>
            </form>
        </div>
    </div>

    <div class="darker-background" id="darker_background_update_success">
        <div class="added-successfully" id="update_success">
            <h1>Edytowano pomyślnie</h1>
            <button onclick="close_successful_updating(); loadReferees(); loadCoaches(); loadPlayers(); loadMatches(); loadTeams(); loadNations(); loadStadiums()">OK</button>
        </div>
    </div>

    <div class="darker-background" id="darker_background_delete_success">
        <div class="added-successfully" id="delete_success">
            <h1>Usunięto</h1>
            <button onclick="close_successful_deleting(); loadReferees(); loadCoaches(); loadPlayers(); loadMatches(); loadTeams(); loadNations(); loadStadiums()">OK</button>
        </div>
    </div>

    <div class="darker-background" id="darker_background_success">
        <div class="added-successfully" id="add_success">
            <h1>Dodano pomyślnie</h1>
            <button onclick="close_successful_adding(); loadReferees(); loadCoaches(); loadPlayers(); loadMatches(); loadTeams(); loadNations(); loadStadiums()">OK</button>
        </div>
    </div>

    <iframe name="hiddenFrame" class="iframe"></iframe>
</body>
</html>
