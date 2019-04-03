$(document).ready(function () {
    $(document).on('click', '.delete-user', function () {
        let _this = $(this),
            user_id = _this.attr('data-id'),
            page = _this.attr('data-page');
        if (confirm("Are you sure to remove")) {
            $.ajax({
                method: "POST",
                url: "/user/delete",
                data: {id: user_id},
                success: function (data) {
                    alert(JSON.parse(data).message);
                    if (page === 'show') {
                        window.location.href = '/user';
                    } else {
                        _this.closest('tr').fadeOut(500);
                        setTimeout(function () {
                            _this.closest('tr').remove();
                        }, 600);
                    }
                },
                error: function (data) {
                    alert(JSON.parse(data.responseText).message)
                }
            });
        }
    });
});