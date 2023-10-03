function add_referee(){
    document.getElementById("darker_background_referee").style.visibility="visible";
    document.getElementById("darker_background_referee").style.opacity="1";
}

function close_adding_referee(){
    document.getElementById("darker_background_referee").style.visibility="hidden";
    document.getElementById("darker_background_referee").style.opacity="0";
}

function show_successful_adding(){
    close_adding_referee();
    close_adding_coach();
    close_adding_stadium();
    close_adding_player();
    close_adding_team();
    close_adding_nationality();
    close_adding_matches();
    close_adding_event();
    document.getElementById("darker_background_success").style.visibility="visible";
    document.getElementById("darker_background_success").style.opacity="1";
}

function close_successful_adding(){
    document.getElementById("darker_background_success").style.visibility="hidden";
    document.getElementById("darker_background_success").style.opacity="0";
}

function add_coach(){
    document.getElementById("darker_background_coach").style.visibility="visible";
    document.getElementById("darker_background_coach").style.opacity="1";
}

function close_adding_coach(){
    document.getElementById("darker_background_coach").style.visibility="hidden";
    document.getElementById("darker_background_coach").style.opacity="0";
}

function add_stadium(){
    document.getElementById("darker_background_stadium").style.visibility="visible";
    document.getElementById("darker_background_stadium").style.opacity="1";
}

function close_adding_stadium(){
    document.getElementById("darker_background_stadium").style.visibility="hidden";
    document.getElementById("darker_background_stadium").style.opacity="0";
}

function add_player(){
    document.getElementById("darker_background_player").style.visibility="visible";
    document.getElementById("darker_background_player").style.opacity="1";
}

function close_adding_player(){
    document.getElementById("darker_background_player").style.visibility="hidden";
    document.getElementById("darker_background_player").style.opacity="0";
}

function add_team(){
    document.getElementById("darker_background_team").style.visibility="visible";
    document.getElementById("darker_background_team").style.opacity="1";
}

function close_adding_team(){
    document.getElementById("darker_background_team").style.visibility="hidden";
    document.getElementById("darker_background_team").style.opacity="0";
}

function add_nationality(){
    document.getElementById("darker_background_nationality").style.visibility="visible";
    document.getElementById("darker_background_nationality").style.opacity="1";
}

function close_adding_nationality(){
    document.getElementById("darker_background_nationality").style.visibility="hidden";
    document.getElementById("darker_background_nationality").style.opacity="0";
}

function add_matches(){
    document.getElementById("darker_background_matches").style.visibility="visible";
    document.getElementById("darker_background_matches").style.opacity="1";
}

function close_adding_matches(){
    document.getElementById("darker_background_matches").style.visibility="hidden";
    document.getElementById("darker_background_matches").style.opacity="0";
}

function add_event(){
    document.getElementById("darker_background_add_event").style.visibility="visible";
    document.getElementById("darker_background_add_event").style.opacity="1";
}

function close_adding_event(){
    document.getElementById("darker_background_add_event").style.visibility="hidden";
    document.getElementById("darker_background_add_event").style.opacity="0";
}

function addEventMatchID(x){
    let tr=x.parentNode.rowIndex;
    let td=x.cellIndex-11;
    let table=document.getElementById('matches_table');
    document.getElementById('event_match_id').value=table.rows[tr].cells[td].innerHTML;

    let html=""
    html+="<option value=";
    html+="'";
    html+=table.rows[tr].cells[td+1].innerHTML;
    html+="'";
    html+=">";
    html+=table.rows[tr].cells[td+1].innerHTML;
    html+="</option>"
    html+="<option value=";
    html+="'";
    html+=table.rows[tr].cells[td+2].innerHTML;
    html+="'";
    html+=">";
    html+=table.rows[tr].cells[td+2].innerHTML;
    html+="</option>"

    document.getElementById('team').innerHTML=html;
}

function redirect(){
    location.href="index.php";
}





