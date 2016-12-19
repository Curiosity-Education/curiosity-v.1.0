<!DOCTYPE html5>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="/packages/libs/bootstrap-3.3.7-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="/packages/libs/materialize/css/materialize.min.css">
      <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/packages/assets/css/skin-blue.css">
      @yield('css')
      <title>@yield('title')</title>
   </head>
   <body>

      <header>
         <nav id="navbar">
            <div class="nav-wrapper light-blue darken1">
               <a href="javascript:void(0)" class="brand-logo">
                  Curiosity Educación
               </a>
               <a href="javascript:void(0)" data-activates="mobile-demo" class="button-collapse">
                  <i class="material-icons">Menú</i>
               </a>
               <ul class="right hide-on-med-and-down">
                  <li><a href="#!">Salir</a></li>
               </ul>
               <ul class="side-nav" id="mobile-demo">
                  <li><a href="#!">Salir</a></li>
               </ul>
            </div>
         </nav>
      </header>

      <section>
         <div class="container-fluid">
            <div class="row">
               <div class="col m3">
                  <div class="row">
                     <div class="col m12">
                        <div class="menu">
                           <h5 class="text-center light-blue darken1" id="name-menu">Hola soy Tot</h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col m9 text-justify">
                  <div class="row">
                     <div class="col m9" style="padding-top:.6rem;">
                        <div id="brands">
                           <a href="" class="brand">Inicio</a>
                           <a href="" class="brand">Inicio2</a>
                           <a href="" class="brand">Inicio</a>
                        </div>
                     </div>
                     <div class="col m3">
                        <div class="search">
                           <form action="">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <span class="input-group-addon" id="btn-search">
                                   <span class="fa fa-search"></span>
                                </span>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col m12">
						 	@yield('content')

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <script src="/packages/libs/jquery-3-1/jquery.min.js"></script>
      <script src="/packages/libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
      <script src="/packages/libs/materialize/js/materialize.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
            $(".button-collapse").sideNav();
         });
      </script>
      @yield('js')
   </body>
</html>
