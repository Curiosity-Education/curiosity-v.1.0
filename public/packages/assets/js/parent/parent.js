$(function(){ //when document is ready this functions will be ejecuted

	/*
	|--------------------------------------------------------------------------
	| Click in button with class .bn-close
	|--------------------------------------------------------------------------
	| when user press in element that this hava class ".bn-close"
	| the banner that have this button, will be closse in this
	| event.
	*/
	$(".bn-close").click(function(ev){
		$($(this).data("target")).hide("slow");
	});

	$("body").on("click", "#parentMenu-addChild", function(){
		Curiosity.goToUrl($(this).data("url"));
	});

    $(".suscription_gst").click(function(){
        switch($(".suscription_gst").data('action')){
            case 'pause':
                parentGlobalController.pause();
                break;
            case 'resume':
                parentGlobalController.resume();
                break;
        }
    });

});
