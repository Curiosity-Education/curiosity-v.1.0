$(function(){
    //Initializing carousel´s children
    $(".carousel").carousel();
    /*
    |--------------------------------------------------------------------------
    | managent of steps for registrate the children
    |--------------------------------------------------------------------------
    | in this section of code, we manage the steps for register the children
    | show and hide steps
    |
    */
    $(".btn-next").click(function(ev){
   		$("[class*='step-']").removeClass("active");
   		$("[class*='step-2']").addClass("active");
   		$(this).removeClass("btn-next");
   		$(this).addClass("btn-upload-child");
   		$(".btn-cancel").removeAttr("data-card");
      $(".btn-cancel").text("Regresar");
      $(this).text("registrar");
    });

    $(".btn-upload-child").click(function(ev){
    	alert("desea registrar este mocoso?");
    });

    $(".btn-cancel").click(function(ev){
    	if($(this).attr("data-card")==undefined){
    		$("[class*='step-']").removeClass("active");
   			$("[class*='step-1']").addClass("active");
   			$(this).attr("data-card","card-1");
        $(this).text("cancelar");
        $(".btn-upload-child").addClass("btn-next").text("Siguiente");
        $(".btn-next").removeClass("btn-upload-child");
    	}else{
        document.getElementById("upch-frm-child").reset();
      }
    });
    /*
    |--------------------------------------------------------------------------
    | end of section for managent registration children steps
    |--------------------------------------------------------------------------
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
