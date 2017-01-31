$(function(){

  var tempLevels, tempIntelligences, tempBlocks, tempTopics, tempVideos, tempTeachers, tempSchools;
  var level, intelligencesId, blockId = [], topicId = [], finalVids = [];
  var cc = 0, countSlide = 0, nameTopic;

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

  libraryVideos.getPdfs(function(pdfs){
    localStorage.localPdfs = JSON.stringify(pdfs);
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
      "<button type='button' data-id-grade='" + tempLevels[i].id + "' class='btn btn-info lp-btn-degrees'>" + tempLevels[i].nombre.split(" ", 1) + "°</button>"
    ));
  });


 $("body").on('click','.lp-btn-degrees',function(){

   level = $(this).data("id-grade");
   if (!$(this).hasClass("lp-btn-active")) {
     $(this).addClass("lp-btn-active");

     $.each(tempIntelligences,function(i){
       if (level == tempIntelligences[i].nivel_id) {
         $("#lp-btn-topics").append($(
           "<button type='button' data-intelligence-id='" + tempIntelligences[i].id + "' class='btn btn-primary btn-lg lp-btnTopic'>" + tempIntelligences[i].nombre + "</button>"
          ));
        }
     });
   }
 });

 $("body").on('click','.lp-btnTopic',function(){
   if (!$(this).hasClass("lp-topic-active")) {

     $(this).addClass("lp-topic-active");
     intelligencesId = $(this).data("intelligence-id");

     $.each(tempBlocks,function(i){
       if (tempBlocks[i].inteligencia_id == intelligencesId) {
          blockId[i] = tempBlocks[i].id;
       }
     });

     $.each(tempTopics,function(i){
       if (blockId == tempTopics[i].bloque_id) {
         topicId[i] = tempTopics[i].id;
       }
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
       "<div class='col-md-12 col-sm-12 col-xs-12 lp-container-pdf z-depth-1'>" +
       "</div>"
     ));

     $.each(finalVids,function(i){
         nameTopic = StorageDB.table.getByAttr("localTopics","id",finalVids[i].tema_id);
         $(".lp-container-pdf").append($(

           "<a class='lp-PDFselect' data-target='#gst-modal-pdf-video' data-toggle='modal'data-video-id='" + finalVids[i].id + "' data-link-video='" + finalVids[i].embed + "'>" +
             "<div class='col-md-3 col-sm-3 col-xs-4'>" +
               "<div class='lp-bg-card' title='click para ver'>" +
                 "<div class='card-overlay lp-card-pdf'>" +

                   "<div class='white-text text-xs-center'>" +
                     "<div class='card-block'>" +
                       "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i>VIDEOS</h5><hr class='lp-hr'>" +
                       "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + nameTopic[0].nombre + "</h4>" +

                     "</div>" +
                 "</div>" +
               "</div>" +
             "</div>" +
           "</div>" +
         "</a>"

         ));


     });

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
          if (i <= 1) {
            $(".pair-pdfs"+ countSlide).addClass("active");
          }

          $(".pair-pdfs"+countSlide).append($(

           "<div class='col-xs-12'>" +
             "<a class='lp-PDFselect' href='#'>" +
               "<div class='lp-bg-card' data-toggle='tooltip' data-placement='top' title='click para ver'>" +
                 "<div class='card-overlay lp-card-pdf'>" +

                   "<div class='white-text text-xs-center'>" +
                     "<div class='card-block'>" +
                       "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i> GUIA PDF</h5><hr class='lp-hr'>" +
                       "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + nameTopic[0].nombre + "</h4>" +

                     "</div>" +
                   "</div>" +
                 "</div>" +
               "</div>" +
             "</a>" +
           "</div>"

          ));
       });
   }

  });

  /* Transitions of the View ------------------------------------ */

	$("body").on('click','.lp-PDFselect',function(){

    var video = StorageDB.table.getByAttr("localVideos","id",$(this).data('video-id'));
    $('#gst-link').append($(
      "<iframe src='" + $(this).data("link-video") + "' type='application/pdf'  width='100%' height='90%' name='iframeContent' id='gst-iframe-content'></iframe>"
    ));

    var teacher = StorageDB.table.getByAttr("localTeachers","id",video[0].profesor_apoyo_id);
    var school = StorageDB.table.getByAttr("localSchools","id",teacher[0].escuela_id);
    var recommended = StorageDB.table.getByAttr("localVideos","tema_id",video[0].tema_id);
    var perro = StorageDB.table.getByAttr("localTopics","id",video[0].tema_id);
    $("#video-info").append($(
      "<h5 class='gst-tema-content text-left'>" + teacher[0].nombre + " " + teacher[0].apellidos + "</h5>" +
      "<p class='gst-name-content text-left'>" + perro[0].nombre + "</p>" +
      "<p class='gst-views-content'>" + school[0].nombre + "</p>"
    ));



    $.each(recommended,function(i){
      var tempTeacher = StorageDB.table.getByAttr("localTeachers","id",recommended[i].profesor_apoyo_id);
      $(".recommended-videos").append($(
        "<div class='media hoverable active'>" +
            "<a class='media-left waves-light col-md-4'>" +
                "<img class='img-fluid' src='/packages/assets/media/images/games/posters/" + tempTeacher[0].foto + "' alt=content ico'>" +
            "</a>" +
            "<h5 class='media-heading'>" + tempTeacher[0].nombre + " " + tempTeacher[0].apellidos + "</h5>" +
            "<div class='media-body'>" +
                "<p class='gst-views-content'>Vistos: " + recommended[i].vistos + "</p>" +
            "</div>" +
        "</div>"
      ));
    });

});

$("body").on('click','#close-modal',function(){
  $('#gst-iframe-content').remove();
  $(".recommended-videos").empty();
  $("#video-info").empty();
}); // close PDF

	/* ------------------------------------------------------------- */

});
