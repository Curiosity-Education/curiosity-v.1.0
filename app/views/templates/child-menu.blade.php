@extends('templates.user-master')

@section('css')
<link rel="stylesheet" href="/packages/assets/css/child/main.css?{{rand();}}">
@yield('css-plus')
@stop

@section('menu-title')
<h1 class="text-center" id="childMenu-name-menu">Hola soy Tot</h1>
@stop

@section('menu-photo')
<div id="childMenu-avatarContainer" style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
   <div id="childMenu-avatarContainerDiv"></div>
</div>
@stop

@section('menu-links')
<div data-url="/view-child.init" class="linkMenu waves-effect" id="linkCh-home">
   <span class="fa fa-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/view-child.menu-studio" class="linkMenu waves-effect">
   <span class="fa fa-cubes childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Rincón de Juegos
</div>
<div data-url="/view-child.profile" class="linkMenu waves-effect">
   <span class="fa fa-user-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Mi Perfil
</div>
<div data-url="/view-child.library_videos" class="linkMenu waves-effect">
   <span class="fa fa-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Rincón de Videos
</div>
<div data-url="/view-child.store" class="linkMenu waves-effect" id="linkCh-store" style="display:none !important;">
   <span class="fa fa-shopping-cart childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda Curiosity
</div>
<div data-url="/view-children/getInfoToConfig/view-child.configuration_account" class="linkMenu waves-effect">
   <span class="fa fa-gear childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Configuración
</div>
@stop

@section('menu-links-aside')
<div data-url="/" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/view-child.menu-studio" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-cubes childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Rincón de Juegos
</div>
<div data-url="/view-child.profile" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-user-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Mi Perfil
</div>
<div data-url="/view-child.library_videos" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Rincón de Videos
</div>
<div data-url="/tienda" class="linkMenu linkMenuAside waves-effect" style="display:none !important;">
   <span class="fa fa-shopping-cart childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda Curiosity
</div>
<div data-url="/view-children/getInfoToConfig/view-child.configuration_account" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-gear childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Configuración
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect logOutBtn">
   <span class="fa fa-caret-right childMenu-icon-exit" id="childMenu-icon-exit"></span>&nbsp;
   Salir
</div>
@stop

@section('js')
<script src="/packages/assets/js/administer/models/dist/Avatar-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/ItemGroup-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Item-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Secuence-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Sprite-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Level-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Intelligence-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Block-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/models/dist/Topic-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/child/models/dist/DailyGoal-dist.js?{{rand();}}"></script>
<script src="/packages/assets/js/administer/controllers/SpriteAnimator.js?{{rand();}}"></script>
<script src="/packages/assets/js/child/dispatchers/dsp-child.js?{{rand();}}"></script>
@yield('js-plus')
@stop
