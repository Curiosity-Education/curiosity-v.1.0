$(function(){

  //example of how use to ranking curiosity
  var ranking  = new Ranking(); //create instance for ranking class
  var pdfs,videos;//variables for save data json of videos and pdfs
  var $pdfs,$videos;//variables for save html content element videos and pdfs
  ranking.init();
  sonRatesActivitiesCtrl.getMaxScoreAndHits(function(response){
    pdfs    = response.data.pdf;//get pdfs for server+
    videos  = response.data.videos;
    createElsementsVideos();//create element width video
    createElementsPdfs();//create element width pdf
    if(pdfs.length==0){
      $("#gst-materialPdf").prop("disabled",true);
    }else{
      $("#gst-materialPdf").prop("disabled",false);
    }
    if(videos.length==0){
      $("#gst-materialVideo").prop("disabled",true);
    }else{
      $("#gst-materialVideo").prop("disabled",false);
    }
  });
  ranking.setEventClick(function(event){//add event click to ranking
    var starAverage = $(this).index();// get value for set to ranking in data stars
    var these       = this;
    Curiosity.notyConfirm("Calificar actividad","¿Desas califcar esta actividad con "+starAverage+" estrellas?","question",function(){
      var data = {qualification: starAverage};
      ranking.uploadStars(these,starAverage);// update data stars of ranking
      sonRatesActivitiesCtrl.save(data);
    });
  });
  $("#gst-materialPdf").click(function(event){
    if(!$("#gst-modal-pdf-video").hasClass('gst-pdf-active')){
      $(".gst-information-list").empty();
      $(".gst-information-list").append($pdfs);
      //set information in modal
      $(".gst-information-list>div").children().removeClass("active");
      $(".gst-information-list>div").children().first().addClass('active');
      var id = $(".gst-information-list>div>.media.active").data("id");
      addView(id,pdfs);
      $("#gst-modal-pdf-video").removeClass('gst-video-active');
      $("#gst-modal-pdf-video").addClass("gst-pdf-active");
      $(".gst-img-content").attr("src","/packages/assets/media/images/system/pdf-file.png");
    }
    setInformationModal();
  });
  $("#gst-materialVideo").click(function(event){
    if(!$("#gst-modal-pdf-video").hasClass('gst-video-active')){
      $(".gst-information-list").empty();
      $(".gst-information-list").append($videos);
      //set information in modal
      $(".gst-information-list>div").children().removeClass("active");
      $(".gst-information-list>div").children().first().addClass('active');
      var id = $(".gst-information-list>div>.media.active").data("id");
      addView(id,videos);
      $("#gst-modal-pdf-video").removeClass("gst-pdf-active");
      $("#gst-modal-pdf-video").addClass('gst-video-active');
      $(".gst-img-content").attr("src","/packages/assets/media/images/teachersAsc/"+$(".gst-information-list>div>.media.active").data("foto"));
    }
    setInformationModal();
  });

  function setInformationModal(){//fumction for set information of item active in modal
    var $active = $(".gst-information-list>div>.media.active");
    //set data in modal
    if(!$("#gst-modal-pdf-video").hasClass('gst-video-active')){
      $("#gst-iframe-content").attr("src","/packages/assets/pdf/"+$active.data("name"));//set src of pdf in embed element
    }else{
      $("#gst-iframe-content").attr("src",$active.data("name"));//set src of pdf in embed element
      $(".gst-img-content").attr("src","/packages/assets/media/images/teachersAsc/"+$active.data("foto"));
    }
    $(".gst-tema-content").text($active.find(".media-heading").text());
    $(".gst-name-content").text($active.find("p.gst-name-content-list").text());
    $(".gst-views-content").text($active.find("p.gst-views-content-list").text());
  }
  $("#gst-modal-pdf-video").on("click",".media",function(event){//event click en item elemene of library pdf
    if(!$(this).hasClass("active")){
      $("#gst-modal-pdf-video .media").removeClass('active');
      if($("#gst-modal-pdf-video").hasClass("gst-video-active")){
         var id = $(this).data("id");
         addView(id,videos);
      }else{
         var id = $(this).data("id");
         addView(id,pdfs);
      }
      $(this).addClass('active');
      setInformationModal();
      }
  });
  $("#gst-back").click(function(event){
    window.history.back();//return to preview page
  });
  $('#gst-modal-pdf-video').on('hidden.bs.modal', function () {
    $("#gst-iframe-content").attr("src","");
    var data = {
      videos : videos,
      pdfs   : pdfs
    }
    activityCtrl.updateViews(data,function(response){
      console.log(response);
    });
  });
  function createElementsPdfs(){// function for create elements with pdf information and add in dom element
    $pdfs = $("<div/>");
    $.each(pdfs,function(index,pdf){
      $pdfs.append($(
        '<div class="media hoverable" data-id="'+pdf.id+'" data-name="'+pdf.nombre+'">'+
              '<a class="media-left waves-light col-md-3">'+
                  '<img class="rounded-circle img-fluid" src="/packages/assets/media/images/system/pdf.ico" alt="pdf ico">'+
              '</a>'+
              '<div class="media-body">'+
                  '<h6 class="media-heading">'+pdf.tema+'</h6>'+
                  '<div class="media-body">'+
                      '<p class="gst-views-content-list">Vistos: '+pdf.vistos+'</p>'+
                      '<p class="gst-name-content-list">'+pdf.nombre_real+'</p>'+
                  '</div>'+
              '</div>'+
          '</div>'
      ));
    });
  }
  function createElsementsVideos(){
    //all code here
    $videos = $("<div/>");
    console.log(videos);
    $.each(videos,function(index,video){
           $videos.append('<div class="media hoverable" data-id="'+video.id+'" data-foto="'+video.foto+'" data-name="'+video.embed+'">'+
              '<a class="media-left waves-light col-md-4">'+
                  '<img class="img-fluid" src="/packages/assets/media/images/posters/'+video.poster+'" alt="pdf ico">'+
              '</a>'+
              '<div class="media-body">'+
                  '<h6 class="media-heading">'+video.nombre+'</h6>'+
                  '<div class="media-body">'+
                      '<p class="gst-views-content-list">Escuela: '+video.escuela+'</p>'+
                      '<p class="gst-name-content-list">Profesor: '  +video.profesor+'</p>'+
                  '</div>'+
              '</div>'+
          '</div>');
    });
  }
  function addView(id,data){
    $.each(data,function(index,object){
      if(object.id == id){
        var vistos = parseInt(object.vistos);
        vistos +=1;
        object.vistos = vistos;
      }
    });
  }


  // animation
  var secuenceHp1 = StorageDB.table.getByAttr("secuences", "nombre", "festejo 1");
  var happy1 = StorageDB.table.getByAttr("spritesChild", "secuencia_id", secuenceHp1[0].id);
  var animation = new SpriteAnimator('gst-avCel', happy1[0].widthFrame, happy1[0].heightFrame, happy1[0].framesX, happy1[0].framesY, happy1[0].fps);
  animation.spreetsheet = "/packages/assets/media/images/avatar/sprites"+happy1[0].folder+happy1[0].imagen;
  animation.mvy = 135;
  setInterval(function(){ animation.play(); }, animation.speed);
});
