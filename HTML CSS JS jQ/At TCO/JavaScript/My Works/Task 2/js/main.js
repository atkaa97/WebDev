function addBoxes() {
  var boxNumber = document.getElementById('box-number');
  var numberValue = +boxNumber.value;
  var parentDiv = document.getElementById('parent-box');
  parentDiv.innerHTML = '';
  for (i = 1; i < numberValue + 1; i++) {
    var addBox = document.createElement(['div']);
    var parentDiv = document.getElementById('parent-box');
    parentDiv.appendChild(addBox);
    var unique = Math.floor(Math.random() * 3000);
    addBox.innerHTML = 'Unique number of Box: '  + unique;
  }
}

function addEnd() {
  var boxNumber = document.getElementById('box-number');
  var numberValue = +boxNumber.value;
  var endNumber = +numberValue + 1;
  var parentDiv = document.getElementById('parent-box');
  var addEnd = document.createElement(['div']);
  parentDiv.append(addEnd);
  var unique = Math.floor(Math.random() * 3000);
  addEnd.innerHTML = 'Unique number of Box: ' + unique;
}

function addStart() {
  var boxNumber = document.getElementById('box-number');
  var numberValue = +boxNumber.value;
  var endNumber = +numberValue + 1;
  var parentDiv = document.getElementById('parent-box');
  var addEnd = document.createElement(['div']);
  parentDiv.prepend(addEnd);
  var unique = Math.floor(Math.random() * 3000);
  addEnd.innerHTML = 'Unique number of Box: ' + unique;
}


function restore() {
  addBoxes()
}