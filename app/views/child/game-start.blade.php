<!-- Prefix "gst" -->
@extends('templates.child-menu')

@section('css-plus')
@stop

@section('content')
   <div class="col-sm-4">
      <div class="gst-card z-depth-1" id="gst-info"></div>
      <div class="gst-card z-depth-1" id="gst-material"></div>
   </div>
   <div class="col-sm-8">
      <div class="gst-card z-depth-1" id="gst-dataGame">
         <h1>Nombre del Juego</h1>
         <hr>
         <img src="/packages/assets/media/images/games/instructions/cstbannerskblue.jpg" class="img-fluid z-depth-1">
         <div class="row">
            <div class="col-sm-6">
              <button type="button" class="btn btn-default btn-block gst-btnGame">
                 <span class="fa"></span>&nbsp;
                 Instrucciones
              </button>
           </div>
           <div class="col-sm-6">
              <button type="button" class="btn btn-default btn-block gst-btnGame">
                 <span class="fa"></span>&nbsp;
                 Jugar
              </button>
           </div>
         </div>
      </div>
   </div>
@stop

@section('js-plus')
@stop
