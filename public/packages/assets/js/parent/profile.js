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
	/*
	|--------------------------------------------------------------------------
	| Event click of button update perfio
	|--------------------------------------------------------------------------
	| this event function is ejecuted for to move en perfil tabs
	| and update perfil
	| 
	*/
	$(".btn-to-move").click(function(ev){
		var tab;
		if($(this).hasClass("btn-next")){//if btn has class btn-next move to fron
			tab = parseInt($(this).data("step"))+1;	
		}else{//move to back
			tab = parseInt($(this).data("step"))-1;	
		}
		moveTab(tab);
	});
	$(".upch-stepper-user>li").click(function(){
		var tab = parseInt($(this).find("span").text());
		moveTab(tab);

	});

	function moveTab(tab){//function for move in tabs
		$(".btn-to-move").data("step",tab);
		$("[class*='tab']").removeClass("active");
		$("[class='tab-"+tab+"']").addClass("active");
		$(".upch-stepper-user>li").removeClass("active");
		$.each($(".upch-stepper-user>li"),function(index,object){
			if(index==tab-1){
				$(object).addClass("active");
			}
		})//find to step with active for put class active
		if(tab>1){
			$(".btn-return").show();
			$(".btn-next").show();
		}else{
			$(".btn-next").show();
			$(".btn-return").hide();
		}
		if(tab==$(".upch-stepper-user>li").length){
			$(".btn-next").hide();
			$(".upch-btn-update").show();
		}else{
			$(".upch-btn-update").hide();
		}
	}
});