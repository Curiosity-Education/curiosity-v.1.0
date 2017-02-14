$(function(){

   loginController.formLogin = $("#formLogin");

   $("#btnLogin").click(function() {
      loginController.username = $("#username").val();
      loginController.password = $("#password").val();
      loginController.validAccess();
   });

   $("#username, #password").on('keydown', function(e){ if(e.keyCode == 13){ $("#btnLogin").trigger('click'); } });

	$("#recovery-password").click(function(ev){
   		$("#row-login").hide();
   		$("#row-recovery-password").show();
   		$("#title-header").html("<i class='fa fa-unlock'></i> Recuperar contraseña");
	});
	$("#btn-return-login").click(function(){
		   $("#row-login").show();
   		$("#row-recovery-password").hide();
   		$("#title-header").html("<i class='fa fa-user-circle'></i> Iniciar Sesión");
	});
   $("#btn-recovery").click(function(){
      loginController.recoveryPass();
   });
   $("#frm-recovery-pass").submit(function(ev){
      ev.preventDefault();
      $("#btn-recovery").trigger("click")
   });
   $("#btn-recovery-complete").click(function(ev){
      $("#row-login").show();
      $("#row-recovery-password").hide();
      $("#row-confirmation").hide();
      $("#title-header").html("<i class='fa fa-user-circle'></i> Iniciar Sesión");
   });
})
