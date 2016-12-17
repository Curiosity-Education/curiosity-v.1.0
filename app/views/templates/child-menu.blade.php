@extends('templates.user-master')

@section('menu-title')
<h1 class="center-align" id="name-menu">Hola Curiosity</h1>
@stop

@section('menu-photo')
<div id="avatarContainer" class="center-align"><div></div></div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-home icon-menu" id="icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-cards icon-menu" id="icon-study"></span>&nbsp;
   Menú de estudio
</div>
<div data-url="" class="linkMenu linkMenu-active waves-effect waves-grey">
   <span class="mdi mdi-account-circle icon-menu" id="icon-profile"></span>&nbsp;
   Perfil
</div>
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-youtube-play icon-menu" id="icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-file-pdf icon-menu" id="icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-basket icon-menu" id="icon-store"></span>&nbsp;
   Tienda curiosity
</div>
@stop
