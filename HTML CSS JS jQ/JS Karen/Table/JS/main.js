var rowsAmount, colsAmount, i, j, r, g, b,  rowContent, myTableContent ;

function add() {
	rowContent="", myTableContent="";
	rowsAmount = Number(document.getElementById("rows").value);
	colsAmount = Number(document.getElementById("cols").value);

	for (j = 0; j < colsAmount; j++) {
    		rowContent +=  '<td class="col" onclick="getColor(this)"></td>';
    }
    for (i = 0; i < rowsAmount; i++) {
    		myTableContent += '<tr class="row" ondblclick="deleteRow(this)">'+ rowContent +'</tr>'
	}

	document.getElementById("my_table").innerHTML = myTableContent
}

function getColor(x){
	if(x.style.background == false){
		r = Math.floor(Math.random() * 255);
		g = Math.floor(Math.random() * 255);
		b = Math.floor(Math.random() * 255);

		x.style.background = "rgb("+r+","+g+","+b+")"
	}
}

function deleteRow(y){
	y.parentNode.removeChild(y);
}
