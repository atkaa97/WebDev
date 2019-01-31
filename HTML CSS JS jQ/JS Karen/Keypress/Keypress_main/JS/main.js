var toop, riight, toop2, riight2, toop3, riight3, myKeyCode, myKeyCode2, myKeyCode3, incr, boxSize, divSize;

toop = 0; riight = 150; riight2 = 0; toop2 = 0; riight3 = 150; toop3 = 150;

function selectSpeed() {
    incr = Number(document.getElementById("speed").value);
    document.getElementById("speed").style.display = "none";
    document.getElementById("divs_properties").style.display = "block";
}

function divsProperties() {
    divSize = Number(document.getElementById("divs_properties").value);
    document.getElementById("first").style.height = divSize+"px";
    document.getElementById("first").style.width = divSize+"px";
    document.getElementById("first").style.top = toop+"px";
    document.getElementById("first").style.right = riight+"px";
    document.getElementById("second").style.height = divSize+"px";
    document.getElementById("second").style.width = divSize+"px";
    document.getElementById("second").style.top = toop2+"px";
    document.getElementById("second").style.right = riight2+"px";
    document.getElementById("third").style.height = divSize+"px";
    document.getElementById("third").style.width = divSize+"px";
    document.getElementById("third").style.top = toop3+"px";
    document.getElementById("third").style.right = riight3+"px";
    document.getElementById("divs_properties").style.display = "none";
    document.getElementById("box_size").style.display = "block";
}

function setBoxSize() {
    boxSize = Number(document.getElementById("box_size").value);
    document.getElementById("main").style.height = boxSize+"px";
    document.getElementById("main").style.width = boxSize+"px";
    document.getElementById("main").style.outline = "2px solid gray";
    document.getElementById("button").style.width = boxSize;
    document.getElementById("button").style.display = "block";
    document.getElementById("box_size").style.display = "none";
    boxSize = boxSize - divSize;
}

function switchDivFirst(){
	document.getElementById("second").style.backgroundColor = "";
    document.getElementById("third").style.backgroundColor = "";
    document.getElementById("first").style.backgroundColor = "red";
}

function switchDivSecond(){
	document.getElementById("first").style.backgroundColor = "";
    document.getElementById("third").style.backgroundColor = "";
	document.getElementById("second").style.backgroundColor = "red";
}

function switchDivThird(){
    document.getElementById("first").style.backgroundColor = "";
    document.getElementById("third").style.backgroundColor = "red";
    document.getElementById("second").style.backgroundColor = "";
}

function moveDiv() {
	myKeyCode = ( document.getElementById("first").style.backgroundColor == "red") ? event.keyCode : null;
    if(riight-riight2<-divSize || riight-riight2>=divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
        if(riight-riight3<-divSize || riight-riight3>=divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
	       if(riight<boxSize && myKeyCode==37){
    		  document.getElementById("first").style.right = riight+=incr}}}
    if(toop-toop2>divSize || toop-toop2 <=-divSize || riight-riight2>=divSize || riight-riight2<=-divSize){
        if(toop-toop3>divSize || toop-toop3 <=-divSize || riight-riight3>=divSize || riight-riight3<=-divSize){
            if(toop>0 && myKeyCode==38){
    		  document.getElementById("first").style.top = toop-=incr}}}
    if(riight-riight2>divSize || riight-riight2<=-divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
        if(riight-riight3>divSize || riight-riight3<=-divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
	        if(riight>0 && myKeyCode==39){
    		  document.getElementById("first").style.right = riight-=incr}}}
    if(toop-toop2<-divSize || toop-toop2>=divSize || riight-riight2<=-divSize || riight-riight2>=divSize){
        if(toop-toop3<-divSize || toop-toop3>=divSize || riight-riight3<=-divSize || riight-riight3>=divSize){
            if(toop<boxSize && myKeyCode==40){
    		  document.getElementById("first").style.top = toop+=incr}}}
}

function moveDiv2() {
	myKeyCode2 = ( document.getElementById("second").style.backgroundColor == "red") ? event.keyCode : null;
    if(riight-riight2>divSize || riight-riight2<=-divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
        if(riight3-riight2>divSize || riight3-riight2<=-divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
	        if(riight2<boxSize && myKeyCode2==37){
    		  document.getElementById("second").style.right = riight2+=incr}}}
    if(toop-toop2 <-divSize || toop-toop2>=divSize || riight-riight2>=divSize || riight-riight2<=-divSize){
        if(toop3-toop2 <-divSize || toop3-toop2>=divSize || riight3-riight2>=divSize || riight3-riight2<=-divSize){
            if(toop2>0 && myKeyCode2==38){
    		  document.getElementById("second").style.top = toop2-=incr}}}
    if(riight-riight2<-divSize || riight-riight2>=divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
        if(riight3-riight2<-divSize || riight3-riight2>=divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
            if(riight2>0 && myKeyCode2==39){
    		  document.getElementById("second").style.right = riight2-=incr}}}
    if(toop-toop2>divSize || toop-toop2<=-divSize || riight-riight2<=-divSize || riight-riight2>=divSize){
        if(toop3-toop2>divSize || toop3-toop2<=-divSize || riight3-riight2<=-divSize || riight3-riight2>=divSize){
            if(toop2<boxSize && myKeyCode2==40){
    		  document.getElementById("second").style.top = toop2+=incr}}}
}

function moveDiv3() {
    myKeyCode3 = ( document.getElementById("third").style.backgroundColor == "red") ? event.keyCode : null;
    if(riight3-riight2<-divSize || riight3-riight2>=divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
        if(riight-riight3>divSize || riight-riight3<=-divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
            if(riight3<boxSize && myKeyCode3==37){
                document.getElementById("third").style.right = riight3+=incr}}}
    if(toop3-toop2>divSize || toop3-toop2 <=-divSize || riight3-riight2>=divSize || riight3-riight2<=-divSize){
        if(toop-toop3 <-divSize || toop-toop3>=divSize || riight-riight3>=divSize || riight-riight3<=-divSize){
            if(toop3>0 && myKeyCode3==38){
                document.getElementById("third").style.top = toop3-=incr}}}
    if(riight3-riight2>divSize || riight3-riight2<=-divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
        if(riight-riight3<-divSize || riight-riight3>=divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
            if(riight3>0 && myKeyCode3==39){
                document.getElementById("third").style.right = riight3-=incr}}}
    if(toop3-toop2<-divSize || toop3-toop2>=divSize || riight3-riight2<=-divSize || riight3-riight2>=divSize){
        if(toop-toop3>divSize || toop-toop3<=-divSize || riight-riight3<=-divSize || riight-riight3>=divSize){
            if(toop3<boxSize && myKeyCode3==40){
                document.getElementById("third").style.top = toop3+=incr}}}
}

function moveDivWithButton(x) {
    thisKey = x;
    if( document.getElementById("first").style.backgroundColor == "red"){
        if(riight-riight2<-divSize || riight-riight2>=divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
            if(riight-riight3<-divSize || riight-riight3>=divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
               if(riight<boxSize && thisKey==37){
                  document.getElementById("first").style.right = riight+=10}}}                                                    
        if(toop-toop2>divSize || toop-toop2 <=-divSize || riight-riight2>=divSize || riight-riight2<=-divSize){
            if(toop-toop3>divSize || toop-toop3 <=-divSize || riight-riight3>=divSize || riight-riight3<=-divSize){
                if(toop>0 && thisKey==38){
                  document.getElementById("first").style.top = toop-=10}}}
        if(riight-riight2>divSize || riight-riight2<=-divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
            if(riight-riight3>divSize || riight-riight3<=-divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
                if(riight>0 && thisKey==39){
                  document.getElementById("first").style.right = riight-=10}}}
        if(toop-toop2<-divSize || toop-toop2>=divSize || riight-riight2<=-divSize || riight-riight2>=divSize){
            if(toop-toop3<-divSize || toop-toop3>=divSize || riight-riight3<=-divSize || riight-riight3>=divSize){
                if(toop<boxSize && thisKey==40){
                  document.getElementById("first").style.top = toop+=10}}}
    }
    if( document.getElementById("second").style.backgroundColor == "red"){
        if(riight-riight2>divSize || riight-riight2<=-divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
            if(riight3-riight2>divSize || riight3-riight2<=-divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
                if(riight2<boxSize && thisKey==37){
                  document.getElementById("second").style.right = riight2+=incr}}}
        if(toop-toop2 <-divSize || toop-toop2>=divSize || riight-riight2>=divSize || riight-riight2<=-divSize){
            if(toop3-toop2 <-divSize || toop3-toop2>=divSize || riight3-riight2>=divSize || riight3-riight2<=-divSize){
                if(toop2>0 && thisKey==38){
                  document.getElementById("second").style.top = toop2-=incr}}}
        if(riight-riight2<-divSize || riight-riight2>=divSize || toop-toop2>=divSize || toop-toop2 <=-divSize){
            if(riight3-riight2<-divSize || riight3-riight2>=divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
                if(riight2>0 && thisKey==39){
                  document.getElementById("second").style.right = riight2-=incr}}}
        if(toop-toop2>divSize || toop-toop2<=-divSize || riight-riight2<=-divSize || riight-riight2>=divSize){
            if(toop3-toop2>divSize || toop3-toop2<=-divSize || riight3-riight2<=-divSize || riight3-riight2>=divSize){
                if(toop2<boxSize && thisKey==40){
                  document.getElementById("second").style.top = toop2+=incr}}}
    }
    if( document.getElementById("third").style.backgroundColor == "red"){
        if(riight3-riight2<-divSize || riight3-riight2>=divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
            if(riight-riight3>divSize || riight-riight3<=-divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
                if(riight3<boxSize && thisKey==37){
                    document.getElementById("third").style.right = riight3+=incr}}}
        if(toop3-toop2>divSize || toop3-toop2 <=-divSize || riight3-riight2>=divSize || riight3-riight2<=-divSize){
            if(toop-toop3 <-divSize || toop-toop3>=divSize || riight-riight3>=divSize || riight-riight3<=-divSize){
                if(toop3>0 && thisKey==38){
                    document.getElementById("third").style.top = toop3-=incr}}}
        if(riight3-riight2>divSize || riight3-riight2<=-divSize || toop3-toop2>=divSize || toop3-toop2 <=-divSize){
            if(riight-riight3<-divSize || riight-riight3>=divSize || toop-toop3>=divSize || toop-toop3 <=-divSize){
                if(riight3>0 && thisKey==39){
                    document.getElementById("third").style.right = riight3-=incr}}}
        if(toop3-toop2<-divSize || toop3-toop2>=divSize || riight3-riight2<=-divSize || riight3-riight2>=divSize){
            if(toop-toop3>divSize || toop-toop3<=-divSize || riight-riight3<=-divSize || riight-riight3>=divSize){
                if(toop3<boxSize && thisKey==40){
                    document.getElementById("third").style.top = toop3+=incr}}}
    }

}