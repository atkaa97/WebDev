
var parentDiv = document.querySelector('.parentDiv');

function addStartDivs(obj) {
  parentDiv.innerHTML = ''
  var startDivCount = Number(document.querySelector('#startDivCount').value);
  for (i = 1; i < startDivCount + 1; i++) {
    createChild(i, parentDiv, 'append')
  }
  document.querySelector('#startDivCount').value = ''
}

function addFromStart() {
  updateAllBeforeAddStart()
  createChild(1, parentDiv, 'prepend')
}

function addFromEnd() {
  var notHiddentChildes = document.querySelectorAll(".childDivClass:not(.hidden)")
  var lastNumber = Number(notHiddentChildes.length) - 1;
  var lastChildNumber = Number(notHiddentChildes[lastNumber].getAttribute("data-number")) + 1
  createChild(lastChildNumber, parentDiv, 'append')
}

function reset() {
  var allChildDivs = document.querySelectorAll('.childDivClass');
  allChildDivs.forEach((item , i) => {
    item.setAttribute('data-number' , Number(i) + 1);
    item.querySelector('.indexNumber').innerHTML = Number(i) + 1;
    item.classList.remove("hidden");
  })
  
}
function updateAllBeforeAddStart() {
  var allChildeDivs = document.querySelectorAll('.childDivClass');
  allChildeDivs.forEach((item) => {
    item.setAttribute('data-number', Number(item.getAttribute('data-number')) + 1)
    var span = item.querySelector('.indexNumber')
    span.innerHTML = Number(span.innerHTML) + 1
  })
}

function createChild(index, parent, appendOrPrepend) {
  var childDiv = document.createElement('div');
  childDiv.className = 'childDivClass card col-3 p-4 mt-2 mb-2 '
  childDiv.setAttribute('data-number', index)
  childDiv.onclick = function () {
    this.classList.add("hidden");
    var notHiddentChildes = document.querySelectorAll(".childDivClass:not(.hidden)")
    notHiddentChildes.forEach((item, index) => {
      item.setAttribute('data-number', Number(index) + 1 )
      var span = item.querySelector('.indexNumber')
      span.innerHTML =  Number(index) + 1
    })
  };  
  childDiv.innerHTML = 'My div number <span class="indexNumber">' + index + '</span>'
  if(appendOrPrepend == 'append'){
    parent.appendChild(childDiv)
  }else{
    parent.prepend(childDiv)
  }
}