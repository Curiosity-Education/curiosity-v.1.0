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
<div class="dropup">
   <div data-url="#" class="dropdown-toggle linkMenu waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="fa fa-cubes" id="msad-icon-cubes"></span>&nbsp;
      Gestión de contenido
   </div>
   <div class="dropdown-menu" aria-labelledby="dropdownMenu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
      <a class="dropdown-item msad-item waves-effect" href="view-administer.admin-levels">
         <span class="fa fa-cube"></span>&nbsp; Niveles (Grados)
      </a>
      <a class="dropdown-item msad-item waves-effect" href="view-administer.admin-intelligences">
         <span class="fa fa-cube"></span>&nbsp; Inteligencias (Materias)
      </a>
      <a class="dropdown-item msad-item waves-effect" href="view-administer.admin-blocks">
         <span class="fa fa-cube"></span>&nbsp; Bloques
      </a>
      <a class="dropdown-item msad-item waves-effect" href="view-administer.admin-topics">
         <span class="fa fa-cube"></span>&nbsp; Temas
      </a>
      <a class="dropdown-item msad-item waves-effect" href="#">
         <span class="fa fa-cube"></span>&nbsp; Actividades (Juegos)
      </a>
   </div>
</div>
<div data-url="view-administer.asociateSchool" class="linkMenu waves-effect">
   <span class="fa fa-institution" id="msad-icon-institution"></span>&nbsp;
   Escuelas de apoyo
</div>
<div data-url="#" class="linkMenu waves-effect">
   <span class="fa fa-users" id="msad-icon-"></span>&nbsp;
   Profesores de apoyo
</div>
<div data-url="view-administer.admin-libraryPdfs" class="linkMenu waves-effect">
   <span class="fa fa-book" id="msad-icon-book"></span>&nbsp;
   Biblioteca de Pdfs
</div>
<div data-url="#" class="linkMenu waves-effect">
   <span class="fa fa-youtube-play" id="msad-icon-play"></span>&nbsp;
   Biblioteca de Videos
</div>
@stop

@section('menu-links-aside')
<!-- <div data-url="#" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-home" id="msad-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-youtube-play" id="msad-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-file-pdf-o" id="msad-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div> -->
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
   <script src="/packages/libs/validation/jquery.validate.min.js" charset="utf-8"></script>
   <script src="/packages/libs/validation/localization/messages_es.min.js" charset="utf-8"></script>
   <!-- <script src="/packages/assets/js/config/request/request.js" charset="utf-8"></script>
   <script src="/packages/assets/js/config/db/database.js" charset="utf-8"></script>
   <script src="/packages/assets/js/config/db/corm.js" charset="utf-8"></script> -->
@yield('js-plus')
@stop
