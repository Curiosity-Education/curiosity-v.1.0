$(function(){

	$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");

	new WOW().init();
	// $('a').click(function(e){
	// 	e.preventDefault();
	// 	// window.location = $(this).attr('href');
	// });

	function goSection(ancla){
            $('html,body').animate({scrollTop:$(ancla).offset().top-95},1000);
    }
    function shareSocialNetwork(sn,r,an,al){
        var posicion_x=(screen.width/2)-(an/2);
        var posicion_y=(screen.height/2)-(al/2);
        window.open(sn+r, '_blank', "width="+an+",height="+al+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+""); return false;
    }
    $('.nav-item').on({
        click:function(e){
            e.preventDefault();
            goSection($(this).children('a').attr('href'));
        }
    });
    $('#shareFB').on({
        click:function(){shareSocialNetwork("http://www.facebook.com/sharer.php?u=",$("#videoCU").attr('src'),350,420)}

    });
    $('#shareT').on({
        click:function(){shareSocialNetwork("http://twitter.com/home?status=",$("#videoCU").attr('src'),350,420)}
    });
    var $navbar = $('.navbar');
    var heightNav = $navbar.height();
    var heightInit = ((heightNav)/2)/2;
    if($(window).width() >= 768)
    {
        $navbar.find('a').css({'margin-top': heightInit+'px','transition':".6s"});
        $navbar.height(heightNav+20);
    }
    $(window).scroll(function(){
        if($(window).width() >= 768){
            if($(window).scrollTop() >= ($("#inicio").height()/6)){

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
