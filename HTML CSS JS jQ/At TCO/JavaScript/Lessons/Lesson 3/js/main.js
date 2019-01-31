/*

function a(name, surname, callback) {
	console.log(name + ' ' + surname);
	callback();
}

a('aaa', 'sadsa', function() {
	console.log('callback');
});

var b = function () {
	console.log('aaa');
}


b();

b = 'sss';



var obj = {
	width : '100%',
	height: '80px',
	a : function (name, surname) {
		return name + ' ' + surname;
	}
}

var ns = obj.a('aaa', 'bbb');
console.log(ns);


// function f () {
// 	var width = 5;
// 	console.log(this);
// }

// var x = new f();

// [0] => width
// [1] => height

var arr = ['100%', '80px'];

*/


var arrDivs = [];
var removedDivs = [];


function addDivs() {
	var inp = document.getElementById('number-input');
	var inpValue = +inp.value;

	if(!inpValue || inpValue < 0) {
		alert('Wrong value!');
		return;
	}

	removedDivs = [];
	arrDivs = new Array(inpValue);
	drawDivs();
	inp.value = '';
}


function drawDivs() {
	var content = document.getElementById('divs');
	content.innerHTML = '';

	for(var i = 0; i < arrDivs.length; i++) {
		if(typeof arrDivs[i] === 'undefined') {
			arrDivs[i] = Math.floor(Math.random() * 3000);
		}

		var div = document.createElement('div');
		div.setAttribute('data-id', i);
		div.innerHTML = 'UNIQUE: <strong>' + arrDivs[i] + '</strong>';
		div.addEventListener('click', removeDiv);
		content.appendChild(div);
	}
}


function removeDiv(event) {
	var id = +event.target.getAttribute('data-id');
	arrDivs.splice(id, 1);

	removedDivs.push({
		arrayIndex : id,
		divText    : event.target.innerText.split(' ')[1]
	});

	drawDivs();
}

function addDivEnd()
{
	var randNumber = Math.floor(Math.random() * 3000);
	arrDivs.push(randNumber);
	drawDivs();
}

function addDivStart()
{
	var randNumber = Math.floor(Math.random() * 3000);
	arrDivs.unshift(randNumber);
	drawDivs();
}


function restore() {
	var lengthRemoved = removedDivs.length;

	for(var i = 0; i < lengthRemoved; i++) {
		arrDivs.splice(arrDivs[i].arrayIndex, 0, arrDivs[i].divText);
		removedDivs.shift();
	}

	drawDivs();
}