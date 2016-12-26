@extends('templates.user-master')

@section('css')
<link rel="stylesheet" href="packages/assets/css/parent/main.css">
@yield('css-plus')
@stop

@section('menu-photo')
<div id="parentMenu-profileContainer" class="text-center">
   <img src="/packages/assets/media/images/parents/profile/mom-def.png" id="parentMenu-imgProfile">
</div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active">
   <span class="fa fa-home icon-menu" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-youtube-play icon-menu" id="parentMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-youtube-play icon-menu" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
@stop

@section('menu-links-aside')
<div data-url="" class="linkMenu linkMenuAside linkMenu-active">
   <span class="fa fa-home icon-menu" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-youtube-play icon-menu" id="parentMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-file-pdf-o icon-menu" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
@stop

@section('under-menu')
<div id="parentMenu-addChild" class="z-depth-1">
   <span class="fa fa-plus-circle icon-menu"></span>&nbsp;
   Registrar Hijo
</div>
@stop

@section('js')
@yield('js-plus')
@stop
