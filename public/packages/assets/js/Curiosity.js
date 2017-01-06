var Curiosity = {

   staticObject : function(element, top){
      var $fx        = element;
      var $window    = $(window);
      var offset     = $fx.offset();
      var topPadding = top;
      $window.scroll(function() {
         if ($window.scrollTop() > offset.top) {
            $fx.stop().animate({ marginTop: $window.scrollTop() - offset.top + topPadding }, 0);
         } else { $fx.stop().animate({ marginTop: 0 },0); }
      });
   },

   goToUrl : function($url){
      window.location.href = $url;
   },

   makeLinkActive : function($el){
      $el.addClass("linkMenu-active");
   }

}
