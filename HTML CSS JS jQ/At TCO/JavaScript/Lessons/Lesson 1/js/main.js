// float

/*
var f =  1.2;

console.log(f);


f = f + 5;

console.error(f);

*/


// var __helloWorld
// var helloWorld
// var hello_world
// var helloworld


// plus
var a = 5;
var b = 7;


var c = a + b;


console.log('plus ' + c);


// minus

a = 8;
b = 5;


c = a - b;


console.log('minus ' + c);


// multiply


a = 10;
b = 5;


c = a * b;


console.log('multiply ' + c);


// percent


a = 10;
b = 6;


c = a % b;


console.log('percent ' + c);

// devide


a = 10;
b = 5;


c = a / b;


console.log('devide ' + c);


// (=)
// (*)
// (/)
// (%)
// (+)
// (-)


var d = 5;

d += 7;
console.log(d);
d -= 7;
console.log(d);
d *= 7;
console.log(d);
d /= 7;
console.log(d);


var g = false;
console.log(g);
g = true;
console.log(g);



var h = "Hello";
var w = "World";


var hw = h + ' ' + w;

console.log(hw);


var name 	 = prompt('Please enter your name?');

var l = 6; // number
var s_l = '6'; // string

console.log(typeof 6);
console.log(typeof '6');

if(l == s_l) {
	alert('Mdav');
} else {
	alert('ChMdav');
}


// == (without type)
// === (with type)



var surname  = prompt('Please enter your surname?');
var age  	 = prompt('Please enter your age?');

console.log('age ' + typeof age);

console.log('age' + typeof +age,  +age);

if(age > 18) {
	alert('18+');
}

// >
// <
// >=
// <=



var gender	 = prompt('Please enter your gender?');



var result = ' Hi ' + name + ' ' + surname + '\n Your age is:' + age + '\n Your gender is:' + gender;

confirm(result);



var allowedAge = 20;