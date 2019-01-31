/*
var age = +prompt('Enter your age?');


if(!age || isNaN(age)) {
	alert('enter a number');
} else if(age <= 18 || age >= 65) {
	alert(' min: 18 \n max: 65');
} else if(age >= 22 && age <= 25){
	alert('you are a young');
} else {
	alert('you are too old.');
}

console.log(age);



var name = prompt('Enter yuor name?');

if(name) {
	switch(name) {
		case 'gago' :
		alert('You are Gago');
		break;
		case 'ashot' :
		alert('You are Ashot');
		break;
		default :
		alert('You are ' + name);
		break;
	}
}




var surname = prompt('Please enter Your surname');


var a = surname === 'aaa' ? 'Gago' : 'Ashot';

alert(a);



*/

// ==
// ===
// >=
// <=
// !==
// !=
// !var
// var
// ||
// &&



/*
var a = 2;

a--;

console.log(a);
*/


var arr = [12,13,14,15,16,17];


//console.log(arr[0]);


var sizeArr = arr.length;

for(var i = 0; i < sizeArr; i++) {
	// arr.unshift(arr[i] + 7);
	arr.push(arr[i] + Math.floor(Math.random() * 255));
}

var b = ['ss', 'dd'];

arr.map(function(item) {
	console.log(item);
})

//console.log(arr.join(''));

console.log(arr.indexOf(12));

//arr.reverse();

console.log(arr);

//arr.pop();
//arr.shift();

//arr.splice(5, 0, 125);

//arr = arr.slice(0, 5);



console.log(arr);


/*
var i = 0;

while(i < arr.length) {
	console.log(i);
	i++;
}



var  i = 0;

do{
	console.log(arr[i]);
	i++;
}while(i < 1)

*/

// console.log(arr);

// console.log(arr.length);

// console.log(arr[arr.length - 1][arr[arr.length - 1].length - 1])


var a = 12;
var b = 13;
var c = 14;
var d = 15;
//etc...


