$(function(){

   var alev = new alevController();

   $("body").on("click", ".alev-btnConf", function(){
      $("#alev-modal").modal("show");
      alev.setTypeOfSave("update");
      alev.setLevelId($(this).data("dti"));
      $("#alev_name").val($(this).data("dtn"));
   });

   $("#alev-btnNew").click(function(){
      $("#alev-modal").modal("show");
      alev.setTypeOfSave("save");
   });

   $("#alev-save").click(function(){ alev.save(); });
   $("#alev_name").on('keydown', function(e){ if(e.keyCode == 13){ alev.save(); } });

   $("#alev-form").submit(function(e){
      e.preventDefault();
   });

   alev.getAll();

});
