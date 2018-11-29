jQuery(document).foundation();
jQuery(function ($) {

    //Buscador desde input
    $('#btn_buscar').on('click', function () {
        
        $('#resultado').html('');
        
        var termino = $('#buscar').val();
        var precio = $('#precio').val();
        var tipo = $('#tipo').val();
        var calorias = $('#calorias').val();
        
//        alert(termino);
        var postData = {
            action: 'buscarResultados',
            buscar: termino,
            precio: precio,
            tipo: tipo,
            calorias: calorias
        }
        jQuery.ajax({
            url: admin_url.ajax_url,
            type: 'post',
            data: postData
        }).done(function(responce){
            $.each(responce, function(index,object){
                var resultado = '<div class="row">';
                resultado += '<div class="medium-4 small-12 columns">';
                resultado += object.imagen;
                resultado += '</div>';//medium-4
                resultado += '<div class="medium-8 columns contenido">';                
                resultado += '<h3 class="text-center">';
                resultado += '<a href="'+object.link+'">';
                resultado += object.nombre;
                resultado += '</a>';
                resultado += '</h3>';                
                resultado += '<p>'+object.contenido+'</p>';                                
                resultado += '<a class="button" href="'+object.link+'">Leer más</a>';                
                resultado += '</div>';//medium-8
                resultado += '</div>';
                
                $('#resultado').append(resultado);
            });
        });
    });

    if ($('.filtro-contenido').length) {
        $('.filtro-contenido').filterizr();
    }

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
