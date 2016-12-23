<!DOCTYPE html5>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
      <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
      <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/packages/assets/css/masters/main.css">
      @yield('css')
      <title>@yield('title')</title>
   </head>
   <body>

      <header>
        <nav class="navbar navbar-fixed-top z-depth-1" id="navbar">

         <!-- Sidebar navigation -->
         <ul id="slide-out" class="side-nav default-side-nav light-side-nav">

            <!-- Logo -->
            <div class="logo-wrapper waves-light">
               <a href="#"><img src="http://mdbootstrap.com/wp-content/uploads/2015/12/mdb-white2.png" class="img-fluid flex-center"></a>
            </div>
            <!--/. Logo -->

            <!--Search Form-->
            <form class="search-form" role="search">
               <div class="form-group waves-effect">
                  <input type="text" class="form-control" placeholder="Search">
               </div>
            </form>
            <!--/.Search Form-->

            <!-- Side navigation links -->
            <ul class="collapsible collapsible-accordion">
               <li><a class="collapsible-header waves-effect">Click me</a>
                  <div class="collapsible-body">
                     <ul>
                        <li><a href="#" class="waves-effect">Link</a>
                        </li>
                        <li><a href="#" class="waves-effect">Link</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li><a class="collapsible-header waves-effect">Click me</a>
                  <div class="collapsible-body">
                     <ul>
                        <li><a href="#" class="waves-effect">Link</a>
                        </li>
                        <li><a href="#" class="waves-effect">Link</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li><a class="collapsible-header waves-effect">Click me</a>
                  <div class="collapsible-body">
                     <ul>
                        <li><a href="#" class="waves-effect">Link</a>
                        </li>
                        <li><a href="#" class="waves-effect">Link</a>
                        </li>
                     </ul>
                  </div>
               </li>
            </ul>
            <!--/. Side navigation links -->
         </ul>
         <!--/. Sidebar navigation -->

          <div class="container-fluid">
            <div class="collapse navbar-toggleable-xs" id="collapseEx2">
              <a class="navbar-brand">
                <img src="/packages/assets/media/images/system/icon.png" class="img-responsive">
                Curiosity Educación
              </a>
              <ul class="nav navbar-nav float-xs-right">
                <li class="nav-item">
                   <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                  <a class="nav-link">
                    Salir&nbsp;
                    <span class="fa fa-caret-right"></span>
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
               <div class="col-md-3">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="menu z-depth-1">
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

      <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
      <script src="/packages/libs/mdb/js/tether.min.js"></script>
      <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
      <script src="/packages/libs/mdb/js/mdb.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
           $(".button-collapse").sideNav();
         });
      </script>

      @yield('js')
   </body>
</html>
