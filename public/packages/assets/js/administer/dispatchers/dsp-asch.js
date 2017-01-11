$(function(){

   // aschController.getLevels();

   $("#asch_lvlSel").on("change", function(){
      // aschController.getIntelligences($(this).val());
   });

   $("#asch_intSel").on("change", function(){
      // aschController.getBlocks($(this).val());
   });

   $("#asch_blSel").on("change", function(){
      // aschController.getTopics($(this).val());
   });

   $("#asch_tpSel").on("change", function(){
      // aschController.getPdfs($(this).val());
   });

   $("#asch-btnNew").click(function(){
      $("#asch-modal").modal("show");
      // aschController.setTypeOfSave("save");
   });

   $("body").on("click", ".asch-btnConf", function(){
      $("#asch-modal").modal("show");
      // aschController.setTypeOfSave("update");
      // aschController.setId($(this).data("dti"));
      $("#asch_name").val($(this).data("dtn"));
   });

   $("#asch-open").click(function(){
      $("#asch_pdf").trigger("click");
   });

   $("#asch_pdf").change(function(){
      // aschController.selectFile($(this));
   });

   $("#asch-form").submit(function(e){
      e.preventDefault();
   });

   // $("#asch-save").click(function(){ aschController.save(); });
   // $("#asch_name").on('keydown', function(e){ if(e.keyCode == 13){ aschController.save(); } });

   $("body").on("click", ".asch-btnDel", function(){
      // aschController.setId($(this).data("dti"));
      // aschController.delete();
   });

   $("#asch-cancel").click(function(){
      // aschController.clearInputs();
   });

});
