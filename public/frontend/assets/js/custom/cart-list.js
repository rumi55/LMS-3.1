(function ($) {
    "use strict";
    $('.apply-coupon-code').on('click', function (){
        var cart_id = $(this).data('id');
        var coupon_code = $(".coupon-code-"+cart_id).val();
        var route = $(this).data('route');

        $.ajax({
            type: "POST",
            url: route,
            data: {'id': cart_id, 'coupon_code': coupon_code, '_token': $('meta[name="csrf-token"]').attr('content')},
            datatype: "json",
            success: function (response) {
                toastr.options.positionClass = 'toast-bottom-right';
                if (response.status === 402) {
                    toastr.error(response.msg)
                }
                if (response.status === 401 || response.status === 404 || response.status === 409){
                    toastr.error(response.msg)
                } else if(response.status === 200) {
                    $('.price-'+cart_id).text(response.price);
                    $('.total').text(response.total);
                    $('.platform-charge').text(response.platform_charge);
                    $('.grand-total').text(response.grand_total);
                    toastr.success(response.msg)
                }
            },
            error: function (error) {
                toastr.options.positionClass = 'toast-bottom-right';
                if (error.status === 401){
                    toastr.error("You need to login first!")
                }
                if (error.status === 403){
                    toastr.error("You don't have permission to add course or product!")
                }

            },
        });
    })
})(jQuery)
