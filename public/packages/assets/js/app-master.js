$(function(){
   // created curiosity object
   var curiosity = new Curiosity();
   // Initializing the collapse navbar menu into aside master web
   $(".button-collapse").sideNav({ edge: 'left', closeOnClick: true });
   // start tooltip
   $('[data-toggle="tooltip"]').tooltip();
   // comment this code
   curiosity.staticObject($(".fixedElement"), 90);
   // Initializing wow animation
   new WOW().init();

});
