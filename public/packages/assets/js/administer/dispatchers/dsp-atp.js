$(function(){

   atpController.getLevels();

   $("#atp_lvlSel").on("change", function(){
      atpController.getIntelligences($(this).val());
   });

   $("#atp_intSel").on("change", function(){
      atpController.getBlocks($(this).val());
   });

   $("#atp_blSel").on("change", function(){
      atpController.getTopics($(this).val());
   });

   $("#atp-btnNew").click(function(){
      $("#atp-modal").modal("show");
      atpController.setTypeOfSave("save");
   });

   $("#atp-form").submit(function(e){
      e.preventDefault();
   });

   $("#atp-save").click(function(){ atpController.save(); });
   $("#atp_name").on('keydown', function(e){ if(e.keyCode == 13){ atpController.save(); } });

   $("body").on("click", ".atp-btnConf", function(){
      $("#atp-modal").modal("show");
      atpController.setTypeOfSave("update");
      atpController.setId($(this).data("dti"));
      $("#atp_name").val($(this).data("dtn"));
   });

   $("body").on("click", ".atp-btnDel", function(){
      atpController.setId($(this).data("dti"));
      atpController.delete();
   });

   $("#atp-cancel").click(function(){
      atpController.clearInputs();
   });

});
