var $juego = {
    setSrcVideo:function(json){
      $("#modal-instrucciones #titulo-juego").text(json.titulo);
      $("#modal-instrucciones video").attr("src",json.ruta);
      $("#modal-instrucciones #texto>center>p").first().text(json.explanation1);
      $("#modal-instrucciones #texto>center>p").last().text(json.explanation2);
    },
    slider:{
        changeImages:function(json){
          $("#slider img[alt='img-1']").attr("src","/packages/images/games/"+json.img1);
          $("#slider img[alt='img-2']").attr("src","/packages/images/games/"+json.img2);
          $("#slider img[alt='img-3']").attr("src","/packages/images/games/"+json.img3);
        }
    },
    game:{
        aciertos:0,//variable para almacenar la cantidad de aciertos obtenidos por el usuario durante el juego.
        errores:0,
        intentos:0,
        valorPuntos:100,
        puntajeActual:0,
        puntajeMaximo:0,
        eficiencia:0,
        continuo:0,//variable para determinar combos dentro del juego.
        unity:{//objeto para iteractuar con los juegos desarrollados en unity
           ayudar:function(){
            $("#ayuda").trigger("click");
            alert();
           },
           salir:function(){
              $juego.aciertos=0;
              $juego.game.continuo=0;//reiniciar continuos
              $("#zona-play").hide();//desaparecer zona juego
              $("#zona-obj").show();//aparecer zona del objetivo
              $juego.game.puntajeActual=0;
              $("#game").trigger('exit');
           }
        },
        start:function(duracion,inverso){
            $("#zona-play").show();
            $("#zona-obj").hide();
            $("#countPuntaje").text($juego.game.puntajeActual);
            $("#game").trigger('start');
            $juego.cronometro.start(duracion,inverso);
        },
        _start:function(){
            $("#zona-play").show();
            $("#zona-obj").hide();
            $("#countPuntaje").text($juego.game.puntajeActual);
            $("#game").trigger('start');
        },
        setMaxPuntuacion:function(puntuacion){
          $juego.game.puntajeMaximo=puntuacion;
        },
        finish:function(){
            //nivel=0;
            // Guardamos el puntaje mayor actual en variable temporal para no perder la catidad de puntos maximos en caso de que este puntaje sea superado
            //reiniciar puntuaje
            // Verificamos si el puntaje obtenido es mayor que el puntaje mayor actual
            if($juego.game.intentos > 0){
              $juego.game.eficiencia = Math.round(($juego.game.aciertos * 100) / $juego.game.intentos);
            }
            else{
              $juego.game.eficiencia = 0;
            }
            if($juego.game.puntajeActual > $juego.game.puntajeMaximo){
            // si el puntaje realizado es mayor que el [puntaje maximo], el puntaje maximo pasa a ser el puntaje realizado
            $juego.game.puntajeMaximo = $juego.game.puntajeActual;
            // Cambiamos el puntaje maximo en pantalla
            $("#num-max-pts").html($juego.game.puntajeMaximo + " pts");
            }
            $("#zona-play").hide();//desaparecer zona juego
            $("#zona-obj").show();//aparecer zona del objetivo
            $juego.game.save();
            $juego.modal.puntuacion.mostrar($juego.game.puntajeMaximo,$juego.game.puntajeActual);
            $juego.game.puntajeActual=0;
            $juego.game.intentos = 0;
            $juego.game.errores = 0;
            $juego.game.aciertos=0;
            $juego.game.continuo=0;//reiniciar continuos
            $juego.cronometro.stop();
            $("#game").trigger("finish");
        },
        finish_game_unity:function(){
           $juego.game.eficiencia = Math.round(($juego.game.aciertos * 100) / $juego.game.intentos);
            if($juego.game.puntajeActual > $juego.game.puntajeMaximo){
            // si el puntaje realizado es mayor que el [puntaje maximo], el puntaje maximo pasa a ser el puntaje realizado
             $juego.game.puntajeMaximo = $juego.game.puntajeActual;
            }
            $juego.game.save();
            $juego.game.restart_game_unity();
        },
        restart:function(){
            $juego.game.aciertos=0;
            $juego.game.continuo=0;//reiniciar continuos
            $juego.game.intentos = 0;
            $juego.game.errores = 0;
            $("#zona-play").hide();//desaparecer zona juego
            $("#zona-obj").show();//aparecer zona del objetivo
            $juego.game.puntajeActual=0;
            $juego.cronometro.stop();
            $("#btn-comenzar").trigger("click");
            $("#game").trigger('restart');
        },
        restart_game_unity:function(){
            $juego.game.aciertos=0;
            $juego.game.intentos = 0;
            $juego.game.errores = 0;
            $juego.game.continuo=0;//reiniciar continuos
            $juego.game.puntajeActual=0;
        },
        save:function(){
              data={
                puntaje:$juego.game.puntajeActual,
                eficiencia:$juego.game.eficiencia,
                aciertos:$juego.game.aciertos,//Se agrega el envio de los datos aciertos y errores
                incorrectos:$juego.game.errores,
                promedio:($juego.game.aciertos*100)/$juego.game.intentos//El promedio se define diferente
              }

              $.ajax({
                    url:'/actividad/setdata',
                    method:"POST",
                    data:data
                }).done(function(response){
                    if(response.estado == "200"){
                        // $curiosity.noty(response.message,"success");
                    }
                    else{
                      $curiosity.noty(response.message,"warning");
                    }
                }).fail(function(error,status,statusText){
                    $curiosity.noty(error,"error");
                });
            $("#game").trigger('save');
        },
        salir:function(){
            $juego.game.aciertos=0;
            $juego.game.intentos = 0;
            $juego.game.errores = 0;
            $juego.game.continuo=0;//reiniciar continuos
            $("#zona-play").hide();//desaparecer zona juego
            $("#zona-obj").show();//aparecer zona del objetivo
            $juego.game.puntajeActual=0;
            $juego.cronometro.stop();
            $("#game").trigger('exit');
        },
        setCombo:function(valorCombo){
            $cbo = $("<div/>",{class:"combo"}).text("+"+combo+"");
            $("#combo").append($cbo);
            $cbo.css({"animation":"2s combo 1 forwards",});
            setTimeout(function(){$("#combo").empty();},2000);//eliminar el elemento dom que genera el combo cuando este termine
        },
        setCorrecto:function(){
            $("#countPuntaje").text($juego.game.puntajeActual += $juego.game.valorPuntos);
            // Sumamos +1 a los aciertos continuos que llevamos
            $juego.game.continuo++;
            $juego.game.aciertos++;
            $juego.game.intentos++;
            // colocamos una palomita en la esquina inferior derecha dentro del div con la clase verific indicando que el usuario ha seleccionado la opcion correcta
            $(".verific").html("<i class='fa fa-check fa-4x'></i>").css('color', 'rgb(255, 255, 255)');
            // establecemos que despues de 600 milisegundos la clase de error se eliminara del contenedor del juego
            setTimeout(function(){
              // eliminamos el contenido del div con la clase verific el cual contenia una palomita
            $(".verific").empty();
            // Establecemos en cuantos milisegundos se realizará la funcion
            }, 600);
        },
        setError:function(puntosMenos){
            // regresamos la cantidad de aciertos continuos a cero
            $juego.game.continuo = 0;
            $juego.game.intentos++;
            $juego.game.errores++;//Se agregó esta linea para aumentar los errores cada vez que se equivoque por que esto se mostrará al padre.
            if($juego.game.puntajeActual>puntosMenos){
              if(/^[0-9]*$/.test(puntosMenos))
                $("#countPuntaje").text($juego.game.puntajeActual-=puntosMenos);
            }
            // Regresamos el valor de los puntos por acirto a 100
            $juego.game.valorPuntos = 100;
            // añadimos la clase creada en css para poner una sombra roja fuera del contenedor del juego
            $(".zona-juego").addClass('error-shadow');
            // colocamos una equis en la esquina inferior derecha dentro del div con la clase verific indicando que el usuario se ha equivocado
            $(".verific").html("<i class='fa fa-close fa-4x'></i>").css('color', 'rgb(215, 36, 36)');
            // establecemos que despues de 600 milisegundos la clase de error se eliminara del contenedor del juego
            setTimeout(function(){
              // removemos la clase de error-shadow
              $(".zona-juego").removeClass('error-shadow');
              // eliminamos el contenido del div con la clase verific el cual contenia una equis
              $(".verific").empty();
              // Establecemos en cuantos milisegundos se realizará la funcion
            }, 600);
        },
        determinarCombo:function(){
            if($juego.game.continuo !== 0){
                // si la cantidad de aciertos continuos es igual a 5 se asigna un nuevo valor a los puntos por acierto
                if($juego.game.continuo == 5){
                  $juego.game.valorPuntos += 50;
                  $juego.game.setCombo(50);
                }
                // si la cantidad de aciertos continuos es igual a 10 se asigna un nuevo valor a los puntos por acierto
                if($juego.game.continuo == 10){
                  $juego.game.valorPuntos += 100;
                  $juego.game.setCombo(100);
                }
                // si la cantidad de aciertos continuos es igual a 15 se asigna un nuevo valor a los puntos por acierto
                if($juego.game.continuo == 15){
                  $juego.game.valorPuntos += 250;
                  $juego.game.setCombo(250);
                }
                if($juego.game.continuo == 20){
                    $juego.game.valorPuntos +=500;
                    $juego.game.setCombo(500);
                    $juego.game.continuo=0;//Reiniciar la variable continuos para poder generar más combos
                }
            }
        }
    },
    cronometro:{
        interval:"",
        interval_canvas:"",
        duracion:60,
        tiempo:60,
        minutero:0,
        segundero:0,
        pausa:false,
        inverso:false,
        start:function(duracion,inverso){

            if(!/^[0-9]*$/.test(duracion)){
                console.error("El paramentro duración debe ser entero");
            }else if(!/true|false/.test(inverso)){
                console.error("El parametro inverso debe ser un booleano");
            }else{
                $juego.cronometro.interval = setInterval($juego.cronometro.contar,1000);
                $juego.cronometro.duracion=duracion;
                $juego.cronometro.tiempo=duracion;
                $juego.cronometro.drawCircleTemp();
                $juego.cronometro.pausa=false;
                min = Math.floor(duracion/60);
                second = duracion % 60;
                min    = min    < 10 ? '0'+min    : min;
                second = second < 10 ? '0'+second : second;
                $("#temp-static").text(min+":"+second);
            }
        },
        contar:function(){
            if(!$juego.cronometro.pausa){
                if($juego.cronometro.tiempo>=0){
                    $juego.cronometro.showCronometro($juego.cronometro.minutero,$juego.cronometro.segundero);
                    $juego.cronometro.segundero++;
                    $juego.cronometro.tiempo-=1;
                    if($juego.cronometro.segundero==60){
                        $juego.cronometro.minutero++;
                        $juego.cronometro.segundero=0;
                    }
                }else{
                    $juego.game.finish();
                }
            }
            else{
                $("#game").trigger('pause');
            }
        },
        drawCircleTemp:function(){
          var mycanvas = document.getElementById('mycanvas');
          var mycanvas1 = $('#mycanvas');
          var ctx = mycanvas.getContext('2d');
          $juego.cronometro.interval_canvas = setInterval(drawCircle,1000);
          ctx.lineWidth=9;
          var circleTime = $('.temp').position();
          mycanvas1.css({'display':'block', 'left':circleTime.left, 'top':circleTime.top});
          ctx.lineCap="round";
          grados = 270;
          contadorGrados=0;
          var gradian1  = ctx.createLinearGradient(120,0,220,0);
          gradian1.addColorStop(0,'rgb(242,221,72)');
          gradian1.addColorStop(1,'rgb(54,142,184)'); // rojo
          gradian2 = ctx.createLinearGradient(100,90,420,0);
          gradian2.addColorStop(0,'rgb(242,221,72)');
          gradian2.addColorStop(.4,'rgb(237,34, 36)');
          gradian2.addColorStop(1,'rgb(54,142,184)');
          function drawCircle(){
            if(!$juego.cronometro.pausa){
               if(contadorGrados<270){
                   ctx.beginPath();
                   ctx.strokeStyle=gradian1;
                   var radianes = (Math.PI/180)*grados;
                   ctx.arc(65,65,61,(Math.PI/180)*270,radianes,false);
                   ctx.stroke();
                   ctx.closePath();
               }else if(contadorGrados<=360){
                 ctx.beginPath();
                 ctx.strokeStyle=gradian2;
                 var radianes = (Math.PI/180)*grados;
                 ctx.arc(65,65,61,(Math.PI/180)*180,radianes,false);
                 ctx.stroke();
                 ctx.closePath();
               }else{
                 $juego.cronometro.endCanvasCronometro();
                 return;
               }
               grados=grados+(360/$juego.cronometro.duracion);
               contadorGrados+=(360/$juego.cronometro.duracion);
               if(grados>=360){
                   grados=0;
               }
             }
           }
        },
        endCanvasCronometro:function(){
           clearInterval($juego.cronometro.interval_canvas);
           grados= 270;
           contadorGrados=0;
           mycanvas.width=mycanvas.width;
        },
        showCronometro:function(minutos,segundos){
            if(!/^[0-9]*$/.test(minutos) || !/^[0-9]*$/.test(segundos)){
                console.error("Los paramentro seg y min deben ser enteros");
            }else{
                if(minutos>9 && segundos>9){
                    $("#temp-count").text(minutos+":"+segundos);
                }else if(minutos>9 && segundos<10){
                    $("#temp-count").text(minutos+":0"+segundos);
                }else if(minutos<10 && segundos>9){
                    $("#temp-count").text("0"+minutos+":"+segundos);
                }else{
                    $("#temp-count").text("0"+minutos+":0"+segundos);
                }
            }
        },
        stop:function(){
            clearInterval($juego.cronometro.interval);
            $juego.cronometro.segundero=0;
            $juego.cronometro.minutero=0;
            $juego.cronometro.tiempo=$juego.cronometro.duracion;//reiniciar tiempo
            $juego.cronometro.endCanvasCronometro();
            $juego.cronometro.showCronometro($juego.cronometro.minutero,$juego.cronometro.segundero);
        },
        pausar:function(bool){
            if(!/true|false/.test(bool)){
                console.error("El parametro inverso debe ser un booleano");
            }else
                $juego.cronometro.pausa=bool;
        }
    },
    modal : {
        puntuacion : {
            mostrar : function(ptsMax,putNow){
                $("#modal-puntos-max").html("<b>Puntaje Máximo : </b>" +ptsMax+" Pts");
                $("#modal-puntos-now").html("<b>Puntaje Obtenido : </b>" +putNow+" Pts");
                // $(".btnVideo").removeAttr('disabled');
                // $(".btnDownloadPDF").removeAttr('disabled');
                $(".btnVideo").removeAttr('disabled');
                $(".btnDownloadPDF").removeAttr('disabled');
                $("#modalPrueba").modal('show');
            }
        }
    },
    boton : {
        comenzar : {
            setFuncion : function(funcion){
                if($.isFunction(funcion))
                    $("#btn-comenzar").click(funcion);
                else
                    console.error("El parametro setFuncion debe ser una función");
            }
        },
        archivoPDF : {
            setDireccion : function(dir){
                $("#btnDownloadPDF").attr({
                  'href' : dir
                });
            },
            setNombreDescarga : function(nombre){
                $("#btnDownloadPDF").attr({
                  'download' : nombre
                });
            }
        },
        video : {
            setVideo : function(embedCode){
                if(/^www\.youtube\.com\/embed\/\S*$/.test(embedCode))
                    $("#videoApoyo").attr('src', embedCode);
            }
        }

    },
    setObjetivo : function(objetivo){
        if(/^[a-zA-Z_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ\s]*$/.test(objetivo))
            $("#juego-objetivo").text(objetivo);
    },
    setPuntosMaxInicio : function(puntos){
        if(/^[0-9]*$/.test(puntos))
            $("#num-max-pts").text(puntos + " Pts");
    },
    setEficienciaMaxInicio : function(eficiencia){
        if(/^[0-9]*$/.test(eficiencia))
            $("#num-max-efic").text(eficiencia + "%");
    },
    setNivelUsuarioIMG : function(){
      $.ajax({
        url:'/getEstandarte',
        method:"POST"
      }).done(function(response){
        if(response == "bronce"){
          $("img#medallaAlerta").attr("src", "/packages/images/cups/winBronce.png");
          $("img#imgNivel").attr("src", "/packages/images/cups/medallaBronce.png");
        }
        else if(response == "plata"){
          $("img#medallaAlerta").attr("src", "/packages/images/cups/winPlata.png");
          $("img#imgNivel").attr("src", "/packages/images/cups/medallaPlata.png");
        }
        else{
          $("img#medallaAlerta").attr("src", "/packages/images/cups/winOro.png");
          $("img#imgNivel").attr("src", "/packages/images/cups/medallaOro.png");
        }
      }).fail(function(error){
        console.log(error);
      });
    },
    setBackgroundImg : function(dirIMG){
      // $(".zona-juego").css({
      //   "background-image" : "url("+dirIMG+")",
      //   "background-position" : "center",
      //   "background-repeat" : "no-repeat",
      //   "background-size" : "cover"
      // });
      $("#zona-play").css({
        "background-image" : "url("+dirIMG+")",
        "background-position" : "center",
        "background-repeat" : "no-repeat",
        "background-size" : "cover"
      });
    },
    setBackgroundColor : function(color){
        if(/^#[0-9][a-fA-F]{6}$/.test(color) || /^rgb\([0-9]{1,3}\,[0-9]{1,3}\,[0-9]{1,3}\)$/.test(color)){
            $(".zona-juego").css({
                "background-color" : color
            });
        }
        else{
            // console.error("El parametro de la funcion setBackgroundColor debe ser hexadecimal o rgb");
        }
    },
    setTitulo : function(titulo){
        if(/^[a-zA-Z_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ\s]*$/.test(titulo))
            $("#juego-titulo").text(titulo);
    }
};
$("#pausa").click(function(){
  $juego.cronometro.pausar(true);
  $("#game").addClass("blur");
  $("#game").trigger("pausa");
});
$("#continuar").click(function(){
  $juego.cronometro.pausar(false);
  $("#game").removeClass("blur");
  $("#game").trigger("continue");
});
$("#continue").click(function(){
    $("body").removeClass("modal-open");
    $(".myModal").removeClass("in");
    $(".myModal").hide();
    $(".modal-backdrop").remove();
    $("#continuar").trigger("click");
});
$("#ayuda").click(function(e){
    $("body").removeClass("modal-open");
    $("#menu-juego").removeClass("in");
    $("#menu-juego").hide();
    $(".modal-backdrop").remove();
    $("body").addClass("modal-open");
    $(".myModal").show();
    $(".myModal").addClass("in");
    $("body").append($("<div class='modal-backdrop fade in'></div>"));
});

$("#reiniciar").click(function(){
  $juego.game.restart();
  $("#game").removeClass("blur");
});
$("#salir_juego").click(function(){
  $juego.game.salir();
  $("#game").removeClass("blur");
});
$(".btnVideo").click(function(){
    $("#modalPrueba").modal('hide');
    $("#modalVideo").modal('show');
});




/*$("#ayuda").click(function(){
	//$("#oculto").trigger("click");
	//$("#btn-instrucciones").trigger("click");
	//$("#omitir").attr('id','omitir-pausa');
});*/

/*$("#omitir-pausa").click(function(){
	$("#pausa").trigger("click");
	$(this).att('id','omitir');
});*/

/*$("#oculto").click(function(){
	$("#btn-instrucciones").trigger("click");
});*/

$(document).ready(function(){
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
});

// FUNCIONAMIENTO DEL SLIDER

$(function(){
	var SliderModule = (function(){

		var pb = {};
		pb.el = $('#slider');
		pb.nom = "fernando";
		pb.items = {
			panel: pb.el.find('li')
		}

		// Variables Necesarias
		var SliderInterval,
			currentSlider = 0,
			nextSlider = 1,
			lengthSlider = pb.items.panel.length;

		//initialize
		pb.init = function(settings){

			var output = "";

			for(var i = 0; i < lengthSlider; i++){
				if(i == 0){
					output += '<li class="active"></li>';
				}

				else{
					output += '<li></li>';
				}
			}


			//Activamos nuestro slider
			SliderInit();

			// Controles del Slider
			$('#slider-controls').html(output).on('click','li', function(e){
				var $this = $(this);
				//console.log($this.index());

				if(currentSlider !== $this.index()){
					changePanel($this.index());
				};

			});
		}

		pb.starSlider = function(){
			var panels = pb.items.panel,
			controls = $('#slider-controls li');
			if(nextSlider >= lengthSlider){
				nextSlider = 0;
				currentSlider = lengthSlider-1;
			}
			// Efectos
			controls.removeClass('active').eq(currentSlider).addClass('active');
			panels.eq(currentSlider).fadeOut('slow');
			panels.eq(nextSlider).fadeIn('slow');
			//console.log(nextSlider);
			// Actualizamos nuestros datos
			currentSlider = nextSlider;
			nextSlider += 1;
		}
		// Funcion para controles del Slider
		var changePanel = function(id){
			clearInterval(SliderInterval);
			var panels = pb.items.panel,
				controls = $('#slider-controls li');

			// Comprobamos el ID
			if(id >= lengthSlider){
				id = 0;
			}

			else if(id < 0){
				id = lengthSlider-1;
			}

			// Efectos
			controls.removeClass('active').eq(id).addClass('active');
			panels.eq(currentSlider).fadeOut('slow');
			panels.eq(id).fadeIn('slow');

			// Actualizamos nuestros datos
			currentSlider = id;
			nextSlider = id + 1;

			// Reactivamos el Interval (Slider)
			SliderInit();

		}

		var SliderInit = function(){
			SliderInterval = setInterval(pb.starSlider, 4000);
		}

		return pb;
	}());

	SliderModule.init();

});


$(document).ready(function() {
  var tempEmbed;
  $iframe = $("#srcvid");

  $("#btnclvid").click(function(event) {
    tempEmbed = $iframe.attr('src');
    $iframe.attr('src', '');
    $iframe.attr('src', tempEmbed);
  });

  $("#btn-what").click(function(){
    swal(
      "¡Meta diaria Completa!",
      "¡Felicidades! has completado tu meta diaria. Puedes cambiar esta configuración desde tu perfil. Vuelve mañana y sigue divirtiendote.",
      "success"
    );
  });
});
