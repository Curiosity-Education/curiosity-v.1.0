$(function(){

	/*
	|--------------------------------------------------------------------------
	| Gestión de niveles y bloques
	|--------------------------------------------------------------------------
	|
	| En esta sección de codigo se lleva acabo la gestión de visibilidad
	| de niviles y bloques,
	| 
	| 
	*/
	
	$(".btn-inteligent").click(function(){
		if($(this).hasClass("active")){
			$(".row-level").toggle("slow");
			$(this).children(".arrow").toggle();
		}else{
			$(".row-level").show("slow");
			$(".arrow").hide();
			$(this).children(".arrow").show();
		}
		$(".row-bloque").hide("slow");
		$(".btn-inteligent").removeClass("active");
		$(this).addClass("active");
		$(".card-title-level").text($(this).text()+" | Grados");

	});
	$(".btn-level").click(function(){
		$(".row-level").toggle("slow");
		$(".row-bloque").toggle("slow");
		$(".btn-bloque").removeClass("active");
		$(".card-title-bloque").text($(".btn-inteligent.active").text()+" "+$(this).text()+" | bloques");
	});

	$(".btn-bloque").click(function(){
		$(".btn-bloque").removeClass("active");
		$(this).addClass("active");
	});
	$("a.dismiss").click(function(){
		$($(this).data("dismiss-target")).hide("slow");
		$(".arrow").hide();
		$(".btn-inteligent").removeClass("active");
	});
	
	$("body,html").keyup(function(evt){
		if(evt.keyCode==27){
			$("a.dismiss").trigger("click");
		}
	});
	/*
	|--------------------------------------------------------------------------
	| Objeto del modulo correspondiente
	|--------------------------------------------------------------------------
	|
	| Este objeto de dicho modulo contendrá las funciones necesarioas
	| para la iteraccion del usuario con dicho modulo
	| 
	| 
	*/

});