$(document).ready(function () {
  var myDiv = $('#images');
  myDiv.css({
    'border': '2px solid gray'
  })
  myDiv.before('<p>before()-i mijocov dravac text</p>');
  myDiv.after('<p>after()-i mijocov dravac text</p>');
  myDiv.prepend('<p>prepend()-i mijocov dravac text</p>');
  myDiv.append('<p>append()-i mijocov dravac text</p>');


});