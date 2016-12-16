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
            <div class="col m12">
              <img src="packages/assets/media/images/child/nav1.png" class="img-responsive card img-nav">
            </div>
          </div>
          <!--// find de sección del slide principal -->
          <!-- sección de zona de paneles-->
          <div class="row">
            <div class="col m6">
                <div class="card blue-grey darken-1 z-depth-2" id="card-news-games">
                  <div class="card-content white-text text-center card-mask">
                    <span class="card-title">Juegos nuevos</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because </p>
                    <hr>
                    <a class="btn btn-view-more">Ver</a>
                  </div>
                </div>
            </div>
            <div class="col m6">
               <div class="card blue-grey darken-1 z-depth-2" id="card-games-populars">
                  <div class="card-content white-text text-center card-mask">
                    <span class="card-title">Juegos populares</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because</p>
                    <hr>
                    <a class="btn btn-view-more">Ver</a>
                  </div>
                </div>
            </div>
          </div>
           <div class="row">
            <div class="col m6 standard-bordered">
                <div class="card blue-grey darken-1 depth-2" id="card-more-calification">
                  <div class="card-content white-text text-center card-mask">
                    <span class="card-title">Juegos mejor calificados</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because </p>
                    <hr>
                    <a class="btn btn-view-more">Ver</a>
                  </div>
                </div>
            </div>
            <div class="col m6 standard-bordered">
               <div class="card blue-grey darken-1 depth-2" id="card-games-recoments">
                  <div class="card-content white-text text-center card-mask">
                    <span class="card-title">Juegos recomendados</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because</p>
                    <hr>
                    <a class="btn btn-view-more">Ver</a>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col m12 standard-bordered">
                <div class="card blue-grey darken-1 depth-2" id="card-news-videos">
                  <div class="card-content white-text text-center card-mask">
                    <span class="card-title">Nuevos videos</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because </p>
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
