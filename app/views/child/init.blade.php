@extends('templates.child-menu')
    @section('css')
    <link rel="stylesheet" type="text/css" href="packages/assets/css/child/main.css">
    @stop

    @section('title')Curiosity | @stop
    @section('content')
      <div class="container-fluid" id="container-main-child">
          <!-- sección de slide principal-->
          <div class="row row-slide-main">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <img src="packages/assets/media/images/child/nav1.png" class="img-fluid img-responsive card img-nav">
            </div>
          </div>
          <!--// find de sección del slide principal -->
          <!-- sección de zona de paneles-->
          <div class="panels">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <!--Card-->
                <div class="hm-black-strong hoverable card z-depth-1" style="background-image: url('packages/assets/media/images/child/game_news.jpg')">
                    <!--Content-->
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3>Nuevos</h3>
                            <p></p>
                            <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="recents"><i class="fa fa-gamepad left"></i> Ver juegos</a>
                        </div>
                    </div>
                </div>
                <!--/.Card-->
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                 <!--Card-->
                <div class="hm-black-strong hoverable card z-depth-1" style="background-image: url('packages/assets/media/images/child/gamepopulars.jpg')">
                    <!--Content-->
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3>Mejor calificados</h3>
                            <p></p>
                            <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="ranks"><i class="fa fa-gamepad left"></i> Ver juegos</a>
                        </div>
                    </div>
                </div>
                <!--/.Card-->
              </div>
            </div>
             <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6 standard-bordered">
                 <!--Card-->
                <div class="hm-black-strong hoverable card z-depth-2" style="background-image: url('packages/assets/media/images/child/gamesrecoments.jpg')">
                    <!--Content-->
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3> Populares</h3>
                            <p></p>
                            <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="populars"><i class="fa fa-gamepad left"></i> Ver juegos</a>
                        </div>
                    </div>
                </div>
                <!--/.Card-->
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 standard-bordered">
                 <!--Card-->
                <div class="hm-black-strong hoverable card z-depth-2" style="background-image: url('packages/assets/media/images/child/popularsgames.jpg')">
                    <!--Content-->
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-gamepad"></i> Juegos</h5>
                            <h3>Recomendados</h3>
                            <p></p>
                            <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect btn-show-information" data-type="recomended"><i class="fa fa-gamepad left"></i> Ver juegos</a>
                        </div>
                    </div>
                </div>
                <!--/.Card-->
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 standard-bordered">
                <!--Card-->
                <div class="hm-black-strong hoverable card z-depth-2" style="background-image: url('packages/assets/media/images/child/videosnews.jpg')">
                    <!--Content-->
                    <div class="mask white-text text-xs-center">
                        <div class="card-block">
                            <h5 class="info-text"><i class="fa fa-image"></i> Videos</h5>
                            <h3>Los más nuevos</h3>
                            <p></p>
                            <a class="btn btn-show-game btn-lg btn-outline-info btn-rounded waaves-effect"><i class="fa fa-gamepad left"></i> Ver juegos</a>
                        </div>
                    </div>
                </div>
                <!--/.Card-->
              </div>
            </div>
          </div>
          <!-- Carta donde se mostrará el contenido de los juegos(juegos recomendaods..etc) -->
          <div class="row" id="card-container-games">
            <div class="col-md-12 col-sm-12">
              <div class="card-game">
                <div class="card-header-game text-center">
                  <span class="card-title"> <i class="fa fa-youtube"></i> Juegos Nuevos</span>
                  <a class="dismiss-card pull-right" title="regresar" data-dismiss-target="#card-container-games"><i class="fa white-text fa-times-circle fa-2x"></i> </a>
                </div>
                <div class="card-content-game" id="in-content-activity">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="card-game">
                            <!--Card image-->
                            <div class="view overlay hm-white-slight card-content-game">
                              <img class="img-fluid" src="/packages/assets/media/images/games/wallpapers/ballon.png" alt="Card image cap">
                              <a href="#" data-toggle="modal" data-target="#quick-look-ex">
                                <div class="mask waves-effect waves-light">
                                  <div class="flex-center">
                                    <a class="btn btn-lg btn-outline-info btn-rounded waaves-effect"><i class="fa fa-gamepad left"></i> Jugar</a>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <!--/.Card image-->
                          <div class="card-footer-game text-center">
                            <ul class="curiosity-ranking animated bounceIn" data-stars="4" >
                              <li class="star-text" style="display:none"></li>
                              <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Mala"></li>
                              <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Aceptable"></li>
                              <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Buena"></li>
                              <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Muy buena"></li>
                              <li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Excelente"></li>
                            </ul>
                            <span class="card-title">Sumas y Restas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="card-game">
                          <div class="card-content-game card2"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Resolución de problemas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="card-game">
                          <div class="card-content-game card3"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Multiplicaciones</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="card-game">
                          <div class="card-content-game card2"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Sumas y Restas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="card-game">
                          <div class="card-content-game card3"></div>
                          <div class="card-footer-game text-center">
                            <span class="card-title">Resolución de problemas</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
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
    
@section('js-plus')
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/ranking-curiosity.js"></script>
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/child/init.js"></script>
  <script type="text/javascript" src="/packages/assets/js/child/models/activity.js"></script>
  <script type="text/javascript" src="/packages/assets/js/child/controllers/activityCtrl.js"></script>
  <script type="text/javascript" src="/packages/assets/js/child/dispatchers/dsp-child-home.js"></script>
@stop
