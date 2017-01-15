$(function(){
  //example of how use to ranking curiosity
  var ranking  = new Ranking(); //create instance for ranking class
  sonRatesActivitiesCtrl.getCalification(function(response){
    $(".curiosity-ranking").attr("data-stars",response.data);
    ranking.init();// init to ranking
  });
  sonRatesActivitiesCtrl.getMaxScoreAndHits(function(response){
    document.getElementById('gst-score-max').innerHTML = response.data.score.puntaje;
    document.getElementById('gst-hits-max').innerHTML  = response.data.score.aciertos;
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
    //document.getElementById('gst-row-pdf').style = "display:block";
    //document.getElementById('gst-row-information-game').style = "display:none";
  });
});
