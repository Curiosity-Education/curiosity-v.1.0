@extends('templates.parent-menu')

@section('title')
	 Bibliotca de PDF'S
@stop

@section('title-baner')
 <i class="fa fa-file-pdf-o"></i>&nbsp; Biblioteca de PDF'S
@stop

@section('content-parent')
<div class="container-fluid animated" id="lp-container-all">

			<!-- Buttons with the degrees -->
		<div class="row" id="lp-row-degrees">
			<div class="col-md-8 col-sm-12 col-lg-8 lp-container-degrees z-depth-1">
				<div class="col-md-2 col-sm-3 lp-text-degrees text-xs-center ">
					<h6 class="font-weight-bold lp-text">Grados</h6>
				</div>

			</div>
		</div><br>

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

		<!-- Buttons with the differents topics -->
		<div class="row" id="lp-btn-topics">

		</div><br>

    <!-- Container of the pdfs -->
    <div class="row hidden-xs-down" id="lp-row-contPdf">
			<input type='hidden' id='current_page' />
			<input type='hidden' id='show_per_page' />  

    </div><br>

    <!-- Carousel of cards with the pdfs only smartphones -->
    <div id="carrousel-pdfs">

    </div>

</div> <!-- / container-fluid all -->

<div class="container-fluid" id="lp-container-showPDf">

	<div class="row z-depth-1 lp-content-disabled animated fadeInRight" id="lp-row-showPDF">
		<div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner-showPDF">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-file-pdf-o hidden-xs-down"></i>&nbsp; <span id="topic-name"></span> &nbsp;&nbsp;<i class="float-xs-right fa fa-times-circle hidden-sm-up lp-close"></i></h4>
		  </div>
			 <a class="btn-floating btn-small primary-color-dark float-xs-right hidden-xs-down lp-close"><i class="fa fa-times"></i></a>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 lp-content-pdf">

			<h1 class="h1-responsive text-xs-center" id="lp-text-info">Por favor gira tu dispositivo para mejor lectura</h1>
		</div>
	</div>

</div> <!-- / container-fluid show PDF -->

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

	{{ HTML::script('/packages/assets/js/parent/library_pdfs.js') }}
	<script type="text/javascript" src="/packages/assets/js/parent/models/library-pdfs.js?{{rand();}}"></script>
	<script type="text/javascript" src="/packages/assets/js/parent/controllers/library-pdfsCrtrl.js?{{rand();}}"></script>
	<script type="text/javascript" src="/packages/assets/js/parent/dispatchers/dp-library-pdfs.js?{{rand();}}"></script>
@stop
