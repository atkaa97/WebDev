var value, text, words;


function searchWord(){
	j=0;
	value = document.getElementById("search").value;
	text = document.getElementById("text").innerText;
	words = text.split(' ');
	for (var i = 0; i < words.length; i++) {
		if (value.toLowerCase()==words[i].toLowerCase()) {
			words[i] = '<span class="changeBg">'+words[i]+ '</span>';
			j++

		}
	} 
	document.getElementById("text").innerHTML = words.join(" ");
	if (j != 0) {
		document.getElementById("error").innerHTML = j;
	} else {
		if (value != "") {
			document.getElementById("error").innerHTML = "no resalt"
		}
		else{ document.getElementById("error").innerHTML = "" 
		}
	}
}


