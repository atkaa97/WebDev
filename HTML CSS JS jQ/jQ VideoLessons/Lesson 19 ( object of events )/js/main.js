$(document).ready(function () {
    // $('#images').click(function (event) {
    //     alert(event.screenX);
    // });
    // $('#images').click(function (event) {
    //     alert(event.shiftKey); // ctrl.Key , altKay
    // });
    // $('#images').click(function (event) {
    //     alert(event.target.tagName);
    // });
    // $('#name').click(function (event) {
    //     alert(event.target.value);
    // });
    $( "a" ).click(function ( event ) {
        event.preventDefault();
       $('#results').html($(this).attr('href'));
    });
});