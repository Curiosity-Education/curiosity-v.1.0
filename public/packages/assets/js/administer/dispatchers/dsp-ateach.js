$(function(){

   ateachController.getSchools();
   ateachController.getTeachers();

   $("#ateach_lvlSel").on("change", function(){
      ateachController.getIntelligences($(this).val());
   });

   $("#ateach_intSel").on("change", function(){
      ateachController.getBlocks($(this).val());
   });

   $("#ateach_blSel").on("change", function(){
      ateachController.getTopics($(this).val());
   });

   $("#ateach_tpSel").on("change", function(){
      ateachController.getPdfs($(this).val());
   });

   $("#ateach-btnNew").click(function(){
      $("#ateach-modal").modal("show");
      ateachController.setTypeOfSave("save");
   });

   $("#ateach-resetPhoto").click(function() {
      ateachController.resetImage();
   });

   $("#ateach-selectPhoto").click(function(){
      $("#ateach_photo").trigger("click");
   });

   $("#ateach_photo").change(function(){
      ateachController.selectFile($(this));
   });

   $("#ateach-form").submit(function(e){
      e.preventDefault();
   });

   $("#ateach-save").click(function(){ ateachController.save(); });
   $("#ateach_name").on('keydown', function(e){ if(e.keyCode == 13){ ateachController.save(); } });

   $("body").on("click", ".ateach-btnConf", function(){
      ateachController.setData($(this).data("teach"));
      ateachController.setPhoto("/packages/assets/media/images/parents/profile/"+$(this).data("teach").foto);
      ateachController.fillInputs();
      $("#ateach-modal").modal("show");
      ateachController.setTypeOfSave("update");
   });


   $("body").on("click", ".ateach-btnDel", function(){
      ateachController.setId($(this).data("teach").id);
      ateachController.delete();
   });

   $("#ateach-cancel").click(function(){
      ateachController.clearInputs();
   });

});
