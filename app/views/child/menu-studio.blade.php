@extends('templates.child-menu')
    @section('css')
    <link rel="stylesheet" type="text/css" href="packages/assets/css/child/main.css">
    @stop
    @section('title')Curiosity | @stop
    @section('content')
      <div class="container-fluid" id="container-menu-studio-child">
        <div class="row" id="row-inteligents">
          <div class="col col-inteligent m3 s3">
            <a class="btn btn-purple btn-inteligent btn-math"><span class="mdi mdi-export icon-custom"></span> Matemáticas
              <div class="arrow"></div>
            </a>

          </div>
          <div class="col col-inteligent m3 s3">
            <a class="btn btn-green btn-inteligent btn-robotic"><span class="mdi mdi-export icon-custom"></span> Robotica
              <div class="arrow"></div>
            </a>
          </div>
          <div class="col m6 s6">
            <div class="pagination pagination-breadcrumbs">
              <li>Matemáticas></li>
              <li>Grado 1</li>
              <li>Bloque 3</li>
            </div>
          </div>
        </div>
            
        <div class="row row-bloque">
          <div class="col m10 s10">
            <div class="card-bloque">
              <div class="card-content-bloque">
                <h6 class="card-title-bloque">Matemáticas | Bloques </h6>
                <a class="btn btn-purple btn-bloque active"> 1</a>
                <a class="btn btn-purple btn-bloque"> 2</a>
                <a class="btn btn-purple btn-bloque"> 3</a>
                <a class="btn btn-purple btn-bloque"> 4</a>
                <a class="btn btn-purple btn-bloque"> 5</a>
                <a class="btn btn-purple btn-bloque"> 6</a>
                <a class="dismiss text-black" data-dismiss-target=".row-bloque">x</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-level">
          <div class="col m10 s10">
            <div class="card-level">
              <div class="card-content-bloque">
                <h6 class="card-title-level text-white">Matemáticas | Grados </h6>
                <a class="btn btn-purple btn-level"> 1°</a>
                <a class="btn btn-purple btn-level"> 2°</a>
                <a class="btn btn-purple btn-level"> 3°</a>
                <a class="btn btn-purple btn-level"> 4°</a>
                <a class="btn btn-purple btn-level"> 5°</a>
                <a class="btn btn-purple btn-level"> 6°</a>
                <a class="dismiss" data-dismiss-target=".row-level">x</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s4 m4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/packages/assets/media/images/child/game_news.jpg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Suceciones Númericas</p>
                </div>
                <div class="card-action text-center">
                  <a href="#">Jugar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col s4 m4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/packages/assets/media/images/child/game_news.jpg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Suceciones Númericas</p>
                </div>
                <div class="card-action text-center">
                  <a href="#">Jugar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col s4 m4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/packages/assets/media/images/child/game_news.jpg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Suceciones Númericas</p>
                </div>
                <div class="card-action text-center">
                  <a href="#">Jugar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s4 m4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/packages/assets/media/images/child/game_news.jpg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Suceciones Númericas</p>
                </div>
                <div class="card-action text-center">
                  <a href="#">Jugar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col s4 m4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/packages/assets/media/images/child/game_news.jpg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Suceciones Númericas</p>
                </div>
                <div class="card-action text-center">
                  <a href="#">Jugar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col s4 m4">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/packages/assets/media/images/child/game_news.jpg">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Suceciones Númericas</p>
                </div>
                <div class="card-action text-center">
                  <a href="#">Jugar</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col m12 s12 text-center">
            <ul class="pagination">
              <!--<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>-->
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
              <!--<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>-->
            </ul>
          </div>
        </div>  
      </div>
    @stop
@section('js')
  <script type="text/javascript" type="text/javascript" src="packages/assets/js/child/menu-studio.js"></script>
@stop
