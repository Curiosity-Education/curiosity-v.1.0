$(function(){

	/*
	|--------------------------------------------------------------------------
	| area of buttons referents to degrees and inteligent of curiosity
	|--------------------------------------------------------------------------
	|
	| this section is for management the inteligents and degrees, that
	| those are hadled in curiosity
	*/

	$(".btn-inteligent").click(function(){
		if($(this).hasClass("active")){
			$(".row-level").toggle("slow");
			$(this).removeClass("active");
		}else{
			$(".row-level").show("slow");
			$(".btn-inteligent").removeClass("active");
			$(this).addClass("active");
		}
		$(".row-bloque").hide("slow");
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
		$(".btn-inteligent").removeClass("active");
	});

	$("body,html").keyup(function(evt){
		if(evt.keyCode==27){
			$("a.dismiss").trigger("click");
		}
	});
	/*
	|--------------------------------------------------------------------------
	| //.. end to management of inteligent and degrees ..//
	|--------------------------------------------------------------------------
	*/

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
