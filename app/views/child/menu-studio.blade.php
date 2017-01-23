@extends('templates.child-menu')
    @section('css')
    <link rel="stylesheet" type="text/css" href="packages/assets/css/child/main.css">
    @stop
    @section('title')Biblioteca de Juegos @stop
    @section('content')
      <div class="container-fluid" id="container-menu-studio-child">
       <!-- Banner -->
        <div class="row">
            <div class="view hm-black-strong z-depth-1 col-xs-12" id="lp-banner">
              <div class="mask flex-center">
                 <h4 class="h4-responsive white-text"><i class="fa fa-gamepad"></i>&nbsp; Biblioteca de Juegos</h4>
              </div>
            </div>
        </div><br>
        <!--//.. Banner -->

        <div class="row">

      		<!-- Row inteligents and Degrees -->
        <div class="" id="row-inteligents">
          <div class="col-inteligent">
            <a class="btn ms-btnTopic btn-lg btn-inteligent btn-math ms-active"><i class="fa fa-book"></i>&nbsp; Matemáticas
              <div class="ms-arrow"></div>
            </a>
			<a class="btn ms-btnTopic btn-lg btn-inteligent btn-robotic"><i class="fa fa-book"></i>&nbsp; Robotica
              <div class="ms-arrow"></div>
            </a>
          </div>

        </div>

        <div class="row row-bloque">
          <div class="col-md-11 col-sm-11 col-xs-12">
            <div class="card-bloque">
              <div class="card-content-bloque">
                <h6 class="card-title-bloque font-weight-bold">Matemáticas | Bloques </h6>
                <a class="btn btn-bloque active"> 1</a>
                <a class="btn btn-bloque"> 2</a>
                <a class="btn btn-bloque"> 3</a>
                <a class="btn btn-bloque"> 4</a>
                <a class="btn btn-bloque"> 5</a>
                <a class="btn btn-bloque"> 6</a>
                <a class="dismiss ms-close float-xs-right" data-dismiss-target=".row-level"><i class="fa fa-times-circle fa-2x"></i></a>
               </div>
            </div>
          </div>
        </div>
        <div class="row row-level">
          <div class="col-md-11 col-sm-11">
            <div class="card-level">
              <div class="card-content-bloque">
                <h6 class="card-title-level font-weight-bold">Matemáticas | Grados </h6>
                <a class="btn btn-level"> 1°</a>
                <a class="btn btn-level"> 2°</a>
                <a class="btn btn-level"> 3°</a>
                <a class="btn btn-level"> 4°</a>
                <a class="btn btn-level"> 5°</a>
                <a class="btn btn-level"> 6°</a>
                <a class="dismiss ms-close" data-dismiss-target=".row-level"><i class="fa fa-times-circle fa-2x"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!--//.. Row inteligents and Degrees -->

        <div class="z-depth-1 animated bounceIn" id="ms-conteiner-all">
        	<!-- row cards games -->
			<div class="row">
			  <div class="col-md-4 col-sm-4">
				<!--Card-->
				<div class="card card-game hm-black-light ms-card">
					<!--Card image-->
					<div class="view mask">
						<img src="packages/assets/media/images/games/wallpapers/BALANZA.png" class="img-fluid" alt="">
						<a href="#">
							<div class="mask"></div>
						</a>
					</div>
					<!--/.Card image-->
					<!--Card content-->
					<div class="card-block text-center">
						<!--Title-->
						<h5 class="card-title">Lectura de digitos</h5>
						<!--Text-->
						<p class="card-text"><i class="fa fa-gamepad"></i> digit math</p>
						<a class="btn ms-btn-info btn-rounded">jugar</a>
					</div>
					<!--/.Card content-->

				</div>
				<!--/.Card-->
			  </div>
			  <div class="col-md-4 col-sm-4">
				 <!--Card-->
				<div class="card card-game hm-black-light ms-card">

					<!--Card image-->
					<div class="view mask">
						<img src="packages/assets/media/images/games/wallpapers/ballon.png" class="img-fluid" alt="">
						<a href="#">
							<div class="mask"></div>
						</a>
					</div>
					<!--/.Card image-->

					<!--Card content-->
					<div class="card-block text-center">
						<!--Title-->
						<h5 class="card-title">Restas rapidas</h5>
						<!--Text-->
						<p class="card-text"><i class="fa fa-gamepad"></i> Cool math</p>
						<a class="btn ms-btn-info btn-rounded">jugar</a>
					</div>
					<!--/.Card content-->

				</div>
				<!--/.Card-->
			  </div>
			  <div class="col-md-4 col-sm-4">
				<!--Card-->
				<div class="card card-game hm-black-light ms-card">

					<!--Card image-->
					<div class="view mask">
						<img src="packages/assets/media/images/games/wallpapers/CANDY.png" class="img-fluid" alt="">
						<a href="#">
							<div class="mask"></div>
						</a>
					</div>
					<!--/.Card image-->

					<!--Card content-->
					<div class="card-block text-center">
						<!--Title-->
						<h5 class="card-title">Restas Mentales</h5>
						<!--Text-->
						<p class="card-text"><i class="fa fa-gamepad"></i> Cool math.</p>
						<a class="btn ms-btn-info btn-rounded">jugar</a>
					</div>
					<!--/.Card content-->

				</div>
				<!--/.Card-->
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-4 col-md-4">
				 <!--Card-->
				<div class="card card-game hm-black-light ms-card">
					<!--Card image-->
					<div class="view mask">
						<img src="packages/assets/media/images/games/wallpapers/ballon.png" class="img-fluid" alt="">
						<a href="#">
							<div class="mask"></div>
						</a>
					</div>
					<!--/.Card image-->

					<!--Card content-->
					<div class="card-block text-center">
						<!--Title-->
						<h5 class="card-title">Sucesión númerica</h5>
						<!--Text-->
						<p class="card-text"><i class="fa fa-gamepad"></i> frog Jumb.</p>
						<a class="btn ms-btn-info btn-rounded">jugar</a>
					</div>
					<!--/.Card content-->

				</div>
				<!--/.Card-->
			  </div>
			  <div class="col-md-4 col-sm-4">
				 <!--Card-->
				<div class="card card-game hm-black-light ms-card">

					<!--Card image-->
					<div class="view mask">
						<img src="packages/assets/media/images/games/Wallpapers/CANDY.png" class="img-fluid" alt="">
						<a href="#">
							<div class="mask"></div>
						</a>
					</div>
					<!--/.Card image-->

					<!--Card content-->
					<div class="card-block text-center">
						<!--Title-->
						<h5 class="card-title">Grafica de barras</h5>
						<!--Text-->
						<p class="card-text"><i class="fa fa-gamepad"></i> chocomath</p>
						<a class="btn ms-btn-info btn-rounded">jugar</a>
					</div>
					<!--/.Card content-->

				</div>
				<!--/.Card-->
			  </div>
			  <div class="col-md-4 col-sm-4">
				 <!--Card-->
				<div class="card card-game hm-black-light ms-card">

					<!--Card image-->
					<div class="view mask">
						<img src="packages/assets/media/images/games/wallpapers/BALANZA.png" class="img-fluid" alt="">
						<a href="#">
							<div class="mask"></div>
						</a>
					</div>
					<!--/.Card image-->

					<!--Card content-->
					<div class="card-block text-center">
						<!--Title-->
						<h5 class="card-title">Sucesión númerica</h5>
						<!--Text-->
						<p class="card-text"><i class="fa fa-gamepad"></i> Chocolemath</p>
						<a class="btn ms-btn-info btn-rounded">jugar</a>
					</div>
					<!--/.Card content-->

				</div>
				<!--/.Card-->
			  </div>
			</div>
			<!--//.. row cards games -->
        </div>

      	</div>

      </div>
    @stop
@section('js')
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/child/menu-studio.js"></script>
@stop
