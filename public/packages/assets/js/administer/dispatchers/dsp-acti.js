$(function(){

   actiController.getLevels();

   $("#acti_lvlSel").on("change", function(){
      actiController.getIntelligences($(this).val());
   });

   $("#acti_intSel").on("change", function(){
      actiController.getBlocks($(this).val());
   });

   $("#acti_blSel").on("change", function(){
      actiController.getTopics($(this).val());
   });

   $("#acti_tpSel").on("change", function(){
      actiController.getActivities($(this).val());
   });

   $("#acti-btnNew").click(function(){
      $("#acti-modal").modal("show");
      actiController.setTypeOfSave("save");
   });

   $("#acti-open-game").click(function(){
      $("#game").trigger("click");
   });
   $("#acti-open-wallpaper").click(function(){
      $("#acti_wallpaper").trigger("click");
   });

   $("#game").change(function(){
      var exts = new Array(".zip");
      actiController.selectFile($(this),exts,"#acti_name");
   });

   $("#act_wallpaper").change(function(){
      var exts = new Array(".jpg",".jpeg",".JPG",".png",".PNG");
      actiController.selectFile($(this),exts,"#acti_name_wallpaper");
   });

   $("#acti-form").submit(function(e){
      e.preventDefault();
   });

   $("#acti-table").on('click','.msad-table-btnConf',function(){
       actiController.openModalUpdate(this);
   });

   $("#acti-save").click(function(){ actiController.save(); });
   $("#acti_name").on('keydown', function(e){ if(e.keyCode == 13){ actiController.save(); } });

   $("body").on("click", ".acti-btnDel", function(){
      actiController.setId($(this).data("dti"));
      actiController.delete();
   });

   $("#acti-cancel").click(function(){
      actiController.clearInputs();
   });

   $("input[id^=acti]").keyup(function(){
       if(Curiosity.compareInput(this))
           $("#acti-save").prop('disabled',true);
       else
           $("#acti-save").prop('disabled',false);
   });

    $("select[id^=acti]").change(function(){
       if(Curiosity.compareInput(this))
           $("#acti-save").prop('disabled',true);
       else
           $("#acti-save").prop('disabled',false);
   });

});
