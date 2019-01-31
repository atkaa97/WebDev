var sources =["images/1.jpg","images/2.jpg","images/3.jpg","images/4.jpg","images/5.jpg", "images/6.jpg"];
var index = 0;
function init() {
	document.getElementById('slide_img').src = sources[index]
}
function next() {
	index++;
	if (index==sources.length) {
	index= 0}
	document.getElementById('slide_img').src = sources[index]
}

function prev() {
	if (index==0) {
	index = sources.length}
	index--;
	document.getElementById('slide_img').src = sources[index]
}