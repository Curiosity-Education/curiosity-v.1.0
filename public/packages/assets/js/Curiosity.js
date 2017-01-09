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
   },

   notyConfirm : function($title, $text, $type, $fn){
      swal({
         title: $title,
         text: $text,
         type: $type,
         showCancelButton: true,
         confirmButtonColor: '#2262ae',
         cancelButtonColor: '#ed6922',
         confirmButtonText: 'Aceptar',
         cancelButtonText: 'Cancelar',
         allowOutsideClick: false
      }).then(function () {
         $fn();
      });
   },

   noty : {
      success : function($text, $title){
         toastr.success($text, $title);
      },
      error : function($text, $title){
         toastr.error($text, $title);
      },
      warning : function($text, $title){
         toastr.warning($text, $title);
      },
      info : function($text, $title){
         toastr.info($text, $title);
      }
   },

   toastLoading : {
      show : function(){
         var mdl = "<div class='modal fade' id='mdlpgrss' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static'"+ "data-keyboard='false'>"+
           "<div class='modal-dialog flex-center' style='height:80%;'>"+
             "<div class='modal-content' style='background-color:rgba(0, 0, 0, 0.8);color:#fff;border-radius:1rem;padding:2.5rem;border:solid"+ ".2rem rgba(0, 0, 0, 0.85);'>"+
               "<div class='modal-body' style='text-align:center;'>"+
                  "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><br><br>Un Momento"+
               "</div>"+
             "</div>"+
           "</div>"+
         "</div>";
         $("body").append(mdl);
         $("body").find("#mdlpgrss").modal("show");
      },
      hide : function(){
         $("body").find("#mdlpgrss").modal("hide");
         $("body").find(".modal-backdrop").remove();
      }
   }

}
