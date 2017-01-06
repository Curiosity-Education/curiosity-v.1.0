$(document).on('ready',__init);
function __init(){
  $("#username").trigger('focus');
    /*
    * Declaramos la variable para el primer elemento que se mostrará
    */

        var $primer_log = $('#input-user');

    /*
    * Declaramos la variable $segundo_log la cual contiene el segundo input a mostrar
    */
        var $segundo_log = $('#input-pass');

    /*

    /*
    * Declaramos variables correspondientes
    * a las credenciales de acceso
    * del usuario *-Username *-Password
    */
        var $username = $('#username');
        var $password = $('#password');

    /*
    * Esconderemos el input al iniciar
    * el DOM para que aparezca hasta que
    * haya ingresado el usuario y se logre
    * encontrar
    */
        // $segundo_log.hide();
        $('#login-int').hide();
        $('#login-back').hide();

    /*
    * Creamos la función show_second_log que nos servirá
    * para utilizarla al momento de mostrar el segundo
    * elemento que nos pide la password
    */

        function show_second_log(foto){
            $primer_log.hide();
            $segundo_log.show();
            $("#boxButtonsIn").show();
            $('#login-next').hide();
            $('#login-reg').hide();
            $('#login-int').show();
            $('#login-back').show();
            $(".login-img").attr('src',foto);
        }

        // reocultamos los botones y mostramos los botones de inicio asi como regresamos
        // la foto de perfil por la default y el input del usuario tambien
        function return_log(){
            $primer_log.show();
            $segundo_log.hide();
            $("#btn-fb").show();
            $('#login-next').show();
            $('#login-reg').show();
            $('#login-int').hide();
            $('#login-back').hide();
            $("#username").val("");
            $('#password').val("");
            $(".login-img").attr('src',"/packages/images/avatars/perfil-default.jpg");
        }

        // ejecutamos la funcion return_log para regresar los valore de login
        $("#login-back").click(return_log);

        // Funcion de verificacion de usuario
        function verificarUser($botonEnviar, $botonCanel){
          $botonEnviar.attr('disabled', 'disabled');
          $botonEnviar.html("<span class='fa fa-spinner fa-pulse'></span>&nbsp;");
          $botonCanel.attr('disabled', 'disabled');
          if($("#username").val() !== ""){
            var datos = {
              username : $("#username").val()
            };
            $.ajax({
              url: '/verificarUsuario',
              type: 'POST',
              data: {data: datos}
            })
            .done(function(response) {
              if(response != 'null'){
                $("#btn-fb").hide();
                show_second_log("/packages/images/perfil/"+response[0].foto_perfil);
              }
              else{
                $curiosity.noty("El nombre de usuario no existe.", 'warning');
              }
            })
            .fail(function(error) {
                $curiosity.noty(error.message,"warning")
                console.log(error);
            })
            .always(function(){
              $botonEnviar.removeAttr('disabled');
              $botonEnviar.html("<span class='fa fa-share'></span> &nbsp;Siguiente");
              $botonCanel.removeAttr('disabled');
            });
          }
          else{
            $curiosity.noty("Ingrese un nombre de usuario",'info');
            $botonEnviar.removeAttr('disabled');
            $botonEnviar.html("<span class='fa fa-share'></span> &nbsp;Siguiente");
            $botonCanel.removeAttr('disabled');
          }
        }

        // verificamos si el usuario existe en la base de datos al dar click en
        // boton de siguiente en la interfaz
        $("#login-next").click(function(){
          verificarUser($(this), $("#login-reg"));
        });

    /*Creamos las reglas de validación*/

    /*Creamos el evento keydown para que
    * que apretemos el tabulador se ejecute
    * el evento asi como cuando se de el enter
    */
        $username.on('keydown',function(e){
            if(e.keyCode == 9 || e.keyCode == 13){
              verificarUser($("#login-next"), $("#login-reg"));
            }
        });

    /* Declaramos el evento keydown para el password
    * diciendole asi que cada ves que se de un enter
    * se dispará la funcion log_in
    */
        $password.on('keydown',function(e){
          if(e.keyCode == 13){
            buscarUsuario($("#login-int"), $("#login-back"));
          }
        });

    /* Declaramos nuevamente otra opcion de logeo a traves
    un click en el boton de entrar*/
    $('#login-int').on('click',function(){
      buscarUsuario($("#login-int"), $("#login-back"));
    });

    // Funcion para la verificacion completa de usuario y contraseña en la base de datos
    function buscarUsuario($env, $canc){
      if ($password.val() !== ""){
        $env.attr('disabled', 'disabled');
        $env.html("<span class='fa fa-spinner fa-pulse'></span>&nbsp;");
        $canc.attr('disabled', 'disabled');
        var datos = {
          username: $username.val(),
          password: $password.val(),
          // browser:WURFL.complete_device_name, //GET name Browser
          // app_version:navigator.appVersion,// GET name appVersion
          // mobile:(WURFL.is_mobile) ? 1 : 0 //GET if it's mobile
        };
        $.ajax({
          url: '/login',
          type: 'POST',
          dataType: 'json',
          data: {data: datos}
        })
        .done(function(response) {
          // console.log(response);
          if($.isPlainObject(response)){
            $.each(response,function(index,value){
              $.each(value,function(i,message){
                $curiosity.noty(message, 'info');
              });
            });
          }
          else if(response[0] == 'success'){
            $curiosity.noty('Bienvenid@ '+$("#username").val(), 'message','Bienvenido a Curiosity!!',$(".login-img").attr('src'));
            if(response[1] == 'h'){
              window.location.href = '/inicio';
            }
            else{
              window.location.href = '/perfil';
            }
          }
          else{
            $curiosity.noty('La contraseña de usuario no es valida', 'warning');
            $password.val("");
            $env.removeAttr('disabled');
            $env.html("<span class='fa fa-share'></span> &nbsp;Entrar");
            $canc.removeAttr('disabled');
          }
        })
        .fail(function(error) {
          console.log(error);
        });
      }
      else{
        $curiosity.noty('Porfavor ingrese la contraseña primeramente', 'info');
        $env.removeAttr('disabled');
        $env.html("<span class='fa fa-share'></span> &nbsp;Entrar");
        $canc.removeAttr('disabled');
      }
    }

 (function ($) {
    // Detect touch support
    $.support.touch = 'ontouchend' in document;
    // Ignore browsers without touch support
    if (!$.support.touch) {
    return;
    }
    var mouseProto = $.ui.mouse.prototype,
        _mouseInit = mouseProto._mouseInit,
        touchHandled;

    function simulateMouseEvent (event, simulatedType) { //use this function to simulate mouse event
    // Ignore multi-touch events
        if (event.originalEvent.touches.length > 1) {
        return;
        }
    event.preventDefault(); //use this to prevent scrolling during ui use

    var touch = event.originalEvent.changedTouches[0],
        simulatedEvent = document.createEvent('MouseEvents');
    // Initialize the simulated mouse event using the touch event's coordinates
    simulatedEvent.initMouseEvent(
        simulatedType,    // type
        true,             // bubbles
        true,             // cancelable
        window,           // view
        1,                // detail
        touch.screenX,    // screenX
        touch.screenY,    // screenY
        touch.clientX,    // clientX
        touch.clientY,    // clientY
        false,            // ctrlKey
        false,            // altKey
        false,            // shiftKey
        false,            // metaKey
        0,                // button
        null              // relatedTarget
        );

    // Dispatch the simulated event to the target element
    event.target.dispatchEvent(simulatedEvent);
    }
    mouseProto._touchStart = function (event) {
    var self = this;
    // Ignore the event if another widget is already being handled
    if (touchHandled || !self._mouseCapture(event.originalEvent.changedTouches[0])) {
        return;
        }
    // Set the flag to prevent other widgets from inheriting the touch event
    touchHandled = true;
    // Track movement to determine if interaction was a click
    self._touchMoved = false;
    // Simulate the mouseover event
    simulateMouseEvent(event, 'mouseover');
    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');
    // Simulate the mousedown event
    simulateMouseEvent(event, 'mousedown');
    };

    mouseProto._touchMove = function (event) {
    // Ignore event if not handled
    if (!touchHandled) {
        return;
        }
    // Interaction was not a click
    this._touchMoved = true;
    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');
    };
    mouseProto._touchEnd = function (event) {
    // Ignore event if not handled
    if (!touchHandled) {
        return;
    }
    // Simulate the mouseup event
    simulateMouseEvent(event, 'mouseup');
    // Simulate the mouseout event
    simulateMouseEvent(event, 'mouseout');
    // If the touch interaction did not move, it should trigger a click
    if (!this._touchMoved) {
      // Simulate the click event
      simulateMouseEvent(event, 'click');
    }
    // Unset the flag to allow other widgets to inherit the touch event
    touchHandled = false;
    };
    mouseProto._mouseInit = function () {
    var self = this;
    // Delegate the touch handlers to the widget's element
    self.element
        .on('touchstart', $.proxy(self, '_touchStart'))
        .on('touchmove', $.proxy(self, '_touchMove'))
        .on('touchend', $.proxy(self, '_touchEnd'));

    // Call the original $.ui.mouse init method
    _mouseInit.call(self);
    };
})(jQuery);
    $("#game").on('touchmove', function(event) {
      event.preventDefault();
    });

}
