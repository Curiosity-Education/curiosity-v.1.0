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
      <link rel="stylesheet" href="/packages/assets/css/masters/main.css?{{rand();}}">
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
                  <a class="navbar-brand" style="font-size:0.85rem;">
                     <img src="/packages/assets/media/images/system/icon.png" class="img-responsive">
                     &nbsp;Curiosity Educación |
                     {{ Auth::user()->username; }}
                  </a>
                  <ul class="nav navbar-nav float-xs-right">
                     <li class="nav-item">
                        <a href="#" data-activates="slide-out" class="button-collapse hidden-lg-up flex-center" id="slideBtn"><i class="fa fa-bars"></i></a>
                        <a href="#" class="hidden-md-down">
                           <div class="chip hoverable" id="logOut-btn">
                              <img src="/packages/assets/media/images/system/iconLogOut.png" alt="Contact Person">
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

                  <!-- Visualisator pdf and video -->
                  @yield('modal-pdfs-videos')   
                     <div class="modal fade" id="gst-modal-pdf-video" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-body">
                              <div class="row">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hiddenW="true">&times;</span>
                                </button>
                                <div class="col-md-8 col-sm-12 col-xs-12 gst-col">
                                  @yield('modal-left')
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 gst-col">
                                  <div class="gst-information">
                                   <div class="gst-informataion-header">
                                    <div class="row">
                                      @yield('modal-header')
                                      <div class="col-md-3">
                                        @yield('modal-header-image')
                                      </div>
                                      <div class="col-md-9">
                                        @yield('modal-header-information')
                                      </div>
                                    </div>
                                   </div>
                                   <hr class="gst-hr-top">
                                   <div class="row">
                                      @yield('modal-title')
                                   </div>
                                   <hr class="gst-hr-bottom">
                                   <div class="gst-information-list">
                                    <div class="col-md-12 gst-col">
                                      @yield('modal-list')
                                      <!--Second review-->
                                     <!-- Example of element list 
                                      <div class="media hoverable">
                                          <a class="media-left waves-light col-md-4">
                                              <img class="img-fluid" src="/packages/assets/media/images/games/posters/default.png" alt="pdf ico">
                                          </a>
                                          <div class="media-body">
                                              <h5 class="media-heading">Nathan Casie</h5>
                                              <div class="media-body">
                                                  <p class="gst-views-content">Vistos: 3</p>
                                                  <p class="gst-name-content-list">pdf nombre</p>
                                              </div>
                                          </div>
                                      </div>-->
                                    </div>
                                   </div>
                                   <div class="gst-information-footer">
                                    <p class="text-right">Curiosity-Educación</p>
                                   </div>
                                  </div>
                                </div>
                              </div>
                           </div>
                         </div>
                       </div>
                     </div>
               </div>
            </div>
         </div>
      </section>

      <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
      <script src="/packages/libs/mdb/js/tether.min.js"></script>
      <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
      <script src="/packages/libs/mdb/js/mdb.min.js"></script>
      <script src="/packages/libs/sweetalert2/sweetalert2.min.js"></script>
      <script src="/packages/assets/js/Curiosity.js?{{rand();}}"></script>
      <script src="/packages/assets/js/landing/controllers/loginController.js?{{rand();}}"></script>
      <script src="/packages/assets/js/app-master.js?{{rand();}}"></script>
      <script src="/packages/assets/js/config/db/corm.js?{{rand();}}"></script>
      <script src="/packages/assets/js/config/db/database.js?{{rand();}}"></script>
      <script src="/packages/assets/js/config/request/request.js?{{rand();}}"></script>
      <script src="/packages/assets/js/config/db/StorageDB.js?{{rand();}}"></script>
      @yield('js')
   </body>
</html>
