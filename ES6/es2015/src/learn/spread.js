let arr = [1, 2, 3];

let arr2 = [4, 5, 6];

let fullArr = [0, ...arr, ...arr2, 7];

console.log(fullArr);


function add(x, y, z) {
    console.log(x + y + z);
}

let numbers = [1,2,3];

add(...numbers);