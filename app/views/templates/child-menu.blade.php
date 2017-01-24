@extends('templates.user-master')

@section('css')
{{ HTML::style('packages/assets/css/child/main.css') }}
@yield('css-plus')
@stop

@section('menu-title')
<h1 class="text-center" id="childMenu-name-menu">Hola soy Tot</h1>
@stop

@section('menu-photo')
<div id="childMenu-avatarContainer"><div id="childMenu-avatarContainerDiv"></div></div>
@stop

@section('menu-links')
<div data-url="/view-child.init" class="linkMenu waves-effect" id="linkCh-home">
   <span class="fa fa-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="/view-child.menu-studio" class="linkMenu waves-effect" style="display:none !important;">
   <span class="fa fa-cubes childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Menú de estudio
</div>
<div data-url="/view-child.profile" class="linkMenu waves-effect">
   <span class="fa fa-user-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Perfil
</div>
<div data-url="/view-child.library_videos" class="linkMenu waves-effect">
   <span class="fa fa-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="/view-child.store" class="linkMenu waves-effect" id="linkCh-store" style="display:none !important;">
   <span class="fa fa-shopping-cart childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda curiosity
</div>
@stop

@section('menu-links-aside')
<div data-url="/" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-home childMenu-icon-menu" id="childMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-cubes childMenu-icon-menu" id="childMenu-icon-study"></span>&nbsp;
   Menú de estudio
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-user-circle childMenu-icon-menu" id="childMenu-icon-profile"></span>&nbsp;
   Perfil
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect">
   <span class="fa fa-youtube-play childMenu-icon-menu" id="childMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="/tienda" class="linkMenu linkMenuAside waves-effect" style="display:none !important;">
   <span class="fa fa-shopping-cart childMenu-icon-menu" id="childMenu-icon-store"></span>&nbsp;
   Tienda curiosity
</div>
<div data-url="#" class="linkMenu linkMenuAside waves-effect logOutBtn">
   <span class="fa fa-caret-right childMenu-icon-exit" id="childMenu-icon-exit"></span>&nbsp;
   Salir
</div>
@stop

@section('js')
<script type="text/javascript" src="/packages/assets/js/ranking-curiosity.js"></script>
<script src="/packages/assets/js/administer/models/Avatar.js"></script>
<script src="/packages/assets/js/administer/models/ItemGroup.js"></script>
<script src="/packages/assets/js/administer/models/Item.js"></script>
<script src="/packages/assets/js/administer/models/Secuence.js"></script>
<script src="/packages/assets/js/administer/models/Sprite.js"></script>
<script src="/packages/assets/js/administer/models/Level.js"></script>
<script src="/packages/assets/js/administer/models/Intelligence.js"></script>
<script src="/packages/assets/js/administer/models/Block.js"></script>
<script src="/packages/assets/js/administer/models/Topic.js"></script>
<script src="/packages/assets/js/administer/models/Activity.js"></script>
<script src="/packages/assets/js/administer/controllers/SpriteAnimator.js"></script>
<script src="/packages/assets/js/child/dispatchers/dsp-child.js"></script>
@yield('js-plus')
@stop
