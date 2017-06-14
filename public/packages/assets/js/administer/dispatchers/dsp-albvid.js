$(function(){

   albvidController.getLevels();
   albvidController.getShools();

   $("#albvid_lvlSel").on("change", function(){
      albvidController.getIntelligences($(this).val());
   });

   $("#albvid_intSel").on("change", function(){
      albvidController.getBlocks($(this).val());
   });

   $("#albvid_blSel").on("change", function(){
      albvidController.getTopics($(this).val());
   });

   $("#albvid_tpSel").on("change", function(){
      albvidController.getVideos($(this).val());
   });

   $("#albvid_school").on("change", function(){
      albvidController.getTeachers($(this).val());
   });

   $("#albvid-btnNew").click(function(){
      $("#albvid-modal").modal("show");
      albvidController.setTypeOfSave("save");
   });

   $("body").on("click", ".albvid-btnConf", function(){
      $("#albvid_school").val($(this).data("vid").escuela_id);
      $("#albvid_school").trigger('change');
      albvidController.setTypeOfSave("update");
      albvidController.setId($(this).data("vid").id);
      albvidController.fillInputs($(this).data("vid"));
      $("#albvid-modal").modal("show");
   });

   $("#albvid-open").click(function(){
      $("#albvid_poster").trigger("click");
   });

   $("#albvid_poster").change(function(){
      albvidController.selectFile($(this));
   });

   $("#albvid-formCode").submit(function(e){
      e.preventDefault();
   });

   $("#albvid-save").click(function(){ albvidController.save(); });
   $("#albvid_name").on('keydown', function(e){ if(e.keyCode == 13){ albvidController.save(); } });

   $("body").on("click", ".albvid-btnDel", function(){
      albvidController.setId($(this).data("vid").id);
      albvidController.delete();
   });

   $("#albvid-cancel").click(function(){
      albvidController.clearInputs();
   });

   $("#albvid_link").keyup(function(){
      if (Curiosity.youtubeEmbed.makeCode($(this).val()) != null){
         $("#albvid_addon span").css('color', 'green');
         $("#albvid_addon span").removeClass('fa fa-times');
         $("#albvid_addon span").addClass('fa fa-check');
         $("#albvid-save").prop('disabled', false);
      }
      else{
         $("#albvid-save").prop('disabled', true);
         $("#albvid_addon span").css('color', 'red');
         $("#albvid_addon span").removeClass('fa fa-check');
         $("#albvid_addon span").addClass('fa fa-times');
      }
   });

   $("body").on('click', '.albvid-btnPlay', function() {
      $("#albvid_embedPrev").attr("src", $(this).data('vid').embed);
      $("#albvid-preview").modal("show");
   });

   $(".albvid-close").click(function() {
      $("#albvid-preview").modal("hide");
      $("#albvid_embedPrev").removeAttr('src');
   });

});
