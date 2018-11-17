jQuery(document).foundation();
jQuery(function ($) {
    $('#platillos > div').not(':first').hide();
    $('#filtrar .menu li:first-child').addClass('active');

    $('#filtrar .menu a').on('click', function () {
        $('#filtrar .menu li').removeClass('active');
        $(this).parent().addClass('active');
        var enlace = $(this).attr('href');
        $('#platillos > div').hide();
        $(enlace).fadeIn();
        return false;
    });

    jQuery.ajax({
        url: admin_url.ajax_url,
        type: 'post',
        data: {
            action: 'recetas_comer'
        }
    }).done(function (response) {
        console.log(response);
    });

});
