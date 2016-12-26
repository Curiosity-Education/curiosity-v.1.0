@extends('templates.child-menu')

@section('title')
	 Configuración de cuenta
@stop

@section('content')
	<div class="container-fluid">

		<div class="row">
			<!-- Banner -->
			<div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner">
			  <div class="mask flex-center">
				 <h4 class="h4-responsive white-text"><i class="fa fa-cogs"></i>&nbsp; Configuración de mi cuenta</h4>
			  </div>
			</div>

			<!-- Cards configuration -->
			div

		</div>
	</div>
@stop

@section('js-plus')
	{{ HTML::script('/packages/assets/js/child/configuration_account.js') }}
@stop
