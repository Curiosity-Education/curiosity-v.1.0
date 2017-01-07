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
         <div class="gst-card z-depth-1" id="gst-info">
            <div id="gst-max">
               <h5>Puntuación Máxima</h5>
               <h6>1500 puntos</h6><br>
               <h5>Aciertos</h5>
               <h6>15</h6>
            </div>
            <div id="gst-ranking">
              <h6>Calificame</h6>
              <ul class="curiosity-ranking animated bounceIn" data-stars="3.5">
                <li class="star-text"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Malo"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Aceptable"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Bueno"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Muy bueno"></li>
                <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Excelente"></li>
              </ul>
            </div>
         </div>
         <div class="gst-card z-depth-1" id="gst-material">
            <h6>Material para tí</h6>
            <hr class="gst-hr">
            <button type="button" class="btn btn-rounded btn-outline-default btn-block gst-material" id="gst-materialPdf">
               <!-- <span class="fa fa-file"></span>&nbsp; -->
               Guía de estudio
            </button>
            <button type="button" class="btn btn-rounded btn-outline-default btn-block gst-material" id="gst-materialVideo">
               <!-- <span class="fa fa-youtube-play"></span>&nbsp; -->
               Video
            </button>
         </div>
      </div>
      <div class="col-sm-8">
         <div class="gst-card z-depth-1" id="gst-dataGame">
            <h1>Nombre del Juego</h1>
            <hr class="gst-hr">
            <img src="/packages/assets/media/images/games/instructions/cstbannerskblue.jpg" class="img-fluid z-depth-1">
            <div class="row">
               <div class="col-sm-6">
                 <button type="button" class="btn btn-outline-default btn-rounded btn-block gst-btnGame" id="gst-btnInstructs">
                    <span class="fa"></span>&nbsp;
                    Instrucciones
                 </button>
              </div>
              <div class="col-sm-6">
                 <button type="button" class="btn btn-rounded btn-block gst-btnGame" id="gst-btnPlay">
                    <span class="fa"></span>&nbsp;
                    Jugar
                 </button>
              </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row hidden" id="gst-row-game">
    <div class="col-md-12">
       <iframe src=""  allowfullscreen webkitallowfullscreen mozallowfullscreen style="width:100%;height:100%;border:none" name="iframe_juego"></iframe>
    </div>
   </div>
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
@stop

@section('js-plus')
<script type="text/javascript" src="/packages/assets/js/standard/models/childDoActivity.js"></script>
<script type="text/javascript" src="/packages/assets/js/standard/controllers/childDoActivityCtrl.js"></script>
<script type="text/javascript" src="/packages/assets/js/standard/dispatch/game_standard.js"></script>
<script type="text/javascript">
   $(function(){
      // $("#gst-modal").modal('show');
      $("#gst-btnInstructs").click(function(){
         $("#gst-modal").modal('show');
      });
      new WOW().init();
      new Ranking().init();
   });
</script>
@stop
