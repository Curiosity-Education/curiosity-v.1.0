var confController = {

   btnSave : null,
   btnCancel : null,
   classInput : null,

   saveConf : function (){
      if ($("#ca-userName").val() != ""){
         if ($("#ca-pass").val() != "" && $("#ca-npass").val() != ""){
            if ($("#ca-cpass").val() == ""){
               Curiosity.noty.warning("Porfavor confirma la nueva contraseña", "Atención");
            }
            else{
               if ($("#ca-npass").val() != $("#ca-cpass").val()){
                  Curiosity.noty.warning("Las contraseñas no coinciden", "Atención");
               }
               else{
                  var data = {
                     username    : $("#ca-userName").val(),
                     pass        : $("#ca-pass").val(),
                     npass       : $("#ca-npass"),
                     cpass       : $("#ca-cpass").val()
                  };
                  Child.updateConf(data, "POST", this.success);
               }
            }
         }
         else {
            var data = {
               username    : $("#ca-userName").val(),
               pass        : null,
               npass       : null,
               cpass       : null
            };
            Child.updateConf(data, "POST", this.success);
         }
      }
      else{
         Curiosity.noty.info("No puedes dejar el nombre de usuario vacio", "Nota");
      }
   }

   success : function(response){
      console.log(response);
   }

}
