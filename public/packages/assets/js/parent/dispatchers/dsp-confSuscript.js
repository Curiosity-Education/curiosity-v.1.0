$(function(){

   parentGlobalController.suscription.status();

   var title = "Pausar Suscripción";
   var message1 = "<p>"+
      "Estas a punto de pausar<br><br>"+
   "</p>"+
   "<div class='text-right'>"+
      "<br><br>"+
      "<button type='button' data-dismiss='modal' aria-hidden='true' class='btn btn-rounded' style='background-color: #ed6922;"+    "padding-left:2.5rem;padding-right: 2.5rem;' id='mvp-cancelchange'>Cancelar</button>"+
      "<button type='button' class='btn btn-rounded' style='background-color:#2262ae;' id='mvp-continue'>Continuar</button>"+
   "</div>";

   var message2 = "<p>"+
      "Estas a punto de renaudar<br><br>"+
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
      $(this).prop('disabled', true);
      $(this).html("<i class='fa fa-spinner'></i>");
      $("body").find('#mvp-cancelchange').prop('disabled', true);
      switch($(".suscription_gst").data('action')){
         case 'pause':
         parentGlobalController.suscription.pause();
         break;
         case 'resume':
         parentGlobalController.suscription.resume();
         break;
      }
      $(this).html("Continuar");
      $(this).prop('disabled', false);
      $("body").find('#mvp-cancelchange').prop('disabled', false);
   });;

});
