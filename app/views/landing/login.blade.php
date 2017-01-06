@extends('indexBase')

@section('css')
  {{HTML::style('/packages/assets/css/landing/login.css')}}
@stop

@section('title')
  Curiosity | login
@stop

@section('menu')
<li class='nav-item anc'>
  <a class='nav-link' href='/'>Inicio <span class='sr-only'>(current)</span></a>
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
            <div class='login-box'>
              <center>
                <img src='/packages/assets/media/images/landing/perfil-default.jpg' class='img-responsive img-thumbnail login-img'>
              </center>
              <div class='login-txt'>
                <form action='' method='post'>
                  <div class='form-group' id='input-user'>
                    <div class='input-group'>
                      <span for='username' class='input-group-addon' id='login-icon-user'>
                        <span class='fa fa-user'></span>
                      </span>
                      <input type='text' class='form-control inputLogin'  style='-webkit-user-select: text;' placeholder='Nombre de Usuario' name='username' id='username'/>
                    </div>
                  </div>

                  <div class='form-group' id='input-pass'>
                    <div class='input-group'>
                      <span for='password' class='input-group-addon' id='login-icon-pass'>
                        <span class='fa fa-unlock-alt'></span>
                      </span>
                      <input type='password' class='form-control inputLogin' placeholder='Contraseña' style='-webkit-user-select: text;' name='password' id='password'>
                    </div>
                  </div>
                </form>
              </div>

              <button type='button' name='login-next' class='btn btn-warning btn-block' id='login-next'>
                <span class='fa fa-share'></span> &nbsp;
                Siguiente
              </button>

              <div id='boxButtonsIn'>
                <button type='button' name='login-int' class='btn btn-success btn-block' id='login-int'>
                  <span class='fa fa-share'></span> &nbsp;
                  Entrar
                </button>
                <button type='button' name='login-back' class='btn btn-danger btn-block' id='login-back'>
                  <span class='fa fa-reply'></span> &nbsp;
                  Regresar
                </button>
              </div>
				<br>
              <div class='col-xs-12 text-center forgot' style="text-align: center;">
                <a href='/olvide-mi-contrasena' style="color:#c5c5c5;font-size: 0.8em">
                  Olvide mi usuario y/o contraseña &nbsp;
                  <li class='fa fa-question-circle'></li>
                </a>
              </div>

            </div>
            <center><span class="fa fa-life-ring spanIcon"></span></center>
            <p class="frasePie">
              Porque a la cima no se llega superando a los demás, sino  superándose a sí mismo.
            </p>
          </div>
        </div>
      </section>
    </section>
  </section>
@stop

@section('js')
  {{HTML::script('/packages/assets/js/Curiosity.js')}}
  {{HTML::script('/packages/assets/js/landing/login.js')}}
<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<script type='text/javascript'>
    $(document).ready(function(){

      $('#login-reg').click(function(event) {
        window.location.href = '/suscripcion';
      });

        var statusFB;
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '847478262051734',
              xfbml      : true,
              version    : 'v2.6'
            });
          };
          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = '//connect.facebook.net/en_US/sdk.js';
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        $('#btn-fb').click(function(e){
              e.preventDefault();
              $(this).attr('disabled',true);
              FB.getLoginStatus(function(response) {
                   if (response.status === 'connected') {
                       FB.api('/me', 'GET',
                          {'fields':'email,first_name,last_name,id,gender,picture'},
                          function(response) {
                            FB.api('/me/picture?width=300&height=300',function(picture){
                                statusFB = {
                                    status:'success',
                                    profile:{
                                        email:response.email,
                                        first_name:response.first_name,
                                        last_name:response.last_name,
                                        id:response.id,
                                        gender:response.gender,
                                        picture:{
                                            data:{
                                                url:'http://graph.facebook.com/'+response.id+'/picture?type=large'
                                            }
                                        }

                                    }
                                }
                                console.log(picture);
                                console.log(statusFB);
                                $.ajax({
                                  url:'login-fb',
                                  method:'POST',
                                  dataType:'JSON',
                                  data:statusFB.profile
                              }).done(function(res){
                                if(res[0] == 'success'){
                                    $curiosity.noty('Bienvenid@ '+statusFB.profile.first_name, 'message','Bienvenido a Curiosity!!','http://graph.facebook.com/'+response.id+'/picture?type=large');
                                    window.location.href = '/perfil';
                                }
                              }).fail(function(error){

                              });
                            });

                        });
                    }
                    else{
                        FB.login(function(response) {
                            if (response.authResponse) {
                             FB.api('/me', 'post','GET',
                                  {'fields':'email,first_name,last_name,id,gender,picture'},
                                  function(response) {
                                    statusFB = {
                                        status:'success',
                                        data:response
                                    }
                                    $.ajax({
                                          url:'login-fb',
                                          method:'POST',
                                          dataType:'JSON',
                                          data:statusFB.data
                                      }).done(function(response){
                                        if(response[0] == 'success'){
                                            $curiosity.noty('Bienvenid@ '+statusFB.data.first_name, 'message','Bienvenido a Curiosity!!',statusFB.data.picture.data.url);
                                            window.location.href = '/perfil';
                                        }
                                      }).fail(function(error){

                                      });
                                });
                            } else {
                             console.log('User cancelled login or did not fully authorize.');
                            }
                        });

                    }
              });
              if(statusFB != undefined && statusFB.status == 'success' ){

              }
            $(this).attr('disabled',false);
          });
    });
</script>
@stop
