var sliderOptions = {
	position: 0,
	width: document.getElementById('slider-container').offsetWidth,
	sliderDiv: document.getElementById('slider'),
	imagesPath: 'images/',
	sliderImages: [{
			name: '1.jpg',
			text: 'Hello 1',
			textColor: 'red',
			textPosition: 'top left',
			fontSize: '45px'
		},
		{
			name: '2.jpg',
			text: 'Hello 2',
			textColor: 'blue',
			textPosition: 'top right',
			fontSize: '25px'
		},
		{
			name: '3.jpg',
			text: 'Hello 3',
			textColor: 'green',
			textPosition: 'bottom left',
			fontSize: '34px'
		},
		{
			name: '4.jpg',
			text: 'Hello 4',
			textColor: 'pink',
			textPosition: 'top right',
			fontSize: '58px'
		},
		{
			name: '5.jpg',
			text: 'Hello 5',
			textColor: 'yellow',
			textPosition: 'bottom right',
			fontSize: '41px'
		}
	],
	initSlider: function () {
		var self = this;
		this.sliderImages.map(function (item) {
			var li = document.createElement('li');
			li.style.position = 'relative';
			var p = document.createElement('p');
			p.style.color = item.textColor;
			p.innerText = item.text;
			p.style.position = 'absolute';
			p.style.fontSize = item.fontSize;
			var arrPosition = item.textPosition.split(' ');
			arrPosition.map(function (item) {
				p.style[item] = 0;
			})
			var img = document.createElement('img');
			img.src = self.imagesPath + item.name;
			img.alt = item.text;
			li.appendChild(p);
			li.appendChild(img);
			self.sliderDiv.appendChild(li);
		});
	},
	moveLeft: function () {
		if ((sliderOptions.position + sliderOptions.width) > 0) {
			sliderOptions.position = -(sliderOptions.sliderImages.length - 1) * sliderOptions.width;
		} else {
			sliderOptions.position += sliderOptions.width;
		}
		sliderOptions.changePosition();
	},
	moveRight: function () {
		if (Math.abs((sliderOptions.position - sliderOptions.width)) > ((sliderOptions.sliderImages.length - 1) * sliderOptions.width)) {
			sliderOptions.position = 0;
		} else {
			sliderOptions.position -= sliderOptions.width;
		}
		sliderOptions.changePosition();
	},
	changePosition: function () {
		this.sliderDiv.style.transform = 'translateX(' + this.position + 'px)';
	}
}
sliderOptions.initSlider();
document.getElementById('left').addEventListener('click', sliderOptions.moveLeft);
document.getElementById('right').addEventListener('click', sliderOptions.moveRight);