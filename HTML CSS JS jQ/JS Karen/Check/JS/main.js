var divAmount, addToDivContent="";

$("#my_add_btn").click(function(){
    divAmount = $("#div_amount").val();
    for (i = 0; i < divAmount; i++) {
    addToDivContent += '<div class="mini_div" ><input type="checkbox" class="mini_chbx"></div>'}
    $("#add_to").html(addToDivContent);
    $("#main_chbx").add("#my_remove_btn").css("display","inline-block")
    $("#div_amount").val(""); addToDivContent = "";
})

$('#main_chbx').click(function(){
    if ($('#main_chbx').is(":checked")) {
        $('.mini_chbx').prop('checked',true)
    }else{
        $('.mini_chbx').prop('checked',false)
    }
})

$('#my_remove_btn').click(function(){
    $("#question").css("display","block")
    $("#main").css("display","none")
    $('#no').click(function(){
        $("#question").css("display","none")
        $("#main").css("display","block")
    })
    $('#yes').click(function(){
        $("#question").css("display", "none")
        $("#main").css("display", "block")
        $('.mini_chbx').each(function() { 
            if($(this).is(':checked')) {
                $(this).parent('div').remove()
            }        
        })
    })
})

