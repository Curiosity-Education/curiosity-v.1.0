<!DOCTYPE html5>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
      <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
      <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
      <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/packages/libs/sweetalert2/sweetalert2.min.css">
      <link rel="stylesheet" href="/packages/assets/css/masters/main.css">
      @yield('css')
      <title>@yield('title')</title>
   </head>
   <body>

      <header>
         <nav class="navbar navbar-fixed-top z-depth-1" id="navbar">
            <ul id="slide-out" class="side-nav default-side-nav light-side-nav">
               <div class="logo-wrapper waves-light">
                  <a href="#">
                     <img src="/packages/assets/media/images/system/logoDef.png" class="img-fluid flex-center">
                  </a>
               </div>
               @yield('menu-links-aside')
            </ul>
            <div class="container-fluid">
               <div class="" id="collapseEx2">
                  <a class="navbar-brand">
                     <img src="/packages/assets/media/images/system/icon.png" class="img-responsive">
                     Curiosity Educación
                  </a>
                  <ul class="nav navbar-nav float-xs-right">
                     <li class="nav-item">
                        <a href="#" data-activates="slide-out" class="button-collapse hidden-lg-up flex-center" id="slideBtn"><i class="fa fa-bars"></i></a>
                        <a href="#" class="hidden-md-down">
                           <div class="chip hoverable" id="logOut-btn">
                              <img src="packages/assets/media/images/system/iconLogOut.png" alt="Contact Person">
                              Cerrar Sesión
                           </div>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>

      <section>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-3 hidden-md-down">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="menu fixedElement z-depth-1">
                           @yield('menu-title')
                           @yield('menu-photo')
                           <div class="linksMenu">
                              @yield('menu-links')
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       @yield('under-menu')
                    </div>
                  </div>
               </div>
               <div class="col-lg-9 text-justify">
                  @yield('content')
               </div>
            </div>
         </div>
      </section>

      <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
      <script src="/packages/libs/mdb/js/tether.min.js"></script>
      <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
      <script src="/packages/libs/mdb/js/mdb.min.js"></script>
      <script src="/packages/libs/sweetalert2/sweetalert2.min.js"></script>
      <script src="/packages/assets/js/Curiosity.js"></script>
      <script src="/packages/assets/js/landing/controllers/loginController.js"></script>
      <script src="/packages/assets/js/app-master.js"></script>
      <script src="/packages/assets/js/config/db/corm.js"></script>
      <script src="/packages/assets/js/config/db/database.js"></script>
      <script src="/packages/assets/js/config/request/request.js"></script>
      @yield('js')
   </body>
</html>
