(function($){

    // تحديث الكمية
    $('.item-quantity').on('change', function() {
        $.ajax({
            url: "/Cart/" + $(this).data('id'),
            method: "PUT",
            data: {
                quantity: $(this).val(),
                _token: csrf_token
            },
            success: function(res) {
                console.log('Quantity updated', res);
            },
            error: function(err) {
                console.error(err);
            }
        });
    });

    // حذف العنصر
    $('.remove-item').on('click', function() {
        $.ajax({
            url: "/Cart/" + $(this).data('id'),
            method: "DELETE",
            data: {
                _token: csrf_token
            },
            success: function(res) {
                console.log('Item removed', res);
                // يمكنك إعادة تحميل الصفحة أو إزالة العنصر من DOM
            },
            error: function(err) {
                console.error(err);
            }
        });
    });

})(jQuery);
