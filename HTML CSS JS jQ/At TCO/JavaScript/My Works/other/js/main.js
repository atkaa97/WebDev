var sliderOptions = {
  postiton: 0,
  width: document.getElementById('container').offsetWidth,
  sliderList: document.getElementById('slider'),
  images: 'images/',
  sliderImages: [{
      name: 'img1.png',
      text: 'Ducati',
      textColor: '#D30000',
    },
    {
      name: 'img2.png',
      text: 'Kawasaki',
      textColor: '#000000',
    },
    {
      name: 'img3.png',
      text: 'Suzuki',
      textColor: '#006B86',
    },
    {
      name: 'img4.png',
      text: 'KTM',
      textColor: '#F64200',
    },
    {
      name: 'img5.png',
      text: 'Yamaha',
      textColor: '#4E4E4E',
    }
  ],
  sliderContent: function () {
    var thisObj = this;
    this.sliderImages.map(function (nth) {
      var li = document.createElement('li');
      li.style.position = 'relative';
      var p = document.createElement('p');
      p.style.color = nth.textColor;
      p.innerHTML = nth.text;
      var img = document.createElement('img');
      img.src = thisObj.images + nth.name;
      li.appendChild(p);
      li.appendChild(img);
      thisObj.sliderList.appendChild(li);
    })
  }
}

var b = -768,
  l = 4,
  r = 1;

function moveLeft() {
  b *= l;
  document.getElementById('slider').style.transform = 'translateX(' + b + 'px)';
  l--;
  b = -768;
  r = l + 1;
  if (l == -1) l = 4
}

function moveRight() {
  b *= r;
  document.getElementById('slider').style.transform = 'translateX(' + b + 'px)';
  r++;
  b = -768;
  l = r - 1;
  if (r == 5) r = 0
}

sliderOptions.sliderContent();
document.getElementById('slideToRight').addEventListener('click', sliderOptions.moveRight);
document.getElementById('slideToLeft').addEventListener('click', sliderOptions.moveLeft);