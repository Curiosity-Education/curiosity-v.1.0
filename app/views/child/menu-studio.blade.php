@extends('templates.child-menu')
    @section('css')
    <link rel='stylesheet' type='text/css' href='packages/assets/css/child/main.css?{{rand();}}'>
    @stop
    @section('title')Rincón de Juegos @stop
    @section('content')
      <div class='container-fluid' id='container-menu-studio-child'>
         <!-- Banner -->
         <div class='row'>
            <div class='view hm-black-light z-depth-1 col-xs-12' id='lp-banner' style="background-image:url({{accesoriesController::getChildBanner()['ruta']}}{{accesoriesController::getChildBanner()['archivo']}}?{{rand();}});">
               <div class='mask flex-center'>
                  <h4 class='h4-responsive white-text'><i class='fa fa-gamepad'></i>&nbsp; Rincón de Juegos</h4>
               </div>
            </div>
         </div>
         <div class='row'>
            <div class='z-depth-1 ms-conteiners' id='ms-conteiner-level' style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
               <div class='row'></div>
            </div>
            <div class='z-depth-1 ms-conteiners ms-hide' id='ms-conteiner-intelligence' style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
               <div class='row'></div>
            </div>
            <div class='z-depth-1 ms-conteiners ms-hide' id='ms-conteiner-block' style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
               <div class='row'></div>
            </div>
            <div class='z-depth-1 ms-conteiners ms-hide' id='ms-conteiner-activity' style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
               <div class='row'></div>
            </div>
         </div>
      </div>
    @stop
@section('js-plus')
   <script src="/packages/assets/js/administer/models/dist/Activity-dist.js?{{rand();}}"></script>
   <script src='/packages/assets/js/child/controllers/msController.js?{{rand();}}'></script>
   <script src='/packages/assets/js/child/dispatchers/dsp-menuStudio.js?{{rand();}}'></script>
@stop
