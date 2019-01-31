$(document).ready(function () {
	var products = [];
	var productCount = 20;
	var availableImages = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.png', '6.jpg', '7.jpg', '8.png', '9.jpg', '10.jpg'];

	function generateProducts(productCount) {
		for (var i = 0; i < productCount; i++) {
			products.push({
				name: generateName(),
				price: getRandomInt(0.1, 1000),
				img: 'images/' + availableImages[getRandomInt(0, availableImages.length)]
			});
		}
	}

	generateProducts(productCount);


	function drawProducts(products) {
		$('#products').empty();
		products.map(function (item, key) {
			$('#products').append('<div class="openModal" data-id="' + key + '"><img src="' + item.img + '" />' +
				'<div class="info"><p class="name">Name: <strong>' + item.name + '</strong></p><p class="price">Price: <strong>' + item.price + '$</strong></p></div><div class="icons"><i class="far fa-eye view-product"></i><i class="fas fa-edit edit-product" data-id="' + key + '"></i><i class="fas fa-trash-alt delete-product" data-id="' + key + '"></i></div></div>');
		});

		$('.result strong').text(products.length);
	}


	$('#submitForm').submit(function (event) {
		event.preventDefault();
		$('.dropdown').slideUp(100);
		drawProducts(filterProducts($('#searchProduct').val()));
	});


	var editProductId = null;
	var deleteProductId = null;

	$(document).on('click', '.edit-product', function (e) {
		e.stopPropagation();
		editProductId = $(this).attr('data-id');
		var product = products[$(this).attr('data-id')];
		var modal = $('.bd-edit-modal-lg');
		modal.find('[name="name"]').val(product.name);
		modal.find('[name="price"]').val(product.price);
		modal.find('.productImage').attr('src', product.img);
		modal.modal('show');
	});

	$(document).on('click', '.delete-product', function (e) {
		e.stopPropagation();
		deleteProductId = $(this).attr('data-id');
		$('.modal-delete').modal('show');
	});

	$('#yes-delete').click(function () {
		products.splice(deleteProductId, 1);
		$('.openModal[data-id="' + deleteProductId + '"]').remove();
		$('.modal-delete').modal('hide');
	})

	$('#chooseImage').change(function (e) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('.productImage').attr('src', e.target.result);
		}
		reader.readAsDataURL(e.target.files[0]);
	});

	$('#submitEdit').submit(function (e) {
		e.preventDefault();
		var modal = $('.bd-edit-modal-lg');

		products[editProductId] = {
			name: modal.find('[name="name"]').val(),
			price: modal.find('[name="price"]').val(),
			img: modal.find('.productImage').attr('src')
		}

		var productDiv = $('.openModal[data-id="' + editProductId + '"]');
		productDiv.find('.name strong').text(products[editProductId].name);
		productDiv.find('.price strong').text(products[editProductId].price + '$');
		productDiv.find('img').attr('src', products[editProductId].img);
		modal.modal('hide');
	})

	$('#searchProduct').keydown(function (e) {
		switch (e.which) {
			case 40: // down
				var active = $('.dropdown li.active');

				if (!active.length) {
					active = $('.dropdown li').first().addClass('active');
				} else {
					active = $(active).removeClass('active').next('li').addClass('active');
				}

				if (!active.length) {
					avtive = $('.dropdown li').last().addClass('active');
					return false;
				} else {
					var liHeight = $('.dropdown li').outerHeight();
					var position = active.position().top + liHeight + 10;

					if (position >= $('.dropdown').height()) {
						var scrollTop = $('.dropdown').scrollTop();
						$('.dropdown').scrollTop(scrollTop + liHeight);
					}
				}

				$(this).val(active.attr('data-name'));
				break;
			case 38: // up
				var active = $('.dropdown li.active');

				if (!active.length) {
					active = $('.dropdown li').last().addClass('active');
				} else {
					active = $(active).removeClass('active').prev('li').addClass('active');
				}


				if (!active.length) {
					avtive = $('.dropdown li').first().addClass('active');
					return false;
				} else {
					var liHeight = $('.dropdown li').outerHeight();
					var position = active.position().top - liHeight - 10;

					if (position < 0) {
						var scrollTop = $('.dropdown').scrollTop();
						$('.dropdown').scrollTop(scrollTop - liHeight);
					}
				}
				$(this).val(active.attr('data-name'));
				break;
			default:
				$('.dropdown').empty();
				var suggestions = filterProducts($(this).val());
				suggestions.map(function (item) {
					$('.dropdown').append('<li class="search-keyword" data-name="' + item.name + '">' + item.name + ' ($' + item.price + ')</li>')
				});

				$('.dropdown').slideDown();
				break;
		}
	})


	$(document).on('click', '.search-keyword', function () {
		$('#searchProduct').val($(this).attr('data-name'));
		$('#submitForm').trigger('submit');
	})

	$('#searchProduct').click(function (e) {
		e.stopPropagation();
	})

	$('body').click(function () {
		$('.dropdown').slideUp(100);
	})

	$(document).on('click', '.view-product', function () {
		var modal = $('.bd-example-modal-lg');
		var product = products[$('.openModal').attr('data-id')];
		modal.find('#name').text(product.name);
		modal.find('#price').text(product.price);
		modal.find('#image').attr('src', product.img);
		modal.modal('show');
	})

	function filterProducts(keyword) {
		var filteredProducst = [];

		products.map(function (item) {
			if (item.name.toLowerCase().indexOf(keyword.toLowerCase()) > -1) {
				filteredProducst.push(item);
			}
		})

		return filteredProducst;
	}

	drawProducts(products);
});