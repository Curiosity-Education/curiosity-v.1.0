@extends('templates.child-menu')

@section('title')
	 Mi Perfil
@stop

@section('content')

<div class="container-fluid animated">

	<div class="row">
		<!-- Banner -->
		<div class="view hm-black-light z-depth-1 col-xs-12" id="pf-banner" style="background-image:url({{accesoriesController::getChildBanner()['ruta']}}{{accesoriesController::getChildBanner()['archivo']}}?{{rand();}});">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-user"></i>&nbsp; Mi Perfil | {{ Auth::user()->username; }} |</h4>
		  </div>
		</div>

		<!-- Cards of scores -->
		<div class="col-md-4 col-sm-12 col-xs-12 animated fadeInUpBig"><br>
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
							<div class="card-up pf-default" id="pf-bg-experience">
							</div>

							<!--Avatar-->
							<div class="avatar"><img id="pf-img-CardExperience" src="" class="rounded-circle img-responsive">
							</div>

							<div class="card-block">
								<!--Name-->
								<h6 class="h6-responsive card-title font-weight-bold">Experiencia: <span class="tag pf-default pf-tag" id="pf-text-CardExperience"></span></h6>
								<hr>
							</div>

						</div>
						<!--/.Card-->
						<!--Card-->
						<div class="card testimonial-card pf-card">

							<!--Bacground color-->
							<div class="card-up pf-default" id="pf-bg-coins">
							</div>

							<!--Avatar-->
							<div class="avatar"><img id="pf-img-CardCoins" src="" class="rounded-circle img-responsive">
							</div>

							<div class="card-block">
								<!--Name-->
								<h6 class="h6-responsive card-title font-weight-bold">Curiosity Coins: <span class="tag pf-default pf-tag" id="pf-text-CardCoins"></span></h6>
								<hr>
							</div>

						</div>
						<!--/.Card-->
						<!--Card-->
						<div class="card testimonial-card pf-card">

							<!--Bacground color-->
							<div class="card-up pf-default-goalDialy">
							</div>

							<!--Avatar-->
							<div class="avatar"><img id="pf-img-CardGoalDialy" src="" class="rounded-circle img-responsive">
							</div>

							<div class="card-block">
								<!--Name-->
								<h6 class="h6-responsive card-title font-weight-bold">Meta Diaria: <span class="tag pf-default-goalDialy pf-tag" id="pf-text-CardGoalDialy"></span></h6>
								<hr>
							</div>

						</div>
						<!--/.Card-->
					</div>
				</div>
			</div>
		</div>

	   	<!-- Graph of games of the day -->
	   	<div class="col-md-8 col-sm-12 col-xs-12 animated zoomIn"><br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 z-depth-1" id="pf-content-graph">
					<h2 id="pf-text-normal" class="pf-hidde h2-responsive text-xs-center">Juegos del Día <small>(meta diaria)</small></h2>
					<h4 id="pf-text-missing" class="pf-hidde h4-responsive text-xs-center">Te invitamos a comenzar tu meta diaria</h4>
					<hr class="pf-hr">
					<div class="text-xs-center pf-divGraph">
						<canvas id="pf-Graph" width="100%" height="60%"></canvas>
					</div>
				</div>
			</div>
	   	</div>
	</div>
</div>

@stop

@section('js-plus')
   <script src="/packages/libs/chart/Chart.min.js" charset="utf-8"></script>
   <script src="/packages/assets/js/child/models/dist/Profile-dist.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/child/controllers/profileCtrl.js?{{rand();}}" charset="utf-8"></script>
   <script src="/packages/assets/js/child/dispatchers/dsp-profile.js?{{rand();}}" charset="utf-8"></script>
@stop
@stop
