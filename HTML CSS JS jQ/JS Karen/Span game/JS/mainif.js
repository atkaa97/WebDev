var spanAmount, i, j, points, gameDivContent="";

function play() {
	spanAmount = Number(document.getElementById("span_amount").value);
	if(spanAmount>=1 && spanAmount<=100) {
	for (i = 0; i < spanAmount; i++) {
    gameDivContent += 			(i=== Math.floor(Math.random() * (spanAmount+1))) ? 
    							'<span class="red"  onclick="this.style.background = \'red\', this.innerHTML=j, j++, gameOver()"></span>' :
    							'<span class="white"  onclick="this.style.background = \'white\', this.innerHTML=j, j++, gamePoints()"></span>'}
	document.getElementById("game_div").innerHTML = gameDivContent;
	document.getElementById("r_u_dumb").innerHTML = ""}
	else{ document.getElementById("r_u_dumb").innerHTML = "Congratulations you are dumb !!!"}
}

function gamePoints() {
	points = j - 1;
	document.getElementById("game_points").innerHTML = "You have : " + points +" points !!!";
	if (points >= spanAmount*0.3) {
    document.getElementById("game_div").style.display= "none";
    document.getElementById("game_result").innerHTML = "Congratulations you did it !!!";
    document.getElementById("result").style.backgroundImage = "url(images/cong.jpg)";}
}

function gameOver() {
	document.getElementById("game_div").style.opacity = 0.3;
	document.getElementById("game_result").innerHTML = "Game Over : Reload and try again !!!";
    document.getElementById("result").style.backgroundImage = "url(images/over.jpg)";
}