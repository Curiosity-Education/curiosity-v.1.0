$(function(){

   loginController.formLogin = $("#formLogin");

   $("#btnLogin").click(function() {
      loginController.username = $("#username").val();
      loginController.password = $("#password").val();
      loginController.validAccess();
   });

   $("#username, #password").on('keydown', function(e){ if(e.keyCode == 13){ $("#btnLogin").trigger('click'); } });

})
