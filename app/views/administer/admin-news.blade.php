@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
  <i class="fa fa-newspaper-o"></i>&nbsp; Gestión de Novedades
@stop

@section('content-administer')

@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/News.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/newsController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-news.js" charset="utf-8"></script>
@stop
