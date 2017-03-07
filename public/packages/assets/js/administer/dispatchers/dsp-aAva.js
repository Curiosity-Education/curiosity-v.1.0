$(function(){


  var tempAvatars, tempSprites, tempSecuences, tempStyles;

  avatar.allAvatars(function(avatars){
    if ($.isPlainObject(avatar)) {
      localStorage.localAvatars = JSON.stringify(avatars);
      tempAvatars = JSON.parse(localStorage.localAvatars);
    }
  });

  avatar.allSprites(function(sprites){
    if ($.isPlainObject(sprites)) {
      localStorage.localSprites = JSON.stringify(sprites);
      tempSprites = JSON.parse(localStorage.localSprites);
    }
  });

  avatar.allSecuences(function(secuences){
    if ($.isPlainObject(secuences)) {
      localStorage.localSecuences = JSON.stringify(secuences);
      tempSecuences = JSON.parse(localStorage.localSecuences);
    }
  });

  avatar.allStyles(function(styles){
    if ($.isPlainObject(styles)) {
      localStorage.localStyles = JSON.stringify(styles);
      tempStyles = JSON.parse(localStorage.localStyles);
    }
  });


  $.each(tempAvatars,function(i){
    var avatarStyle = StorageDB.table.getByAttr("localStyles","avatar_id",tempAvatars[i].id);
    cards("#adAv-avatars-container",avatarStyle[0].folder,avatarStyle[0].preview,avatarStyle[0].avatar_id,avatarStyle[0].nombre,"adAv-enter","adAv-upd","adAv-delete");
  });
  //save
  $("body").on('click', '#adAv-add-btn', function(){
    modalAvatar("adAv-save");
  });

  $("body").on('click', '#adAv-save',function(){
    aAvaController.save();
  });

  //delete
  $("body").on('click', '.adAv-delete',function(){
    aAvaController.delete($(this).data("id"));
  });

  //update
  $("body").on('click', '.adAv-upd', function(){
    modal("adAv-upd-btn",$(this).data("id"));
  });

  $("body").on('click', '#adAv-upd-btn', function(){
    alert($(this).data("id"));
    aAvaController.update($(this).data("id"));
  });

  $("body").on('click','.adAv-enter',function(){
    $.each(tempAvatars, function(){
      $(".adAv-preview").addClass('adAv-hide');
    });
    var tempAvatarStyles = StorageDB.table.getByAttr("localStyles","avatar_id",$(this).data('id'));

    $.each(tempAvatarStyles,function(i){
      if (tempAvatarStyles[i].is_default == 1) {
        cardAdd("#adAv-avatarStyles-container",tempAvatarStyles[i].folder,tempAvatarStyles[i].preview,tempAvatarStyles[i].avatar_id,tempAvatarStyles[i].nombre,"adAv-addStyle");
      }else {
        cards("#adAv-avatarStyles-container",tempAvatarStyles[i].folder,tempAvatarStyles[i].preview,tempAvatarStyles[i].avatar_id,tempAvatarStyles[i].nombre,"adAv-enterSprites","adAv-updStyles","adAv-deleteStyle",tempAvatarStyles[i].id);
      }
    });
  });

  //update style
  $("body").on('click','.adAv-updStyles',function(){
    modalStyles("adAv-styleID",$(this).data('id'),$(this).data('folder'));
  });
  $("body").on('click','#adAv-styleID',function(){
    aAvaController.updateStyle($(this).data('id'));
  });
  //delete style
  $("body").on('click','.adAv-deleteStyle',function(){
    aAvaController.deleteStyle($(this).data('id'));
  });
  //add a Style
  $("body").on('click','.adAv-addStyle',function(){
    modalStyles("adAv-addStyles",$(this).data('id'),$(this).data('folder'));
  });
  $("body").on('click','#adAv-addStyles',function(){
    aAvaController.addStyleAvatar($(this).data('folder'),$(this).data('id'));
  });

  //enter a sprites
  $("body").on('click','.adAv-enterSprites',function(){
    $("#adAv-avatarStyles-container").addClass('adAv-hide');
    var tempStyles = StorageDB.table.getByAttr("localStyles","avatar_id",$(this).data('id'));
    cardAdd("#adAv-avatarSprites-container",tempStyles[0].folder,tempStyles[0].preview,$(this).data('id2'),tempStyles[0].nombre,"adAv-addSprite");
    // var cardDefault = StorageDB.table.getByAttr("");
    $.each(tempSprites,function(i){
      cards("#adAv-avatarSprites-container",tempSprites[i]);
    });
  });
  //add sprite
  $("body").on('click','.adAv-addSprite', function(){
    modalSprite('addSprite',$(this).data('id'));
    select("#adAv-select",tempSecuences);
    $('.mdb-select').material_select();
  });

  $("body").on('click','#addSprite',function(){
    aAvaController.saveSprite($(this).data('id'));
  });



});

function cards(selector,folder,preview,id,name,btn1,btn2,btn3,id2){
  $(selector).append($(
    "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview '>" +
     "<div class='card view overlay z-depth-1 hoverable'>" +
        "<div class='card-block adAv-adjust adAv-card'>" +
          "<img src='/packages/assets/media/images/avatar/sprites/" + folder + "/" + name + "/" + preview + "' class='adAv-img'>" +
          "<div class='mask flex-center'>" +
            "<a class='btn-floating btn-large blue " + btn1 + "' data-id='" + id + "' data-id2='" + id2 + "'><i class='fa fa-cog'></i></a>" +
            "<a class='btn-floating btn-large green " + btn2 + "' data-id='" + id + "' data-folder='" + folder + "' data-toggle='modal' data-target='#modal-contact'>" +
                "<i class='fa fa-plus'></i>" +
            "</a>" +
            "<a class='btn-floating btn-large red " + btn3 + "' data-id='" + id + "'><i class='fa fa-trash-o'></i></a>" +
          "</div>" +
        "</div>" +
        "<div class='card-footer text-muted adAv-footer white-text'>" +
         "<p class='adAv-name'>" + name + "</p>" +
        "</div>" +
      "</div>" +
    "</div>"
  ));
}

function cardAdd(selector,folder,preview,id,name,btn){
  $(selector).append($(
    "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview '>" +
     "<div class='card view overlay z-depth-1 hoverable'>" +
        "<div class='card-block adAv-adjust adAv-card'>" +
          "<img src='/packages/assets/media/images/avatar/sprites/" + folder + "/" + preview + "' class='adAv-img'>" +
          "<div class='mask flex-center'>" +
            "<a class='btn-floating btn-large green " + btn + "' data-id='" + id + "' data-folder='" + folder + "' data-toggle='modal' data-target='#modal-contact'>" +
                "<i class='fa fa-plus'></i>" +
            "</a>" +
          "</div>" +
        "</div>" +
        "<div class='card-footer text-muted adAv-footer white-text'>" +
         "<p class='adAv-name'>" + name + "</p>" +
        "</div>" +
      "</div>" +
    "</div>"
  ));
}

function modalSprite(id,data){
  if ($("#adAv-modal").length > 0) {
    $("#adAv-modal").empty();
  }
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

              "<select class='mdb-select' id='adAv-select'>" +
                "<option value='' disabled selected>Choose your option</option>" +
              "</select>" +
              "<label>Example label</label>" +

                "<div class='md-form'>" +
                  "<i class='fa fa-user prefix'></i>" +
                  "<input type='text' id='adAv-width' name='adAv-name' class='form-control'>" +
                  "<label for='form42'>Width</label>" +
                "</div>" +

                "<div class='md-form'>" +
                  "<i class='fa fa-user prefix'></i>" +
                  "<input type='text' id='adAv-height' name='adAv-name' class='form-control'>" +
                  "<label for='form42'>Height</label>" +
                "</div>" +

                "<div class='md-form'>" +
                  "<i class='fa fa-user prefix'></i>" +
                  "<input type='text' id='adAv-framesX' name='adAv-name' class='form-control'>" +
                  "<label for='form42'>Frames X</label>" +
                "</div>" +

                "<div class='md-form'>" +
                  "<i class='fa fa-user prefix'></i>" +
                  "<input type='text' id='adAv-frameY' name='adAv-name' class='form-control'>" +
                  "<label for='form42'>Frames Y</label>" +
                "</div>" +

                "<div class='md-form'>" +
                  "<i class='fa fa-user prefix'></i>" +
                  "<input type='text' id='adAv-fps' name='adAv-name' class='form-control'>" +
                  "<label for='form42'>fps</label>" +
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
              "<button type='button' class='btn btn-primary' id='" + id + "'data-id='" + data + "'>Submit</button>" +
            "</div>" +
        "</div>" +


      "</div>" +
    "</div>"

  ));
}

function modalAvatar($id,$data){
  id = $id;
  data = $data;
  if ($("#adAv-modal").length > 0) {
    $("#adAv-modal").empty();
  }
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
              "<button type='button' class='btn btn-primary' id='" + id + "'data-id='" + data + "'>Submit</button>" +
            "</div>" +
        "</div>" +


      "</div>" +
    "</div>"
  ));
}

function modalStyles($id,$data,folder){
  id = $id;
  data = $data;
  if ($("#adAv-modal").length > 0) {
    $("#adAv-modal").empty();
  }
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
                    "<label for='form42'>Nombre style</label>" +
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
              "<button type='button' class='btn btn-primary' id='" + id + "'data-id='" + data + "' data-folder='" + folder + "'>Submit</button>" +
            "</div>" +
        "</div>" +

      "</div>" +
    "</div>"
  ));
}

function select(selector,obj){
  $.each(obj,function(i){
    $(selector).append($(
      "<option value='" + obj[i].id + "'>" + obj[i].nombre + "</option>"
    ));
  });
}
