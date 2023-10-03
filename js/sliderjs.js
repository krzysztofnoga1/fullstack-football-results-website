var current_slide=0;

function slide_left(){
    current_slide=current_slide-33;
    if(current_slide<=-90){
        current_slide=-66;
    }
    document.getElementById("slider").style.transform='translate('+current_slide+'%)';
}

function slide_right(){
    current_slide=current_slide+33;
    if(current_slide>=0){
        current_slide=0;
    }
    document.getElementById("slider").style.transform='translate('+current_slide+'%)';
}