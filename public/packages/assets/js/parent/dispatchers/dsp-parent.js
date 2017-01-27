$(function(){
    var prefix = "parent";

    if(parentController.validPlanSelected() == 1)
        parentController.getPlan(localStorage.getItem('plan-user-selected'));
    else
        parentController.getSons();


    $("#pay-button").click(function(){
        if(parentController.validPlanSelected()){
            $("#pay-button").prop("disabled",true);
            parentController.payment();
        }else{
            Curiosity.noty.info("Aun no haz seleccionado un plan, no puedes realizar esta acción");
        }
    });


    $(".hm-carousel").on('click','.carousel-item',function(){

        parentController.createChartActivities($(this).data('id'),$(this).data('infoActivities'));
        $("#hm-btn-HelpSon").data($(this).data('topicLow'));

    });


   $("#"+prefix+"-save").click(function(){ eval(prefix+"Controller").save(); });

   $("body").on("click", "."+prefix+"-btnConf", function(){
      eval(prefix+"Controller").setId(
          {
              id:$(this).data("dti"),
              reference:$(this).data('reference')
          }
      );
      parentController.openModalUpdate(this);
   });

   $("body").on("click", "."+prefix+"-btnDel", function(){
      eval(prefix+"Controller").setId(
          {
              id:$(this).data("dti"),
              reference:$(this).data('reference')
          }
      );
      eval(prefix+"Controller").delete();
   });

   $("#"+prefix+"-cancel").click(function(){
      eval(prefix+"Controller").clearInputs();
   });



});
