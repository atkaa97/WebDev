const set = new Set();
// const set1 = new Set('button'); // 1 hat t tarov,,,,,unique-a
// const set2 = new Set(['button']);
// const set3 = new Set(['button', 'active', 'small']);
// const set4 = new Set(set1);

// console.log(set1);
// console.log(set2);
// console.log(set3);
// console.log(set1,set4);

// set.add('button').add('active');
// const primaryRef = {className: 'Primery'};
// set.add('button');
// set.add('active');
// set.add('active');

// set.add(primaryRef);
// console.log(set.has(primaryRef));

// set.delete('active');
// set.clear();
// console.log(set);

set.add('button').add('active');

// console.log(set.values());
// console.log(...set.values());
// console.log(set.keys());
// console.log(...set.entries());
// console.log(...set);

// console.log([...set]);
// console.log(Array.from(set));


// for(let item of set){
//     console.log(item);
// }

set.forEach(item=>console.log(item));



