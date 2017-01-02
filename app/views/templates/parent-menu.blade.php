@extends('templates.user-master')

@section('css')
<link rel="stylesheet" href="/packages/assets/css/parent/main.css">
@yield('css-plus')
@stop

@section('menu-photo')
<div id="parentMenu-profileContainer" class="text-center">
   <img src="/packages/assets/media/images/parents/profile/mom-def.png" id="parentMenu-imgProfile">
</div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active">
   <span class="fa fa-home" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-youtube-play" id="parentMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-youtube-play" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
@stop

@section('menu-links-aside')
<div data-url="" class="linkMenu linkMenuAside linkMenu-active">
   <span class="fa fa-home" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-youtube-play" id="parentMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-file-pdf-o" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
<div class="linkMenu linkMenuAside" id="parentMenu-addChild-aside">
   <span class="fa fa-plus-circle"></span>&nbsp;
   Registrar Hijo
</div>
@stop

@section('under-menu')
<div id="parentMenu-addChild" class="z-depth-1">
   <span class="fa fa-plus-circle"></span>&nbsp;
   Registrar Hijo
</div>
@stop
@section('content')
<div class="container-fluid" id="container-baner">
  <!-- Banner -->
  <div class="row z-depth-1 animated fadeInRight" id="row-banner">
      <div class="view hm-black-strong z-depth-1 col-xs-12 banner-parent">
        <div class="mask flex-center waves-effect waves-light">
          <h4 class="h4-responsive white-text">&nbsp; @yield('title-baner') &nbsp;&nbsp;</h4>
        </div>
      </div>
   </div>
   <!--//.. Banner -->
</div>
@yield('content-parent')
@stop
@section('js')
<script type="text/javascript" src="/packages/assets/js/parent/parent.js"></script>
@yield('js-plus')
@stop
