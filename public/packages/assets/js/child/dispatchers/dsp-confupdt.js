$(function(){

   $("#ca-saveConf").click(function() {
      confController.btnSave = $(this);
      confController.btnCancel = $("#ca-cancelConf");
      confController.saveConf();
   });

});
