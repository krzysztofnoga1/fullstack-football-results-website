<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();

    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts=parse_url($url);
    parse_str($parts['query'], $query);
    $home=$query['Home'];
    $away=$query['Away'];
    require_once "../connect.php";
    include "../comments.php";

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_error());
        }else{
            $res1=$connection->query("SELECT TeamID FROM Teams WHERE Teams.TeamName='$home'");
            $res1=$res1->fetch_array();
            $homeid=intval($res1[0]);
            $res2=$connection->query("SELECT TeamID FROM Teams WHERE Teams.TeamName='$away'");
            $res2=$res2->fetch_array();
            $awayid=intval($res2[0]);
            $teamhome=$connection->query("SELECT * FROM Teams WHERE Teams.TeamID='$homeid'");
            $teamaway=$connection->query("SELECT * FROM Teams WHERE Teams.TeamID='$awayid'");
            $match=$connection->query("SELECT AwayTeamGoals, HomeTeamGoals, MatchDate, MatchTime, Played, refs.Name AS refname, 
            refs.Surname AS refsurname, stadiums.Name AS stadiumname FROM Matches 
            JOIN Referees AS refs ON Matches.RefereeID=refs.RefereeID
            JOIN Stadiums AS stadiums ON Matches.StadiumID=stadiums.StadiumID
            WHERE Matches.HomeTeamID='$homeid' AND Matches.AwayTeamID='$awayid'");

            $match2=$connection->query("SELECT MatchID FROM Matches WHERE Matches.HomeTeamID='$homeid' AND Matches.AwayTeamID='$awayid'");
            $match2=$match2->fetch_array();
            $matchid=intval($match2[0]);

            $matchevents=$connection->query("SELECT * FROM MatchEvents JOIN Players ON MatchEvents.PlayerID=Players.PlayerID 
            WHERE MatchEvents.MatchID=$matchid");

            $connection->close();
        }
    }catch(Exception $e){
        echo 'Błąd serwera:'.$e;
    }
    ?>

<script src="../js/comments.js"></script>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $home.'-'.$away;?></title>
    <link rel="stylesheet" href="../css/match-style.css">
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

    <div class="matchbox">
        <div class="result">
            <div class="teaminfo">
                <?php
                    $rows=$teamhome->fetch_assoc();
                    $teamhome->data_seek(0);
                ?>
                <img src="<?php echo $rows['TeamLogoPath'];?>">
                <p><?php echo $rows['TeamName'];?></p>
            </div>
            <div class="result-view">
                <?php
                    $rows=$match->fetch_assoc();
                    $played=$rows['Played'];
                    $match->data_seek(0);
                ?>
                <p><?php echo $rows['HomeTeamGoals'].':'.$rows['AwayTeamGoals'];?></p>
            </div>
            <div class="teaminfo">
                <?php
                $rows=$teamaway->fetch_assoc();
                $teamaway->data_seek(0);
                ?>
                <img src="<?php echo $rows['TeamLogoPath'];?>">
                <p><?php echo $rows['TeamName'];?></p>
            </div>
        </div>

        <?php if(intval($played)==1){?>
            <div class="details">
                <p>Pierwsza połowa</p>
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    while($rows=$matchevents->fetch_assoc()){
                        ?>
                        <tr>
                            <?php
                            if($rows['Half']==1){
                                if($rows['TeamID']==$homeid){
                                    ?>
                                    <td><?php echo $rows['Minute']."'";?></td>
                                    <td><?php echo $rows['Surname'];?></td>
                                    <?php if($rows['EventType']==1){?>
                                        <td><img src="../icons/gol1.png"</td>
                                        <td></td>
                                    <?php }?>
                                    <?php if($rows['EventType']==2){?>
                                        <td><img src="../icons/gol1.png"</td>
                                        <td>(Rzut karny)</td>
                                    <?php }?>
                                    <?php if($rows['EventType']==3){?>
                                        <td><img src="../icons/zolto.png"</td>
                                        <td></td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==4){?>
                                        <td><img src="../icons/czerwo.png"</td>
                                        <td></td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==5){?>
                                        <td><img src="../icons/karny1.png"</td>
                                        <td>(Karny nietrafiony)</td>
                                    <?php } ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <?php if($rows['EventType']==1){?>
                                        <td></td>
                                        <td><img src="../icons/gol1.png"</td>
                                    <?php }?>
                                    <?php if($rows['EventType']==2){?>
                                        <td>(Rzut karny)</td>
                                        <td><img src="../icons/gol1.png"</td>
                                    <?php }?>
                                    <?php if($rows['EventType']==3){?>
                                        <td></td>
                                        <td><img src="../icons/zolto.png"</td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==4){?>
                                        <td></td>
                                        <td><img src="../icons/czerwo.png"</td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==5){?>
                                        <td>(Karny nietrafiony)</td>
                                        <td><img src="../icons/karny1.png"</td>
                                    <?php } ?>
                                    <td><?php echo $rows['Surname']?></td>
                                    <td><?php echo $rows['Minute']."'";?></td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    $matchevents->data_seek(0);
                    ?>
                </table>
                <p>Druga połowa</p>
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    while($rows=$matchevents->fetch_assoc()){
                        ?>
                        <tr>
                            <?php
                            if($rows['Half']==2){
                                if($rows['TeamID']==$homeid){
                                    ?>
                                    <td><?php echo $rows['Minute']."'";?></td>
                                    <td><?php echo $rows['Surname'];?></td>
                                    <?php if($rows['EventType']==1){?>
                                        <td><img src="../icons/gol1.png"</td>
                                        <td></td>
                                    <?php }?>
                                    <?php if($rows['EventType']==2){?>
                                        <td><img src="../icons/gol1.png"</td>
                                        <td>(Rzut karny)</td>
                                    <?php }?>
                                    <?php if($rows['EventType']==3){?>
                                        <td><img src="../icons/zolto.png"</td>
                                        <td></td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==4){?>
                                        <td><img src="../icons/czerwo.png"</td>
                                        <td></td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==5){?>
                                        <td><img src="../icons/karny1.png"</td>
                                        <td>(Karny nietrafiony)</td>
                                    <?php } ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <?php if($rows['EventType']==1){?>
                                        <td></td>
                                        <td><img src="../icons/gol1.png"</td>
                                    <?php }?>
                                    <?php if($rows['EventType']==2){?>
                                        <td>(Rzut karny)</td>
                                        <td><img src="../icons/gol1.png"</td>
                                    <?php }?>
                                    <?php if($rows['EventType']==3){?>
                                        <td></td>
                                        <td><img src="../icons/zolto.png"</td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==4){?>
                                        <td></td>
                                        <td><img src="../icons/czerwo.png"</td>
                                    <?php } ?>
                                    <?php if($rows['EventType']==5){?>
                                        <td>(Karny nietrafiony)</td>
                                        <td><img src="../icons/karny1.png"</td>
                                    <?php } ?>
                                    <td><?php echo $rows['Surname'];?></td>
                                    <td><?php echo $rows['Minute']."'";?></td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    $matchevents->data_seek(0);
                    ?>
                </table>
                <p>Szczegóły</p>
                <?php
                $rows=$match->fetch_assoc();
                $var1=$rows['MatchDate'];
                $var2=$rows['MatchTime'];
                $match->data_seek(0);
                ?>
                <div class="detailsbox">
                    <p><?php echo 'Sędzia: '.$rows['refname'].' '.$rows['refsurname'];?></p>
                    <p><?php echo 'Stadion: '.$rows['stadiumname'];?></p>
                    <p><?php echo 'Data: '.date('m-d-Y', strtotime($var1)).' '.date('H:i', strtotime($var2));?></p>
                </div>
            </div>
        <?php }else{ ?>
            <div class="details">
                <p>Mecz jeszcze nie został rozegrany.</p>
            </div>
        <?php } ?>

        <div class="commentbox">

            <div class="comments" id="comments">
                <?php
                    getComments($matchid);
                ?>
            </div>

            <?php if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                echo '<div class="add-comment">';
                echo '<form method="post" action="'.setComments().'" target="hiddenFrame">';
                echo '<input type="hidden" value="'.$matchid.'" name="matchid">';
                if(isset($_SESSION['username'])){
                    echo '<input type="hidden" name="username" value="'.$_SESSION['username'].'">';
                }
                echo '<textarea name="txtarea" id="txtarea"></textarea>';
                echo '<button type="submit" name="commentSubmit" onclick="loadComments(';
                echo $matchid;
                echo '); txtClear()">Dodaj komentarz</button>';
                echo '</div>';
            }else{
                echo '<div class="add-comment">';
                echo '<p class="warning">Aby dodawać komentarze należy się zalogować.</p>';
                echo '</div>';
            }?>
        </div>

    </div>

    <iframe name="hiddenFrame" class="iframe"></iframe>

</div>
</body>
