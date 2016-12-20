<!DOCTYPE html5>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
      <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
      <link rel="stylesheet" href="/packages/libs/MaterialDesign-Webfont/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="/packages/assets/css/masters/main.css">
      @yield('css')
      <title></title>
   </head>
   <body>

      <header>
         <nav id="navbar">
            <div class="nav-wrapper">
               <a href="javascript:void(0)" class="brand-logo">
                  <img src="/packages/assets/media/images/system/icon.png">
                  Curiosity Educación
               </a>
               <a href="javascript:void(0)" data-activates="mobile-demo" class="button-collapse">
                  <span class="mdi mdi-dots-horizontal" style="margin-top: 1.5rem;"></span>
               </a>
               <ul class="right hide-on-med-and-down">
                  <li><a href="javascript:void(0)" class="logOut waves-effect waves-light">
                     Salir &nbsp;
                     <span class="mdi mdi-export icon-custom"></span>
                  </a></li>
               </ul>
               <ul class="side-nav" id="mobile-demo">
                  <li><a href="javascript:void(0)" class="logOut waves-effect waves-light">
                     Salir &nbsp;
                     <span class="mdi mdi-export icon-custom"></span>
                  </a></li>
               </ul>
            </div>
         </nav>
      </header>

      <section>
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3 hide-on-med-and-down">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="menu">
                           @yield('menu-title')
                           @yield('menu-photo')
                           <ul class="collapsible" data-collapsible="accordion" id="collapsibleMenu">
                              <li>
                                 <div class="collapsible-header active center-align right waves-effect waves-light" id="collapsible-headerMenu">
                                    <span class="mdi mdi-menu"></span>
                                 </div>
                                 <div class="collapsible-body" id="collapsible-bodyMenu">
                                    @yield('menu-links')
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       @yield('under-menu')
                    </div>
                  </div>
               </div>
               <div class="col-lg-9 col-sm-sm-12 text-justify">
                  @yield('content')
               </div>
            </div>
         </div>
      </section>

      <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
      <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
      <script src="/packages/libs/mdb/js/mdb.min.js"></script>
      <script type="text/javascript">
        /* $(document).ready(function() {
            $(".button-collapse").sideNav();
         });*/
      </script>
      @yield('js')
   </body>
</html>
