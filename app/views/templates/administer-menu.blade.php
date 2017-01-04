<!-- Prefix "msad" -->

@extends('templates.user-master')

@section('css')
<link rel="stylesheet" href="/packages/assets/css/admins/main.css">
@yield('css-plus')
@stop

@section('menu-photo')
<div id="msad-profileContainer" class="text-center">
   <img src="/packages/assets/media/images/parents/profile/mom-def.png" class="img-fluid" id="msad-imgProfile">
</div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active">
   <span class="fa fa-cubes" id="msad-icon-cubes"></span>&nbsp;
   Gestión de contenido
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-" id="msad-icon-"></span>&nbsp;
   Escuelas de apoyo
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-users" id="msad-icon-users"></span>&nbsp;
   Profesores de apoyo
</div>
@stop

@section('menu-links-aside')
<div data-url="" class="linkMenu linkMenuAside linkMenu-active">
   <span class="fa fa-home" id="msad-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-youtube-play" id="msad-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-file-pdf-o" id="msad-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
<div class="linkMenu linkMenuAside" id="msad-addChild-aside">
   <span class="fa fa-plus-circle"></span>&nbsp;
   Registrar Hijo
</div>
@stop

@section('content')
<div class="view hm-black-strong z-depth-1 col-xs-12" id="msad-banner" >
   <div class="mask flex-center">
      <p class="white-text">@yield('baner-tittle')</p>
   </div>
</div>
@yield('content-administer')
@stop

@section('js')
@yield('js-plus')
@stop
