// const map = new Map([
//     ['Hi' , 'Hello'],
//     [42,'lreom lorem lorem asdfa'],
//     [true,false],
//     [{},'object'],
//     [function () {},'Functiona']
// ]);
//
// console.log(map);

// const map = new Map();
//
// map.set(42, 'param paragraph bootstrap');
// map.set('42', 'param paragraph bootstrap');

// console.log(map);
// console.log(map.size);
// console.log(map.get(42));
// console.log(map.has(42));

// map.delete('42');
// console.log(map.size);

// map.clear();
// console.log(map.size);

const map = new Map();

map.set('HTML', 'HyperText Markup Language').set('CSS', 'Cascading Style Sheet').set('JS', 'JavaScript');

// console.log(map.keys());
// console.log(...map.keys());

// console.log(map.values());
// console.log(...map.values());

// console.log(map.entries());
// console.log([...map.entries()]);

// const [[key, value], second, third] = map;
//
// console.log(key,value,second,third);

// for (let [key,value] of map){
//     console.log(key,value);
// }

map.forEach((value, key, map) => console.log(value, key, map));













