var $juego = {
    game:{
        hits:0,//variable para almacenar la cantidad de aciertos obtenidos por el usuario durante el juego.
        mistakes:0,//variable que lleva el control de los errores dentro del juego
        attempts:0,//varoable para almacenar los intentos realizados dentro del juego
        scoreValue:100,// valor que tendrán los puntos cada vez que el usario acierte
        scoreCurrent:0,// puntaje con el que el usario iniciará
        scoreMax:0,//variable para almacenar el puntaje más alto que el niño a tenido en esta actividad
        efficiency:0,//variable para almacenar el nivel de eficiencia que el usuario tubo al realizar la actividad
        combo:0,//variable para determinar combos dentro del juego.
        unity:{//objeto para iteractuar con los juegos desarrollados en unity
        salir:function(){
              $juego.game.hits=0;
              $juego.game.combo=0;//reiniciar continuos
              $("#gst-row-game").hide();//desaparecer zona juego
              $("#gst-row-information-game").show();//aparecer zona del objetivo
              $juego.game.scoreCurrent=0;
              var iframe = document.querySelector("iframe[name='iframe_juego']");
              if(iframe){
                iframe.removeAttribute("src");
              }
              $("#game").trigger('exit');
          },
          start:function(){
            //hide data zone game and show game
            $("#gst-row-game").show("fast");
            $("#gst-row-information-game").hide("slow");
            document.querySelector("iframe[name='iframe_juego']").setAttribute("src","/packages/assets/iframes/games/"+document.querySelector("iframe[name='iframe_juego']").getAttribute("data-folder")+"/index.html");
          }
        },
        start:function(duracion,inverso){
            $("#gst-row-game").show();
            $("#gst-row-information-game").hide();
            $("#gst-score-max").text($juego.game.scoreCurrent);
            $("#game").trigger('start');
            $juego.cronometro.start(duracion,inverso);
        },
        _start:function(){
            $("#gst-row-game").show();
            $("#gst-row-information-game").hide();
            $("#countPuntaje").text($juego.game.scoreCurrent);
            $("#game").trigger('start');
            document.querySelector("iframe[name='iframe_juego']").setAttribute("src",$juego.game.unity.iframe_src);
        },
        setMaxPuntuacion:function(socreMax){
          $juego.game.scoreMax=scoreMax;
        },
        finish:function(){
            //nivel=0;
            // Guardamos el puntaje mayor actual en variable temporal para no perder la catidad de puntos maximos en caso de que este puntaje sea superado
            //reiniciar puntuaje
            // Verificamos si el puntaje obtenido es mayor que el puntaje mayor actual
            if($juego.game.attempts > 0){
              $juego.game.efficiency = Math.round(($juego.game.hits * 100) / $juego.game.attempts);
            }
            else{
              $juego.game.efficiency = 0;
            }
            if($juego.game.scoreCurrent > $juego.game.scoreMax){
                // si el puntaje realizado es mayor que el [puntaje maximo], el puntaje maximo pasa a ser el puntaje realizado
                $juego.game.scoreMax = $juego.game.scoreCurrent;
                // Cambiamos el puntaje maximo en pantalla
                 $("#gst-score-max").text($juego.game.scoreMax +" puntos");
                $("#gst-score-max").data("score",$juego.game.scoreMax);
                $("#gst-hits-max").text($juego.game.hits);
            }
            var goal = StorageDB.table.getData("childgoal");
            var expPlus = Math.round($juego.game.efficiency * parseInt(goal["cant_exp"]) / 100);
            var ccPlus = Math.round(expPlus * 1.5);
            $("#gst-row-game").hide();//desaparecer zona juego
            $("#gst-row-information-game").show();//aparecer zona del objetivo
            $juego.game.save();
            $juego.modal.score.show($juego.game.scoreCurrent,$juego.game.hits, expPlus, ccPlus);
            $juego.game.restart();
            $("#game").trigger("finish");
        },
        finish_game_unity:function(){
            //nivel=0;
            // Guardamos el puntaje mayor actual en variable temporal para no perder la catidad de puntos maximos en caso de que este puntaje sea superado
            //reiniciar puntuaje
            // Verificamos si el puntaje obtenido es mayor que el puntaje mayor actual
            if($juego.game.attempts > 0){
              $juego.game.efficiency = Math.round(($juego.game.hits * 100) / $juego.game.attempts);
            }
            else{
              $juego.game.efficiency = 0;
            }
            if($juego.game.scoreCurrent > $juego.game.scoreMax){
                // si el puntaje realizado es mayor que el [puntaje maximo], el puntaje maximo pasa a ser el puntaje realizado
                $juego.game.scoreMax = $juego.game.scoreCurrent;
                // Cambiamos el puntaje maximo en pantalla
                $("#gst-score-max").text($juego.game.scoreMax +" puntos");
                $("#gst-score-max").data("score",$juego.game.scoreMax);
                $("#gst-hits-max").text($juego.game.hits);

            }
            var goal = StorageDB.table.getData("childgoal");
            var expPlus = Math.round($juego.game.efficiency * parseInt(goal["cant_exp"]) / 100);
            var ccPlus = Math.round(expPlus * 1.5);
            $juego.game.save();
            $juego.modal.score.show($juego.game.scoreCurrent,$juego.game.hits, expPlus, ccPlus);
            $juego.game.restart_game_unity();
            $juego.game.unity.salir();
        },
        restart:function(){
            $juego.game.hits=0;
            $juego.game.combo=0;//reiniciar continuos
            $juego.game.attempts = 0;
            $juego.game.mistakes = 0;
            $("#gst-row-game").hide();//desaparecer zona juego
            $("#gst-row-information-game").show();//aparecer zona del objetivo
            $juego.game.scoreCurrent=0;
            $("#game").trigger('restart');
        },
        restart_game_unity:function(){
            $juego.game.hits=0;
            $juego.game.attempts = 0;
            $juego.game.mistakes = 0;
            $juego.game.combo=0;//reiniciar continuos
            $juego.game.scoreCurrent=0;
        },
        save:function(){
            var average;
            if($juego.game.attempts==0){
                average = 0;
            }else{
                average = (($juego.game.hits*100)/$juego.game.attempts);
                /* Si es menor a 50 se deja el 50 */
                average = (average < 50) ? 50 : average;
            }
            data={
                score      : $juego.game.scoreCurrent,
                efficiency : $juego.game.efficiency,
                hits       : $juego.game.hits,//Se agrega el envio de los datos aciertos y errores
                mistakes   : $juego.game.mistakes,
                average    : average//El promedio se define diferente
            }
            childDoActivityCtrl.save(data);
            $("#game").trigger('save');
        },
        salir:function(){
            $juego.hits=0;
            $juego.game.attempts = 0;
            $juego.game.mistakes = 0;
            $juego.game.combo=0;//reiniciar continuos
            $("#gst-row-gamelay").hide();//desaparecer zona juego
            $("#gst-row-information-game").show();//aparecer zona del objetivo
            $juego.game.scoreCurrent=0;
            $juego.cronometro.stop();
            $("#game").trigger('exit');
        },
        setCombo:function(combo){
            $cbo = $("<div/>",{class:"combo"}).text("+"+combo+"");
            $("#combo").append($cbo);
            $cbo.css({"animation":"2s combo 1 forwards",});
            setTimeout(function(){$("#combo").empty();},2000);//eliminar el elemento dom que genera el combo cuando este termine
        },
        setCorrecto:function(){
            $("#countPuntaje").text($juego.game.scoreCurrent += $juego.game.scoreValue);
            // Sumamos +1 a los aciertos continuos que llevamos
            $juego.game.combo++;
            $juego.game.hits++;
            $juego.game.attempts++;
            console.log($juego.game.scoreCurrent);
            $juego.game.calcCombo();
        },
        setError:function(scoreMenius){
            // regresamos la cantidad de aciertos continuos a cero
            $juego.game.combo = 0;
            $juego.game.attempts++;
            $juego.game.mistakes++;//Se agregó esta linea para aumentar los errores cada vez que se equivoque por que esto se mostrará al padre.
            if($juego.game.scoreCurrent>scoreMenius){
              if(/^[0-9]*$/.test(scoreMenius))
                $("#countPuntaje").text($juego.game.scoreCurrent-=scoreMenius);
            }
            // Regresamos el valor de los puntos por acirto a 100
            $juego.game.scoreValue = 100;
        },
        calcCombo:function(){
            if($juego.game.combo !== 0){
                // si la cantidad de aciertos continuos es igual a 5 se asigna un nuevo valor a los puntos por acierto
                if($juego.game.combo == 5){
                  $juego.game.scoreValue += 50;
                  $juego.game.setCombo(50);
                }
                // si la cantidad de aciertos continuos es igual a 10 se asigna un nuevo valor a los puntos por acierto
                if($juego.game.combo == 10){
                  $juego.game.scoreValue += 100;
                  $juego.game.setCombo(100);
                }
                // si la cantidad de aciertos continuos es igual a 15 se asigna un nuevo valor a los puntos por acierto
                if($juego.game.combo == 15){
                  $juego.game.scoreValue += 250;
                  $juego.game.setCombo(250);
                }
                if($juego.game.combo == 20){
                    $juego.game.scoreValue +=500;
                    $juego.game.setCombo(500);
                    $juego.game.combo=0;//Reiniciar la variable continuos para poder generar más combos
                }
            }
        }
    },
    modal : {
        score : {
            show : function(score,hits,exp,cc){
                $("#gst-score").text(score+" Puntos");
                $("#gst-hits").text(hits);
                $("#gst-expplus").text("+"+exp+" Puntos");
                $("#gst-ccplus").text("+"+cc+" CC");
                $("#gst-modal").modal('show');
            }
        }
    },
    button : {
        playGame : {
            setFuncion : function(funcion){
                if($.isFunction(funcion))
                    $("#gst-btnPlay").click(funcion);
                else
                    console.error("El parametro setFuncion debe ser una función");
            }
        },
    },
};

// events
document.getElementById("gst-btnPlay").addEventListener("click",function(){
  $juego.game.unity.start();
  $juego.game.scoreMax = $("#gst-score-max").data("score");
},false);
