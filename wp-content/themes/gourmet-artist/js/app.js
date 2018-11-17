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


    var fecha = new Date();
    var hora = fecha.getHours();
    if (hora < 10) {
        var comida = "desayuno";
    } else if (hora >= 10 && hora <= 17) {
        var comida = "comida";
    } else {
        var comida = "cena";
    }


    jQuery.ajax({
        url: admin_url.ajax_url,
        type: 'post',
        data: {
            action: 'recetas_comer',
            tipocomida: comida
        }
    }).done(function (response) {
        $('#hora').append(comida);
//        console.log(response);
        $.each(response, function (index, object) {
            var plato_hora = '<li class="medium-4 small-12 columns">' +
                    object.imagen +
                    '<div class="contenido">' +
                    '<h3 class="text-center">' +
                    '<a href="' + object.link + '">' +
                    object.nombre + '</h3>' +
                    '</a>' +
                    '</div>' +
                    '</li>';

            $('#por-hora').append(plato_hora);
        });
    });

});
