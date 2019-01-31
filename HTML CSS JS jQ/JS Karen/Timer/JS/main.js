var myTime, myMinute, mySecond, x, y, z;
function timer(){
	myTime = document.getElementById("set_time").value;
	document.getElementById("time").innerHTML = (myTime<10) ? "0" + myTime : myTime;
	document.getElementById("timer_p").style.display = "block";
	document.getElementById("set_time").value = "";
	mySecond = document.getElementById("second").innerHTML;
	myMinute = document.getElementById("minute").innerHTML;
	x = setInterval(changeSecond, 1);
	y = setInterval(changeMinute, 60);
	z = setInterval(changeTime, 3600)
}
function changeSecond(){
	if (mySecond==0 && myMinute==0 && myTime==0){
		clearInterval(x);clearInterval(y);clearInterval(z);
		document.getElementById("timer").style.display = "none";
		document.getElementById("video").style.display = "block";
		document.getElementById("my_video").src = "a_v/memeb.mp4"}
	else if (mySecond !=0){
		mySecond--;
		document.getElementById("second").innerHTML = (mySecond < 10) ? "0" + mySecond : mySecond}
	else{
		mySecond = 59;
		document.getElementById("second").innerHTML = mySecond}
	document.getElementById("my_audio").play();
}
function changeMinute(){
	if (myMinute != 0){
		myMinute--;
		document.getElementById("minute").innerHTML = (myMinute < 10) ? "0" + myMinute : myMinute}
	else{
		myMinute = 59;
		document.getElementById("minute").innerHTML = myMinute}
}
function changeTime(){
	myTime--;
	document.getElementById("time").innerHTML = (myTime < 10) ? "0" + myTime : myTime
}