var loginController = {

   username : null,
   password : null,
   formLogin : null,

   validAccess : function(){
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
            console.log(response);
            switch (response.status) {
               case 200:
                  window.location.href = response.data;
                  break;
               case "CU-105":
                  Curiosity.noty.info("Lo sentimos tu cuenta a expirado. Renueva cuanto antes y sigue disfrutando de nuestro contenido.");
                  break;
               case "CU-106":
                  Curiosity.noty.warning("Los datos de accesso que ingresaste son incorrectos, intenta nuevamente", "Datos Erróneos");
                  break;
               default:
                  Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
                  break;
            }
         })
         .fail(function(error) {
            Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
            console.log(error);
         });
      }
      else{
         Curiosity.noty.info("Por favor ingresa tus datos de accesso");
      }
   },

   logOut : function(){
      window.location.href = "logout";
   }

}
