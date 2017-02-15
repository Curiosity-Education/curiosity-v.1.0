@extends('principalMaster')

@section('css')
  {{HTML::style('/packages/css/curiosity/loginStyle.css')}}
  {{HTML::style('/packages/css/libs/notificacion_toast/jquery.toast.css')}}
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

  </style>
@stop

@section('title')
  Curiosity | login
@stop

@section('menu')
<li class='nav-item anc'>
  <a class='nav-link' href='/'>{{Lang::get('landingPage.menu.home')}} <span class='sr-only'>(current)</span></a>
</li>
<li class='nav-item'>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a class='btn danger-rounded-outline waves-effect pull-right' style='color:#fff; margin-left:-15px;' href='/suscripcion'>{{Lang::get('landingPage.menu.createAccount')}}</a>
</li>
@stop


@section('contenido')
  <audio src='/packages/notificaciones/music.mp3' id='notyAudio'></audio>
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
@stop

@section('js')
  {{HTML::script('/packages/js/curiosity/desktop-notify.js')}}
  {{HTML::script('/packages/js/libs/notificacion_toast/jquery.toast.js')}}
  {{HTML::script('/packages/js/curiosity/curiosity.js')}}
  {{HTML::script('/packages/js/curiosity/recuperarPass.js')}}
  <script>
      var wid = $(".login-box").width();
      $("#header-frm").width(wid-8);

      $(window).resize(function(){
          var wid = $(".login-box").width();
          console.log(wid);
          $("#header-frm").width((wid-6));
      });
  </script>
@stop
