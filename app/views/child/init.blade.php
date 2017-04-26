@extends('templates.child-menu')
    @section('css')
    <link rel="stylesheet" type="text/css" href="packages/assets/css/child/main.css?{{rand();}}">
    @stop

    @section('title')INICIO @stop
    @section('content')
      <div class="container-fluid" id="container-main-child">
          <!-- sección de slide principal-->
          <div class="row row-slide-main">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <img src="packages/assets/media/images/child/nav1.png?{{rand();}}" class="img-fluid img-responsive card img-nav">
            </div>
          </div>
          <!--// find de sección del slide principal -->
          <!-- sección de zona de paneles-->
          <div class="panels">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12 animated zoomInDown">
                <div class="hm-black-strong hoverable card z-depth-1 in-card" style="background-image: url('packages/assets/media/images/child/game_news.png?{{rand();}}')">
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3>Nuevos</h3>
                            <p></p>

                            <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="recents"> Ver juegos</a>

                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 animated zoomInDown">
                <div class="hm-black-strong hoverable card z-depth-1 in-card" style="background-image: url('packages/assets/media/images/child/mejorcalificados.png?{{rand();}}')">
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3>Mejor calificados</h3>
                            <p></p>

                             <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="ranks"> Ver juegos</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12 standard-bordered animated zoomInUp">
                <div class="hm-black-strong hoverable card z-depth-2 in-card" style="background-image: url('packages/assets/media/images/child/game_popular.png?{{rand();}}')">
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3> Populares</h3>
                            <p></p>
                           <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="populars"> Ver juegos</a>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 standard-bordered animated zoomInUp">
                <div class="hm-black-strong hoverable card z-depth-2 in-card" style="background-image: url('packages/assets/media/images/child/gamesrecoments.png?{{rand();}}')">
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3>Recomendados</h3>
                            <p></p>
                             <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="recomended"> Ver juegos</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
          <!-- Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->
          <div class="row" id="card-container-games">
            <div class="col-md-12 col-sm-12">
              <div class="card-game" id="card-game-bigBox" style="background-image:url({{accesoriesController::getChildMenuBg()['ruta']}}{{accesoriesController::getChildMenuBg()['archivo']}}?{{rand();}});">
                <div class="card-header-game text-center init-titleGame">
                  <h4 class="card-title flex-center"> <i class="fa fa-gamepad"></i> Juegos Nuevos</h4>
                  <a class="dismiss-card btn-floating btn-small float-xs-right init-btnClose hidden-xs-down" data-dismiss-target="#card-container-games"><i class="fa fa-times"></i></a>
                  <a class="hidden-sm-up dismiss-card pull-right init-btnClose-xs" data-dismiss-target="#card-container-games"><i class="fa fa-times-circle white-text fa-2x"></i> </a>
                </div>

                <div class="card-content-game z-depth-1" id="in-content-activity"></div>

              </div>
            </div>
          </div>
          <!-- // Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->

          <!-- Fin de la zona de paneles-->
      </div>
    @stop

@section('js-plus')
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/child/init.js?{{rand();}}"></script>
  <script type="text/javascript" src="/packages/assets/js/child/models/activity.js?{{rand();}}"></script>
  <script type="text/javascript" src="/packages/assets/js/child/controllers/activityCtrl.js?{{rand();}}"></script>
  <script type="text/javascript" src="/packages/assets/js/child/dispatchers/dsp-child-home.js?{{rand();}}"></script>
@stop
