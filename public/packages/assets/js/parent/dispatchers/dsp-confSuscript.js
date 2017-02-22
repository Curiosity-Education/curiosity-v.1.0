$(function(){

   parentGlobalController.suscription.status();

   var title = "Pausar Suscripción";
   var message1 = "<p>"+
      "<b>Estas a punto de pausar tu suscripción a Curiosity Educación.</b><br>Una vez que presiones en el botón de CONTINUAR tu suscripción a Curiosity se pausará y el cobro a tu tarjeta no será realizado, por lo cual todas las cuentas para tus hijos no contarán con acceso a la plataforma.<br><br>Puedes reactivar tu suscripción solo iniciando sesión y dentro de esta misma sección dar clic en el botón de Reactivar.<br><br><b>Nota: </b>Al reactivar tu suscripción las cuentas de tus hijos se reactivarán automáticamente."+
   "</p>"+
   "<div class='text-right'>"+
      "<br><br>"+
      "<button type='button' data-dismiss='modal' aria-hidden='true' class='btn btn-rounded' style='background-color: #ed6922;"+    "padding-left:2.5rem;padding-right: 2.5rem;' id='mvp-cancelchange'>Cancelar</button>"+
      "<button type='button' class='btn btn-rounded' style='background-color:#2262ae;' id='mvp-continue'>Continuar</button>"+
   "</div>";

   var message2 = "<p>"+
      "<b>Estas a punto de reactivar tu suscripción a Curiosity Educación.</b><br>Una vez que presiones en el botón de CONTINUAR tu suscripción a Curiosity se reactivará y el cobro a tu tarjeta se realizará en la fecha establecida, por lo cual todas las cuentas para tus hijos contarán nuevamente con acceso a la plataforma."+
   "</p>"+
   "<div class='text-right'>"+
      "<br><br>"+
      "<button type='button' data-dismiss='modal' aria-hidden='true' class='btn btn-rounded' style='background-color: #ed6922;"+    "padding-left:2.5rem;padding-right: 2.5rem;' id='mvp-cancelchange'>Cancelar</button>"+
      "<button type='button' class='btn btn-rounded' style='background-color:#2262ae;' id='mvp-continue'>Continuar</button>"+
   "</div>";

   $(".suscription_gst").click(function(){
      switch($(".suscription_gst").data('action')){
         case 'pause':
         Curiosity.windowMessage(title, message1);
         break;
         case 'resume':
         Curiosity.windowMessage(title, message2);
         break;
      }
   });

   $("body").on('click', '#mvp-continue', function() {
      switch($(".suscription_gst").data('action')){
         case 'pause':
         parentGlobalController.suscription.pause();
         break;
         case 'resume':
         parentGlobalController.suscription.resume();
         break;
      }
   });;

});
