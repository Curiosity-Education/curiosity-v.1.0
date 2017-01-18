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
<div data-url="view-administer.admin-levels" class="linkMenu waves-effect">
   <span class="fa fa-cube"></span></span>&nbsp;
   Niveles (Grados)
</div>
<div data-url="view-administer.admin-intelligences" class="linkMenu waves-effect">
   <span class="fa fa-cube"></span></span>&nbsp;
   Inteligencias (Materias)
</div>
<div data-url="view-administer.admin-blocks" class="linkMenu waves-effect">
   <span class="fa fa-cube"></span></span>&nbsp;
   Bloques
</div>
<div data-url="view-administer.admin-topics" class="linkMenu waves-effect">
   <span class="fa fa-cube"></span></span>&nbsp;
   Temas
</div>
<div data-url="view-administer.admin-activities" class="linkMenu waves-effect">
   <span class="fa fa-cube"></span></span>&nbsp;
   Actividades (Juegos)
</div>
<div data-url="view-administer.asociateSchool" class="linkMenu waves-effect">
   <span class="fa fa-institution" id="msad-icon-institution"></span>&nbsp;
   Escuelas de apoyo
</div>
<div data-url="view-administer.admin-teachers" class="linkMenu waves-effect">
   <span class="fa fa-users" id="msad-icon-"></span>&nbsp;
   Profesores de apoyo
</div>
<div data-url="view-administer.admin-libraryPdfs" class="linkMenu waves-effect">
   <span class="fa fa-book" id="msad-icon-book"></span>&nbsp;
   Biblioteca de Pdfs
</div>
<div data-url="view-administer.admin-libraryVideos" class="linkMenu waves-effect">
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
