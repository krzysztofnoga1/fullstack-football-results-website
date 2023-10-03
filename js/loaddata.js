function loadReferees(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-referees.php", false);
    xmlhttp.send(null);
    document.getElementById("referees_table").innerHTML=xmlhttp.responseText;
}

function loadCoaches(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-coaches.php", false);
    xmlhttp.send(null);
    document.getElementById("coaches_table").innerHTML=xmlhttp.responseText;
}

function loadPlayers(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-players.php", false);
    xmlhttp.send(null);
    document.getElementById("players_table").innerHTML=xmlhttp.responseText;
}

function loadMatches(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-matches.php", false);
    xmlhttp.send(null);
    document.getElementById("matches_table").innerHTML=xmlhttp.responseText;
}

function loadTeams(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-teams.php", false);
    xmlhttp.send(null);
    document.getElementById("teams_table").innerHTML=xmlhttp.responseText;
}

function loadNations(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-nations.php", false);
    xmlhttp.send(null);
    document.getElementById("nations_table").innerHTML=xmlhttp.responseText;
}

function loadStadiums(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "../loads/load-stadiums.php", false);
    xmlhttp.send(null);
    document.getElementById("stadiums_table").innerHTML=xmlhttp.responseText;
}
