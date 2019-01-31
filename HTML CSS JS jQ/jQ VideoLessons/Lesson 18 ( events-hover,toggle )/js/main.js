$(document).ready(function () {
  $('#images img').hover(function () {
    $(this).css({'opacity': '0.5'})
  }, function () {
    $(this).css({'opacity': '1'});
  });
  $('#toggle').click(function(){
    $('#form').toggle();
  })
});