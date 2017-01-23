@extends('templates.child-menu')
    @section('css')
    <link rel='stylesheet' type='text/css' href='packages/assets/css/child/main.css'>
    @stop
    @section('title')Curiosity | @stop
    @section('content')
      <div class='container-fluid' id='container-menu-studio-child'>
       <!-- Banner -->
        <div class='row'>
            <div class='view hm-black-strong z-depth-1 col-xs-12' id='lp-banner'>
              <div class='mask flex-center'>
                 <h4 class='h4-responsive white-text'><i class='fa fa-gamepad'></i>&nbsp; Biblioteca de Juegos</h4>
              </div>
            </div>
        </div><br>
      </div>
        <!--//.. Banner -->
     <!-- Row inteligents and Degrees -->
     <div class='row' id='row-inteligents'></div><br>

     <div class='row row-bloque'>
       <div class='col-md-12 col-sm-12'>
         <div class='card-bloque'>
           <div class='card-content-bloque'>
             <h6 class='card-title-bloque'>Matemáticas | Bloques </h6>
             <a class='btn btn-purple btn-bloque active'> 1</a>
             <a class='btn btn-purple btn-bloque'> 2</a>
             <a class='btn btn-purple btn-bloque'> 3</a>
             <a class='btn btn-purple btn-bloque'> 4</a>
             <a class='btn btn-purple btn-bloque'> 5</a>
             <a class='btn btn-purple btn-bloque'> 6</a>
             <a class='dismiss text-black' data-dismiss-target='.row-bloque'>x</a>
           </div>
         </div>
       </div>
     </div>
     <div class='row row-level'>
       <div class='col-md-12 col-sm-12'>
         <div class='card-level'>
           <div class='card-content-bloque'>
             <h6 class='card-title-level text-white'>Matemáticas | Grados </h6>
             <a class='btn btn-purple btn-level'> 1°</a>
             <a class='btn btn-purple btn-level'> 2°</a>
             <a class='btn btn-purple btn-level'> 3°</a>
             <a class='btn btn-purple btn-level'> 4°</a>
             <a class='btn btn-purple btn-level'> 5°</a>
             <a class='btn btn-purple btn-level'> 6°</a>
             <a class='dismiss' data-dismiss-target='.row-level'>x</a>
           </div>
         </div>
       </div>
     </div>
     <!--//.. Row inteligents and Degrees -->
     <!-- row cards games -->
     <div class='row'>
       <div class='col-md-4 col-sm-4'>
         <!--Card-->
         <div class='card card-game hm-black-light'>
             <!--Card image-->
             <div class='view mask'>
                 <img src='packages/assets/media/images/games/wallpapers/BALANZA.png' class='img-fluid' alt=''>
                 <a href='#'>
                     <div class='mask'></div>
                 </a>
             </div>
             <!--/.Card image-->
             <!--Card content-->
             <div class='card-block text-center'>
                 <!--Title-->
                 <h5 class='card-title'>Lectura de digitos</h5>
                 <!--Text-->
                 <p class='card-text'><i class='fa fa-gamepad'></i> digit math</p>
                 <a href='#' class='btn btn-primary'>Jugar</a>
             </div>
             <!--/.Card content-->

         </div>
         <!--/.Card-->
       </div>
       <div class='col-md-4 col-sm-4'>
          <!--Card-->
         <div class='card card-game hm-black-light'>

             <!--Card image-->
             <div class='view mask'>
                 <img src='packages/assets/media/images/games/wallpapers/ballon.png' class='img-fluid' alt=''>
                 <a href='#'>
                     <div class='mask'></div>
                 </a>
             </div>
             <!--/.Card image-->

             <!--Card content-->
             <div class='card-block text-center'>
                 <!--Title-->
                 <h5 class='card-title'>Restas rapidas</h5>
                 <!--Text-->
                 <p class='card-text'><i class='fa fa-gamepad'></i> Cool math</p>
                 <a href='#' class='btn btn-primary'>Jugar</a>
             </div>
             <!--/.Card content-->

         </div>
         <!--/.Card-->
       </div>
       <div class='col-md-4 col-sm-4'>
         <!--Card-->
         <div class='card card-game hm-black-light'>

             <!--Card image-->
             <div class='view mask'>
                 <img src='packages/assets/media/images/games/wallpapers/CANDY.png' class='img-fluid' alt=''>
                 <a href='#'>
                     <div class='mask'></div>
                 </a>
             </div>
             <!--/.Card image-->

             <!--Card content-->
             <div class='card-block text-center'>
                 <!--Title-->
                 <h5 class='card-title'>Restas Mentales</h5>
                 <!--Text-->
                 <p class='card-text'><i class='fa fa-gamepad'></i> Cool math.</p>
                 <a href='#' class='btn btn-primary'>Jugar</a>
             </div>
             <!--/.Card content-->

         </div>
         <!--/.Card-->
       </div>
     </div>
     <div class='row'>
       <div class='col-sm-4 col-md-4'>
          <!--Card-->
         <div class='card card-game hm-black-light'>
             <!--Card image-->
             <div class='view mask'>
                 <img src='packages/assets/media/images/games/wallpapers/ballon.png' class='img-fluid' alt=''>
                 <a href='#'>
                     <div class='mask'></div>
                 </a>
             </div>
             <!--/.Card image-->

             <!--Card content-->
             <div class='card-block text-center'>
                 <!--Title-->
                 <h5 class='card-title'>Sucesión númerica</h5>
                 <!--Text-->
                 <p class='card-text'><i class='fa fa-gamepad'></i> frog Jumb.</p>
                 <a href='#' class='btn btn-primary'>Jugar</a>
             </div>
             <!--/.Card content-->

         </div>
         <!--/.Card-->
       </div>
       <div class='col-md-4 col-sm-4'>
          <!--Card-->
         <div class='card card-game hm-black-light'>

             <!--Card image-->
             <div class='view mask'>
                 <img src='packages/assets/media/images/games/Wallpapers/CANDY.png' class='img-fluid' alt=''>
                 <a href='#'>
                     <div class='mask'></div>
                 </a>
             </div>
             <!--/.Card image-->

             <!--Card content-->
             <div class='card-block text-center'>
                 <!--Title-->
                 <h5 class='card-title'>Grafica de barras</h5>
                 <!--Text-->
                 <p class='card-text'><i class='fa fa-gamepad'></i> chocomath</p>
                 <a href='#' class='btn btn-primary'>Jugar</a>
             </div>
             <!--/.Card content-->

         </div>
         <!--/.Card-->
       </div>
       <div class='col-md-4 col-sm-4'>
          <!--Card-->
         <div class='card card-game hm-black-light'>

             <!--Card image-->
             <div class='view mask'>
                 <img src='packages/assets/media/images/games/wallpapers/BALANZA.png' class='img-fluid' alt=''>
                 <a href='#'>
                     <div class='mask'></div>
                 </a>
             </div>
             <!--/.Card image-->

             <!--Card content-->
             <div class='card-block text-center'>
                 <!--Title-->
                 <h5 class='card-title'>Sucesión númerica</h5>
                 <!--Text-->
                 <p class='card-text'><i class='fa fa-gamepad'></i> Chocolemath</p>
                 <a href='#' class='btn btn-primary'>Jugar</a>
             </div>
             <!--/.Card content-->

         </div>
         <!--/.Card-->
       </div>
     </div>
     <!--//.. row cards games -->
    @stop
@section('js-plus')
  <script type='text/javascript' type='text/javascript' src='packages/assets/js/child/menu-studio.js'></script>
@stop
