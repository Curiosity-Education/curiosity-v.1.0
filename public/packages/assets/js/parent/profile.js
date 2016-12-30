$(function(){ // this function is ejecuted when document is ready for use for users

	/*
	|--------------------------------------------------------------------------
	| Event click of button editing data
	|--------------------------------------------------------------------------
	| this function is ejecuted for show card where the user(parent) 
	| editing her perfil and where user wath news of curiosity
	| 
	*/
	$("#btn-toggle-cards").click(function(){
		$($(this).data("target")).show();
		if($(this).data("target")=="#card-news"){
			$(this).data("target","#card-data-editing");
			$(this).html("<i class='fa fa-refresh'></i> Editar datos");
			$(this).removeClass("bg-blue");
		}else{
			$(this).data("target","#card-news");
			$(this).html("<i class='fa fa-newspaper-o'></i> Ver novedades");
			$(this).addClass("bg-blue");
		}
		$($(this).data("target")).hide();
	});
});