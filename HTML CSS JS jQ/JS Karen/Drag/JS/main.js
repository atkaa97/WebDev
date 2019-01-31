var divAmount, miniDiv; dragFromDivContent ="", k=0 ;

function addDivs() {
	divAmount = Number(document.getElementById("div_amount").value);
	for (i = 0; i < divAmount; i++) {
    dragFromDivContent += '<div id="mini_div" draggable="true" ondragstart="drag(event)" ></div>'}
	document.getElementById("drag_from").innerHTML = dragFromDivContent;
	document.getElementById("div_amount").value = dragFromDivContent = ""
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("mini_div", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    miniDiv = ev.dataTransfer.getData("mini_div");
    ev.target.appendChild(document.getElementById(miniDiv));
    k++;
    if (k==1) {
    	document.getElementById("resalt").innerHTML = "There is <strong>" + k + " </strong> mini div in main div."
    }else if (k<divAmount) {
    	document.getElementById("resalt").innerHTML = "There are <strong>" + k + " </strong> mini divs in main div."
    }else{
    	document.getElementById("resalt").innerHTML = "Finished: All <strong>" + k +"</strong> mini divs are in main div."
    }
}