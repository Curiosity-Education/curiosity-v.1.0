$(function(){

   $(".aint-btnConf").click(function(){ $("#aint-modal").modal("show"); });

   aintController.getLevels();

   $("#aint_lvlSel").on("change", function(){
      aintController.getIntelligences($(this).val());
   });

   $("#aint-btnNew").click(function(){
      $("#aint-modal").modal("show");
      aintController.setTypeOfSave("save");
   });

   $("#aint-form").submit(function(e){
      e.preventDefault();
   });

   $("#aint-save").click(function(){ aintController.save(); });
   $("#aint_name").on('keydown', function(e){ if(e.keyCode == 13){ aintController.save(); } });

   $("body").on("click", ".aint-btnConf", function(){
      $("#aint-modal").modal("show");
      aintController.setTypeOfSave("update");
      aintController.setId($(this).data("dti"));
      $("#aint_name").val($(this).data("dtn"));
      $("#aint_descript").val($(this).data("dtd"));
   });

   $("body").on("click", ".aint-btnDel", function(){
      aintController.setId($(this).data("dti"));
      aintController.delete();
   });

   $("#aint-cancel").click(function(){
      aintController.clearInputs();
   });

});
