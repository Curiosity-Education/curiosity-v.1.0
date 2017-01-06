$(function(){

   $("body").on("click", ".alev-btnConf", function(){
      $("#alev-modal").modal("show");
      alevController.setTypeOfSave("update");
      alevController.setLevelId($(this).data("dti"));
      $("#alev_name").val($(this).data("dtn"));
   });

   $("body").on("click", ".alev-btnDel", function(){
      alevController.setLevelId($(this).data("dti"));
      alevController.delete();
   });

   $("#alev-btnNew").click(function(){
      $("#alev-modal").modal("show");
      alevController.setTypeOfSave("save");
   });

   $("#alev-save").click(function(){ alevController.save(); });
   $("#alev_name").on('keydown', function(e){ if(e.keyCode == 13){ alevController.save(); } });

   $("#alev-form").submit(function(e){
      e.preventDefault();
   });

   alevController.getAll();

});
