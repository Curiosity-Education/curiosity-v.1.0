@extends('templates.user-master')

@section('menu-photo')
<div id="avatarContainerParent" class="center-align">
   <img src="/packages/assets/media/images/parents/profile/mom-def.png" class="responsive-img circle">
</div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu waves-effect waves-grey">
   <span class="mdi mdi-home icon-menu" id="icon-home"></span>&nbsp;
   Inicio
</div>
@stop

@section('under-menu')
<div id="addChild" class="waves-effect waves-teal">
   <span class="mdi mdi-plus-circle-outline icon-menu"></span>&nbsp;
   Registrar Hijo
</div>
@stop
