$(document).ready(function () {
    $('input[name=email]').focus(function () {
        $(this).css({
            'border' : '1px solid #555',
            'outline': '0'
        });
    }).blur(function () {
        $(this).css({
            'border' : '1px solid #ccc'
        });
    });
});