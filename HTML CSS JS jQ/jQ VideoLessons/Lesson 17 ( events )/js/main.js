$(document).ready(function () {
  // $('#images img:first').click(function () {
  //   alert('ok')
  // }); 
  $('#images img').click(function () {
    var myTag = $(this).clone();
    $('#results').append(myTag); 
  }); 
});