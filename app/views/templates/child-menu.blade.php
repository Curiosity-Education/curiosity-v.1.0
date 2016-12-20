@extends('templates.user-master')

@section('css')
{{ HTML::style('packages/assets/css/child/main.css') }}
@yield('css-plus')
@stop

@section('menu-title')
<h1 class="text-center" id="childMenu-name-menu">Hola soy Tot</h1>
@stop

@section('menu-photo')
<div id="childMenu-avatarContainer" class="text-center"><div></div></div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active">
   <span class="mdi mdi-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/menu-studio" class="linkMenu">
   <span class="mdi mdi-cards childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Menú de estudio
</div>
<div data-url="" class="linkMenu">
   <span class="mdi mdi-account-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Perfil
</div>
<div data-url="" class="linkMenu">
   <span class="mdi mdi-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu">
   <span class="mdi mdi-basket childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda curiosity
</div>
@stop
