var i,j,k,setOpacity,picArray,miniPics;

picArray = ["img1", "img2", "img3", "img4", "img5", "img6", "img7", "img8"]; miniPics=""; i=0;

function setDefault(){
	document.getElementById("slide_img").src="images/"+picArray[i]+".jpg";

	for (j = 0; j < picArray.length; j++){
    	miniPics += '<div class="mini_pics_div"><img src = images/'+picArray[j]+'.jpg class="mini_pics" onclick="switchWithMiniPics(this,'+j+')"></div>'}
	document.getElementById("mini_pics_main_div").innerHTML = miniPics;
	
	setOpacity = document.getElementsByClassName("mini_pics");
	for (j = 0; j < picArray.length; j++) {
		setOpacity[j].style.opacity = 0.5}
	setOpacity[i].style.opacity = 1;
}

function next(){
	i++;
	if (i==picArray.length) {i=0}
	document.getElementById("slide_img").src="images/"+picArray[i]+".jpg";

	setOpacity = document.getElementsByClassName("mini_pics");
	for (j = 0; j < picArray.length; j++){
		setOpacity[j].style.opacity = 0.5}
	setOpacity[i].style.opacity = 1
}

function prev(){
	if (i==0) {i=picArray.length}
	i--;
	document.getElementById("slide_img").src="images/"+picArray[i]+".jpg";

	setOpacity = document.getElementsByClassName("mini_pics");
	for (j = 0; j < picArray.length; j++){
		setOpacity[j].style.opacity = 0.5}
	setOpacity[i].style.opacity = 1
}

// function switchWithMiniPics(x){
// 	i = x.src.toString().substr(-5, 1) - 1;
// 	document.getElementById("slide_img").src="images/"+picArray[i]+".jpg";

// 	for (j = 0; j < picArray.length; j++){
// 		setOpacity[j].style.opacity = 0.5}
// 	x.style.opacity = 1
// }

function switchWithMiniPics(x, k){
	i = k;
	document.getElementById("slide_img").src=x.src;

	for (j = 0; j < picArray.length; j++){
		setOpacity[j].style.opacity = 0.5}
	x.style.opacity = 1
}