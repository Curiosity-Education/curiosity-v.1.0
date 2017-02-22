var Curiosity = {

   methodSend:{
        POST:"POST",
        GET:"GET",
        PUT:"PUT",
        DELETE:"DELETE"
   },
   colors:function(){
       return  ['rgb(242, 221, 73)','rgb(138, 72, 155)','rgb(246, 142, 85)','rgb(232, 126, 177)','rgb(45, 151, 186)','rgb(148, 188, 61)'];

   },
   colorsTransparent:function(opacity){
       return  ['rgba(242, 221, 73,'+opacity+')','rgba(138, 72, 155,'+opacity+')','rgba(246, 142, 85,'+opacity+')','rgba(232, 126, 177,'+opacity+')','rgb(45, 151, 186,'+opacity+')','rgba(148, 188, 61,'+opacity+')'];

   },

   colorLogo:['#44c6ee','#ec2726'],
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

   getCleanedString: function(cadena){
       // Definimos los caracteres que queremos eliminar
       var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";

       // Los eliminamos todos
       for (var i = 0; i < specialChars.length; i++) {
           cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
       }

       // Lo queremos devolver limpio en minusculas
       cadena = cadena.toLowerCase();

       // Quitamos espacios y los sustituimos por _ porque nos gusta mas asi
       cadena = cadena.replace(/ /g,"_");

       // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
       cadena = cadena.replace(/á/gi,"a");
       cadena = cadena.replace(/é/gi,"e");
       cadena = cadena.replace(/í/gi,"i");
       cadena = cadena.replace(/ó/gi,"o");
       cadena = cadena.replace(/ú/gi,"u");
       cadena = cadena.replace(/ñ/gi,"n");
       return cadena;
    },

   compareInput:function(idInput){
        var $input = $(idInput);
        if($input.val() == $input.data('compare')){ return true; }
        else{ return false; }
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

   notyBackground:function($title,$pathBackground){
          swal({
              title: $title,
              width: 600,
              padding: 100,
              background: '#fff url('+$pathBackground+')'
            });
   },

   notyExtend : function($title, $text, $type,$options){
      swal({
         title: $title,
         text: $text,
         type: $type,
         showCancelButton: true,
         confirmButtonColor: ($options.leftBtnColor !== undefined) ? $options.leftBtnColor : '#2262ae',
         cancelButtonColor: ($options.rightBtnColor !== undefined) ? $options.rightBtnColor : '#ed6922',
         confirmButtonText: ($options.leftBtn != undefined) ? $options.leftBtn : "Confirmar",
         cancelButtonText: ($options.rightBtn != undefined) ? $options.rightBtn : "Cancelar",
      }).then(function () {
          $options.leftBtnFn();
        }, function (dismiss) {
          $options.rightBtnFn(dismiss);
        });
   },

   notyInput : function($title,$type,$fn){
        swal({
          title: $title,
          input: $type,
          showCancelButton: true,
          confirmButtonText: 'Aceptar',
          showLoaderOnConfirm: true,
          allowEscapeKey:false,
          preConfirm: function (input) {
            return new Promise(function (resolve, reject) {
              setTimeout(function() {
                if (input === '') {
                  reject('La caja de texto no puede estar vacía')
                } else {
                  resolve()
                }
              }, 2000)
            })
          },
          allowOutsideClick: false
        }).then(function (input) {
          $fn(input);
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
   },
   select:{
        id:this.id,
        val:function(val){
            $(this.id).find('option').each(function(i,object){
                if($(this).val() == val)
                    $(this).prop('selected',true);
            });
        }
   },

   file : {
      validExtension : function ($file, $types) {
         extension = ($file.substring($file.lastIndexOf("."))).toLowerCase();
         $available = false;
         for (var i = 0; i < $types.length; i++) {
            if ($types[i] == extension) {
               $available = true;
               break;
            }
         }
         if ($available) {
            return true;
         }else{
            return false;
         }
      },
      validSize : function($idInput, $mb){
         var files = document.getElementById($idInput).files;
         $max = (1024000 * $mb);
         if(files[0].size > $max){
            return null;
         }
         else{
            return files[0];
         }
      }
   },

   makeBlob : function($idInput){
      try {
         var files = document.getElementById($idInput).files;
         var browser = window.URL || window.webkitURL;
         var url = browser.createObjectURL(files[0]);
         return url;
      } catch (e) {
         console.error(e);
         return null;
      }
   },

   youtubeEmbed : {
      makeCode : function(url){
         var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
         var match = url.match(regExp);
         if (match && match[2].length == 11) {
            return 'https://www.youtube.com/embed/' + match[2];
         }
         else {
            console.error("Error trying to make a codeEmbed");
            return null;
         }
      },
      validLink : function(codeEmbed){
         if(/^www\.youtube\.com\/embed\/\S*$/.test(codeEmbed)){
            return true;
         }
         else{
            return false;
         }
      }
   },

   windowMessage : function(title, msjHtml){
      var msj = "<div class='modal fade' id='cu-windmssj' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static' data-keyboard='false' style='background-color: rgba(0, 0, 0, 0.6);'> <div class='modal-dialog'> <div class='modal-content' style='border-radius:0.3rem;'> <div class='modal-header' style='background-color:#2262ae;color:#fff;border:none!important;border-top-left-radius:.2rem;border-top-right-radius:.2rem;color: #676767;'> <span class='fa fa-question-circle' style='color:#fff;font-size:1.4rem;'></span> </div> <div class='modal-body' style='padding:1.5rem!important;'> <h4 style='font-size:1rem;font-weight:bold;margin-bottom:1.5rem;margin-top:1rem;'id='cu-titmsj'></h4><div id='cu-msj'></div> </div> </div> </div> </div>";
      $("body").append(msj);
      $("body").find("#cu-titmsj").html(title);
      $("body").find("#cu-msj").html(msjHtml);
      $("body").find("#cu-windmssj").modal("show");
   },

   windowMessageClose : function(){
      $("body").find('#cu-windmssj').modal("hide");
   }

}
