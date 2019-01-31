$(document).ready(function () {
// var myBlock = $('#images').clone();
var myBlock = $('#images').remove();
$('#form').after(myBlock);
});