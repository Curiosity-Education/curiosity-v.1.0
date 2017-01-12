$(function(){

   aschController.getSchools();

   $("#asch-btnNew").click(function(){
      $("#asch-modal").modal("show");
      aschController.setTypeOfSave("save");
   });

   $("body").on("click", ".asch-btnConf", function(){
      $("#asch-modal").modal("show");
      aschController.setTypeOfSave("update");
      aschController.setId($(this).data("asch").id);
      $("#asch_name").val($(this).data("asch").nombre);
   });

   $("#asch-open").click(function(){
      $("#asch_logo").trigger("click");
   });

   $("#asch_logo").change(function(){
      aschController.selectFile($(this));
   });

   $("#asch-form").submit(function(e){
      e.preventDefault();
   });

   $("#asch-save").click(function(){ aschController.save(); });
   $("#asch_name").on('keydown', function(e){ if(e.keyCode == 13){ aschController.save(); } });

   $("body").on("click", ".asch-btnDel", function(){
      // aschController.setId($(this).data("dti"));
      // aschController.delete();
      console.log($(this).data("asch"));
   });

   $("#asch-cancel").click(function(){
      // aschController.clearInputs();
   });

});
