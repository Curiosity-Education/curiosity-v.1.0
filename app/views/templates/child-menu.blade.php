@extends('templates.user-master')

@section('css')
{{ HTML::style('packages/assets/css/child/main.css') }}
@yield('css-plus')
@stop

@section('menu-title')
<h1 class="text-center" id="childMenu-name-menu">Hola soy Tot</h1>
@stop

@section('menu-photo')
<div id="childMenu-avatarContainer"><div></div></div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active">
   <span class="fa fa-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/menu-studio" class="linkMenu">
   <span class="fa fa-cubes childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Menú de estudio
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-user-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Perfil
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu">
   <span class="fa fa-shopping-cart childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda curiosity
</div>
@stop

@section('menu-links-aside')
<div data-url="" class="linkMenu linkMenu-active linkMenuAside">
   <span class="fa fa-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/menu-studio" class="linkMenu linkMenuAside">
   <span class="fa fa-cubes childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Menú de estudio
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-user-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Perfil
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-shopping-cart childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda curiosity
</div>
<div data-url="" class="linkMenu linkMenuAside">
   <span class="fa fa-caret-right childMenu-icon-exit" id="childMenu-icon-exit"></span>&nbsp;
   Salir
</div>
@stop

@section('js')
@yield('js-plus')
@stop
