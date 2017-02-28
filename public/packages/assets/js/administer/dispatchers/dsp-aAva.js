$(function(){

  var tempAvatars;

  avatar.getAvatars(function(avatars){
    localStorage.localAvatars = JSON.stringify(avatars);
  });

  tempAvatars = JSON.parse(localStorage.localAvatars);


  $.each(tempAvatars,function(i){
    $("#adAv-avatars-container").append($(
      "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview'>" +
       "<div class='card view overlay z-depth-1 hoverable'>" +
          "<div class='card-block adAv-adjust'>" +
            "<img src='/packages/assets/media/images/avatar/sprites/" + tempAvatars[i].folder + "/" + tempAvatars[i].preview + "' class='adAv-img'>" +
            "<div class='mask flex-center'>" +
              "<a class='btn-floating btn-large blue adAv-enter' data-id='" + tempAvatars[i].avatar_id + "'><i class='fa fa-cog'></i></a>" +
              "<a class='btn-floating btn-large green adAv-upd' data-id='" + tempAvatars[i].avatar_id + "' data-toggle='modal' data-target='#modal-contact'>" +
                  "<i class='fa fa-plus'></i>" +
              "</a>" +
              "<a class='btn-floating btn-large red adAv-delete' data-id='" + tempAvatars[i].avatar_id + "'><i class='fa fa-trash-o'></i></a>" +
            "</div>" +
           "</div>" +
          "<div class='card-footer text-muted adAv-footer white-text'>" +
           "<p class='adAv-name'>" + tempAvatars[i].nombre + "</p>" +
          "</div>" +
        "</div>" +
      "</div>"
    ));
  });
  //save
  $("body").on('click', '#adAv-add-btn', function(){
    modal("adAv-save");
  });

  $("body").on('click', '#adAv-save',function(){
    aAvaController.save();
  });

  //delete
  $("body").on('click', '.adAv-delete',function(){
    aAvaController.delete($(this).data("id"));
  });

  // //update
  // $("body").on('click', '.adAv-upd', function(){
  //   modal(null,$(this).data("id"));
  // });
  //
  // $("body").on('click', '.adAv-upd-btn', function(){
  //   alert($(this).data("id"));
  //   aAvaController.update($(this).data("id"));
  // });

  $("body").on('click','.adAv-enter',function(){
    $.each(tempAvatars, function(){
      $(".adAv-preview").addClass('adAv-hide');
    });
    var tempAvatarStyles = StorageDB.table.getByAttr("localAvatars","avatar_id",$(this).data('id'));

    $.each(tempAvatarStyles,function(i){
      $("#adAv-avatarStyles-container").append($(
        "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview'>" +
         "<div class='card view overlay z-depth-1 hoverable'>" +
            "<div class='card-block adAv-adjust'>" +
              "<img src='/packages/assets/media/images/avatar/sprites/" + tempAvatarStyles[i].folder + "/" + tempAvatarStyles[i].preview + "' class='adAv-img'>" +
              "<div class='mask flex-center'>" +
                "<a class='btn-floating btn-large blue adAv-enter' data-id='" + tempAvatarStyles[i].avatar_id + "'><i class='fa fa-cog'></i></a>" +
                "<a class='btn-floating btn-large green adAv-upd' data-id='" + tempAvatarStyles[i].avatar_id + "' data-toggle='modal' data-target='#modal-contact'>" +
                    "<i class='fa fa-plus'></i>" +
                "</a>" +
                "<a class='btn-floating btn-large red adAv-delete' data-id='" + tempAvatarStyles[i].avatar_id + "'><i class='fa fa-trash-o'></i></a>" +
              "</div>" +
            "</div>" +
            "<div class='card-footer text-muted adAv-footer white-text'>" +
             "<p class='adAv-name'>" + tempAvatarStyles[i].nombre + "</p>" +
            "</div>" +
          "</div>" +
        "</div>"
      ));
    });
  });

  // addSprite
  // $("body").on('click', '.adAv-add', function(){
  //   aAvaController.addAvatarSprite()
  // });


});

function modal(id,data){
  $("#adAv-modal").append($(

    "<div class='modal fade modal-ext' id='modal-contact' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>" +
      "<div class='modal-dialog' role='document'>" +

        "<div class='modal-content'>" +

            "<div class='modal-header'>" +
              "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
                "<span aria-hidden='true'>&times;</span>" +
              "</button>" +
              "<h4>Resgistro de nuevo avatar</h4>" +
            "</div>" +

            "<div class='modal-body'>" +
                "<br>" +
                "<form class='form' id='adAv-form'>" +
                  "<div class='md-form'>" +
                    "<i class='fa fa-user prefix'></i>" +
                    "<input type='text' id='adAv-name' name='adAv-name' class='form-control'>" +
                    "<label for='form42'>Nombre avatar</label>" +
                  "</div>" +

                  "<div class='md-form'>" +
                    "<i class='fa fa-file-text prefix'></i>" +
                      "<label for='form34'>Historia...</label>" +
                    "<textarea name='adAv-story' rows='8' cols='80' type='text' id='adAv-story'  class='form-control'></textarea>" +
                  "</div>" +

                  "<div class='md-form'>" +
                    "<i class='fa fa-money prefix'></i>" +
                    "<input type='text' id='adAv-cost' name='adAv-cost' class='form-control'>" +
                    "<label for='form34'>Costo</label>" +
                  "</div>" +
                "</form>" +
                "<form  id='adAv-imgForm'>" +
                  "<div class='md-form'>" +
                    "<div class='file-field'>" +
                      "<div class='btn btn-primary btn-rounded btn-sm'>" +
                        "<span>Choose file</span>" +
                        "<input type='file' id='adAv-img' name='adAv-img'>" +
                      "</div>" +
                      "<div class='file-path-wrapper'>" +
                        "<input class='file-path validate' type='text' placeholder='Upload your file'>" +
                      "</div>" +
                    "</div>" +
                  "</div><br><br>" +
                "</form>" +
            "</div>" +

            "<div class='modal-footer'>" +
              "<button type='button' class='btn btn-default' data-dismiss='modal' >Close</button>" +
              "<button type='button' class='btn btn-primary adAv-upd-btn' id='" + id + "'data-id='" + data + "'>Submit</button>" +
            "</div>" +
        "</div>" +


      "</div>" +
    "</div>"
  ));
}
