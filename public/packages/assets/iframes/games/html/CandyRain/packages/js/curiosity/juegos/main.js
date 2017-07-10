var iframe;
var wTemp;
var hTemp;

//se declaran las variables  globalmente
var tabla, estrella, paraguas, reloj, fondoJuego, grid, music, contador, musicDulce, btnFull, musicError, musicTarro;

var counter = 90;
var text = 0;
var puntos = 0, score;

var bandera = true;
var bandera1 = true;

var temparray = [];
var cc = 0;
var cr = 0;

var relojPts = 0;

//el arreglo botonDulce almacena todos los botones que mandan parametro ya sea de letra o de numero
var botonDulce = [11];
//las variables tabla_X y tabla_Y determina cantos dulces tendra en cada row
var tabla_Y = 7;
var tabla_X = 6;
//el arreglo dulce amacena los dulces usados en el juego
const dulce = [41];
//candys es un arreglo diseñado para dar el color del dulce que se lanze a el canvas por medio del random
var candys = [3];
//las variables parametroX y parametroY tendran almacenado el valor de los parametros que se manden por medio de los //botones base
var parametroX = -1;
var parametroY = -1;

var tarro=[3];

var dulceDestruido = [];

var numDulceDestroy = 0;

var posicionPixelesY = [null, 200, 260, 320, 380, 440, 500];

var juego = new Phaser.Game(893, 670, Phaser.CANVAS, 'bloque');

var estadoPrincipal = {


    preload: function(){
        //en esta zona se inicializan los sprites requeridos en la escena
        juego.load.image('fondo', 'packages/images/games/CR6mb1fondo.png');
        juego.load.image('grid', 'packages/images/games/CR6mb1tablero.png');


        //esta parte se inicializan los iconos como el PARAGUAS, ESTRELLA y el RELOJ estos serviran como ayuda en el //juego para el nino
        juego.load.spritesheet('paraguas', 'packages/images/games/CR6mb1paraguas.png', 300, 300);
        juego.load.spritesheet('reloj', 'packages/images/games/CR6mb1reloj.png', 300, 300);

        juego.load.image('estrella', 'packages/images/games/CR6mb1estrella.png');
        juego.load.spritesheet('btnFull', 'packages/images/games/CR6mb1fullScreen.png', 100, 100);

        //Esta zona es para declarar todos los botones usados para los parametros X y Y
        juego.load.spritesheet('boton_1', 'packages/images/games/CR6mb1boton1.png',200, 200);
        juego.load.spritesheet('boton_2', 'packages/images/games/CR6mb1boton2.png',200, 200);
        juego.load.spritesheet('boton_3', 'packages/images/games/CR6mb1boton3.png',200, 200);
        juego.load.spritesheet('boton_4', 'packages/images/games/CR6mb1boton4.png',200, 200);
        juego.load.spritesheet('boton_5', 'packages/images/games/CR6mb1boton5.png',200, 200);
        juego.load.spritesheet('boton_6', 'packages/images/games/CR6mb1boton6.png',200, 200);
        juego.load.spritesheet('boton_a', 'packages/images/games/CR6mb1botona.png',200, 200);
        juego.load.spritesheet('boton_b', 'packages/images/games/CR6mb1botonb.png',200, 200);
        juego.load.spritesheet('boton_c', 'packages/images/games/CR6mb1botonc.png',200, 200);
        juego.load.spritesheet('boton_d', 'packages/images/games/CR6mb1botond.png',200, 200);
        juego.load.spritesheet('boton_e', 'packages/images/games/CR6mb1botone.png',200, 200);
        juego.load.spritesheet('boton_f', 'packages/images/games/CR6mb1botonf.png',200, 200);

        //se  inicializan los 4 dulces a usar en el juego
        juego.load.image('dulce1', 'packages/images/games/CR6mb1dulce_rojo.png');
        juego.load.image('dulce2', 'packages/images/games/CR6mb1dulce_amarillo.png');
        juego.load.image('dulce3', 'packages/images/games/CR6mb1dulce_verde.png');
        juego.load.image('dulce4', 'packages/images/games/CR6mb1dulce_azul.png');


        juego.load.image('tarro2', 'packages/images/games/CR6mb1jar-yellow.png');
        juego.load.image('tarro3', 'packages/images/games/CR6mb1jar-green.png');
        juego.load.image('tarro4', 'packages/images/games/CR6mb1jar-blue.png');
        juego.load.image('tarro1', 'packages/images/games/CR6mb1jar-pink.png');

        juego.load.audio('crystal', 'packages/music/Crystal.ogg');
        juego.load.audio('dulceF', 'packages/music/dulceF.ogg');
        juego.load.audio('error', 'packages/music/pp080916_erroneo.ogg');
        juego.load.audio('tarDestroy', 'packages/music/bells.mp3');
    },

    create: function(){

        juego.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
        juego.scale.pageAlignHorizontally = true;
        juego.scale.pageAlignVertically = true;

        juego.stage.backgroundColor = '#000000';
        fondoJuego = juego.add.tileSprite(0, 0, 893, 670, 'fondo');
        music = juego.add.audio('crystal');
        musicDulce = juego.add.audio('dulceF');
        musicError = juego.add.audio('error');
        musicTarro = juego.add.audio('tarDestroy')
        musicTarro.volume = 1.5;

        contador = juego.add.text(20, 35, '90 Seg', {font: "55px Kiddish", fill: "#ed6922", strokeThickness: 6, stroke: "#ffffff"});
        score = juego.add.text(680, 530, '0 Pts', {font: "35px Kiddish", fill: "#ed6922", strokeThickness: 6, stroke: "#ffffff"});



        grid = juego.add.tileSprite(450, 350, 500, 500, 'grid');
        grid.anchor.setTo(0.5);
        grid.scale.setTo(0.75, 0.75);

        //aqui se crea y se asigna la posicion de los sprites usados en el juego
        paraguas = juego.add.button(680, 200, 'paraguas');
        paraguas.scale.setTo(0.4);
        paraguas.frame = 0;
        paraguas.events.onInputDown.add(Destruir, this);
        paraguas.events.onInputDown.add(llenarTablero, this);


        reloj = juego.add.button(680, 350, 'reloj');
        reloj.scale.setTo(0.4);
        reloj.frame = 1;
        reloj.inputEnabled = false;
        reloj.events.onInputDown.add(sumaTime, this);
        reloj.events.onInputDown.add(actionOnClick1, this);
        reloj.events.onInputDown.add(cambioBotonReloj, this);



        //se da a cada uno de los botonesDulces una posicion se escalan y se les asigna una variable la cual se usara como parametro para la destuccion de srite(dulce) tambien se le asigna un evento click el cual hara lo dicho anteriormente, estose repite por cada uno de los botones asignados
        botonDulce[0] = juego.add.button(220, 500, 'boton_1');
        botonDulce[0].anchor.setTo(0.5);
        botonDulce[0].scale.setTo(0.25);
        botonDulce[0].variable = 0;
        botonDulce[0].events.onInputDown.add(agregarValorY, this);
        botonDulce[0].events.onInputDown.add(cambioBoton, this);

        botonDulce[1] = juego.add.button(220, 440, 'boton_2');
        botonDulce[1].anchor.setTo(0.5);
        botonDulce[1].scale.setTo(0.25);
        botonDulce[1].variable = 6;
        botonDulce[1].events.onInputDown.add(agregarValorY, this);
        botonDulce[1].events.onInputDown.add(cambioBoton, this);

        botonDulce[2] = juego.add.button(220, 380, 'boton_3');
        botonDulce[2].anchor.setTo(0.5);
        botonDulce[2].scale.setTo(0.25);
        botonDulce[2].variable = 12;
        botonDulce[2].events.onInputDown.add(agregarValorY, this);
        botonDulce[2].events.onInputDown.add(cambioBoton, this);

        botonDulce[3] = juego.add.button(220, 320, 'boton_4');
        botonDulce[3].anchor.setTo(0.5);
        botonDulce[3].scale.setTo(0.25);
        botonDulce[3].variable = 18;
        botonDulce[3].events.onInputDown.add(agregarValorY, this);
        botonDulce[3].events.onInputDown.add(cambioBoton, this);

        botonDulce[4] = juego.add.button(220, 260, 'boton_5');
        botonDulce[4].anchor.setTo(0.5);
        botonDulce[4].scale.setTo(0.25);
        botonDulce[4].variable = 24;
        botonDulce[4].events.onInputDown.add(agregarValorY, this);
        botonDulce[4].events.onInputDown.add(cambioBoton, this);

        botonDulce[5] = juego.add.button(220, 200, 'boton_6');
        botonDulce[5].anchor.setTo(0.5);
        botonDulce[5].scale.setTo(0.25);
        botonDulce[5].variable = 30;
        botonDulce[5].events.onInputDown.add(agregarValorY, this);
        botonDulce[5].events.onInputDown.add(cambioBoton, this);


        botonDulce[6] = juego.add.button(300, 575, 'boton_a');
        botonDulce[6].anchor.setTo(0.5);
        botonDulce[6].scale.setTo(0.25);
        botonDulce[6].variable = 5;
        botonDulce[6].events.onInputDown.add(agregarValorX, this);
        botonDulce[6].events.onInputDown.add(cambioBoton, this);

        botonDulce[7] = juego.add.button(360, 575, 'boton_b');
        botonDulce[7].anchor.setTo(0.5);
        botonDulce[7].scale.setTo(0.25);
        botonDulce[7].variable = 4;
        botonDulce[7].events.onInputDown.add(agregarValorX, this);
        botonDulce[7].events.onInputDown.add(cambioBoton, this);

        botonDulce[8] = juego.add.button(420, 575, 'boton_c');
        botonDulce[8].anchor.setTo(0.5);
        botonDulce[8].scale.setTo(0.25);
        botonDulce[8].variable = 3;
        botonDulce[8].events.onInputDown.add(agregarValorX, this);
        botonDulce[8].events.onInputDown.add(cambioBoton, this);

        botonDulce[9] = juego.add.button(480, 575, 'boton_d');
        botonDulce[9].anchor.setTo(0.5);
        botonDulce[9].scale.setTo(0.25);
        botonDulce[9].variable = 2;
        botonDulce[9].events.onInputDown.add(agregarValorX, this);
        botonDulce[9].events.onInputDown.add(cambioBoton, this);

        botonDulce[10] = juego.add.button(540, 575, 'boton_e');
        botonDulce[10].anchor.setTo(0.5);
        botonDulce[10].scale.setTo(0.25);
        botonDulce[10].variable = 1;
        botonDulce[10].events.onInputDown.add(agregarValorX, this);
        botonDulce[10].events.onInputDown.add(cambioBoton, this);

        botonDulce[11] = juego.add.button(600, 575, 'boton_f');
        botonDulce[11].anchor.setTo(0.5);
        botonDulce[11].scale.setTo(0.25);
        botonDulce[11].variable = 0;
        botonDulce[11].events.onInputDown.add(agregarValorX, this);
        botonDulce[11].events.onInputDown.add(cambioBoton, this);

        btnFull = juego.add.button(850, 70, 'btnFull');
        btnFull.anchor.setTo(0.5);
        btnFull.scale.setTo(0.6);
        btnFull.frame = 0;
        btnFull.events.onInputDown.add(cambioBotonFull, this);
        btnFull.events.onInputDown.add(makeFullScreen, this);

        //se anda a llamar la funcion que se encarga de llenar el tablero
        music.play();
        music.volume = 0.5;
        juego.time.events.loop(Phaser.Timer.SECOND, updateCounter, this);
        llenarTablero();
        tarros();
    },




    update: function(){
        //esta condicion deja el boton reloj habilitado para su uso y la variable relojPts se queda con un valor de 0
        if (relojPts == 3){

            reloj.inputEnabled = true;
            cambioBotonReloj(reloj);
            relojPts = 0;
        }

        //parametroX >= 0 && parametroY >= 0 es la condicion mas importante del juego se explicara paso por paso
        //la condicion solo se cumple una vez que las 2 variables usadas tengan un valor de 0 ya que su valor inicial es de -1
        if(parametroX >= 0 && parametroY >= 0){
            //una vez que se cumple se crea una variable llamada aux la cual almacenara la suba de los 2 valores
            //esta suba servira para saber que dulce se va a eliminar
            var aux;
            aux = parametroX + parametroY;
            //en esta condicion se comparan el numero del key que se usa tanto en el tarro como en el dulce a destruir
            if(dulce[aux].key.substr(5, 6) == tarro[0].key.substr(5, 6)){
                //se declaran dentro un grupo de variables locales se iran explcando cuando se usen
                var dulceArriba = 6;
                var faltante, lineas, espacio = 0, max = 41, pos, temp = aux, temp1 = aux;
                //aqui se destruye el dulce que indique el usario
                dulce[aux].destroy();
                //se suman los 100 puntos a el score
               // ***********************************************************************************************
               // ACIERTO
               // ***********************************************************************************************
                puntos += 100;
                score.setText(puntos + ' Pts');
                parent.$juego.game.setCorrecto();
               // ***********************************************************************************************
                /*en la variable faltante se almacena el resultado  del numero maximo de dulces menos el la posicion del dulce que se va
           destruir esto para saber cuantos dulces tiene por encima se crea un math.floor para redondear el numero*/
                faltante = max - aux;
                lineas = juego.math.floorTo(faltante / 6);
                dulceArriba = aux + 6;
                pos = lineas;

                //este for se encarga de mover de posicion los dulces
                for(var i = 0; i < lineas; i++){
                    temp = temp + 6;
                    //hacemos un tween para mover de posicion
                    juego.add.tween(dulce[dulceArriba]).to({y: posicionPixelesY[pos]}, 500, Phaser.Easing.Linear.None, true);
                    //cambiamos el dulce de subindex en el arreglo dulce[]
                    swapArrayElements(dulce, temp1, temp);
                    dulceArriba = dulceArriba + 6;
                    //se indica cual dulce sigue
                    pos = pos - 1;
                    temp1 = temp1 + 6;
                }

                //se crea un nuevo dulce en la linea numero 7
                var random = juego.rnd.integerInRange(1, 4);
                dulce[dulceArriba - 6] = juego.add.sprite(300 *  (.200 * (10 - parametroX)) , 140 , 'dulce' + [random]);
                dulce[dulceArriba - 6].anchor.setTo(0.5);
                dulce[dulceArriba - 6].scale.setTo(0.55);

                //se pasa el ulce destruido a el frasco y se le da un sonido para q se entere de q el dulce fue llevado a el frasco
                var num = tarro[0].key.substr(5, 6);
                var posDulcePequeX = ((numDulceDestroy + 1)  % 2) ? 80 : 113;
                var posDulcePequeY = (numDulceDestroy % 2 == 0) ? 570 - (numDulceDestroy * 15) : 570 - (numDulceDestroy * 13);
                dulceDestruido[numDulceDestroy] = juego.add.sprite(posDulcePequeX, posDulcePequeY, 'dulce' + num);
                dulceDestruido[numDulceDestroy].anchor.setTo(0.5);
                dulceDestruido[numDulceDestroy].scale.setTo(0.24);
                numDulceDestroy = numDulceDestroy + 1;
                musicDulce.play();

                //se regresan las variables a -1
                parametroX = -1;
                parametroY = -1;


        }
            //en caso de haber fallado en el dulce a destrir
            else{
                //se activa el sonido que indica error
                musicError.play();
                //si el nino tiene menos de 50pts no se reduce nada
                if(puntos > 50){
                    //en caso de tener mas 50 pts se le restan 50 pts
                    // ***********************************************************
                    // ERROR
                    // ***********************************************************
                    puntos -= 50;
                    score.setText(puntos + ' Pts');
                    parent.$juego.game.setError(50);
                    // ***********************************************************
                }
                //de igual manera se regresan las variables a -1
                parametroX = -1;
                parametroY = -1;

            }
    }


        //una vez que se completen los 8 dulces entra a esta parte del codigo
        if(dulceDestruido.length == 6){
            //se destruye el tarro
                tarro[0].kill();
                numDulceDestroy = -1;
            //se hace un for en el cual se destruye el tarro
                for(var i = 0; i<6; i++){
                    dulceDestruido[i].destroy();
                }
            //se activa el sonido que indica que el tarro se ah llenado el tarro
                musicTarro.play();
            //se crea un nuevo tarro
                tarros();
                dulceDestruido = [];
                numDulceDestroy = 0;
            //se le suma 1 a relojPts ya que llegado a 3 se activa el reloj que le dare mas 10seg.
                relojPts += 1;
        }
    }

};

//se manda a llamar la escena
juego.state.add('principal', estadoPrincipal);
juego.state.start('principal');


//aqui comienzan los metodos
function llenarTablero(){

    var numDulce = 41;
    var espacioX = 1;
    var espacioY = 0;
  //se crean 2 for para crear las tablas
    for(var i=0; i<tabla_Y; i++){

        for(var j=0; j<tabla_X; j++){
            //se genera el numero que indica que dulce saldra
            var random = juego.rnd.integerInRange(1, 4);
            //se agrega el dulce a el arreglo dulce[]
            //la posicion inicial es 335 en x y 150 en y estos se multiplican por un valor q va incremengtando mediante el for
            //esto sera paradarle espacio entre los dulces
            dulce[numDulce] = juego.add.sprite(300 * espacioX, 140 + (i * espacioY) , 'dulce' + [random]);
            dulce[numDulce].anchor.setTo(0.5);
            dulce[numDulce].scale.setTo(0.55);
            dulce[numDulce].enableBody = true;
            dulce[numDulce].physicsBodyType = Phaser.Physics.ARCADE;

            espacioX = espacioX + .200;
            numDulce = numDulce - 1;

        }

         espacioY = 60;
         espacioX = 1;
    }
}



// estas dos funciones son llamadas para pasar el valor  de los parametros enviados por los botonesDulces
function agregarValorX(boton){
    parametroX = boton.variable;
}

function agregarValorY(boton){
    parametroY = boton.variable;
}

function Destruir(){
    for (var i = 0; i<42; i++){

        dulce[i].kill();
    }
}
function cambioBoton(boton){

    cc += 1;

    boton.frame = 1;

    temparray[cc] = boton.key;

    if(cc == 2){

        for(var i = 0; i < botonDulce.length; i++){

             botonDulce[i].frame = 0;
        }
       temparray = [];
        cc = 0;
    }
}
function cambioBotonFull(boton){

    cc += 1;

    boton.frame = 0;

    if(cc == 2){

        btnFull.frame = 0;

        cc = 0;
    }
}
function cambioBotonReloj(boton){

    cr += 1;

    boton.frame = 0;

    if(cr == 2){

        boton.frame = 1;

        cr = 0;
    }
}


function tarros(){

    var espacioX = 0;

    for(var i=0; i<1; i++){
        var numTarro = 0;
        var random = juego.rnd.integerInRange(1, 4);
        tarro[numTarro] = juego.add.sprite(115 + espacioX, 515, 'tarro' + [random]);
        tarro[numTarro].anchor.setTo(0.5);
        tarro[numTarro].scale.setTo(.75);
        numTarro = numTarro + 1;
        espacioX = espacioX + 130;
   }
}

var swapArrayElements = function(arr, indexA, indexB) {
  var temp = arr[indexA];
  arr[indexA] = arr[indexB];
  arr[indexB] = temp;
};

function updateCounter() {

    counter--;

    contador.setText(counter + ' Seg');

    if (counter == -1){
      parent.$juego.game.finish_game_unity();
   }

}

function render() {

    juego.debug.text("Time until event: " + juego.time.events.duration.toFixed(0), 32, 32);
    juego.debug.text("Next tick: " + juego.time.events.next.toFixed(0), 32, 64);

}

function sumaTime(){
    counter += 10;
}

 function makeFullScreen(){
    if (juego.scale.isFullScreen)
    {
        juego.scale.stopFullScreen();
    }
    else
    {
        juego.scale.startFullScreen(false);
    }
  }


function actionOnClick1(boton) {

    boton.inputEnabled = false;
    relojPts = 0;
}
