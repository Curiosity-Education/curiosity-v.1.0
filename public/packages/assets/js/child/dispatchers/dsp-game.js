$(function(){
  //example of how use to ranking curiosity
  var ranking  = new Ranking(); //create instance for ranking class
  sonRatesActivitiesCtrl.getCalification(function(response){
    $(".curiosity-ranking").attr("data-stars",response.data);
    ranking.init();// init to ranking
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
});
