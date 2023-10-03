<?php
    require_once "../connect.php";

    if(session_status()===PHP_SESSION_NONE)
        session_start();

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $connection=new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($connection->connect_errno!=0){
            throw new Exception(mysqli_connect_error());
        }else {
            $table=$connection->query("SELECT * FROM Teams ORDER BY Points DESC, GoalsScored-GoalsConceded DESC");
            $top_scorers=$connection->query("SELECT * FROM Players JOIN Nationalities ON Players.Nationality=Nationalities.Country
            JOIN Teams ON Players.TeamID=Teams.TeamID
            WHERE Goals>0
            ORDER BY Goals DESC");
            $connection->close();
        }
    }catch(Exception $e){
        echo 'Błąd serwera:'.$e;
    }
?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

<script type="text/javascript">
    function getID(element){
        let tr=element.rowIndex;
        let table=document.getElementById('teams_table');
        let val=table.rows[tr].cells[2].innerHTML;
        let val2=table.rows[tr].cells[0].innerText;
        location.href="team-view.php?Club="+val+"&Position="+val2;
    }
</script>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Tabela</title>
    <link rel="stylesheet" href="../css/table-style.css">
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

    <div class="tablebox">

        <div class="buttons">
            <button class="selected" onclick="replace1()">TABELA</button>
            <button onclick="replace2()">STRZELCY</button>
        </div>

        <script type="text/javascript">
            $(document).on('click', 'button', function(){
                $(this).addClass('selected').siblings().removeClass('selected')
            })
        </script>

        <script type = "text/javascript">
            function replace1() {
                document.getElementById("scorers-div").style.display="none";
                document.getElementById("table-div").style.display="block";
            }
        </script>

        <script type = "text/javascript">
            function replace2() {
                document.getElementById("table-div").style.display="none";
                document.getElementById("scorers-div").style.display="block";
            }
        </script>

        <div class="table-div" id="table-div">
            <table id="teams_table">
                <tr>
                    <th>Pozycja</th>
                    <th></th>
                    <th>Zespół</th>
                    <th>Rozegrane mecze</th>
                    <th>Bilans bramkowy</th>
                    <th>Punkty</th>
                </tr>
                <?php
                $position=1;
                while($rows=$table->fetch_assoc()){
                    ?>
                    <tr class="clickable-row" onclick="getID(this)">
                        <td><div><?php echo $position. '.'?></div></td>
                        <td><img src="<?php echo $rows['TeamLogoPath'];?>"></td>
                        <td><?php echo $rows['TeamName'];?></td>
                        <td><?php echo $rows['GamesPlayed'];?></td>
                        <td><?php echo $rows['GoalsScored'].':'.$rows['GoalsConceded'];?></td>
                        <td><?php echo $rows['Points'];?></td>
                    </tr>
                    <?php
                    $position=$position+1;
                }
                ?>
            </table>

            <div class="legend">
                <div class="row">
                    <div class="square1"></div>
                    <p>Awans - Liga Mistrzów (Kwalifikacje)</p>
                </div>
                <div class="row">
                    <div class="square2"></div>
                    <p>Awans - Liga Konferencji Europy (Kwalifikacje)</p>
                </div>
                <div class="row">
                    <div class="square3"></div>
                    <p>Spadek - Fortuna 1 Liga</p>
                </div>
            </div>
        </div>

        <div class="scorers-div" id="scorers-div">
            <table>
                <tr>
                    <th>Pozycja</th>
                    <th>Zawodnik</th>
                    <th></th>
                    <th></th>
                    <th>Bramki</th>
                </tr>
                <?php
                $position2=1;
                while($rows2=$top_scorers->fetch_assoc()){
                    ?>
                    <tr>
                        <td><div><?php echo $position2. '.'?></div></td>
                        <td><?php echo $rows2['Name'].' '.$rows2['Surname'];?></td>
                        <td><img src="<?php echo $rows2['TeamLogoPath'];?>"></td>
                        <td><img src="<?php echo $rows2['FlagPath'];?>"></td>
                        <td><?php echo $rows2['Goals'];?></td>
                    </tr>
                    <?php
                    $position2=$position2+1;
                }
                ?>
        </div>

    </div>
</div>
</body>
</html>
