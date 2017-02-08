$(function(){

  var tempSons, tempId;

  childRegistrationCrtrl.getSonsInfo(function(sons){
    localStorage.localSons = JSON.stringify(sons);
  });

  tempSons = JSON.parse(localStorage.localSons);

  $.each(tempSons,function(i,o){
    $.each(o,function(j,obj){
      $(".carousel").append($(
        "<a href='javascript:void(0)' class='carousel-item' data-id='" + obj.id + "'>" +
         "<div class='itemCarousel'>" +
            "<img src='/packages/assets/media/images/parents/profile/mom-def.png'>" +
            "<h6 class='h6-responsive text-xs-center'>" + obj.nombre_completo + "</h6>" +
        "</div>" +
        "</a>"
      ));
    });
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

  $(".carousel-item").on('click',function(){
    tempId = $(this).data('id');
  });

  $("#upch-btnDelete").on('click',function(){
		childRegistrationCrtrl.delete(tempId);
	});

});
