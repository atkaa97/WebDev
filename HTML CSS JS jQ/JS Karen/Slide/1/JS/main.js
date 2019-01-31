var i, picCount, pics;

i=0;
pics =["img1", "img2", "img3", "img4", "img5"];
picCount = pics.length;

function nextUp() {
	if (i!=picCount-1) {
	i++;
	document.getElementById("slide").style.backgroundImage = "url('images/"+pics[i]+".jpg')";
	document.getElementById("left").style.display = "block"}
	if (i==picCount-1) {
	document.getElementById("right").style.display = "none"}
}
function nextDown() {
	if (i!=0) {
	i--;
	document.getElementById("slide").style.backgroundImage = "url('images/"+pics[i]+".jpg')";
	document.getElementById("right").style.display = "block"}
	if (i==0) {
	document.getElementById("left").style.display = "none"}
}

// var i, picCount;
// i=1; picCount = 5;
// function nextUp() {
// 	if (i!=picCount) {
// 	i++;
// 	document.getElementById("slide").style.backgroundImage = "url('images/img"+i+".jpg')";
// 	document.getElementById("left").style.display = "block"}
// 	if (i==picCount) {
// 	document.getElementById("right").style.display = "none"}
// }
// function nextDown() {
// 	if (i!=1) {
// 	i--;
// 	document.getElementById("slide").style.backgroundImage = "url('images/img"+i+".jpg')";
// 	document.getElementById("right").style.display = "block"}
// 	if (i==1) {
// 	document.getElementById("left").style.display = "none"}
// }