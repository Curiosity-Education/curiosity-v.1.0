$(function(){

   $(".ablk-btnConf").click(function(){ $("#ablk-modal").modal("show"); });
 
   ablkController.getLevels();

   $("#ablk_lvlSel").on("change", function(){
      ablkController.getIntelligences($(this).val());
   });

   $("#ablk_intSel").on("change", function(){
      ablkController.getBlocks($(this).val());
   });

   $("#ablk-btnNew").click(function(){
      $("#ablk-modal").modal("show");
      ablkController.setTypeOfSave("save");
   });

   $("#ablk-form").submit(function(e){
      e.preventDefault();
   });

   $("#ablk-save").click(function(){ ablkController.save(); });
   $("#ablk_name").on('keydown', function(e){ if(e.keyCode == 13){ ablkController.save(); } });

   $("body").on("click", ".ablk-btnConf", function(){
      $("#ablk-modal").modal("show");
      ablkController.setTypeOfSave("update");
      ablkController.setId($(this).data("dti"));
      $("#ablk_name").val($(this).data("dtn"));
   });

   $("body").on("click", ".ablk-btnDel", function(){
      ablkController.setId($(this).data("dti"));
      ablkController.delete();
   });

   $("#ablk-cancel").click(function(){
      ablkController.clearInputs();
   });

   $("#ablk-open").click(function() {
      $("#ablk_logo").trigger('click');
   });

   $("#ablk_logo").change(function() {
      ablkController.selectFile($(this));
   });

});
