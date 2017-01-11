$(function(){

	/*
	|--------------------------------------------------------------------------
	| Click en las cartas de la ventana principal
	|--------------------------------------------------------------------------
	|
	| Al dar click a una carta que se muestra en la ventana principal
	| de la vista del niño, ejecutaremos una función la cual oculta 
	| Toda la sección de las cartas principales y muestra el conteni-.
	| do correspondiente a la carta que el usuario le dió click
	*/

	$(".btn-show-game").click(function(evt){
		$(".row-slide-main").hide("slow")
		$(".panels").hide("slow");
		$("#card-container-games").show("slow");
		$("#card-container-games .card-game>.card-header-game>.dismiss-card").addClass("active");
		$("#card-container-games .card-game").first().find(".card-title").text($(this).parent().children("h3").text());
		$('html,body').animate({scrollTop:0},1000);
	});

	/*
	|--------------------------------------------------------------------------
	| clicik para cerrar ventana
	|--------------------------------------------------------------------------
	|
	| Ventana que se muestra cuando el usuario da click en las cartas
	| de la ventana principal, la cual muestra su correspondiente co-
	| tenido, al dar click en la x de la ventanta, esta se cerrará y
	| mostrará nuevamente las cartas principales
	*/

	$(".dismiss-card").click(function(evt){
		$($(this).data("dismiss-target")).hide("slow");
		$(".row-slide-main").show("slow");
		$(".dismiss-card.active").removeClass("active");
		$(".panels").show("slow");
	});

	$("body").keyup(function(evt){
		if(evt.keyCode==27){
			$(".dismiss-card.active").trigger("click");
		}
	});

	/*
	|--------------------------------------------------------------------------
	| clicik para cerrar ventana
	|--------------------------------------------------------------------------
	|
	| Ventana que se muestra cuando el usuario da click en las cartas
	| de la ventana principal, la cual muestra su correspondiente co-
	| tenido, al dar click en la x de la ventanta, esta se cerrará y
	| mostrará nuevamente las cartas principales
	*/
	
	
});