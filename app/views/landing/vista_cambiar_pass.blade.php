<!DOCTYPE html5>
<html lang="es">
<head name="theme-color">
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/packages/assets/media/images/landing/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="keywords" content="Curiosity, Educación,equidad, divertida,juegos,pdf, documentos, videos,retroalimentación,aventura,limites,evaluado,resultados, profesores">
  <meta name="description" content="Curiosity educación  permite aprender con videojuegos educativos, apoyo de videos animados y documentos PDF con los temas vistos en clase">
  <meta name="theme-color" content="#2262ae" >
  <link rel="stylesheet" href="/packages/libs/mdb/css/bootstrap.min.css">
  <link rel="stylesheet" href="/packages/libs/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="/packages/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/packages/assets/css/landing/style-index.min.css?{{rand();}}">
  <style>
      #header-frm{
          color: #f2f2f2;
          display: block;
          background: rgba(12, 90, 157, 0.98);
          margin-top: -50.5px;
          margin-bottom: 10px;
          margin-left: -28px;
          width: 33.8em;
          padding: 2em;
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
      }
      .header-row-first > h3,span{
          display:inline;
      }
      #input-user{
        margin-top: 2em;
        margin-bottom: 2em;
      }
      body{
        background-color: #f5f8f9;
      }
      h3,h2,h4{
        margin-top: 1rem;
        color: #222c37;
        font-weight: 300;
      }
      .log-current{
        width: 8rem!important;
      }
  </style>
  <title> Curiosity | Recuperar contraseña</title>
</head>
<body>
  <div class="container" style="margin-top: 2.2rem;margin-bottom:2.2rem">
    <div class="row">
      <div class="col-md-12">
        <center>
          <span><img src="/packages/assets/media/images/landing/logo.png?23469" alt="logo-curiosity" class="logo-current img-fluid"></span>
          <h3>Recupera tu contraseña</h3>
          <p>Ingresa una nueva contraseña para tu cuenta.</p>
          <p>La nueva contraseña que ingreses será con la que podrás inciar sesión al completarse el proceso de recuperación, en caso de volver a olvidar la contraseña puedes realizar nuevamente una recuperación de contraseña.</p>
        </center>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">       
      </div>
      <div class="col-md-6">
            <form method='post' id="frm_change_pass">
              <div class="md-form">
                <i class="fa fa-key prefix"></i>
                <input type="password" id="newPass" class="form-control" name="newPass">
                <label for="newPass">Nueva contraseña</label>
              </div>
              <div class="md-form">
                <i class="fa fa-key prefix"></i>
                <input type="password" id="rnewPass" class="form-control" name="rnewPass">
                <label for="rnewPass">Repite tu nueva contraseña</label>
              </div>
            </form>
          </form>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <center style="text-align:center"><button type="button" class="btn btn-success btn-lg btn-block borderRounded" id="btn-change-pass">Recuperar Contraseña </button></center>
      </div>
    </div>
  </div>
<!--
  <section id='background'>
    <section>
      <section class='container' style='padding-top:80px;'>
        <div class='row'>
          <div class='col-md-6 col-md-offset-3'>
           <br><br>
            <div class='login-box'>
              <div class='login-txt'>
              <div id="header-frm">
                <div class="header-row-first">
                    <h3 class="pull-left">Cambiar Contraseña</h3>
                    <span class="fa fa-lock fa-2x pull-right"></span><br>
                </div>
                <small class="pull-left">Ingresa la nueva contraseña</small><br>
              </div>
                <form action='' method='post' id="frm_change_pass">
                  <div class='form-group' id='input-user'>
                    <div class='input-group'>
                      <span for='newPass' class='input-group-addon' id='login-icon-user'>
                        <span class='fa fa-key'></span>
                      </span>
                      <input type='password' class='form-control inputLogin'  style='-webkit-user-select: text;' placeholder='Nueva contraseña' name='newPass' id='newPass'/>
                    </div>
                    <br>
                    <div class='input-group'>
                      <span for='rnewPass' class='input-group-addon' id='login-icon-user'>
                        <span class='fa fa-key'></span>
                      </span>
                      <input type='password' class='form-control inputLogin'  style='-webkit-user-select: text;' placeholder='Repite tu nueva contraseña' name='rnewPass' id='rnewPass'/>
                    </div>
                  </div>

                </form>
              </div>

              <button type='button' name='send_mail_rc' class='btn btn-warning btn-block' id='change_pass'>
                <span class='fa fa-unlock'></span> &nbsp;
                Cambiar Contraseña
              </button>

              </div>
            </div>
            <center><span class="fa fa-life-ring spanIcon"></span></center>
          </div>
        </div>
      </section>
    </section>
  </section>
-->
    <!--Footer-->
  <footer class="page-footer center-on-small-only" id="footer">
    <!--Footer Links-->
    <div class="container-fluid">
    <!--Social buttons-->
    <div class="social-section">
      <ul>
        <li><a href="https://www.facebook.com/curiosity.mx/" class="btn-floating btn-small btn-fb" target="_blank"><i class="fa fa-facebook" > </i></a></li>
        <!-- <li><a href="" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li> -->
        <li><a href="https://www.youtube.com/channel/UCucy9_laT18ac4DN8qosoEQ" class="btn-floating btn-small btn-gplus" target="_blank"><i class="fa fa-youtube"> </i></a></li>
      </ul>
      <!--- Boton Like fb desde la landing -->
    </div>
    <!--/.Social buttons-->
    </div>
    <!--/.Footer Links-->
    <!--Call to action-->

    <!--/.Call to action-->
    <!--Social buttons-->
  
    <!--/.Social buttons-->
    <!--Copyright-->
    <div class="footer-copyright">
      <div class="container-fluid">
        © {{Date('Y')}} Todos los derechos reservados: Curiosity.com.mx
      </div>
    </div>
    <!--/.Copyright-->
  </footer>
  <!--/.Footer-->
  <script src="/packages/libs/mdb/js/jquery-3.1.1.min.js"></script>
  <script src="/packages/libs/mdb/js/tether.min.js"></script>
  <script src="/packages/libs/mdb/js/bootstrap.min.js"></script>
  <script src="/packages/libs/mdb/js/mdb.min.js"></script>
  <script src="/packages/assets/js/Curiosity.js" charset="utf-8"></script>
  <script type="text/javascript" src="/packages/assets/js/landing/app-index.js?{{rand();}}"></script>
  <script type="text/javascript" src="/packages/assets/js/landing/controllers/loginController.js?{{rand();}}"></script>
  <script type="text/javascript" src="/packages/assets/js/landing/dispatchers/login.js?{{rand();}}"></script>
</body>
</html>
