@extends('templates.parent-menu')

@section('title')
	 INICIO
@stop

@section('css-plus')
<link rel="stylesheet" href="/packages/libs/materialize/css/carousel.css">
@stop

@section('content')
<div id="hm-init" class="">
	<div class="carousel hm-carousel animated fadeInDown">
	</div>

	<div id="prntHome-contentInfo" class="z-depth-1 animated fadeInUp">
	   <center><div id="prntHome-contentInfo-arrow"></div></center>
	   <h5 id="name_son_selected">Nombre del hijo</h5>
	   <div class="row">
	       <div class="col-md-8">

                <form class="form-inline" id="materias" style="display:none;">

                </form>
               <div class="row">
                   <img src="/packages/assets/media/images/parents/aviso_papa.png" style="display:none; margin-left:25%;" id="dadNotice" alt="Invita a jugar a tu hijo" class="col-md-7 col-md-offset-3">
               </div>
               <canvas id="myChart" width="200" height="200"></canvas>
           </div>
           <div class="col-md-4 col-md-offset-1">
                <h3>Progreso de tu hijo</h3>
                <p>
                    Esta sección te mostrará la calificación que tu hijo obtiene jugando en la plataforma. <br>
                    Tu puedes seleccionar la matería y ver su calificación dividida en los temas vistos por tu hijo. <br>
                    NOTA: Esta gráfica muestra las actividades de su grado actual.
                </p>
                <p>
                    Si observas algún tema en la que tu hijo tiene un bajo desempeño, tu puedes ayudarlo entrando en la sección de "¿Cómo ayudo a mi hijo?".
                    Dando click en el botón de abajo podrás llegar a esta sección.
                </p>
                <button type="button" class="btn" id="hm-btn-HelpSon" disabled>Ayudar a mi Hijo</button>
           </div>
	   </div>
	</div>
</div>

<div class="container-fluid hm-content-disabled animated fadeInUp" id="hm-viewHelp">
		<div class="row">

		<div class="view hm-black-strong z-depth-1 col-xs-12" id="chp-banner">
		  <div class="mask flex-center">
			 <h4 class="h4-responsive white-text"><i class="fa fa-heart hidden-xs-down"></i>&nbsp; ¿Cómo ayudo a mi hijo? &nbsp;&nbsp;<i class="float-xs-right fa fa-times-circle hidden-sm-up lp-close"></i></h4>
		  </div>
			 <a class="btn-floating btn-small primary-color-dark float-xs-right hidden-xs-down hm-close"><i class="fa fa-times"></i></a>
		</div>

			<section class="chp-help">
			  <div class="">
				<div class="row">
				  <div class="col-sm-6 col-md-4 chp-panels">
						<!--Panel-->
						<div class="card chp-cards chp-Weak-card">
							<div class="card-header chp-backColor white-text text-left">
								<i class="fa fa-eye"></i>&nbsp; Temas débiles de <b id="name_low_son"></b>
							</div>
							<div class="card-block chp-" id="chp-contentTopics">
							<ul>

							</ul>
							</div>
						</div>
						<!--/.Panel-->
				  </div>
					<div class="col-sm-6 col-md-8 chp-panels">
						<div class="card chp-cards" id="chp-contentMaterial">
							<div class="card-header chp-backColor white-text">
						  		<i class="fa fa-cube"></i>&nbsp; Material para <span id="topic_name_help"></span>
							</div>
						<div class="card-block" id="itemsRecommend">

						</div>
					</div>
					</div>

				  <div class="col-sm-12 col-md-8" hidden="hidden">
					<div class="card chp-cards">
						<div class="card-header chp-backColor white-text">
						  <i class="fa fa-bookmark text-xs-left"></i>&nbsp; Librerías SM te ofrece Material extra de refuerzo
						</div>
						<div class="card-block">
							<div class="col-sm-4 col-md-4 col-xs-12">
								<div>
									<center>
										<img src="packages/assets/media/images/parents/documento.jpg" alt="" class="chp-bookImg">
									</center>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
						  	  <h3 class="h3-responsive text-xs-center">Fracciones</h3>
							  <p class="text-xs-center chp-book-desc">4to. Grado</p>
							  <p class="text-xs-center chp-book-desc">Librerías SM</p>
							</div>
							<div class="col-sm-4 col-md-4 col-xs-12">
								<div class="chp-btn-book">
								  <center>
								  	 <a id="chp-btnSM" class="btn btn-rounded chp-btn chp-btn-bookshop">Adquirir para Juan</a>
								  </center>
								</div>
							</div>
						</div>
					</div>
					</div>
				  </div>
				</div>
			</section>
		</div>
	</div>
@stop

@section('js')
    <script src="/packages/libs/materialize/js/materialize.js" charset="utf-8"></script>
    <script src="/packages/libs/chart/Chart.min.js" charset="utf-8"></script>
    <script src="/packages/assets/js/administer/models/Intelligence.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/models/Parent.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/controllers/parentController.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/dispatchers/dsp-parent.js?{{rand();}}"></script>
    <script src="/packages/assets/js/parent/homeParent-main.js?{{rand();}}" charset="utf-8"></script>
@stop
