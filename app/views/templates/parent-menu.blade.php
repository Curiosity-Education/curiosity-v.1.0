@extends('templates.user-master')

@section('css')
<link rel="stylesheet" href="/packages/assets/css/parent/main.css?{{rand();}}">
@yield('css-plus')
@stop

@section('menu-photo')
<div id="parentMenu-profileContainer" class="text-center">
   <img src="/packages/assets/media/images/parents/profile/{{Auth::user()->Person->Dad->foto_perfil}}" id="parentMenu-imgProfile">
</div>
@stop

@section('menu-links')
<div data-url="/view-parent.home" class="linkMenu waves-effect">
   <span class="fa fa-home" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/view-parents/getDataPerfil/view-parent.profile/" class="linkMenu waves-effect">
   <span class="fa fa-user" id="parentMenu-icon-files"></span>&nbsp;
   Mi perfil
</div>
<div data-url="/view-parent.library_pdfs" class="linkMenu waves-effect">
   <span class="fa fa-file-pdf-o" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de PDF'S
</div>
<div data-url="/view-parent.child_registration" class="linkMenu waves-effect" id="parentMenu-addChild-aside">
   <span class="fa fa-users"></span>&nbsp;
   Gestión de Mis Hijos
</div>
<!-- <div data-url="/view-parentSuscription/infoClient/view-parent.move_to_plan/" class="linkMenu waves-effect parentMenu-confsusc">
   <span class="fa fa-cog"></span>&nbsp;
   Gestión de suscripción
</div> -->
@stop

@section('menu-links-aside')
<div data-url="/view-parents/getDataPerfil/view-parent.profile/" class="linkMenu linkMenuAside waves-effec">
   <span class="fa fa-home" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
 <div data-url="/view-parent.profile" class="linkMenu linkMenuAside waves-effec">
   <span class="fa fa-user" id="parentMenu-addChild-aside"></span>&nbsp;
   Mi Perfil
</div>
<div data-url="/view-parent.library_pdfs" class="linkMenu linkMenuAside waves-effec">
   <span class="fa fa-file-pdf-o" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de PDF'S
</div>
 <div data-url="/view-parent.child_registration" class="linkMenu linkMenuAside waves-effec" id="parentMenu-addChild-aside">
   <span class="fa fa-cogs"></span>&nbsp;
   Gestión de Mis Hijos
 </div>
<div data-url="#" class="linkMenu linkMenuAside logOutBtn waves-effec">
   <span class="fa fa-caret-right parentMenu-icon-exit" id="parentMenu-icon-exit"></span>&nbsp;
   Salir
</div>
@stop

@section('under-menu')
<div data-url="/view-parent.child_registration" id="parentMenu-addChild" class="z-depth-1 linkMenu waves-effect">
   <span class="fa fa-plus-circle"></span>&nbsp;
   Registrar Hijo
</div>
@stop
@section('content')
<div class="container-fluid" id="container-baner">
  <!-- Banner -->
  <div class="row z-depth-1 animated fadeInRight" id="row-banner">
      <div class="view border-standard hm-black-strong z-depth-1 col-xs-12 banner-parent">
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
<script type="text/javascript" src="/packages/assets/js/parent/parent.js?{{rand();}}"></script>
@yield('js-plus')
@stop
