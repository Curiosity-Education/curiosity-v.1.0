$(function(){

   albpdfController.getLevels();

   $("#albpdf_lvlSel").on("change", function(){
      albpdfController.getIntelligences($(this).val());
   });

   $("#albpdf_intSel").on("change", function(){
      albpdfController.getBlocks($(this).val());
   });

   $("#albpdf_blSel").on("change", function(){
      albpdfController.getTopics($(this).val());
   });

   $("#albpdf_tpSel").on("change", function(){
      albpdfController.getPdfs($(this).val());
   });

   $("#albpdf-btnNew").click(function(){
      $("#albpdf-modal").modal("show");
      albpdfController.setTypeOfSave("save");
   });

   $("#albpdf-open").click(function(){
      $("#albpdf_pdf").trigger("click");
   });

   $("#albpdf_pdf").change(function(){
      albpdfController.selectFile($(this));
   });

   $("#albpdf-form").submit(function(e){
      e.preventDefault();
   });

   $("#albpdf-save").click(function(){ albpdfController.save(); });
   $("#albpdf_name").on('keydown', function(e){ if(e.keyCode == 13){ albpdfController.save(); } });

   $("body").on("click", ".albpdf-btnDel", function(){
      albpdfController.setId($(this).data("dti"));
      albpdfController.delete();
   });

   $("#albpdf-cancel").click(function(){
      albpdfController.clearInputs();
   });

});
