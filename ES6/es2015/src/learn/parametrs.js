function greet(greeting = 'Hello', name = 'Friend') {
    console.log(`${greeting} ${name}`);
}

greet('Hi', 'Bill');
greet(undefined, 'Bill');
greet('Hello');

function sum() {
    console.log(arguments instanceof Array);

    var sum = 0;

    Array.prototype.forEach.call(arguments, function (value) {
        sum += value;
    });

    console.log(sum);
}

function sum2(...values) {
    console.log(values instanceof Array);
    let sum = 0;
    values.forEach(function (value) {
        sum += value;
    });
    console.log(sum);
}

function sum3(...values) {
    console.log(values.reduce(function (prevValue, currentValue) {
        return prevValue + currentValue;
    }));
}

sum(5, 6, 7, 8, 11);
sum2(5, 6, 7, 8, 11);
sum3(5, 6, 7, 8, 11);