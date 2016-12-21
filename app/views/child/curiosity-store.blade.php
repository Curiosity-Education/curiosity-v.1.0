@extends('templates.child-menu')

@section('css-plus')
@stop

@section('content')
   <div class="view hm-black-strong z-depth-1 col-xs-12" id="cst-banner">
      <div class="mask flex-center">
         <p class="white-text">Tienda Curiosity</p>
      </div>
   </div>

   <div class="row">
      <div class="col-sm-7" id="cst-boxOfAvatar">
         <div class="cst-titleSection z-depth-1">
            <span class="fa fa-user"></span>&nbsp;
            Accesorios para tu avatar
         </div>

         <div class="cst-boxSlideItems z-depth-1">
            <div class="view hm-black-strong z-depth-1 col-sm-4 cst-titleCarousel">
               <div class="mask flex-center">
                  <p class="white-text">Herramientas</p>
               </div>
            </div>
            <div class="col-sm-8 z-depth-1 cst-panelSlide">
            </div>
         </div>

         <div class="cst-boxSlideItems z-depth-1">
            <div class="view hm-black-strong z-depth-1 col-sm-4 cst-titleCarousel">
               <div class="mask flex-center">
                  <p class="white-text">Herramientas</p>
               </div>
            </div>
            <div class="col-sm-8 z-depth-1 cst-panelSlide">
            </div>
         </div>

      </div>
      <div class="col-sm-5" id="cst-boxOfProfile">
         <div class="cst-titleSection z-depth-1">
            <span class="fa fa-user"></span>&nbsp;
            Mejora tu perfil
         </div>

         <div class="cst-boxSlideItems z-depth-1">
            <div class="view hm-black-strong z-depth-1 col-sm-5 cst-titleCarousel">
               <div class="mask flex-center">
                  <p class="white-text">Color</p>
               </div>
            </div>
            <div class="col-sm-7 z-depth-1 cst-panelSlide">
            </div>
         </div>

      </div>
   </div>
@stop

@section('js-plus')
@stop
