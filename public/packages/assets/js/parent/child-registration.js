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
});