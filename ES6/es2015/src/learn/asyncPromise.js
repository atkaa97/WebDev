function getData() {
    return new Promise(function (resolve, reject) {
        setTimeout(function () {
            resolve('Resolve');
        }, 1500);
    });
}

async function getDataAsync() {
    let data = await getData();
    console.log(data);
}

getDataAsync();
