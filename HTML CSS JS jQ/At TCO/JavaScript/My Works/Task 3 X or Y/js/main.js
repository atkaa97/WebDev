  var choice = prompt('Enter X or O');
  var number = 0;
  var allBoxes = document.querySelectorAll('.gameBox');
  var emptyBoxes = [];
  var a = 0;

  for (i = 0; i < allBoxes.length; i++) {
    allBoxes[i].setAttribute('data-box', 'empty');
  }


  if (choice == 'x' || choice == 'o' || choice == 'X' || choice == 'O') {

    if (choice == 'x' || choice == 'X') {
      function boxValue(item) {
        item.innerHTML = 'x';
        item.setAttribute('data-box', 'clicked');
      }

      function adminTurn() {
        for (i = 0; i < allBoxes.length; i++) {
          var attr = allBoxes[i].getAttribute('data-box');
          if (attr == 'empty') {
            emptyBoxes[a] = allBoxes[i];
            a++;
          }
        }
        var randomBox = Math.floor(Math.random() * emptyBoxes.length);
        emptyBoxes[randomBox].innerHTML = 'o';
        emptyBoxes[randomBox].setAttribute('data-box', 'clicked');
        a = 0;
      }

    } else {
      function boxValue(item) {
        item.innerHTML = 'o';
        item.setAttribute('data-box', 'clicked');
      }

      function adminTurn() {
        for (i = 0; i < allBoxes.length; i++) {
          var attr = allBoxes[i].getAttribute('data-box');
          if (attr === 'empty') {
            emptyBoxes[a] = allBoxes[i];
            a++;
          }
        }
        var randomBox = Math.floor(Math.random() * emptyBoxes.length);
        emptyBoxes[randomBox].innerHTML = 'x';
        emptyBoxes[randomBox].setAttribute('data-box', 'clicked');
        a = 0;
      }
    }
  } else {
    alert('Wrong Value!');
    document.getElementById('parentDiv').innerHTML = '';
  }