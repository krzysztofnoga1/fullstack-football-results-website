function txtClear(){
    setTimeout(function(){
        document.getElementById("txtarea").value='';
    }, 500);
}

function loadComments(matchid){
    setTimeout(function(){
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET", "../loads/load-comments.php?ID="+matchid, false);
        xmlhttp.send(null);
        document.getElementById("comments").innerHTML=xmlhttp.responseText;
    }, 1000)

}