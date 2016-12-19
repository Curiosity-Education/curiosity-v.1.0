@extends('templates.user-master')

@section('css')
    <link rel="stylesheet" href="packages/assets/css/parent/main.css">
@stop

@section('menu-photo')
<div id="profileContainerParent" class="center-align">
   <img src="/packages/assets/media/images/parents/profile/mom-def.png" class="responsive-img circle">
</div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active waves-effect waves-grey">
   <span class="mdi mdi-home icon-menu" id="icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-youtube-play icon-menu" id="icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-file-pdf icon-menu" id="icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
@stop

@section('under-menu')
<div id="addChild" class="waves-effect waves-teal">
   <span class="mdi mdi-plus-circle-outline icon-menu"></span>&nbsp;
   Registrar Hijo
</div>
@stop
