$(function(){

  var tempSons;

  childRegistration.getSons(function(sons){
    localStorage.localSons = JSON.stringify(sons);
  });

  tempSons = JSON.parse(localStorage.localSons);

  $.each(tempSons.sons,function(i){
    $(".carousel").append($(
      "<a href='javascript:void(0)' class='carousel-item'>" +
       "<div class='itemCarousel'>" +
          "<img src='/packages/assets/media/images/parents/profile/mom-def.png'>" +
          "<h6 class='h6-responsive text-xs-center'>" + tempSons.sons[i].nombre_completo + "</h6>" +
      "</div>" +
      "</a>"
    ));
  });

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
