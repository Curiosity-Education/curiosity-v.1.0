$(function(){
  //example of how use to ranking curiosity
  var ranking  = new Ranking(); //create instance for ranking class
  var pdfs,videos;//variables for save data json of videos and pdfs
  var $pdfs,$videos;//variables for save html content element videos and pdfs
  sonRatesActivitiesCtrl.getCalification(function(response){
    $(".curiosity-ranking").attr("data-stars",response.data);
    ranking.init();// init to ranking
  });
  sonRatesActivitiesCtrl.getMaxScoreAndHits(function(response){
    document.getElementById('gst-score-max').innerHTML = response.data.score.puntaje;
    document.getElementById('gst-hits-max').innerHTML  = response.data.score.aciertos;
    pdfs    = response.data.pdf;//get pdfs for server+
    videos  = response.data.videos;
    console.log(pdfs);
    createElements();//create element width pdf
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
    if(!$("#gst-modal-pdf-video").hasClass('.gst-pdf-active')){
      $(".gst-information-list").empty();
      $(".gst-information-list").append($pdfs);
      //set information in modal
      $(".gst-information-list>div").children().first().addClass('active');
      setInformationModal();
    }
    $("#gst-modal-pdf-video").removeClass('.gst-video-active');
    $("#gst-modal-pdf-video").addClass(".gst-pdf-active");
  });
  function setInformationModal(){//fumction for set information of item active in modal
    var $pdfActive = $(".gst-information-list>div>.media.active");
    //set data in modal
    $("#gst-video-pdf").attr("src","/packages/assets/pdf/"+$pdfActive.data("name"));//set src of pdf in embed element
    $(".gst-tema-content").text($pdfActive.find(".media-heading").text());
    $(".gst-name-content").text($pdfActive.find("p.gst-name-content-list").text());
    $(".gst-views-content").text($pdfActive.find("p.gst-views-content-list").text());
  }
  $("#gst-modal-pdf-video").on("click",".media",function(event){//event click en item elemene of library pdf
    $("#gst-modal-pdf-video .media").removeClass('active');
    $(this).addClass('active');
    setInformationModal();
  });
  function createElements(){// function for create elements with pdf information and add in dom element
    $pdfs = $("<div/>");
    $.each(pdfs,function(index,pdf){
      $pdfs.append($(
        '<div class="media hoverable" data-name="'+pdf.nombre+'">'+
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
});
