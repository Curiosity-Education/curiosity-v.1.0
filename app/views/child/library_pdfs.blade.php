@extends('templates.child-menu')

@section('title')
	 Rincón de PDF'S
@stop

@section('content')

<div class="container-fluid">
	<!-- Buttons with the differents topics -->
	<div class="row">
		<button type="button" class="btn btn-primary lp-topic-active">Matemáticas</button>
		<button type="button" class="btn btn-info">Robótica</button>
	</div><br>

    <!-- Buttons with the degrees -->
	<div class="row" id="lp-row-degrees">
		<div class="col-md-8 lp-container-degrees z-depth-1">
			<div class="col-md-2 lp-text-degrees text-xs-center ">
				<h6 class=" lp-text">Grados</h6>
			</div>
			<button type="button" class="btn btn-info lp-btn-degrees">1°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">2°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">3°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">4°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">5°</button>
			<button type="button" class="btn btn-info lp-btn-degrees">6°</button>
		</div>
	</div>

    <!-- Container of the pdfs -->	
</div>

@stop

@section('js')
	{{ HTML::script('/packages/assets/js/child/library_pdfs.js') }}
@stop
