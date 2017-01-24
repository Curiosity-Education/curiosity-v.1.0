$(function(){

   ascodeController.formulary = $("#ascode-form");

   ascodeController.getPlans();
   ascodeController.getSalers();
   ascodeController.getCodes();

   $("#ascode-btnNew").click(function(){
      $("#ascode-modal").modal("show");
      ascodeController.typeOfSave = "save";
   });

   $("#ascode-form").submit(function(e){
      e.preventDefault();
   });

   $("#ascode-save").click(function(){ ascodeController.save(); });

   $("body").on("click", ".ascode-btnConf", function(){
      ascodeController.data = $(this).data("ascode");
      ascodeController.id = $(this).data("ascode").codigos_vendedoresID;
      ascodeController.typeOfSave = "update";
      ascodeController.save();
   });


   $("body").on("click", ".ascode-btnDel", function(){
      ascodeController.id = $(this).data("ascode").codigos_vendedoresID;
      ascodeController.delete();
   });

});
