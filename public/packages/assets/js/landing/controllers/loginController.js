var loginController = {

   username : null,
   password : null,
   formLogin : null,

   validAccess : function(){
      $("#btnLogin").prop('disabled', true);
      $("#btnLogin").html("<span class='fa fa-spinner fa-pulse'></span>&nbsp; Cargando");
      if (this.username != "" && this.password != ""){
         $.ajax({
            url: 'logIn',
            type: 'POST',
            dataType: 'JSON',
            data: {
               username : this.username,
               password : this.password
            }
         })
         .done(function(response) {
            switch (response.status) {
               case 200:
                  window.location.href = response.data;
                  break;
               case "CU-105":
                  Curiosity.noty.info("Lo sentimos tu cuenta a expirado. Renueva cuanto antes y sigue disfrutando de nuestro contenido.");
                  $("#btnLogin").html("Iniciar");
                  $("#btnLogin").prop('disabled', false);
                  break;
               case "CU-106":
                  Curiosity.noty.info("Los datos de accesso que ingresaste son incorrectos, intenta nuevamente", "Datos Erróneos");
                  $("#btnLogin").html("Iniciar");
                  $("#btnLogin").prop('disabled', false);
                  break;
               default:
                  Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
                  $("#btnLogin").html("Iniciar");
                  $("#btnLogin").prop('disabled', false);
                  break;
            }
         })
         .fail(function(error) {
            Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
            console.log(error);
            $("#btnLogin").html("Iniciar");
            $("#btnLogin").prop('disabled', false);
         });
      }
      else{
         Curiosity.noty.info("Por favor ingresa tus datos de accesso");
         $("#btnLogin").html("Iniciar");
         $("#btnLogin").prop('disabled', false);
      }
   },

   logOut : function(){
      window.location.href = "/logout";
   },
   recoveryPass : function(){
      var recoveryUsername = $("#username-recovery").val();
      if(recoveryUsername!=""){   
         $("#btn-recovery").html("<span class='fa fa-spinner fa-pulse'></span>&nbsp; Enviando");
         $("#btn-recovery").prop("disabled",true);
         $.ajax({
            url: 'recoveryPass',
            type: 'POST',
            data: {
               email  : recoveryUsername
            }
         })
         .done(function(response) {
            switch (response.status) {
               case 200:
                  //window.location.href = response.data;
                  console.log(response.message);
                  break;
               case "CU-105":
                  Curiosity.noty.info("Lo sentimos tu cuenta a expirado. Renueva cuanto antes y sigue disfrutando de nuestro contenido.");
                  break;
               case "CU-106":
                  Curiosity.noty.info(response.message, "Ups");
                  break;
               default:
                  Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
                  break;
            }
         })
         .fail(function(error) {
            Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
            console.log(error);
         }).always(function(response){
            $("#btn-recovery").html("continuar");
            $("#btn-recovery").prop("disabled",false);
         });
      }else{
         Curiosity.noty.info("olvidaste ingresar tu correo electronico o nombre de usario","ups");
      }
   }

}
