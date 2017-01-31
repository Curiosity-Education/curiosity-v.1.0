$(function(){
   // Initializing the collapse navbar menu into aside master web
   $(".button-collapse").sideNav({ edge: 'left', closeOnClick: true });
   // start tooltip
   $('[data-toggle="tooltip"]').tooltip();
   // comment this code
   Curiosity.staticObject($(".fixedElement"), 90);
   // Initializing wow animation
   new WOW().init();
   // Material Select Initialization
   $('.mdb-select').material_select();

   // Calling the url and go
   $("body").on("click", ".linkMenu", function(){
      Curiosity.goToUrl($(this).data('url'));
   });

   loginController.formLogin = $("#formLogin");

   $("#logOut-btn, .logOutBtn").click(function() {
      loginController.logOut();
   });
});
