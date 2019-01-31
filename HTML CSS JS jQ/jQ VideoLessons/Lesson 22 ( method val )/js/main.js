$(document).ready(function () {
    $('#get-value').click(function () {
        // alert($("textarea").val());
        // $("textarea").val('nor arjeq');
        // alert($("input[name=email]").val());
        $(':checkbox:checked').each(function () {
            alert($(this).val());
        });
    });
});