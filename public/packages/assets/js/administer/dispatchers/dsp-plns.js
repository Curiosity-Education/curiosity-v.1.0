$(function(){
    var prefix = "plns";
    plnsController.getPlans();



   $("#"+prefix+"-btnNew").click(function(){
      $("#"+prefix+"-modal").modal("show");
      eval(prefix+"Controller").setTypeOfSave("save");
   });

   $("#"+prefix+"-form").submit(function(e){
      e.preventDefault();
   });

   $("#"+prefix+"-save").click(function(){ eval(prefix+"Controller").save(); });
   $("#"+prefix+"_name").on('keydown', function(e){ if(e.keyCode == 13){ eval(prefix+"Controller").save(); } });

   $("body").on("click", "."+prefix+"-btnConf", function(){
      eval(prefix+"Controller").setId(
          {
              id:$(this).data("dti"),
              reference:$(this).data('reference')
          }
      );
      plnsController.openModalUpdate(this);
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
