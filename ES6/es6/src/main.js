// // let a = function (b, c) {
// //     return b + c;
// // }
//
// let a = (b,c) => {
//     b++;
//     c++;
//     return b / c;
// };
//
// let b = {
//     prop : 123,
//     hello: function() {
//         console.log(this.prop);
//
//         setTimeout(() => {
//             console.log(this.prop);
//         }, 300)
//     }
// }
//
// b.hello();
//
// console.log(a(1,5))
//
//


// let a = (a, b, ...c) => eval(c.join('+'));
//
// console.log(a(2, 1, 456,64564,78,789,45,61,323,11,4,78,897,89789));
//
//


// let obj = {
//     name : 'AAA',
//     lastName : 'BBB'
// };
//
//
// let a = `Hello ${obj.name} ${obj.lastName}`;
//
// console.log(a);

let car = {
    make    : "BMW",
    model   : 'X6',
    variant : 'M'
}

// let make = car.make;
// let model = car.model;
// let variant = car.variant;

let {make, model, variant} = car;

let ab = function (params) {
    let {make} = params;
    // console.log('obj', make);
}

let [a,b,c] = [1,2,3];

// console.log(Object.entries(car));

for(let aaa of Object.values(car)) {
    console.log(aaa);
}
console.log(21312);

console.log('aaaxx');
ab(car);


// console.log(make,model, variant);