@extends('templates.child-menu')
    @section('css')
    <link rel='stylesheet' type='text/css' href='packages/assets/css/child/main.css?{{rand();}}'>
    @stop
    @section('title')Biblioteca de Juegos @stop
    @section('content')
      <div class='container-fluid' id='container-menu-studio-child'>
         <!-- Banner -->
         <div class='row'>
            <div class='view hm-black-strong z-depth-1 col-xs-12' id='lp-banner'>
               <div class='mask flex-center'>
                  <h4 class='h4-responsive white-text'><i class='fa fa-gamepad'></i>&nbsp; Biblioteca de Juegos</h4>
               </div>
            </div>
         </div>

         <div class='row'>
            <div class='z-depth-1' id='ms-conteiner-all'>
               <div class='row'></div>
            </div>
         </div>
      </div>
    @stop
@section('js-plus')
   <script src="/packages/assets/js/administer/models/Activity.js?{{rand();}}"></script>
   <script src='/packages/assets/js/child/controllers/msController.js?{{rand();}}'></script>
   <script src='/packages/assets/js/child/dispatchers/dsp-menuStudio.js?{{rand();}}'></script>
@stop
