@extends('templates.child-menu')


@section('title')
    Eligue Tú Avatar
@stop


@section('content')
<div class="container-fluid">
    <div class="row">
       <!-- style="background-image:url({{accesoriesController::getChildBanner()['ruta']}}{{accesoriesController::getChildBanner()['archivo']}}?{{rand();}});" -->
        <!-- Banner -->
		<div class="view hm-black-light z-depth-1 col-xs-12" id="sela-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-hand-pointer-o"></i>&nbsp; Selección de Avatar</h4>
		  </div>
		</div>

        <!-- Contentainer -->
        <div class="col-md-12 z-depth-1" id="sela-container">
            <h4 class="h4-responsive text-xs-center">¡ Elige el Avatar que más te guste !</h4>
            <hr>
            <div class="row">
            	<div class="col-md-6">

            	</div>
            	<div class="col-md-6">

            	</div>
            </div>
        </div>
    </div>
</div>
@stop


@section('js-plus')


@stop
@stop
