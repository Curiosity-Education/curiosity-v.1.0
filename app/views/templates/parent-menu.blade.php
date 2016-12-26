@extends('templates.user-master')

@section('css')
<link rel="stylesheet" href="packages/assets/css/parent/main.css">
@yield('css-plus')
@stop

@section('menu-photo')
<div id="parentMenu-profileContainer" class="text-center">
   <img src="/packages/assets/media/images/parents/profile/mom-def.png" id="parentMenu-imgProfile">
</div>
@stop

@section('menu-links')
<div data-url="" class="linkMenu linkMenu-active">
   <span class="mdi mdi-home icon-menu" id="parentMenu-icon-home"></span>&nbsp;
   Inicio
</div>
<div data-url="" class="linkMenu">
   <span class="mdi mdi-youtube-play icon-menu" id="parentMenu-icon-videos"></span>&nbsp;
   Biblioteca de videos
</div>
<div data-url="" class="linkMenu">
   <span class="mdi mdi-file-pdf icon-menu" id="parentMenu-icon-files"></span>&nbsp;
   Biblioteca de archivos
</div>
@stop

@section('under-menu')
<div id="parentMenu-addChild">
   <span class="mdi mdi-plus-circle-outline icon-menu"></span>&nbsp;
   Registrar Hijo
</div>
@stop
@section('content')
	<!-- Banner -->
	<div class="row">
		<div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-file-pdf-o"></i>&nbsp; @yield('title-baner')</h4>
		  </div>
		</div>
	</div><br>
@stop
@section('js')
@yield('js-plus')
@stop
