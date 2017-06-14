$(function(){

   $("#ca-saveConf").click(function() {
      confController.saveConf();
   });

   $("#ca-titileConf").click(function(event) {
      $(".form-control").val("");
      $("#ca-userName").val($(".masterUserName").first().text());
   });

   $("#ca-cancelConf").click(function(event) {
      $("#ca-titileConf").trigger('click');
   });

   $(".ca-box").click(function(event) {
      $.each($(".ca-box"), function(index, el) {
         $(".ca-box").removeClass('ca-boxActive');
      });
      $(this).addClass('ca-boxActive');
   });

   $("#ca-saveGoal").click(function(event) {
      confController.saveGoal();
   });

   $("#ca-cancelGoal").click(function(event) {
      $.each($(".ca-box"), function(index, el) {
         $(".ca-box").removeClass('ca-boxActive');
      });
   });

});
