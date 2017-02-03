<!-- Prefix "gst" -->
@extends('templates.child-menu')

@section('css-plus')
@stop

@section('content')
   <div class="row" id="gst-row-information-game">
      <div class="col-sm-4">
         <div class="chip animated bounce" id="gst-back">
            <img src="/packages/assets/media/images/system/iconBack.png">
            Regresar
         </div>
         <div class="gst-card z-depth-1 animated bounceInUp" id="gst-info">
            <div id="gst-max">
               <h5>Puntuación Máxima</h5>
               <h6 id="gst-score-max" data-score="{{$game['score']}}">{{$game["score"]}} puntos</h6><br>
               <h5>Aciertos</h5>
               <h6 id="gst-hits-max">{{$game["hits"]}}</h6>
            </div>
            <div id="gst-ranking">
              <h6>Calificame</h6>
              <ul class="curiosity-ranking animated bounceIn" data-stars="{{$game['qualification']}}" >
                <li class="star-text"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Mala"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Aceptable"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Buena"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Muy buena"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Excelente"></li>
              </ul>
            </div>
         </div>
         <div class="gst-card z-depth-1 animated bounceInUp" id="gst-material">
            <h6>Material para tí</h6>
            <hr class="gst-hr">
            <button type="button" class="btn btn-rounded btn-outline-default btn-block gst-material z-depth-2" id="gst-materialPdf" disabled data-target="#gst-modal-pdf-video" data-toggle="modal">
                <span class="fa fa-file-pdf-o"></span>&nbsp;
               Guía de estudio
            </button>
            <button type="button" class="btn btn-rounded btn-outline-default btn-block gst-material z-depth-2" id="gst-materialVideo" disabled data-target="#gst-modal-pdf-video" data-toggle="modal">
               <span class="fa fa-youtube-play"></span>&nbsp;
               Video
            </button>
         </div>
      </div>
      <div class="col-sm-8">
         <div class="gst-card z-depth-1 animated bounceInRight" id="gst-dataGame">
            <h1>{{$game["name"]}}</h1>

            <hr class="gst-hr">
            <img src="/packages/assets/iframes/games/unity/{{$game['folder']}}/instruction.jpg?{{rand();}}" class="img-fluid z-depth-1" id="gst-img-instruction" onclick="$('#gst-btnInstructs').trigger('click')">
            <div class="row">
               <div class="col-sm-6">

                 <button type="button" class="btn btn-outline-default btn-rounded btn-block gst-btnGame" id="gst-btnInstructs" data-target="#gst-modal-instruction" data-toggle="modal">
                    <span class="fa fa-map-o"></span>&nbsp;
                    Instrucciones
                 </button>
              </div>
              <div class="col-sm-6">
                 <button type="button" class="btn btn-rounded btn-block gst-btnGame" id="gst-btnPlay">
                    <span class="fa fa-gamepad"></span>&nbsp;
                    Jugar
                 </button>
              </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row hidden" id="gst-row-game">
    <div class="col-md-12">
       <iframe data-folder="{{$game['folder']}}" src=""  allowfullscreen webkitallowfullscreen mozallowfullscreen style="width:100%;height:100%;border:none" name="iframe_juego"></iframe>
    </div>
   </div>
   <!-- view pdf -->
    <div class="row animated bounceIn hidden" id="gst-row-pdf">
      <div class="col-md-12">
          <div class="card card-border-standard" id="gst-card-pdf">
            <div class="view hm-black-strong z-depth-1 col-xs-12" id="p-banner-showPDF">
              <div class="mask border-standard flex-center">
               <h4 class="h4-responsive white-text"><i class="fa fa-file-pdf-o hidden-xs-down"></i>&nbsp; Sucesión Númerica &nbsp;&nbsp;<i class="float-xs-right fa fa-times-circle hidden-sm-up dismiss-card" data-toggle="tooltip" data-placement="bottom" title="Cerrar PDF"></i></h4>
              </div>
               <a class="btn-floating btn-small primary-color-dark float-xs-right hidden-xs-down dismiss-card" data-dismiss-card="#p-row-pdf" data-toggle="tooltip" data-placement="left" title="Cerrar PDF"><i class="fa fa-times"></i></a>
            </div>
            <div class="card-block">
              <embed src="/packages/assets/pdf/guia.pdf" type="application/pdf" width="100%" height="100%" id="gst-pdf">
              <h1 class="h1-responsive text-xs-center" id="p-text-info">Por favor gira tu dispositivo para mejor lectura</h1>
            </div>
          </div>
      </div>
    </div>
    <!--//.. end view pdf -->
   <div class="modal fade" id="gst-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-body">
            <div id="gst-avCel"></div>
            <h1 id="gst-score">200 puntos</h1>
            <div class="row">
              <div class="col-sm-4">
                 <h4>Aciertos</h4>
                 <h5 id="gst-hits">20</h5>
              </div>
              <div class="col-sm-4">
                 <h4>Experiencia</h4>
                 <h5>+100 Puntos</h5>
              </div>
              <div class="col-sm-4">
                 <h4>Curiosity Coins</h4>
                 <h5>+175 CC</h5>
              </div>
            </div>
            <button type="button" class="btn btn-rounded btn-block" data-dismiss="modal">
               <span class="fa"></span>&nbsp;
               Aceptar
            </button>
         </div>
       </div>
     </div>
   </div>
   <div class="modal fade" id="gst-modal-instruction" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-body" style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
            <div class="row">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="col-md-12 gst-col">
                <div class="flex-center">
                  <img src="/packages/assets/iframes/games/unity/{{$game['folder']}}/instruction.jpg?{{rand();}}" class="img-fluid z-depth-1">
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
  @section('modal-pdfs-videos')
    @section('modal-left')
      <iframe src="https://www.youtube.com/embed/SNrAqVZ6BxE" type="application/pdf"  width="100%" height="90%" name="iframeContent" id="gst-iframe-content"></iframe>
    @stop
    @section('modal-header')
      @section('modal-header-image')
        <img src="/packages/assets/media/images/teachersAsc/teacherDefProfileImage.png" class="gst-img-content img-fluid" style="width:100%">
      @stop
      @section('modal-header-information')
        <h5 class="gst-tema-content text-left">Nombre profe</h5>
        <p class="gst-name-content text-left">Video nombre</p>
        <p class="gst-views-content">Escuela nombre</p>
      @stop
      @section('modal-title')
        <h4 class="text-center gst-title-content">Biblioteca de Videos</h4>
      @stop
      @section('modal-list')
      @stop
    @stop
    @stop
  @stop
@stop

@section('js-plus')
<script type="text/javascript" src="/packages/assets/js/child/models/activity.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/ranking-curiosity.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/child/controllers/activityCtrl.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/standard/models/childDoActivity.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/standard/controllers/childDoActivityCtrl.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/standard/dispatch/game_standard.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/child/models/sonRatesActivity.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/child/controllers/sonRatesActivitiesCtrl.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/child/dispatchers/dsp-game.js?{{rand();}}"></script>
<script type="text/javascript">
</script>
@stop
