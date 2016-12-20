   <!DOCTYPE html5>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
      <link rel="stylesheet" href="/packages/libs/mdb/css/material.min.css">
      <link rel="stylesheet" type="text/css" href="/packages/libs/mdb/css/material-fullpalette.min.css">
      <link rel="stylesheet" href="/packages/libs/MaterialDesign-Webfont/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="/packages/libs/mdb/css/ripples.min.css">
      <link rel="stylesheet" href="/packages/libs/mdb/css/roboto.min.css">
      <link rel="stylesheet" href="/packages/assets/css/masters/main.css">
      @yield('css')
      <title>@yield('title')</title>
   </head>
   <body>

      <header>
         <nav class="navbar navbar-default" id="navbar">
           <div class="container-fluid">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">
                  <img src="/packages/assets/media/images/system/icon.png">
                  Curiosity Educación
               </a>
             </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                 <li><a href="#" class="logOut">
                     salir&nbsp;
                     <span class="mdi mdi-export icon-custom" id="iconLogout"></span>
                 </a></li>
               </ul>
             </div><!-- /.navbar-collapse -->
           </div><!-- /.container-fluid -->
         </nav>
      </header>

      <section>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-3">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="menu z-depth-5 hoverable">
                           @yield('menu-title')
                           @yield('menu-photo')
                           @yield('menu-links')
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       @yield('under-menu')
                    </div>
                  </div>
               </div>
               <div class="col-md-9 text-justify">
                  @yield('content')
               </div>
            </div>
         </div>
      </section>

      <script src="/packages/libs/jquery-3-1/jquery.min.js"></script>
      <script src="/packages/libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
      <script src="/packages/libs/mdb/js/material.min.js"></script>
      @yield('js')
   </body>
</html>
