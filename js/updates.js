function getRefereeID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-3;
    let table=document.getElementById('referees_table');
    document.getElementById("refupdateID").value=table.rows[tr].cells[td].innerHTML;
    document.getElementById("refname").value=table.rows[tr].cells[td+1].innerHTML;
    document.getElementById("refsurname").value=table.rows[tr].cells[td+2].innerHTML;
}

function getCoachID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-4;
    let table=document.getElementById('coaches_table');
    document.getElementById('coachupdateID').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('coachname').value=table.rows[tr].cells[td+1].innerHTML;
    document.getElementById('coachsurname').value=table.rows[tr].cells[td+2].innerHTML;
    document.getElementById('coachnationality').value=table.rows[tr].cells[td+3].innerHTML;
}

function getStadiumID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-3;
    let table=document.getElementById('stadiums_table');
    document.getElementById('stadiumupdateID').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('stadiumname').value=table.rows[tr].cells[td+1].innerHTML;
    document.getElementById('city').value=table.rows[tr].cells[td+2].innerHTML;
}

function getTeamID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-8;
    let table=document.getElementById('teams_table');
    document.getElementById('teamupdateID').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('teamname').value=table.rows[tr].cells[td+1].innerHTML;
    document.getElementById('logopath').value=table.rows[tr].cells[td+7].innerHTML;
}

function getTeamIDStats(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-9;
    let table=document.getElementById('teams_table');
    document.getElementById('stats_update_id').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('points').value=table.rows[tr].cells[td+3].innerHTML;
    document.getElementById('matches_played').value=table.rows[tr].cells[td+4].innerHTML;
    document.getElementById('goals_scored').value=table.rows[tr].cells[td+5].innerHTML;
    document.getElementById('goals_conceded').value=table.rows[tr].cells[td+6].innerHTML;
}

function getNationalityID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-3;
    let table=document.getElementById('nations_table');
    document.getElementById('nationalityupdateid').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('country').value=table.rows[tr].cells[td+1].innerHTML;
    document.getElementById('pathtoflag').value=table.rows[tr].cells[td+2].innerHTML;
}

function getPlayerID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-7;
    let table=document.getElementById('players_table');
    document.getElementById('playerupdateid').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('pname').value=table.rows[tr].cells[td+1].innerHTML;
    document.getElementById('psurname').value=table.rows[tr].cells[td+2].innerHTML;
    document.getElementById('pnation').value=table.rows[tr].cells[td+6].innerHTML;
    document.getElementById('pgoals').value=table.rows[tr].cells[td+5].innerHTML;
}

function getMatchID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-10;
    let table=document.getElementById('matches_table');
    document.getElementById('matchupdateid').value=table.rows[tr].cells[td].innerHTML;
    document.getElementById('udate').value=table.rows[tr].cells[td+5].innerHTML;
    document.getElementById('utime').value=table.rows[tr].cells[td+6].innerHTML;
    document.getElementById('uweek').value=table.rows[tr].cells[td+4].innerHTML;
}

function update_referee(){
    document.getElementById("darker_background_update_referee").style.visibility="visible";
    document.getElementById("darker_background_update_referee").style.opacity="1";
}

function close_updating_referee(){
    document.getElementById("darker_background_update_referee").style.visibility="hidden";
    document.getElementById("darker_background_update_referee").style.opacity="0";
}

function update_coach(){
    document.getElementById("darker_background_update_coach").style.visibility="visible";
    document.getElementById("darker_background_update_coach").style.opacity="1";
}

function close_updating_coach(){
    document.getElementById("darker_background_update_coach").style.visibility="hidden";
    document.getElementById("darker_background_update_coach").style.opacity="0";
}

function update_stadium(){
    document.getElementById("darker_background_update_stadium").style.visibility="visible";
    document.getElementById("darker_background_update_stadium").style.opacity="1";
}

function close_updating_stadium(){
    document.getElementById("darker_background_update_stadium").style.visibility="hidden";
    document.getElementById("darker_background_update_stadium").style.opacity="0";
}

function update_team(){
    document.getElementById("darker_background_update_team").style.visibility="visible";
    document.getElementById("darker_background_update_team").style.opacity="1";
}

function close_updating_team(){
    document.getElementById("darker_background_update_team").style.visibility="hidden";
    document.getElementById("darker_background_update_team").style.opacity="0";
}

function update_nationality(){
    document.getElementById("darker_background_update_nationality").style.visibility="visible";
    document.getElementById("darker_background_update_nationality").style.opacity="1";
}

function close_updating_nationality(){
    document.getElementById("darker_background_update_nationality").style.visibility="hidden";
    document.getElementById("darker_background_update_nationality").style.opacity="0";
}

function update_player(){
    document.getElementById("darker_background_update_player").style.visibility="visible";
    document.getElementById("darker_background_update_player").style.opacity="1";
}

function close_updating_player(){
    document.getElementById("darker_background_update_player").style.visibility="hidden";
    document.getElementById("darker_background_update_player").style.opacity="0";
}

function update_match(){
    document.getElementById("darker_background_update_match").style.visibility="visible";
    document.getElementById("darker_background_update_match").style.opacity="1";
}

function close_updating_match(){
    document.getElementById("darker_background_update_match").style.visibility="hidden";
    document.getElementById("darker_background_update_match").style.opacity="0";
}

function update_stats(){
    document.getElementById("darker_background_update_stats").style.visibility="visible";
    document.getElementById("darker_background_update_stats").style.opacity="1";
}

function close_updating_stats(){
    document.getElementById("darker_background_update_stats").style.visibility="hidden";
    document.getElementById("darker_background_update_stats").style.opacity="0";
}

function show_successful_updating(){
    close_updating_referee();
    close_updating_coach();
    close_updating_stadium();
    close_updating_team();
    close_updating_nationality();
    close_updating_player();
    close_updating_match();
    close_updating_stats()
    document.getElementById('darker_background_update_success').style.visibility="visible";
    document.getElementById('darker_background_update_success').style.opacity="1";
}

function close_successful_updating(){
    document.getElementById('darker_background_update_success').style.visibility="hidden";
    document.getElementById('darker_background_update_success').style.opacity="0";
}