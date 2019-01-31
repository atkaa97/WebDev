$(document).ready(function () {
  $('#btnFadeOut').click(function () {
    $('#box').fadeOut('fast', function () {
      $('#btnFadeOut').text('Its Gone');
    });
  })
  $('#btnFadeIn').click(function () {
    $('#box').fadeIn('fast', function () {
      $('#btnFadeIn').text('Its Came');
    });
  })
  $('#btnFadeTog').click(function () {
    $('#box').fadeToggle('fast');
  })

  $('#btnSlideUp').click(function () {
    $('#box').slideUp('fast');
  })
  $('#btnSlideDown').click(function () {
    $('#box').slideDown('fast');
  })
  $('#btnSlideTog').click(function () {
    $('#box').slideToggle(3000);
  })
  $('#btnStop').click(function () {
    $('#box').stop();
  })

  $('#moveRight').click(function () {
    $('#box2').animate({
      left: 500,
      height: '60px',
      width: '60px',
      opacity: '0.5'
    })
  })

  $('#moveLeft').click(function () {
    $('#box2').animate({
      left: 0,
      height: '100px',
      width: '100px',
      opacity: '1'
    })
  })

  $('#moveAround').click(function () {
    var box = $('#box2');
    box.animate({
      left: 300
    })
    box.animate({
      top: 300
    })
    box.animate({
      left: 0,
      top: 300
    })
    box.animate({
      left: 0,
      top: 0
    })
  })
});