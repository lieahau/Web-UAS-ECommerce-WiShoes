$(document).ready(function(){
    // DROPDOWN SIZE
    $(".dropdown-menu-size li a").click(function(){
        $(this).parents('.dropdown-size').find('.dropdown-toggle').html($(this).text());
        $('#btn-cart').removeAttr('disabled');
    });

    // SLIDER QUANTITY
    $('#qtyVal').html($('.slider-qty').val());
    $('.slider-qty').on('input', function () {
        $('#qtyVal').html($(this).val());

    });

})