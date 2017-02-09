$(function(){

  var tempSons, tempId;

  childRegistrationCrtrl.getSons(function(sons){
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
  });

  $(".carousel-item").on('click',function(){
    tempId = $(this).data('id');
  });

  $("#upch-btnDelete").on('click',function(){
		childRegistrationCrtrl.delete(tempId);
    $(".carousel").empty();
    $(".carousel").removeClass("initialized");

    childRegistrationCrtrl.getSons(function(sons){
      sonsInfo(sons);
      $(".carousel").carousel();
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
