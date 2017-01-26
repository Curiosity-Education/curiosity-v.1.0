@extends('templates.child-menu')

@section('title')
	 Mi Perfil
@stop

@section('content')

<div class="container-fluid animated">

	<div class="row">
		<!-- Banner -->
		<div class="view hm-black-strong z-depth-1 col-xs-12" id="pf-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-user"></i>&nbsp; Mi Perfil "USERNAME"</h4>
		  </div>
		</div>

		<!-- Cards of scores -->
		<div class="col-md-4 col-sm-4 col-xs-12"><br>
			<div class="row">
				<div class="z-depth-1 col-md-12 col-sm-12 col-xs-12" id="pf-content-cards">
					<div class="pf-indicators text-xs-center">
						<span class="tag pf-warning">Mejorar</span>
						<span class="tag pf-good">Muy bien</span>
						<span class="tag pf-perfect">Excelente</span>
					</div>
					<div class="" id="pf-cardScore">
						<!--Card-->
						<div class="card testimonial-card pf-card">

							<!--Bacground color-->
							<div class="card-up pf-warning">
							</div>

							<!--Avatar-->
							<div class="avatar"><img src="packages/assets/media/images/child/emoji-warning.png" class="rounded-circle img-responsive">
							</div>

							<div class="card-block">
								<!--Name-->
								<h6 class="h6-responsive card-title font-weight-bold">Experiencia: <span class="tag pf-warning pf-tag">10000 pts</span></h6>
								<hr>
							</div>

						</div>
						<!--/.Card-->
						<!--Card-->
						<div class="card testimonial-card pf-card">

							<!--Bacground color-->
							<div class="card-up pf-good">
							</div>

							<!--Avatar-->
							<div class="avatar"><img src="packages/assets/media/images/child/emoji-good.png" class="rounded-circle img-responsive">
							</div>

							<div class="card-block">
								<!--Name-->
								<h6 class="h6-responsive card-title font-weight-bold">Curiosity Coins: <span class="tag pf-good pf-tag">1000 cc</span></h6>
								<hr>
							</div>

						</div>
						<!--/.Card-->
						<!--Card-->
						<div class="card testimonial-card pf-card">

							<!--Bacground color-->
							<div class="card-up pf-perfect">
							</div>

							<!--Avatar-->
							<div class="avatar"><img src="packages/assets/media/images/child/objective-excited.png" class="rounded-circle img-responsive">
							</div>

							<div class="card-block">
								<!--Name-->
								<h6 class="h6-responsive card-title font-weight-bold">Meta Diaria: <span class="tag pf-perfect pf-tag">Emocionado</span></h6>
								<hr>
							</div>

						</div>
						<!--/.Card-->
					</div>
				</div>
			</div>
		</div>

	   	<!-- Graph of games of the day -->
	   	<div class="col-md-8 col-sm-8 col-xs-12"><br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 z-depth-1" id="pf-content-graph">
					<h2 class="h2-responsive text-xs-center">Juegos del Día <small>(meta diaria)</small></h2><hr class="pf-hr">
					<div class="text-xs-center pf-divGraph">
						<canvas id="pf-makeGraph" width="100%" height="60%"></canvas>
					</div>
				</div>
			</div>
	   	</div>
	</div>
</div>

@stop

@section('js-plus')
	{{ HTML::script('/packages/libs/chart/Chart.min.js') }}
	<link rel="stylesheet" href="/packages/assets/js/child/profile.js?{{rand();}}">
@stop
