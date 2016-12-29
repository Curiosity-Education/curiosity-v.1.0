@extends('templates.child-menu')

@section('title')
Juego
@stop

@section('css-plus')
@stop

@section('content')
<div class="col-xs-12" id="gameView-infoPanel">
	<div class="col-sm-3">
		<button class="btn btn-default btn-fab" id="gameView-btnBack">
			<span class="mdi mdi-arrow-left-bold"></span>
		</button>
	</div>
	<div class="col-sm-9 text-right">
		<h3 id="gameView-maxScore">Puntaje Máximo: 700 Puntos</h3>
	</div>
</div>

<div class="col-xs-12" id="gameView-container"></div>

<div class="row">
	<div class="col-sm-4 gameView-buttonContainer">
		<button class="btn btn-primary btn-block">
			Descargar guía
		</button>
	</div>
	<div class="col-sm-4 gameView-buttonContainer">
		<button class="btn btn-primary btn-block">
			Video de ayuda
		</button>
	</div>
	<div class="col-sm-4 gameView-buttonContainer text-right">
		<button class="btn btn-primary btn-fab">
			<span class="mdi mdi-star"></span>
		</button>
	</div>
</div>
@stop

@section('js-plus')
@stop
