$(function(){

  var tempAvatars, tempSprites, tempSecuences, tempStyles;
  var funAvatar=[], funSprite=[], funSecuences=[], funStyle=[];
  var avatarFlag = false, spriteFlag = false, secuencesFlag = false, StyleFlag = false;

  avatar.allAvatars(function(avatars){
    if (avatars.length > 0){
      funAvatar = JSON.stringify(avatars);
      avatarFlag = true;     ;
    }
  });

  avatar.allSprites(function(sprites){
    if (sprites.length > 0) {
      funSprite = JSON.stringify(sprites);
      spriteFlag = true;
    }
  });

  avatar.allSecuences(function(secuences){
    if (secuences.length > 0) {
      funSecuences = JSON.stringify(secuences);
      secuencesFlag = true;
    }
  });

  avatar.allStyles(function(styles){
    if (styles.length > 0) {
      funStyle = JSON.stringify(styles);
      StyleFlag = true;
    }
  });

  var intervalAvatar = setInterval(function(){
    if (avatarFlag == true) {
      tempAvatars = JSON.parse(funAvatar);
      clearInterval(intervalAvatar);

      $.each(tempAvatars,function(i){
        var avatarStyle = StorageDB.table.getByAttr("localStyles","avatar_id",tempAvatars[i].id);
        cardsAvatar("#adAv-avatars-container",avatarStyle[0].folder,avatarStyle[0].preview,avatarStyle[0].avatar_id,avatarStyle[0].nombre,"adAv-enter","adAv-upd","adAv-delete");
      });
    }
  },1000);

  var intervalStyle = setInterval(function(){
    if (StyleFlag == true) {
      tempStyles = JSON.parse(funStyle);
      clearInterval(intervalStyle);
    }
  },1000);

  var intervalSecuences = setInterval(function(){
    if (secuencesFlag == true) {
      tempSecuences = JSON.parse(funSecuences);
      clearInterval(intervalSecuences);
    }
  },1000);

  var intervalSprite = setInterval(function () {
    if (spriteFlag == true) {
      tempSprites = JSON.parse(funSprite);
      clearInterval(intervalSprite);
    }
  }, 1000);


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
    modalAvatar("adAv-upd-btn",$(this).data("id"));
  });

  $("body").on('click', '#adAv-upd-btn', function(){
    alert($(this).data("id"));
    aAvaController.update($(this).data("id"));
  });

  $("body").on('click','.adAv-enter',function(){

    $("#adAv-avatarStyles-container").empty();

    if ($("#back-btn").length > 0){
      $("#back-btn").empty();
      $("#adAv-avatarStyles-container").removeClass('adAv-hide');
      $("#adAv-avatars-container").removeClass('adAv-show');
    }

    $("#back-btn").append($(
      "<div class='chip animated bounce btn second-level' id='gst-back'>" +
         "<img src='/packages/assets/media/images/system/iconBack.png'>" +
         "regresa" +
      "</div>"
    ));

    id = $(this).data('id');
    $("#adAv-avatars-container").addClass('adAv-hide');

    var tempAvatarStyles = StorageDB.table.getByAttr("localStyles","avatar_id",id);

    $.each(tempAvatarStyles,function(i){
      if (tempAvatarStyles[i].is_default == 1) {
        cardAdd("#adAv-avatarStyles-container",tempAvatarStyles[i].folder,tempAvatarStyles[i].preview,tempAvatarStyles[i].avatar_id,tempAvatarStyles[i].nombre,"adAv-addStyle");
      }else {
        var avatarName = StorageDB.table.getByAttr("localAvatars","id",id);
        cards("#adAv-avatarStyles-container",tempAvatarStyles[i].folder,tempAvatarStyles[i].preview,tempAvatarStyles[i].avatar_id,tempAvatarStyles[i].nombre,"adAv-enterSprites","adAv-updStyles","adAv-deleteStyle",tempAvatarStyles[i].id,avatarName[0].nombre);
      }
    });
  });

  //update style
  $("body").on('click','.adAv-updStyles',function(){
    modalStyles("adAv-styleID",$(this).data('id'),$(this).data('folder'));
  });
  $("body").on('click','#adAv-styleID',function(){
    aAvaController.updateStyle($(this).data('id'),$(this).data('folder'));
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

    $("#adAv-avatarSprites-container").removeClass('adAv-hide');
    $("#adAv-avatarStyles-container").removeClass('adAv-show');
    $("#adAv-avatarStyles-container").addClass('adAv-hide');

    $("#adAv-avatarSprites-container").empty();

    if ($("#back-btn").length > 0) {
      $("#back-btn").empty();
    }

    $("#back-btn").append($(
      "<div class='chip animated bounce btn third-level' id='gst-back'>" +
         "<img src='/packages/assets/media/images/system/iconBack.png'>" +
         "regresa" +
      "</div>"
    ));

    idStyle = $(this).data('id2');
    idAvatar = $(this).data('id');

    $("#adAv-avatarStyles-container").addClass('adAv-hide');

    var tempStyles = StorageDB.table.getByAttr("localStyles","id",idStyle);
    var avatarName = StorageDB.table.getByAttr("localAvatars","id",idAvatar);
    cardAddSprite("#adAv-avatarSprites-container",tempStyles[0].folder,tempStyles[0].preview,$(this).data('id2'),tempStyles[0].nombre,"adAv-addSprite",avatarName[0].nombre);

    $.each(tempSprites,function(i){
      alert('perro');
      var style = StorageDB.table.getByAttr("localStyles","id",idStyle);
      var avatar = StorageDB.table.getByAttr("localAvatars","id",style[0].avatar_id);
      var sequence = StorageDB.table.getByAttr("localSecuences","id",tempSprites[0].secuencia_id);
      cardSprite("#adAv-avatarSprites-container",style[0].folder,tempSprites[i].imagen,tempSprites[i].id,sequence[0].nombre,null,"updateSprite-btn","deleteSprite-btn",null,avatar[i].nombre,sequence[0].nombre);
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
  //deleteSprite
  $("body").on('click','.deleteSprite-btn',function(){
    aAvaController.deleteSprite($(this).data('id'));
  })
  //updateSprite
  $("body").on('click','.updateSprite-btn',function(){
    modalSprite('updateSprite',$(this).data('id'));
  });
  $("body").on('click','#updateSprite',function(){
    aAvaController.updateSprite($(this).data('id'));
  });


  $("body").on('click','.second-level',function(){
    $("#adAv-avatarStyles-container").addClass('adAv-hide');
    $("#adAv-avatars-container").removeClass('adAv-hide');
    $("#adAv-avatars-container").addClass('adAv-show');
  });

  $("body").on('click','.third-level',function(){
    $("#adAv-avatarSprites-container").addClass('adAv-hide');
    $("#adAv-avatarStyles-container").removeClass('adAv-hide');
    $("#adAv-avatarStyles-container").addClass('adAv-show');
  });


});

function cards(selector,folder,preview,id,name,btn1,btn2,btn3,id2,avatarName){
  $(selector).append($(
    "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview '>" +
     "<div class='card view overlay z-depth-1 hoverable'>" +
        "<div class='card-block adAv-adjust adAv-card'>" +
          "<img src='/packages/assets/media/images/avatar/sprites/" + avatarName + "/" + folder + "/" + preview + "' class='adAv-img'>" +
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

function cardSprite(selector,folder,preview,id,name,btn1,btn2,btn3,id2,avatarName,sequence){
  $(selector).append($(
    "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview '>" +
     "<div class='card view overlay z-depth-1 hoverable'>" +
        "<div class='card-block adAv-adjust adAv-card'>" +
          "<img src='/packages/assets/media/images/avatar/sprites/" + avatarName + "/" + folder + "/" + sequence + "/" + preview + "' class='adAv-img'>" +
          "<div class='mask flex-center'>" +
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

function cardsAvatar(selector,folder,preview,id,name,btn1,btn2,btn3,id2){
  $(selector).append($(
    "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview '>" +
     "<div class='card view overlay z-depth-1 hoverable'>" +
        "<div class='card-block adAv-adjust adAv-card'>" +
          "<img src='/packages/assets/media/images/avatar/sprites/" + folder + "/" + preview + "' class='adAv-img'>" +
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

function cardAddSprite(selector,folder,preview,id,name,btn,nameAvatar){
  $(selector).append($(
    "<div class='col-md-3 col-xs-12 col-sm-6 view adAv-preview '>" +
     "<div class='card view overlay z-depth-1 hoverable'>" +
        "<div class='card-block adAv-adjust adAv-card'>" +
          "<img src='/packages/assets/media/images/avatar/sprites/" + nameAvatar + "/" + folder + "/" + preview + "' class='adAv-img'>" +
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
