<?php
    if(session_status()===PHP_SESSION_NONE)
        session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Terminarz</title>
    <link rel="stylesheet" href="../css/schedule-style.css">
</head>

<body>

<script>
    var ajax=new XMLHttpRequest();
    var method="GET";
    var url="../gets/get-matches.php"
    var asynchronous=true;
    var data;
    var val=1;

    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            data=JSON.parse(this.responseText);

            html="";
            for(var a=0; a<9; a++){
                var home=data[a].home;
                var homeLogo=data[a].logo1;
                var homeGoals=data[a].HomeTeamGoals;
                var awayGoals=data[a].AwayTeamGoals;
                var awayLogo=data[a].logo2;
                var away=data[a].away;

                html+="<tr class='clickable-row' onclick='getTeams(this)'>";
                html+="<td>"+home+"</td>";
                html+="<td><img src="+homeLogo+"></td>";
                html+="<td>"+homeGoals+"</td>";
                html+="<td>:</td>";
                html+="<td>"+awayGoals+"</td>";
                html+="<td><img src="+awayLogo+"></td>";
                html+="<td>"+away+"</td>";
                html+="</tr>";
            }
            document.getElementById("data").innerHTML=html;
            document.getElementById("back").style.display="block";
            document.getElementById("counter").innerText=val;
        }
    }
</script>

<script type="text/javascript">
    function increment(){
        var add=val*9;

        html="";
        for(var a=0; a<9; a++){
            var home=data[a+add].home;
            var homeLogo=data[a+add].logo1;
            var homeGoals=data[a+add].HomeTeamGoals;
            var awayGoals=data[a+add].AwayTeamGoals;
            var awayLogo=data[a+add].logo2;
            var away=data[a+add].away;

            html+="<tr class='clickable-row' onclick='getTeams(this)'>";
            html+="<td>"+home+"</td>";
            html+="<td><img src="+homeLogo+"></td>";
            html+="<td>"+homeGoals+"</td>";
            html+="<td>:</td>";
            html+="<td>"+awayGoals+"</td>";
            html+="<td><img src="+awayLogo+"></td>";
            html+="<td>"+away+"</td>";
            html+="</tr>";
        }
        val = val + 1;
        if(val > 34){
            val = 34;
        }

        document.getElementById("counter").innerText=val;
        document.getElementById("data").innerHTML=html;
    }
</script>

<script type="text/javascript">
    function decrement(){
        val = val - 1;
        add=val*9-9;
        if(val < 1){
            val = 1;
        }
        html="";
        for(var a=0; a<9; a++){
            var home=data[a+add].home;
            var homeLogo=data[a+add].logo1;
            var homeGoals=data[a+add].HomeTeamGoals;
            var awayGoals=data[a+add].AwayTeamGoals;
            var awayLogo=data[a+add].logo2;
            var away=data[a+add].away;

            html+="<tr class='clickable-row' onclick='getTeams(this)'>";
            html+="<td>"+home+"</td>";
            html+="<td><img src="+homeLogo+"></td>";
            html+="<td>"+homeGoals+"</td>";
            html+="<td>:</td>";
            html+="<td>"+awayGoals+"</td>";
            html+="<td><img src="+awayLogo+"></td>";
            html+="<td>"+away+"</td>";
            html+="</tr>";
        }
        document.getElementById("counter").innerText=val;
        document.getElementById("data").innerHTML=html;
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

<script type="text/javascript">
    function getTeams(element){
        let tr=element.rowIndex;
        let table=document.getElementById('matchestable');
        let val=table.rows[tr].cells[0].innerHTML;
        let val2=table.rows[tr].cells[6].innerText;
        location.href="match-view.php?Home="+val+"&Away="+val2;
    }
</script>

<div class="background" id="back">
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

    <div class="schedulebox">

        <h1>KOLEJKA</h1>

        <div class="switcher">
            <button onclick="decrement()"><</button>
            <div class="current-week">
                <p1 id="counter"></p1>
            </div>
            <button onclick="increment()">></button>
        </div>
        <div class="matches-div" id="matches-div">
            <table id="matchestable">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody id="data">
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
