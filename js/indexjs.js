var ajax=new XMLHttpRequest();
var method="GET";
var url="../gets/get-matches-for-index.php"
var asynchronous=true;
var data;

ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
        data=JSON.parse(this.responseText);

        html="";
        for(var a=0; a<3; a++) {
            var homeLogo = data[a*3].logo1;
            var homeGoals = data[a*3].HomeTeamGoals;
            var awayGoals = data[a*3].AwayTeamGoals;
            var awayLogo = data[a*3].logo2;
            var homeLogo2 = data[a*3+1].logo1;
            var homeGoals2 = data[a*3+1].HomeTeamGoals;
            var awayGoals2 = data[a*3+1].AwayTeamGoals;
            var awayLogo2 = data[a*3+1].logo2;
            var homeLogo3 = data[a*3+2].logo1;
            var homeGoals3 = data[a*3+2].HomeTeamGoals;
            var awayGoals3 = data[a*3+2].AwayTeamGoals;
            var awayLogo3 = data[a*3+2].logo2;

            html+="<div class='container'>"
            html += "<section>";
            html += "<img src=" + homeLogo + ">";
            html += "<p>" + homeGoals + "</p>";
            html += "<p>:</p>";
            html += "<p>" + awayGoals + "</p>";
            html += "<img src=" + awayLogo + ">";
            html += "</section>";
            html += "<section>";
            html += "<img src=" + homeLogo2 + ">";
            html += "<p>" + homeGoals2 + "</p>";
            html += "<p>:</p>";
            html += "<p>" + awayGoals2 + "</p>";
            html += "<img src=" + awayLogo2 + ">";
            html += "</section>";
            html += "<section>";
            html += "<img src=" + homeLogo3 + ">";
            html += "<p>" + homeGoals3 + "</p>";
            html += "<p>:</p>";
            html += "<p>" + awayGoals3 + "</p>";
            html += "<img src=" + awayLogo3 + ">";
            html += "</section>";
            html += "</div>"
        }
        document.getElementById("slider").innerHTML=html;
    }
}