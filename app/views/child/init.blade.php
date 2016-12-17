@extends('templates.child-menu')
    @section('css')
    <link rel="stylesheet" type="text/css" href="packages/assets/css/child/init.css">
    <link rel="stylesheet" type="text/css" href="packages/assets/css/animations.css">
    @stop

    @section('title')Curiosity | @stop
    @section('content')
      <div class="container-fluid" id="container-main-child">
          <!-- sección de slide principal-->
          <div class="row row-slide-main">
            <div class="col m12 s12 x12">
              <img src="packages/assets/media/images/child/nav1.png" class="img-responsive card img-nav">
            </div>
          </div>
          <!--// find de sección del slide principal -->
          <!-- sección de zona de paneles-->
          <div class="panels">
            <div class="row">
              <div class="col m6 s6 x6">
                  <div class="card blue-grey darken-1 z-depth-2" id="card-news-games">
                    <div class="card-content white-text text-center card-mask">
                      <span class="card-title">Juegos nuevos</span>
                      <hr>
                      <a class="btn btn-view-more">Ver</a>
                    </div>
                  </div>
              </div>
              <div class="col m6 s6 x6">
                 <div class="card blue-grey darken-1 z-depth-2" id="card-games-populars">
                    <div class="card-content white-text text-center card-mask">
                      <span class="card-title">Juegos populares</span>
                      <hr>
                      <a class="btn btn-view-more">Ver</a>
                    </div>
                  </div>
              </div>
            </div>
             <div class="row">
              <div class="col m6 s6 x6 standard-bordered">
                  <div class="card blue-grey darken-1 depth-2" id="card-more-calification">
                    <div class="card-content white-text text-center card-mask">
                      <span class="card-title">Juegos mejor calificados</span>
                      <hr>
                      <a class="btn btn-view-more">Ver</a>
                    </div>
                  </div>
              </div>
              <div class="col m6 s6 x6 standard-bordered">
                 <div class="card blue-grey darken-1 depth-2" id="card-games-recoments">
                    <div class="card-content white-text text-center card-mask">
                      <span class="card-title"><i class="tiny material-icons insert_chart"></i> Juegos recomendados</span>
                      <hr>
                      <a class="btn btn-view-more">Ver</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->
          <div class="row">
            <div class="col s12 m12">
              <div class="card blue-grey darken-1" id="card-container-games">
                <div class="card-content white-text">

                </div>
                <div class="card-action">

                </div>
              </div>
            </div>
          </div>
          <!-- // Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->
          <div class="row">
            <div class="col m12  s12 x12 standard-bordered">
                <div class="card blue-grey darken-1 depth-2" id="card-news-videos">
                  <div class="card-content white-text text-center card-mask">
                    <span class="card-title"> <i class="fa fa-youtube"></i> Nuevos videos</span>
                    <hr>
                    <a class="btn btn-view-more">Ver</a>
                  </div>
                </div>
            </div>
          </div>

          <!-- Fin de la zona de paneles-->
      </div>
    @stop
@section('js')
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/child/init.js"></script>
@stop
