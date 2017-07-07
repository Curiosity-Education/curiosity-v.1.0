$(function(){

	var $navbar = $('.navbar');
    var heightNav = $navbar.height();
    var heightInit = ((heightNav)/2)/2;
    new WOW().init();

    if($(window).width() >= 768)
    {
        $navbar.find('a').css({'margin-top': heightInit+'px','transition':".6s"});
        $navbar.height(heightNav+20);
    }
    $(window).scroll(function(){
        if($(window).width() >= 768){
            if($(window).scrollTop() >= ($("#video-carousel-example").height()/1.17)){
                $navbar.height(heightNav);
                $navbar.removeClass('navbar_inicio');
                $navbar.addClass('bg-navbar');
                $navbar.find('a').css({'margin-top': (heightInit-15)+'px'});
            }
            else{
                $navbar.height(heightNav+20);
                $navbar.addClass('navbar_inicio');
                $navbar.removeClass('bg-navbar');

                $navbar.find('a').css({'margin-top': (heightInit)+'px'});
            }
        }
    });
});