$(function(){
    var prefix = "parent";

    parentController.getPlan(localStorage.getItem('plan-user-selected'));
    $("#pay-button").click(function(){
       if(localStorage.getItem('plan-user-selected') != null || localStorage.setItem('plan-user-selected') != ''){
         $("#pay-button").prop("disabled",true);
         parentController.payment();
       }
    });

   $("#"+prefix+"-form").submit(function(e){
      e.preventDefault();
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
