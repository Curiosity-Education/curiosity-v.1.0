var confController = {

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
                  if ($("#ca-npass").val().length < 8){
                     Curiosity.noty.info("La nueva contraseña debe contener almenos 8 caracteres", "Nota");
                  }
                  else {
                     $("#ca-saveConf").prop('disabled', true);
                     $("#ca-cancelConf").prop('disabled', true);
                     $("#ca-saveConf").html("<span class='fa fa-spinner fa-pulse'></span>");
                     var data = {
                        username    : $("#ca-userName").val(),
                        pass        : $("#ca-pass").val(),
                        npass       : $("#ca-npass").val(),
                        cpass       : $("#ca-cpass").val()
                     };
                     Child.updateConf(data, "POST", this.successConf);
                  }
               }
            }
         }
         else {
            $("#ca-saveConf").prop('disabled', true);
            $("#ca-cancelConf").prop('disabled', true);
            $("#ca-saveConf").html("<span class='fa fa-spinner fa-pulse'></span>");
            var data = {
               username    : $("#ca-userName").val(),
               pass        : null,
               npass       : null,
               cpass       : null
            };
            Child.updateConf(data, "POST", this.successConf);
         }
      }
      else{
         Curiosity.noty.info("No puedes dejar el nombre de usuario vacio", "Nota");
      }
   },

   successConf : function(response){
      switch (response["status"]) {
         case 200:
            $("#ca-titileConf").trigger('click');
            $(".masterUserName").text(response["data"]["username"]);
            Curiosity.noty.success("Datos de usuario guardados correctamente", "Bien hecho");
         break;
         case 'CU-104':
            Curiosity.noty.success("La contraseña actual que ingresaste es incorrecta", "Atención");
         break;
         default:
            Curiosity.noty.error("Por favor vuelv a intentarlo en unos momentos", "Falló la conexión");
         break;
      }
      $("#ca-saveConf").prop('disabled', false);
      $("#ca-cancelConf").prop('disabled', false);
      $("#ca-saveConf").html("Guardar");
   },

   saveGoal : function(){
      var isActive = false;
      $.each($(".ca-box"), function(index, el) {
         if ($(".ca-box").hasClass('ca-boxActive')){
            isActive = true;
         }
      });
      if (isActive){
         $("#ca-saveGoal").prop('disabled', true);
         $("#ca-cancelGoal").prop('disabled', true);
         $("#ca-saveGoal").html("<span class='fa fa-spinner fa-pulse'></span>");
         DailyGoal.updateConf($(".ca-boxActive").data('data'), "POST", this.successGoal);
         DailyGoal.getChildSelected(function(response){ StorageDB.table.create("childgoal", response["data"]); });
      }
      else {
         Curiosity.noty.info("Para cambiar de meta diaria primero selecciona la que desees", "Información");
      }
   },

   successGoal(response){
      switch (response["status"]) {
         case 200:
            $("#ca-img-goal").attr("src", $(".ca-boxActive > center > img").attr('src'));
            $("#ca-tit-goal").text($(".ca-boxActive > h6 > span").text());
            $("#ca-cancelGoal").trigger('click');
            Curiosity.noty.success("Meta diaria guardada correctamente", "Bien hecho");
         break;
         default:
            Curiosity.noty.error("Por favor vuelv a intentarlo en unos momentos", "Falló la conexión");
         break;
      }
      $("#ca-saveGoal").prop('disabled', false);
      $("#ca-cancelGoal").prop('disabled', false);
      $("#ca-saveGoal").html("Guardar");
   }

}
