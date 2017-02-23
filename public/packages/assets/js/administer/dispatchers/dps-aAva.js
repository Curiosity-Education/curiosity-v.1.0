$(function(){

  var tempAvatars;

  avatar.getAvatars(function(avatars){
    localStorage.localAvatars = JSON.stringify(avatars);
  });

  tempAvatars = JSON.parse(localStorage.localAvatars);
  console.log(tempAvatars);

  $.each(tempAvatars,function(i){
    $("#adAv-avatars-container").append($(
      "<div class='col-md-3 col-xs-12 col-sm-6 view'>" +
       "<div class='card view overlay'>" +
          "<div class='card-block adAv-adjust'>" +
            "<img src='/packages/assets/media/images/avatar/sprites/" + tempAvatars[i].folder + "/" + tempAvatars[i].preview + "' class='adAv-img'>" +
            "<div class='mask flex-center'>" +
              "<a class='btn-floating btn-large red'><i class='fa fa-cog'></i></a>" +
              "<a class='btn-floating btn-large red'><i class='fa fa-trash-o'></i></a>" +
            "</div>" +
           "</div>" +
          "<div class='card-footer text-muted default-color-dark white-text'>" +
           "<p class='adAv-name'>" + tempAvatars[i].nombre + "</p>" +
          "</div>" +
        "</div>" +
      "</div>"
    ));
  });

  $("body").on('click', '#adAv-save',function(){
    aAvaController.save();
  });
});
