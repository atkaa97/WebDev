var toop, riight, toop2, riight2, myKeyCode;
    
function divsProperties() {
    toop = 300; riight = 300; riight2 = 100; toop2 = 300;
	document.getElementById("first").style.top = toop+"px";
	document.getElementById("first").style.right = riight+"px";
	document.getElementById("second").style.top = toop2+"px";
	document.getElementById("second").style.right = riight2+"px";
}

function switchDivFirst(){
	document.getElementById("second").style.backgroundColor = "";
    document.getElementById("first").style.backgroundColor = "red";
}

function switchDivSecond(){
	document.getElementById("first").style.backgroundColor = "";
	document.getElementById("second").style.backgroundColor = "red";
}

function moveDiv(mainRiight, mainToop, secondRiight, secondToop, thisKey, selectedId) {
	thisKey = ( document.getElementById(selectedId).style.backgroundColor == "red") ? event.keyCode : null;
    if(mainRiight-secondRiight<-50 || mainRiight-secondRiight>=50 || mainToop-secondToop>=50 || mainToop-secondToop <=-50){
	       if(mainRiight<400 && thisKey==37){
    		  document.getElementById(selectedId).style.right = mainRiight+=10}}                                                     /*increment chi linum*/
    if(mainToop-secondToop>50 || mainToop-secondToop <=-50 || mainRiight-secondRiight>=50 || mainRiight-secondRiight<=-50){
            if(mainToop>0 && thisKey==38){
    		  document.getElementById(selectedId).style.top = mainToop-=10}}
    if(mainRiight-secondRiight>50 || mainRiight-secondRiight<=-50 || mainToop-secondToop>=50 || mainToop-secondToop <=-50){
	        if(mainRiight>0 && thisKey==39){
    		  document.getElementById(selectedId).style.right = mainRiight-=10}}
    if(mainToop-secondToop<-50 || mainToop-secondToop>=50 || mainRiight-secondRiight<=-50 || mainRiight-secondRiight>=50){
            if(mainToop<400 && thisKey==40){
    		  document.getElementById(selectedId).style.top = mainToop+=10}}
}





