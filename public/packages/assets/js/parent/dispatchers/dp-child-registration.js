$(function(){

  var tempSons, tempId;

  childRegistrationCrtrl.getSons(function(sons){
    if (sons != null || sons != "") {
      sonsInfo(sons);
      //Initializing carousel´s children
      $(".carousel").carousel();
      /*
      |--------------------------------------------------------------------------
      | managent of steps for registrate the children
      |--------------------------------------------------------------------------
      | in this section of code, we manage the steps for register the children
      | show and hide steps
      |
      */
      $(".carousel a").last().trigger('click');
    } else {
      $("#upch-contentInfo").hide();
      $(".carousel").append($(
        "<h4 class='h5-responsive'>Por favor, registra a tu hijo y forma parte de la familia Curiosity.</h4>"
      ));
    }

  });

  $("body").on('click', ".carousel-item", function(){
    tempId = $(this).data('id');
  });

  $("#upch-btnDelete").on('click',function(){
		childRegistrationCrtrl.delete(tempId);
    $(".carousel").empty();
    $(".carousel").removeClass("initialized");

    childRegistrationCrtrl.getSons(function(sons){
      if (sons != null || sons != "") {
        sonsInfo(sons);
        //Initializing carousel´s children
        $(".carousel").carousel();
        /*
        |--------------------------------------------------------------------------
        | managent of steps for registrate the children
        |--------------------------------------------------------------------------
        | in this section of code, we manage the steps for register the children
        | show and hide steps
        |
        */
        $(".carousel a").last().trigger('click');
      } else {
        $("#upch-contentInfo").hide();
        $(".carousel").append($(
          "<h4 class='h5-responsive'>Por favor, registra a tu hijo y forma parte de la familia Curiosity.</h4>"
        ));
      }
    });
	});

});

function sonsInfo(object){
  $.each(object,function(i,o){
    $.each(o,function(j,obj){
      $(".carousel").append($(
        "<a href='javascript:void(0)' class='carousel-item' data-id='" + obj.id + "'>" +
         "<div class='itemCarousel'>" +
            "<img src='" + obj.photoProfile + "'>" +
            "<h6 class='h6-responsive text-xs-center'>" + obj.nombre_completo + "</h6>" +
        "</div>" +
        "</a>"
      ));
    });
  });
}
