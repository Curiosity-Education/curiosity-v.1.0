@extends('templates.child-menu')

@section('css-plus')
   <link rel="stylesheet" href="/packages/libs/OwlCarousel2-2.2.0/dist/assets/owl.carousel.min.css">
   <link rel="stylesheet" href="/packages/libs/OwlCarousel2-2.2.0/dist/assets/owl.theme.default.min.css">
@stop

@section('content')
   <div class="view hm-black-strong z-depth-1 col-xs-12" id="cst-banner">
      <div class="mask flex-center">
         <p class="white-text">Tienda Curiosity</p>
      </div>
   </div>

   <div class="row">
      <div class="col-sm-6" id="cst-boxOfAvatar">
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
               <div class="owl-carousel owl-theme">
                  @for ($i = 0; $i < 5; $i++)
                     <div class="item cst-item view overlay">
                        <div class="mask">
                           <h5>$ 500 cc &nbsp; | &nbsp; 100 exp</h5>
                           <center><a class="btn btn-primary btn-rounded waves-effect btn-sm cst-btnGet">Obtener</a></center>
                        </div>
                     </div>
                  @endfor
               </div>
            </div>
         </div>

         <div class="cst-boxSlideItems z-depth-1">
            <div class="view hm-black-strong z-depth-1 col-sm-4 cst-titleCarousel">
               <div class="mask flex-center">
                  <p class="white-text">Herramientas</p>
               </div>
            </div>
            <div class="col-sm-8 z-depth-1 cst-panelSlide">
               <div class="owl-carousel owl-theme">
                  @for ($i = 0; $i < 5; $i++)
                     <div class="item cst-item view overlay">
                        <div class="mask">
                           <h5>$ 500 cc &nbsp; | &nbsp; 100 exp</h5>
                           <center><a class="btn btn-primary btn-rounded waves-effect btn-sm cst-btnGet">Obtener</a></center>
                        </div>
                     </div>
                  @endfor
               </div>
            </div>
         </div>

      </div>
      <div class="col-sm-6" id="cst-boxOfProfile">
         <div class="cst-titleSection z-depth-1">
            <span class="fa fa-user"></span>&nbsp;
            Mejora tu perfil
         </div>

         <div class="cst-boxSlideItems z-depth-1">
            <div class="view hm-black-strong z-depth-1 col-sm-4 cst-titleCarousel">
               <div class="mask flex-center">
                  <p class="white-text">Color</p>
               </div>
            </div>
            <div class="col-sm-8 z-depth-1 cst-panelSlide">
               <div class="owl-carousel owl-theme">
                  @for ($i = 0; $i < 5; $i++)
                     <div class="item cst-item view overlay">
                        <div class="mask">
                           <h5>$ 500 cc &nbsp; | &nbsp; 100 exp</h5>
                           <center><a class="btn btn-primary btn-rounded waves-effect btn-sm cst-btnGet">Obtener</a></center>
                        </div>
                     </div>
                  @endfor
               </div>
            </div>
         </div>

      </div>
   </div>
@stop

@section('js-plus')
   <script src="/packages/libs/OwlCarousel2-2.2.0/dist/owl.carousel.min.js" charset="utf-8"></script>
   <script src="/packages/assets/js/child/dispatchers/dsp-store.js" charset="utf-8"></script>
@stop
