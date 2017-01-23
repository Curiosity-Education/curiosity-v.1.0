$(function(){

   aempController.getPositions();
   aempController.photoUrl  = "/packages/assets/media/images/employees/";
   aempController.photoDef  = "employeeDef.png";
   aempController.formulary = $("#aemp-form");
   aempController.formularyFile = $("#aemp-formPhoto");

   $("#aemp_posSel").on("change", function(){
      aempController.getEmployees($(this).val());
   });

   $("#aemp-btnNew").click(function(){
      aempController.clearInputs();
      $("#aemp_ph").attr("src", aempController.photoUrl+""+aempController.photoDef);
      aempController.typeOfSave = "save";
      $("#aemp-modal").modal("show");
   });

   $("#aemp-resetPhoto").click(function() {
      aempController.resetImage();
   });

   $("#aemp-selectPhoto").click(function(){
      $("#aemp_photo").trigger("click");
   });

   $("#aemp_photo").change(function(){
      aempController.selectFile($(this));
   });

   $("#aemp-form").submit(function(e){
      e.preventDefault();
   });

   $("#aemp-save").click(function(){ aempController.save(); });
   $("#aemp_name").on('keydown', function(e){ if(e.keyCode == 13){ aempController.save(); } });

   $("body").on("click", ".aemp-btnConf", function(){
      aempController.data = $(this).data("aemp");
      aempController.id  = $(this).data("aemp").id;
      aempController.photo = "/packages/assets/media/images/employees/"+$(this).data("aemp").foto;
      aempController.fillInputs();
      $("#aemp-modal").modal("show");
      aempController.typeOfSave = "update";
   });


   $("body").on("click", ".aemp-btnDel", function(){
      aempController.id = $(this).data("aemp").id;
      aempController.delete();
   });

   $("#aemp-cancel").click(function(){
      aempController.clearInputs();
   });


});
