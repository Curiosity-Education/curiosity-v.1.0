@extends('templates.child-menu')

@section('title')
	 Rincón de Videos
@stop

@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-youtube-play"></i>&nbsp; Biblioteca de Videos</h4>
		  </div>
		</div>
   	</div><br>

	<!-- Buttons with the differents topics -->
	<div class="row" id="lp-btn-topics">
		<button type="button" class="btn btn-lg lp-topic-active lp-btnTopic">Matemáticas</button>
		<button type="button" class="btn btn-lg lp-btnTopic">Robótica</button>
	</div>

    <!-- Carousel of buttons with the topics only smartphones -->
    <div class="row z-depth-1 hidden-sm-up lp-row-slide" id="lp-row-slideTopics" hidden="hidden">
    	<!--Carousel Wrapper-->
		<div id="lp-slide-btnTopics" class="carousel slide carousel-multi-item" data-ride="carousel">

			<!--Controls-->
			<div class="controls-top">
				<a class="btn-floating btn-small" href="#lp-slide-btnTopics" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
				<a class="btn-floating btn-small" href="#lp-slide-btnTopics" data-slide="next"><i class="fa fa-chevron-right"></i></a>
			</div>
			<!--/.Controls-->

			<!--Indicators-->
			<ol class="carousel-indicators">
				<li data-target="#lp-slide-btnTopics" data-slide-to="0" class="active"></li>
				<li data-target="#lp-slide-btnTopics" data-slide-to="1"></li>
			</ol>
			<!--/.Indicators-->

			<!--Slides-->
			<div class="carousel-inner" role="listbox">
				<!--First slide-->
				<div class="carousel-item active text-xs-center">

					<div class="col-xs-12">
						<button type="button" class="btn lp-topic-active lp-btnTopic">Matemáticas</button>
					</div>

					<div class="col-xs-12">
						<button type="button" class="btn lp-btnTopic">Robótica</button>
					</div>
				</div>
				<!--/.First slide-->

				<div class="carousel-item text-xs-center">
					<div class="col-xs-12">
						<button type="button" class="btn btn-info lp-btnTopic">Español</button>
					</div>

					<div class="col-xs-12">
						<button type="button" class="btn btn-info lp-btnTopic">Ciencias</button>
					</div>
				</div>
			</div>
			<!--/.Slides-->
		</div>
		<!--/.Carousel Wrapper-->
    </div>

    <!-- Buttons with the degrees -->
	<div class="row" id="lp-row-degrees">
		<div class="col-md-8 col-sm-12 lp-container-degrees z-depth-1 animated fadeInRight">
			<div class="col-md-2 col-sm-3 lp-text-degrees text-xs-center ">
				<h6 class="font-weight-bold lp-text">Grados</h6>
			</div>
			<button type="button" class="btn lp-btn-degrees lp-btn-active">1°</button>
			<button type="button" class="btn lp-btn-degrees">2°</button>
			<button type="button" class="btn lp-btn-degrees">3°</button>
			<button type="button" class="btn lp-btn-degrees">4°</button>
			<button type="button" class="btn lp-btn-degrees">5°</button>
			<button type="button" class="btn lp-btn-degrees">6°</button>
		</div>
	</div><br>

    <!-- Container of the pdfs -->
    <div class="row hidden-xs-down" id="lp-row-contPdf">
    	<div class="col-md-12 col-sm-12 col-xs-12 lp-container-pdf z-depth-1 animated bounceIn">
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    		<a href="#">
    			<div class="col-md-3 col-sm-3 col-xs-4">
					<div class="lp-bg-card" >
						<div class="card-overlay lp-card-pdf">
						<!--Content-->
							<div class="white-text text-xs-center">
								<div class="card-block">
									<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
									<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

								</div>
							</div>
						</div>
					</div>
				</div>
    		</a>
    	</div>
    </div><br>

    <!-- Carousel of cards with the pdfs only smartphones -->
    <div class="row z-depth-1 hidden-sm-up lp-row-slide" id="lp-row-slidePdfs">
    	<!--Carousel Wrapper-->
		<div id="lp-slide-cardPdf" class="carousel slide carousel-multi-item" data-ride="carousel">

			<!--Controls-->
			<div class="controls-top">
				<a class="btn-floating btn-small" href="#lp-slide-cardPdf" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
				<a class="btn-floating btn-small" href="#lp-slide-cardPdf" data-slide="next"><i class="fa fa-chevron-right"></i></a>
			</div>
			<!--/.Controls-->

			<!--Indicators-->
			<ol class="carousel-indicators">
				<li data-target="#lp-slide-cardPdf" data-slide-to="0" class="active"></li>
				<li data-target="#lp-slide-cardPdf" data-slide-to="1"></li>
			</ol>
			<!--/.Indicators-->

			<!--Slides-->
			<div class="carousel-inner" role="listbox">
				<!--First slide-->
				<div class="carousel-item active text-xs-center">

					<div class="col-xs-12">
						<div class="lp-bg-card" >
							<div class="card-overlay lp-card-pdf">
							<!--Content-->
								<div class="white-text text-xs-center">
									<div class="card-block">
										<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
										<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="lp-bg-card" >
							<div class="card-overlay lp-card-pdf">
							<!--Content-->
								<div class="white-text text-xs-center">
									<div class="card-block">
										<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
										<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.First slide-->

				<div class="carousel-item text-xs-center">
					<div class="col-xs-12">
						<div class="lp-bg-card" >
							<div class="card-overlay lp-card-pdf">
							<!--Content-->
								<div class="white-text text-xs-center">
									<div class="card-block">
										<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
										<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="lp-bg-card" >
							<div class="card-overlay lp-card-pdf">
							<!--Content-->
								<div class="white-text text-xs-center">
									<div class="card-block">
										<h5 class="h5-responsive lp-text-card"><i class="fa fa-play-circle"></i> VIDEO</h5><hr class="lp-hr">
										<h4 class="h5-responsive lp-name-pdf" id="lp-namePDF">Sucesión Númerica</h4>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.Slides-->
		</div>
		<!--/.Carousel Wrapper-->
    </div>
</div>
@stop

@section('js-plus')
	<script type="text/javascript">

		$(document).ready(function(){

			// start tooltip
     		$('[data-toggle="tooltip"]').tooltip();

			// TOUCH GESTURES
				// slider buttons topics
				$('#lp-slide-btnTopics').hammer().on('panleft', function () {
					$(this).carousel('next');
				})
				$('#lp-slide-btnTopics').hammer().on('panright', function () {
					$(this).carousel('prev');
				})

				// slider cards pdfs
				$('#lp-slide-cardPdf').hammer().on('panleft', function () {
					$(this).carousel('next');
				})
				$('#lp-slide-cardPdf').hammer().on('panright', function () {
					$(this).carousel('prev');
				})

		});

	</script>
	{{ HTML::script('/packages/assets/js/child/library_videos.js') }}
@stop
