$(document).ready(function () {
$('#images a').click(function(){
var srcNew = $(this).attr('href');
$('#start img').hide().attr('src',srcNew).fadeIn(1500);
return false;
});
});