var spanAmount, i,j, gameDivContent="" ;
function play() {
	spanAmount = Number(document.getElementById("span_amount").value);
	for (i = 0; i < spanAmount; i++) {
    gameDivContent += '<span class="span"  onclick="this.style.background = \'white\', this.innerHTML=j, j++"></span>'}
	document.getElementById("game_div").innerHTML = gameDivContent;}