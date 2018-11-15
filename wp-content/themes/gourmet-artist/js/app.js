jQuery(document).foundation();
jQuery(function($){
    $('#platillos > div').not(':first').hide();
    $('#filtrar .menu li:first-child').addClass('active');
    
    $('#filtrar .menu a').on('click',function(){
        $('#filtrar .menu li').removeClass('active');
        $(this).parent().addClass('active');
        var enlace = $(this).attr('href');
        $('#platillos > div').hide();
        $(enlace).fadeIn();
        return false;
    });
});
