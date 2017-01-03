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
			$(".bg-green").addClass("bg-blue");
			$(".bg-blue").removeClass("bg-green");
		}else{
			$(this).data("target","#card-news");
			$(this).html("<i class='fa fa-newspaper-o'></i> Ver novedades");
			$(".bg-blue").addClass("bg-green");
			$(".bg-green").removeClass("bg-blue");
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

	$(".p-stepper-user>li").click(function(){
		var tab = parseInt($(this).find("span").text());
		moveTab(tab);
	});

	$(".p-btn-update").click(function(){
		alert("se actualizarán los datos los datos");
	});

	function moveTab(tab){//function for move in tabs
		$(".btn-to-move").data("step",tab);
		$("[class*='tab']").removeClass("active");
		$("[class*='tab-"+tab+"']").addClass("active");
		$(".p-stepper-user>li").removeClass("active");
		$.each($(".p-stepper-user>li"),function(index,object){
			if(index==tab-1){
				$(object).addClass("active");
			}
		});//find to step with active for put class active
		if(tab>1){
			$(".btn-return").show();
			$(".btn-next").show();
			$(".btn-return").prop("disabled",false);
		}else{
			$(".btn-next").show();
			$(".btn-return").prop("disabled",true);
		}
		if(tab==$(".p-stepper-user>li").length){
			$(".btn-next").hide();
			$(".p-btn-update").show();
		}else{
			$(".p-btn-update").hide();
		}
	}
	$(".p-item-new").click(function(){
		$("#p-row-main").hide();
		$("#p-row-pdf").show();
		$("#container-baner").hide();
	});

	$("body,html").keyup(function(ev){
		if(ev.keyCode==27){
			$(".dismiss-card").trigger("click");
		}
	});

	$(".dismiss-card").click(function(ev){
		$($(this).data("dismiss-card")).hide();
		$("#container-baner").show();
		$("#p-row-main").show();
	});
});
