$(function(){

   loginController.formLogin = $("#formLogin");

   $("#btnLogin").click(function() {
      loginController.username = $("#username").val();
      loginController.password = $("#password").val();
      loginController.validAccess();
   });

})
