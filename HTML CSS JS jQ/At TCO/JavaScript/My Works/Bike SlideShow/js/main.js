var keyNumber = 0;
var buttons = document.querySelectorAll('button');
var toWebSite = document.getElementById('toWebSite');
var images = [
  'images/img1.png',
  'images/img2.png',
  'images/img3.png',
  'images/img4.png',
  'images/img5.png',
];

var bikeNames = [
  '1: Ducati',
  '2: Kawasaki',
  '3: Suzuki',
  '4: KTM',
  '5: Yamaha',
];

var fontColors = [
  'rgb(211, 0, 0)',
  '#000',
  '#006B86',
  'rgb(246, 66, 0)',
  'rgb(78, 78, 78)',
];

var toWebsiteLinks = [
  'https://www.ducati.com/us/en/home',
  'https://www.kawasaki.ru/ru/products',
  'https://www.suzuki-motor.ru/moto/',
  'https://www.ktm.com/',
  'https://www.yamaha-motor.ru/',
];


function slide(leftOrRight) {
  if (leftOrRight === 'right') {
    keyNumber++;
    if (keyNumber === images.length) {
      keyNumber = 0;
    }
    setStyle();
    document.getElementById('bike').src = images[keyNumber];
  } else if (leftOrRight === 'left') {
    keyNumber--;
    if (keyNumber === -1) {
      keyNumber = 4;
    }
    setStyle();
    document.getElementById('bike').src = images[keyNumber];
  }
}

function slideToEnd(toEnd) {
  if (toEnd === 'right') {
    keyNumber = 4;
    setStyle();
    document.getElementById('bike').src = images[4];
  } else if (toEnd === 'left') {
    keyNumber = 0;
    setStyle();
    document.getElementById('bike').src = images[0];
  }
}

function setStyle() {
  for (i = 0; i < buttons.length; i++) {
    buttons[i].style.color = fontColors[keyNumber];
  }
  document.getElementById('imgLink').setAttribute('href', toWebsiteLinks[keyNumber]);
  toWebSite.setAttribute('href', toWebsiteLinks[keyNumber]);
  toWebSite.style.color = fontColors[keyNumber];
  toWebSite.innerHTML = bikeNames[keyNumber];
}