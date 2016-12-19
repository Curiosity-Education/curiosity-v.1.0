@extends('templates.child-menu')
    @section('css')
    <link rel="stylesheet" type="text/css" href="packages/assets/css/child/main.css">
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
                  <div class="card-game show-list" id="card-news-games">
                    <div class="card-content-game card-mask">                     
                    </div>
                    <div class="card-footer-game text-center">
                       <span class="card-title">Juegos nuevos</span>
                    </div>
                  </div>
              </div>
              <div class="col m6 s6 x6">
                 <div class="card-game show-list" id="card-games-populars">
                    <div class="card-content-game card-mask">                      
                      <!--<a class="btn btn-view-more">Ver</a>-->
                    </div>
                    <div class="card-footer-game text-center">
                      <span class="card-title">Juegos populares</span>
                    </div>
                  </div>
              </div>
            </div>
             <div class="row">
              <div class="col m6 s6 x6 standard-bordered">
                  <div class="card-game show-list" id="card-more-calification">
                    <div class="card-content-game card-mask">
                    
                    </div>
                    <div class="card-footer-game text-center">
                      <span class="card-title">Juegos mejor calificados</span>
                    </div>
                  </div>
              </div>
              <div class="col m6 s6 x6 standard-bordered">
                 <div class="card-game show-list" id="card-games-recoments">
                    <div class="card-content-game card-mask">
                    </div>
                    <div class="card-footer-game text-center">
                      <span class="card-title"><i class="tiny material-icons insert_chart"></i> Juegos recomendados</span>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col m12  s12 x12 standard-bordered">
                  <div class="card-game show-list" id="card-news-videos">
                    <div class="card-content-game card-mask">
                    </div>
                    <div class="card-footer-game text-center">
                      <span class="card-title"> <i class="fa fa-youtube"></i> Nuevos videos</span>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->
          <div class="row" id="card-container-games">
            <div class="col s12 m12">
              <div class="card-game">
                <div class="card-header-game text-center">
                  <span class="card-title"> <i class="fa fa-youtube"></i> Juegos Nuevos</span>
                  <a class="dismiss-card pull-right" title="regresar" data-dismiss-target="#card-container-games">x</a>
                </div>
                <div class="card-content-game">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col m4 s4">
                        <div class="card-game">
                          <div class="card-content-game card1"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Sumas y Restas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col m4 s4">
                        <div class="card-game">
                          <div class="card-content-game card2"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Resolución de problemas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col m4 s4">
                        <div class="card-game">
                          <div class="card-content-game card3"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Multiplicaciones</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col m4 s4">
                        <div class="card-game">
                          <div class="card-content-game card2"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Sumas y Restas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col m4 s4">
                        <div class="card-game">
                          <div class="card-content-game card3"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Resolución de problemas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col m4 s4">
                        <div class="card-game">
                          <div class="card-content-game card1"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Multiplicaciones</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--<div class="card-footer-game text-center">
                </div>-->
              </div>
            </div>
          </div>
          <!-- // Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->

          <!-- Fin de la zona de paneles-->
      </div>
    @stop
@section('js')
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/child/init.js"></script>
@stop
