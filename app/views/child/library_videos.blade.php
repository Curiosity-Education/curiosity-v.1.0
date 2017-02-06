@extends('templates.child-menu')

@section('title')
	 Rincón de Videos
@stop

@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-youtube-play"></i>&nbsp; Rincón de Videos</h4>
		  </div>
		</div>
   	</div><br>

			<!-- Buttons with the degrees -->
		<div class="row" id="lp-row-degrees">
			<div class="col-md-10 col-sm-12 col-lg-10 lp-container-degrees z-depth-1">
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

    </div><br>
		<div id='pag' class="hidden-sm-down"></div>

    <!-- Carousel of cards with the pdfs only smartphones -->
    <div id="carrousel-videos">

    </div>

		<div class="modal fade" id="gst-modal-pdf-video" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		 <div class="modal-dialog">
			 <div class="modal-content">
				 <div class="modal-body">
						<div class="row">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-modal">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="col-md-8 col-sm-8 col-xs-12 gst-col" id="gst-link">

							</div>
							<div class="col-md-4 col-sm-8 col-xs-12 gst-col">
								<div class="gst-information">
								 <div class="gst-informataion-header">
									<div class="row">
										<div class="col-md-3" id="prof-img">

										</div>
										<div class="col-md-9" id="video-info">

										</div>
									</div>
								 </div>
								 <hr class="gst-hr-top">
								 <div class="row">
										<h4 class="text-center gst-title-content">Biblioteca de Videos</h4>
								 </div>
								 <hr class="gst-hr-bottom">
								 <div class="gst-information-list">
									<div class="col-md-12 gst-col recommended-videos">

									</div>
								 </div>
								 <div class="gst-information-footer">
									<p class="text-right">Curiosity-Educación</p>
								 </div>
								</div>
							</div>
						</div>
				 </div>
			 </div>
		 </div>
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
	<!-- {{ HTML::script('/packages/assets/js/child/library_videos.js') }} -->
	<script type="text/javascript" src="/packages/assets/js/child/models/library-videos.js?{{rand();}}"></script>
	<script type="text/javascript" src="/packages/assets/js/child/controllers/library-videosCrtrl.js?{{rand();}}"></script>
	<script type="text/javascript" src="/packages/assets/js/child/dispatchers/dp-library-videos.js?{{rand();}}"></script>
@stop
