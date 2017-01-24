@extends('templates.administer-menu')

@section('css-plus')
@stop

@section('baner-tittle')
  <i class="fa fa-newspaper-o"></i>&nbsp; Gestión de novedades
@stop

@section('content-administer')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 adNews-borderRight z-depth-1" id="adNews-form">
			<h4 class="h4-responsive text-xs-left"><i class="fa fa-file-text"></i>&nbsp; Novedad</h4>
			<hr>
		</div>
		<div class="col-md-8 adNews-content">
			<div class="row">
				<div id="adNews-allnews" class="z-depth-1">
					<h4 class="h4-responsive text-xs-left"><i class="fa fa-file-text"></i>&nbsp; Lista de Novedades</h4>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('js-plus')
   <script src="/packages/assets/js/administer/models/News.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/Controllers/newsController.js" charset="utf-8"></script>
   <script src="/packages/assets/js/administer/dispatchers/dsp-news.js" charset="utf-8"></script>
@stop
