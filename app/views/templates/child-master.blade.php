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
      <title></title>
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
                     <div class="col s12">
                        <div>
                           @yield('content')
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit incidunt, praesentium quia deserunt cupiditate ab officiis saepe repellat illum repudiandae, eveniet voluptates maxime perspiciatis atque? Est culpa suscipit ut, eveniet, explicabo eius beatae fugit quae perspiciatis ab reprehenderit repellendus aut numquam officiis necessitatibus quam magnam ad ratione quod ipsa ducimus? Doloremque cupiditate temporibus voluptatem possimus asperiores dolorum recusandae, corrupti nam quae, veritatis iusto iure sint. Pariatur dicta in similique ipsa quis debitis magnam quam tenetur doloribus, ea at odit dolores minima! Consequatur voluptate accusantium magni odit, aperiam eum nihil explicabo iure fugiat, est temporibus deserunt, atque provident velit totam ea esse, molestias! Ab esse aspernatur tempora tenetur quasi, adipisci nesciunt sint fuga eaque obcaecati possimus reprehenderit cupiditate rem? Necessitatibus sequi repellat sunt reprehenderit voluptatum iste aliquid, ab non. Incidunt tenetur dignissimos, voluptatibus velit possimus sit qui alias, illo maiores aspernatur, voluptates repellat architecto enim. Ad excepturi, totam illum provident placeat labore facilis hic sed doloremque in quae, non animi reiciendis doloribus officia tenetur architecto quidem earum cum veniam? Pariatur, ducimus corporis error iusto officia sint beatae. Veritatis obcaecati blanditiis libero aut facere. Voluptas eveniet, sit illum, repellendus facere autem. Fuga enim vero, dicta nulla a fugit, maiores minus illum cumque rerum quos at alias nobis, voluptates corporis in! At nobis reprehenderit odit accusantium ad quam consectetur voluptate optio esse, expedita mollitia est maxime odio, excepturi culpa tempore velit aliquid quisquam cupiditate itaque soluta! Aperiam nemo rem dignissimos quo facere assumenda neque amet animi nihil sequi fugiat, voluptas at unde, mollitia eligendi quidem quia, sint quod voluptates. Illo officiis dignissimos consectetur. A harum, accusantium ducimus, vitae quas ex! Magnam beatae facilis, commodi natus dicta quas obcaecati neque minima, repellendus consequatur sunt corporis, consectetur odit veritatis molestias distinctio modi perferendis! Nulla ut laborum, deserunt assumenda. Et ea amet dolore, dolores animi molestias.
                        </div>
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
