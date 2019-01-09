$ = jQuery.noConflict();
$(document).ready(function () {
    var url_rest = ruta_rest_api.url;

    function scroll_post() {
        var receta_anterior_btn = $('.receta_anterior').last();
        var posicion_scroll = receta_anterior_btn.offset().top - $(window).outerHeight();
        $(window).scroll(function (event) {
            if (posicion_scroll > $(window).scrollTop()) {
                return;
            }           
            $(this).off(event);
            llamar_post();
        });
    }
    scroll_post();

    function llamar_post() {
        var receta_anterior_id = $('.receta_anterior').last().attr('data-receta-anterior');
        var json_url = url_rest +'/'+ receta_anterior_id + '?&_embed=true'; // '?&_embed=true' -> agrega informacion de imagenes
        
        $.ajax({
            dataType: 'json',
            url: json_url
        }).done(function(receta){
//            console.log(receta);
            template_post(receta);
        });
        
        function template_post(receta) {
            var nuevo_post = '<article class="row">'+
                    '<h1 class="entry-title text-center">'+receta.title.rendered+'</h1>'+
                    '<img src="'+receta._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url+'" class="attachment-post-thumbnail size-post-thumbnail">'+
                    '<div>'+
                    '<div>'+
                    '<blockquote>'+receta.ga_receta_meta_informacion['textarea-metabox']+'</blockquote>'+
                    receta.content.rendered+
                    '<a class="receta_anterior" data-receta-anterior="'+receta.ga_receta_anterior+'">'+
                    'Receta Anterior'+
                    '</a>'+
                    '</div>'+
                    '</div>'+
                    '</article>';
                jQuery('article.recetas').append(nuevo_post);
                scroll_post();
        }
    }

});