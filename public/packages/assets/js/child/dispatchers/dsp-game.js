$(function(){
  //example of how use to ranking curiosity
  var ranking  = new Ranking(); //create instance for ranking class
  ranking.init();// init to ranking
  ranking.setEventClick(function(event){//add event click to ranking 
    var starAverage = $(this).index();// get value for set to ranking in data stars
    ranking.uploadStars(this,starAverage);// update data stars of ranking
  });
});
