$(function(){

  var tempLevels, tempIntelligences, tempBlocks, tempTopics, tempVideos, tempTeachers, tempSchools;
  var  intelligencesId, blockId = [], topicId = [], finalVids = [];
  var cc = 0, cc2 = 0, countSlide = 0, nameTopic;
  var show_per_page = 8, count_elements = 0, count_sections = 0, num_container = 1;

  libraryVideos.getLevels(function(levels){
    localStorage.localLevels = JSON.stringify(levels);
  });

  libraryVideos.getIntelligences(function(intelligences){
    localStorage.localIntelligences = JSON.stringify(intelligences);
  });

  libraryVideos.getBlocks(function(blocks){
    localStorage.localBlocks = JSON.stringify(blocks);
  });

  libraryVideos.getTopics(function(topics){
    localStorage.localTopics = JSON.stringify(topics);
  });

  libraryVideos.getTeachers(function(teachers){
    localStorage.localTeachers = JSON.stringify(teachers)
  });

  libraryVideos.getSchools(function(schools){
    localStorage.localSchools = JSON.stringify(schools);
  });

  libraryVideos.getVideos(function(videos){
    localStorage.localVideos = JSON.stringify(videos);
  });


  tempLevels = JSON.parse(localStorage.localLevels);
  tempIntelligences = JSON.parse(localStorage.localIntelligences);
  tempBlocks = JSON.parse(localStorage.localBlocks);
  tempTopics = JSON.parse(localStorage.localTopics);
  tempTeachers = JSON.parse(localStorage.localTeachers);
  tempVideos = JSON.parse(localStorage.localVideos);
  tempSchools = JSON.parse(localStorage.localSchools);

  $.each(tempLevels,function(i){
    $(".lp-container-degrees").append($(
      "<button id='" + (i + 1) + "grado" + "' type='button' data-id-grade='" + tempLevels[i].id + "' class='btn btn-info lp-btn-degrees'>" + tempLevels[i].nombre.split(" ", 1) + "</button>"
    ));
  });



  $("body").on('click','.lp-btn-degrees',function(){

    $(".lp-btn-degrees").removeClass("lp-btn-active");
    $(this).addClass("lp-btn-active");
    $("#lp-btn-topics").empty();
    if ($(this).hasClass("lp-btn-active")) {
      var level = $(this).data("id-grade");


      $.each(tempIntelligences,function(i){
        if (level == tempIntelligences[i].nivel_id) {
          $("#lp-btn-topics").append($(
            "<button id='" + (i + 1) + "inteligence" + "' type='button' data-intelligence-id='" + tempIntelligences[i].id + "' class='btn btn-primary btn-lg lp-btnTopic'>" + tempIntelligences[i].nombre + "</button>"
           ));
         }
      });
    }
      $("#lp-btn-topics button").first().trigger('click');
  });

$("body").on('click','.lp-btnTopic',function(){

  $(".lp-btnTopic").removeClass("lp-topic-active");
  $(this).addClass("lp-topic-active");
  $("#lp-row-contPdf").empty();
  $("#pag").empty();
  $("#carrousel-pdfs").empty();

  if ($(this).hasClass("lp-topic-active")) {
    var intelligencesId = $(this).data("intelligence-id");
    var blockId = [], topicId = [], finalVids = [];

   $.each(tempBlocks,function(i){
     if (tempBlocks[i].inteligencia_id == intelligencesId) {
        blockId[i] = tempBlocks[i].id;
     }
   });

   $.each(blockId,function(i){
     $.each(tempTopics,function(j){
       if (blockId[i] == tempTopics[j].bloque_id) {
         topicId[cc2] = tempTopics[j].id;
         cc2 += 1;
       }
     })
   });

   $.each(topicId,function(i){
     $.each(tempVideos,function(j){
       if (tempVideos[j].tema_id == topicId[i]) {
         finalVids[cc] = tempVideos[j];
         cc += 1;
       }
     });
   });

   $("#lp-row-contPdf").append($(
        "<div class='col-md-12 col-sm-12 col-xs-12 lp-container-video z-depth-1'>" +
        "</div>"
      ));


    $.each(finalVids,function(i){
      if (count_elements < show_per_page) {

        if (count_elements == 0) {
          count_sections += 1;
          if (count_sections == 1) {
            $(".lp-container-video").append(
              "<div id='lp-section" + count_sections + "' class='lp-show l'>" +
              "</div>"
            );
          } else {
            $(".lp-container-video").append(
              "<div id='lp-section" + count_sections + "' class='lp-hide l'>" +
              "</div>"
            );
          }
        }

        nameTopic = StorageDB.table.getByAttr("localTopics","id",finalVids[i].tema_id);
        $("#lp-section" + count_sections).append($(

          "<a class='lp-PDFselect' data-target='#gst-modal-pdf-video' data-toggle='modal'data-video-id='" + finalVids[i].id + "' data-link-video='" + finalVids[i].embed + "'>" +
          "<div class='col-md-3 col-sm-3 col-xs-4'>" +
            "<div class='lp-bg-card' title='click para ver'>" +
              "<div class='card-overlay lp-card-pdf lp-change'>" +

                "<div class='white-text'>" +
                  "<div class='card-block'>" +
                    "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i>&nbsp;VIDEOS</h5><hr class='lp-hr'>" +
                    "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + nameTopic[0].nombre + "</h4>" +

                  "</div>" +
              "</div>" +
            "</div>" +
          "</div>" +
        "</div>" +
      "</a>"
      ));
        count_elements += 1;
      }
      if (count_elements == 8) {
        count_elements = 0;
      }
    });

    $("#pag").append($(
     "<nav>" +
       "<ul class='pagination pg-blue'>" +

       "</ul>" +
      "</nav>"
   ));

   for (var i = 0; i < count_sections; i++) {
       $(".pagination").append($(
         "<li class='page-item' data-section-id='" + (i + 1) + "'><a class='page-link'>" + (i + 1) + "</a></li>"
       ));
   }

   $("#carrousel-videos").append($(

        "<div class='row z-depth-1 hidden-sm-up lp-row-slide' id='lp-row-slidePdfs'>" +
          "<div id='lp-slide-cardPdf' class='carousel slide carousel-multi-item' data-ride='carousel'>" +


            "<div class='controls-top'>" +
              "<a class='btn-floating btn-small' href='#lp-slide-cardPdf' data-slide='prev'><i class='fa fa-chevron-left'></i></a>" +
              "<a class='btn-floating btn-small' href='#lp-slide-cardPdf' data-slide='next'><i class='fa fa-chevron-right'></i></a>" +
            "</div>" +



            "<ol class='carousel-indicators'>" +
              "<li data-target='#lp-slide-cardPdf' data-slide-to='0' class='active'></li>" +
              "<li data-target='#lp-slide-cardPdf' data-slide-to='1'></li>" +
            "</ol>" +



            "<div class='carousel-inner pdfs-carrousel-container' role='listbox'>" +

            "</div>" +

          "</div>" +

        "</div>"
      ));


      $.each(finalVids,function(i){

        if (i % 2 === 0) {
           countSlide += 1;
          $(".pdfs-carrousel-container").append($(
             "<div class='carousel-item text-xs-center pair-pdfs"+ countSlide +"'>" +
             "</div>"
          ));
        }
        if(i == 0)
          $(".pair-pdfs"+ countSlide).addClass("active");

        $(".pair-pdfs" + countSlide).append($(

          "<div class='col-xs-12'>" +
            "<a class='lp-PDFselect' data-target='#gst-modal-pdf-video' data-toggle='modal'data-video-id='" + finalVids[i].id + "' data-link-video='" + finalVids[i].embed + "'>" +
                "<div class='lp-bg-card lp-bg' title='click para ver'>" +
                  "<div class='card-overlay lp-card-pdf'>" +

                    "<div class='white-text text-xs-center'>" +
                      "<div class='card-block'>" +
                        "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i>&nbsp;VIDEOS</h5><hr class='lp-hr'>" +
                        "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + nameTopic[0].nombre + "</h4>" +

                      "</div>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</div>" +
            "</a>" +
          "</div>"
        ))
      });

      count_sections = 0, count_elements = 0, finalPdfs = [], cc = 0, cc2 = 0;
  }
});


  /* Transitions of the View ------------------------------------ */

  $("body").on('click','.lp-PDFselect',function(){

    var video = StorageDB.table.getByAttr("localVideos","id",$(this).data('video-id'));
    $('#gst-link').append($(
      "<iframe src='" + $(this).data('link-video') + "' type='application/pdf'  width='100%' height='90%' name='iframeContent' id='gst-iframe-content' frameborder='0' allowfullscreen></iframe>"
    ));

    var teacher = StorageDB.table.getByAttr("localTeachers","id",video[0].profesor_apoyo_id);
    var school = StorageDB.table.getByAttr("localSchools","id",teacher[0].escuela_id);
    var recommended = StorageDB.table.getByAttr("localVideos","tema_id",video[0].tema_id);
    var perro = StorageDB.table.getByAttr("localTopics","id",video[0].tema_id);
    $("#prof-img").empty();
    $("#video-info").append($(
      "<h5 class='gst-tema-content text-left'>" + teacher[0].nombre + " " + teacher[0].apellidos + "</h5>" +
      "<p class='gst-name-content text-left'>" + perro[0].nombre + "</p>" +
      "<p class='gst-views-content'>" + school[0].nombre + "</p>"
    ));
    $("#prof-img").append($(
      "<img src='/packages/assets/media/images/teachersAsc/" + teacher[0].foto + "' class='gst-img-content img-fluid' id='prof-img'>"
    ));



    $.each(recommended,function(i){

      var tempTeacher = StorageDB.table.getByAttr("localTeachers","id",recommended[i].profesor_apoyo_id);
      $(".recommended-videos").append($(
        "<div class='media hoverable last' data-recommended-id='" + recommended[i].id + "'>" +
            "<a class='media-left waves-light col-md-4'>" +
                "<img class='img-fluid' src='/packages/assets/media/images/posters/" + recommended[0].poster + "' alt=content ico'>" +
            "</a>" +
            "<h5 class='media-heading'>" + tempTeacher[0].nombre + " " + tempTeacher[0].apellidos + "</h5>" +
            "<div class='media-body'>" +
                "<p class='gst-views-content'>Vistos: " + recommended[i].vistos + "</p>" +
            "</div>" +
        "</div>"
      ));
    });

  });

  $("body").on('click','.last',function(){
    var tempId = $(this).data('recommended-id');
    var tempEmbed = StorageDB.table.getByAttr("localVideos","id",tempId);
    var teacherInfo = StorageDB.table.getByAttr("localTeachers","id",tempEmbed[0].profesor_apoyo_id);
    var tempSchool = StorageDB.table.getByAttr("localSchools","id",teacherInfo[0].escuela_id);
    var perro = StorageDB.table.getByAttr("localTopics","id",tempEmbed[0].tema_id);
    $('.last').removeClass('active');
    $(this).addClass('active');
    $("#gst-link").empty();
    $('#gst-link').append($(
      "<iframe src='" + tempEmbed[0].embed + "' type='application/pdf'  width='100%' height='90%' name='iframeContent' id='gst-iframe-content' frameborder='0' allowfullscreen></iframe>"
    ));
    $("#video-info").empty();
    $("#video-info").append($(
      "<h5 class='gst-tema-content text-left'>" + teacherInfo[0].nombre + " " + teacherInfo[0].apellidos + "</h5>" +
      "<p class='gst-name-content text-left'>" + perro[0].nombre + "</p>" +
      "<p class='gst-views-content'>" + tempSchool[0].nombre + "</p>"
    ));
  });

  $("body").on('click','#close-modal',function(){
  $('#gst-iframe-content').remove();
  $(".recommended-videos").empty();
  $("#video-info").empty();
  }); // close PDF

  /* ------------------------------------------------------------- */

  $("#1grado").trigger('click');
  $("#1inteligence").trigger('click');
  $(".page-link1").trigger('click');
});
