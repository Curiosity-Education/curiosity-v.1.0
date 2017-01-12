$(function(){

   Curiosity.makeLinkActive($("#linkCh-store"));

   $('.owl-carousel').owlCarousel({
      loop:true,
      autoplay:true,
      margin:10,
      nav:false,
      dots:false,
      responsive:{
           0:{
               items:1
           },
           300:{
              items:1
           },
           1050:{
               items:1
           },
           1200:{
               items:2
           }
      }
   });

   $("body").on('click', '.cst-btnGet', function(){
      alert();
   });

});
