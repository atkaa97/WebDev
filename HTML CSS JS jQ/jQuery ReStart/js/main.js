// function reMargin() {
//     $(".box").animate({ marginBottom: '190px' }, 2000);
// }
// $(".box").animate({ marginBottom: '100px' }, 1000, reMargin());

// $('.box').css({
//     'border': '5px solid #555'
// })

// $('.box').before('before method');
// $('.box').after('after method');
// $('.box').prepend('prepend method');
// $('.box').append('append method');

// $('li').each(function () {
//     $(this).animate({
//         fontSize: '22px'
//     }, 1000)
// })

// var myTag = $('img');
// alert(myTag.get(0));

// console.log(myTag[2].src);

$('.images img').on('click', function () {
    $('.images').append($(this).clone());
});