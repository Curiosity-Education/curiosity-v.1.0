$(function(){

   var curiosity = new Curiosity();

   // Initializing the collapse navbar menu into aside master web
   $(".button-collapse").sideNav({ edge: 'left', closeOnClick: true });

   curiosity.staticObject($(".fixedElement"), 90);

});
