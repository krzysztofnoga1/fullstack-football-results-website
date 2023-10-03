function getMatchIDDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-12;
    let table=document.getElementById('matches_table');
    document.getElementById('delete_match_id').value=table.rows[tr].cells[td].innerHTML;
}

function getIDRefereeDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-4;
    let table=document.getElementById('referees_table');
    document.getElementById('delete_referee_id').value=table.rows[tr].cells[td].innerHTML;
}

function getCoachIDDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-5;
    let table=document.getElementById('coaches_table');
    document.getElementById('delete_coach_id').value=table.rows[tr].cells[td].innerHTML;
}

function getStadiumIDDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-4;
    let table=document.getElementById('stadiums_table');
    document.getElementById('delete_stadium_id').value=table.rows[tr].cells[td].innerHTML;
}

function getTeamIDDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-10;
    let table=document.getElementById('teams_table');
    document.getElementById('delete_team_id').value=table.rows[tr].cells[td].innerHTML;
}

function getNationalityIDDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-4;
    let table=document.getElementById('nations_table');
    document.getElementById('delete_nationality_id').value=table.rows[tr].cells[td].innerHTML;
}

function getPlayerIDDelete(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-7;
    let table=document.getElementById('players_table');
    document.getElementById('delete_player_id').value=table.rows[tr].cells[td].innerHTML;
}

function delete_match(){
    document.getElementById("darker_background_delete_match").style.visibility="visible";
    document.getElementById("darker_background_delete_match").style.opacity="1";
}

function close_deleting_match(){
    document.getElementById("darker_background_delete_match").style.visibility="hidden";
    document.getElementById("darker_background_delete_match").style.opacity="0";
}

function delete_referee(){
    document.getElementById("darker_background_delete_referee").style.visibility="visible";
    document.getElementById("darker_background_delete_referee").style.opacity="1";
}

function close_deleting_referee(){
    document.getElementById("darker_background_delete_referee").style.visibility="hidden";
    document.getElementById("darker_background_delete_referee").style.opacity="0";
}

function delete_coach(){
    document.getElementById("darker_background_delete_coach").style.visibility="visible";
    document.getElementById("darker_background_delete_coach").style.opacity="1";
}

function close_deleting_coach(){
    document.getElementById("darker_background_delete_coach").style.visibility="hidden";
    document.getElementById("darker_background_delete_coach").style.opacity="0";
}

function delete_stadium(){
    document.getElementById("darker_background_delete_stadium").style.visibility="visible";
    document.getElementById("darker_background_delete_stadium").style.opacity="1";
}

function close_deleting_stadium(){
    document.getElementById("darker_background_delete_stadium").style.visibility="hidden";
    document.getElementById("darker_background_delete_stadium").style.opacity="0";
}

function delete_team(){
    document.getElementById("darker_background_delete_team").style.visibility="visible";
    document.getElementById("darker_background_delete_team").style.opacity="1";
}

function close_deleting_team(){
    document.getElementById("darker_background_delete_team").style.visibility="hidden";
    document.getElementById("darker_background_delete_team").style.opacity="0";
}

function delete_nationality(){
    document.getElementById("darker_background_delete_nationality").style.visibility="visible";
    document.getElementById("darker_background_delete_nationality").style.opacity="1";
}

function close_deleting_nationality(){
    document.getElementById("darker_background_delete_nationality").style.visibility="hidden";
    document.getElementById("darker_background_delete_nationality").style.opacity="0";
}

function delete_player(){
    document.getElementById("darker_background_delete_player").style.visibility="visible";
    document.getElementById("darker_background_delete_player").style.opacity="1";
}

function close_deleting_player(){
    document.getElementById("darker_background_delete_player").style.visibility="hidden";
    document.getElementById("darker_background_delete_player").style.opacity="0";
}

function show_successful_deleting(){
    close_deleting_match();
    close_deleting_referee();
    close_deleting_coach();
    close_deleting_stadium();
    close_deleting_team();
    close_deleting_nationality();
    close_deleting_player();
    document.getElementById("darker_background_delete_success").style.visibility="visible";
    document.getElementById("darker_background_delete_success").style.opacity="1";
}

function close_successful_deleting(){
    document.getElementById("darker_background_delete_success").style.visibility="hidden";
    document.getElementById("darker_background_delete_success").style.opacity="0";
}