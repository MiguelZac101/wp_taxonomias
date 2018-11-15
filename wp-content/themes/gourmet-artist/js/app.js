jQuery(document).foundation();
jQuery(function($){
    $('#filtrar .menu a').on('click',function(){
        var enlace = $(this).attr('href');
        $('#platillos > div').hide();
        $(enlace).fadeIn();
        return false;
    });
});
