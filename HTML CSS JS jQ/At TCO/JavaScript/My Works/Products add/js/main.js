$(document).ready(function () {
  var products = [];
  var productCount = 12;
  var deletedCount = 1;
  var availableImages = ['1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png'];
  var availableNames = ['Audemars Piguet', 'Blancpain', 'Cartier', 'Citizen', 'Jaeger-LeCoultre', 'Omega', 'Panerai Luminor', 'Vacheron Constantin', 'Patek Philippe', 'Rolex', 'Cartier', 'Rolex'];
  var productPrice = [8699, 6499, 5199, 9799, 5689, 3499, 2899, 4849, 7599, 8099, 4799, 9899];

  function generateProducts(productCount) {
    for (var i = 0; i < productCount; i++) {
      products.push({
        name: availableNames[i],
        price: productPrice[i],
        img: 'images/' + availableImages[i],
      });
    }
  }

  function drawProducts(products) {
    productCount = 12;
    deletedCount = 1;
    $('#products').empty();
    products.map(function (item) {
      $('#products').append('<div class="parentForHide"><div class=porductInfo><div class="info-paragraph"><p>A watch is a timepiece intended to be carried or worn by a person. It is designed to keep working despite the motions caused by the person\'s activities.</p></div></div><img src="' + item.img + '" /><div class="info"><p class="product-name">Name: <strong>' + item.name + '</strong></p><p>Price: <strong>' + item.price + '$</strong></p></div></div>');
    });
    $('#products>div').append('<div class="settings clearfix"><div><i class="far fa-edit edit-icon"></i></div><div><i class="far fa-trash-alt delete-icon"></i></div></div>');
    $('.result strong').text(products.length);
  }

  $('#submitForm').submit(function (event) {
    event.preventDefault();
    drawProducts(filterProducts($('#searchProduct').val()));
  })

  function filterProducts(keyword) {
    var filteredProducts = [];
    products.map(function (item) {
      if (item.name.toLowerCase().indexOf(keyword.toLowerCase()) > -1) {
        filteredProducts.push(item);
      }
    })
    return filteredProducts;
  }

  $(document).on('click', '.delete-icon', function () {
    var deleteProductQuestion = confirm("Delete this product?");
    if (deleteProductQuestion == true) {
      $(this).closest('.parentForHide').hide();
      $('.result strong').html(--productCount + ' ( Deleted: ' + deletedCount++ + ' )' + "<button class='resetDeleted'>Reset</button>");
    }
  })

  $(document).on('click', '.resetDeleted', function () {
    drawProducts(products);
  })

  $(document).on('keyup', '#searchProduct', function () {
    var same = filterProducts($(this).val());
    if (same.length == 12) {
      $('.dropdown').hide();
    } else {
      $('.dropdown').show();
      $('.dropdown').empty();
      same.map(function (item) {
        $('.dropdown').append('<li class="list-item">' + item.name + ' ($' + item.price + ')</li>')
      });
    }
  })

  $(document).on('click', '.edit-icon', function () {
    var parentDiv = this.closest('.parentForHide');
    console.log(parentDiv);
    $('.bd-example-modal-lg').modal('show');
  })

  generateProducts(productCount);
  drawProducts(products);

  $('.spanForPorc').closest('.divForPorc').find('.paraForPorc').css('color', 'red');
});