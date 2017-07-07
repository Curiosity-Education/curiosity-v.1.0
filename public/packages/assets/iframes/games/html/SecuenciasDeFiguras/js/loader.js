var nivel="";
var relacionAspecto = 2.101861993428258;
var arcade = getParameterByName('arcade');
var tiempoEjercicio = getParameterByName('tiempo');
if(!tiempoEjercicio)
    tiempoEjercicio=61;

var ejeActual= "";
var score = 0;
var aciertos = 0; 
var intentos = 0;
var eficiencia = 0;
var n = 0;

var consecutivos=0;
var multiplicador=0;

var imagenes = [];
var nimgs=0;
var i = 0;

var tiempo= 0;
var tiempoTotal;
var pausa = false;
var oscuro;
var interval_time;
function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
  
        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }
  
    return array;
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function ColorLuminance(hex, lum) {
    // validate hex string
    hex = String(hex).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    lum = lum || 0;
    
    // convert to decimal and change luminosity
    var rgb = "#", c, i;
    
    for (i = 0; i < 3; i++) {
        c = parseInt(hex.substr(i * 2, 2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
        rgb += ("00" + c).substr(c.length);
    }
    
    return rgb;
}

function __crearEjercicios(){

    shuffle(imagenes);
    
    var dificultad = Math.floor(Math.random()*3);
    
    var secuencia = [];
    var indiceImgs=0;
    if(dificultad==2){
        secuencia= [imagenes[indiceImgs],imagenes[indiceImgs+1],imagenes[indiceImgs+2],imagenes[indiceImgs],imagenes[indiceImgs+1],imagenes[indiceImgs+2]];
            indiceImgs=indiceImgs+3;
    }
    if(dificultad==1){
        secuencia= [imagenes[indiceImgs],imagenes[indiceImgs+1],imagenes[indiceImgs+1],imagenes[indiceImgs],imagenes[indiceImgs+1],imagenes[indiceImgs+1]];
            indiceImgs=indiceImgs+2;
    }
    if(dificultad==0){
        secuencia= [imagenes[indiceImgs],imagenes[indiceImgs+1],imagenes[indiceImgs],imagenes[indiceImgs+1],imagenes[indiceImgs],imagenes[indiceImgs+1]];
            indiceImgs=indiceImgs+2;
    }
        
    var sucesion = ""; //Arreglo constructor de HTML de la sucesion
    var ejercicio = ""; //Variable constructora de html de los ejercicios ya completos
    var incorrectas = []; //Proximamente matriz de incorrectas de las sucesiones
    var correcta="";
    var excluido = Math.floor(Math.random() * 6); //indice del excluido
    for(var k=0; k<6; k++) //Genera la sucesion con indice faltante
    {
        if (k!=excluido){
            sucesion = sucesion + "<img src='media/img/fgrs/" + secuencia[k] + "' style='position:absolute; left:" + 17.25*k + "%'>";
            //Aqui se genera el html de la imagen con source del JSON
        }
        else{
            sucesion= sucesion + "<img src='media/img/fgrs/q.png' style='position:absolute; left:" + 17.25*k + "%'>";     //Imagen de faltante
            correcta = secuencia[k];
            //Aqui se hace la eliminacion de un elemento de la sucesion original y lo almacena en la opcion correcta
        }
    }
        
    var j;
    var jn=0;
    shuffle(imagenes);
    for (j = 0; j < 11; j++)
    {
        if(imagenes[j]!="" && imagenes[j]!=correcta)
        {
            incorrectas[jn] = " opcw'><img src='media/img/fgrs/" + imagenes[j] + "' style='height:100%; width:100%;'>"; //Html con imagen incorrecta
            jn++;
        }
    }
    
    correcta = " opcc'>" + "<img src='media/img/fgrs/" + correcta + "' style='height:100%; width:100%;'>"; //Opción con imagen correcta
    
    shuffle(incorrectas);
    
    ejercicio = "<div id='eje' style='display:none;'> <div class='Sucesion'>" + sucesion + " </div>";
        
    if (nivel=="xprt") {
        var opciones = [correcta, incorrectas[0], incorrectas[1], incorrectas[2] ];
        shuffle(opciones);
        opciones[0] = "opc opc1" + opciones[0];
        opciones[1] = "opc opc2" + opciones[1];
        opciones[2] = "opc opc3" + opciones[2];
        opciones[3] = "opc opc4" + opciones[3];
        ejercicio += "<div class='" + opciones[0] + "</div> <div class='" + opciones[1] + "</div> <div class='" + opciones[2] + "</div> <div class='" + opciones[3] + "</div>        </div>";
    }
    
    if (nivel=="md") {
        var opciones = [correcta, incorrectas[0], incorrectas[1] ];
        shuffle(opciones);
        opciones[0] = "opc opc1" + opciones[0];
        opciones[1] = "opc opc25" + opciones[1];
        opciones[2] = "opc opc4" + opciones[2];
        ejercicio += "<div class='" + opciones[0] + "</div> <div class='" + opciones[1] + "</div> <div class='" + opciones[2] + "</div> <div class='" + opciones[3] + "</div>        </div>";
    }
    
    if (nivel=="prncpnt") {
        var opciones = [correcta, incorrectas[0]];
        shuffle(opciones);
        opciones[0] = "opc opc2" + opciones[0];
        opciones[1] = "opc opc3" + opciones[1];
        ejercicio += "<div class='" + opciones[0] + "</div> <div class='" + opciones[1] + "</div>        </div>";
    }
    document.getElementById("Ejercicios").innerHTML=ejercicio;  
    n++;
}
 
function _resizer(relacionAspecto) {
    var altoVentana = $(window).height();
    var anchoVentana = $(window).width();
    var anchoStage = $("#Stage").width();
    var altoStage = (anchoStage / relacionAspecto);
    $("#Stage").height(altoStage);
    var posicionStage = (altoVentana - altoStage) / 2;
    $("#Stage").css("margin-top", posicionStage + "px");
    
    /*var posicionStart = altoStage * 0.6 + posicionStage;
    $("#Start").css("top", posicionStart + "px");
    
    var posicionTitulo = altoStage * 0.19 + posicionStage;
    $("#Sombra").css("top", posicionTitulo);
    
    var altoSombra = altoStage * 0.26;
    $("#Sombra").height(altoSombra);
    
    var altoEjercicios = altoStage * 0.7;
    var posicionEjercicios = altoStage * 0.15 + posicionStage;
    $("#Ejercicios").height(altoEjercicios);
    $("#Ejercicios").css("top",posicionEjercicios);
    
    var posicionRestart = altoStage * 0.8 + posicionStage;
    $("#Restart").css("top", posicionRestart);
    
    var altoFinal = $("#Final").height();
    var posicionFinal = ((altoStage - altoFinal) / 2) + posicionStage;
    $("#Final").css("top", posicionFinal);        
    */    
}

function _gameOver(){
    clearInterval(interval_time);
    $('#' + ejeActual).hide();
    //$("#Multiplicador").hide();
    $("#Tiempo").hide();
    $("#Score").hide();
    //$("#Score").hide();
    //document.getElementById("Final").innerHTML = document.getElementById("Score").innerHTML;
    //$("#Final").fadeIn('slow');
    
    setTimeout(function(){
        $("#Score").show();
        $("#Score").addClass("scoreFinal");
        $("#Score").removeClass("Score");
    },750);
    parent.$juego.game.finish();
    $("#Restart").fadeIn('slow');
    
    
    
    //PUBLICAR Score y Eficiencia
}

window.onload = function () {
    
    _resizer(relacionAspecto);
    var imgfondo = "url(media/img/fondo.png)";
    var titulo = "SecuenciaDeImagenes";
    var instrucciones = "FORM-A-LINE Observa la secuencia de figuras y selecciona la que falta ";
    var colorContraste = "#2d96ba";
    var colorTexto = "#ffffff";
    var mensajeFinal = "Bien hecho";
    var textoRestart = "Reiniciar";
    
    document.title = titulo;
        
    $("#Stage").css("background-image", imgfondo);
    $("#Instrucciones").css("background-color", colorContraste);
    $("#Instrucciones").css("color", colorTexto);
    oscuro = ColorLuminance(colorContraste, -0.3);
    opaco = ColorLuminance(colorContraste, -0.22);
    //$("#Tiempo").css("background-color", opaco);
    $("#Tiempo").css("color", oscuro);
    //$("#Score").css("background-color", opaco);
    $("#Score").css("color", oscuro);
    $("#Sombra").css("background-color", oscuro);
    $(".Start").css("background-color", oscuro);
    $(".Start").css("color", colorTexto);
    $("#Restart").css("background-color", colorContraste);
    $("#Restart").css("color", colorTexto);
    $("#Final").css("color", colorTexto);
        
    document.getElementById("Instrucciones").innerHTML = instrucciones;
    //document.getElementById("Start").innerHTML = textoStart;
    document.getElementById("Final").innerHTML = mensajeFinal;
    document.getElementById("Restart").innerHTML = textoRestart;
        
    var insertIcon = "<img src='" +"media/img/play.png" + "'>";
    $("#Sonido").append(insertIcon);
        
    $("#Stage").append("<audio id='AudioG'> <source src='" + "media/audio/good.wav" + "' > </audio> <audio id='AudioW'> <source src='" + "media/audio/wrong.mp3" + "' > </audio>");
    $("#AudioG").load();
    $("#AudioW").load();
    var volumenAjustado = 0.1;
    document.getElementById("AudioG").volume = volumenAjustado;
    document.getElementById("AudioW").volume = volumenAjustado;
    
    $.getJSON('contenido.json', function (data) {
        shuffle(data.Imgs);
        imagenes = [];
        nimgs=0;
        for (i=0; i<data.Imgs.length; i++){
            if(data.Imgs[i]!="q.png"){
                imagenes[nimgs]=data.Imgs[i];
                nimgs++;
            }
        }
    });
    
}

window.onresize = function () {
    _resizer(relacionAspecto);
};

$(document).ready(function () {
  
    $(".Start").click(function () {
        _resizer(relacionAspecto);
        //Mostrar tiempo y puntaje
        tiempo=tiempoEjercicio;
        if (arcade)
            tiempo=16;
        tiempoTotal=tiempo;
        ejeActual= "eje";
        document.getElementById("Tiempo").innerHTML = tiempo + " segs";
        $('.Start').hide();
        $('#Sombra').hide();
        setTimeout(function(){ 
            $('#eje').show();
            $('#Ejercicios').fadeIn();
            $("#Tiempo").fadeIn('slow');
            $("#Score").fadeIn('slow');
        },750);
    });
    
    $("#Principiante").click(function(){
        nivel="prncpnt";
        setTimeout(function(){__crearEjercicios();},200);
    });
    
    $("#Medio").click(function(){
        nivel="md";
        setTimeout(function(){__crearEjercicios();},200);
    });
    
    $("#Experto").click(function(){
        nivel="xprt";
        setTimeout(function(){__crearEjercicios();},200);
    });
    
    var velocidad = 1000;
    var terminado = false;
 interval_time = setInterval(function(){
     if(!pausa){
        if (tiempo>0){
            tiempo=tiempo-1;
        }
        actualizarTiempo();
     }
    },velocidad);
    
    function actualizarTiempo(){
        //document.getElementById("Multiplicador").innerHTML = "x" + multiplicador;
        if(multiplicador!=0){
            //$("#Multiplicador").show();
        }
        else{
            //$("#Multiplicador").hide();
        }
        
        velocidad = 1000-Math.floor(score/1000)*100;
        if (velocidad<500){
            velocidad=500;
        }
        console.log(velocidad);
        
        if(tiempo > 16 && arcade){
            tiempo=15;
        }
        
        var porcentaje = Math.round(tiempoTotal*.36);
        if(tiempo<porcentaje){
            var rgb = document.getElementById("Tiempo").style.color.match(/\d+/g);
            try{
                document.getElementById("Tiempo").style.color = "rgba(" + 255 + "," + Math.round(255*tiempo/tiempoTotal) + "," + Math.round(255*tiempo/tiempoTotal) + "," + 1 + ")";
            }catch(err){}
            $("#Tiempo").addClass("fontSizeZoomers");
        }
        else{
            document.getElementById("Tiempo").style.color = oscuro;
            $("#Tiempo").removeClass("fontSizeZoomers");
            $("#Tiempo").removeClass("fontSizeDoubleZoomers");            
        }
        if(tiempo<(porcentaje/2)){
            $("#Tiempo").removeClass("fontSizeZoomers");
            $("#Tiempo").addClass("fontSizeDoubleZoomers");
        }
        document.getElementById("Tiempo").innerHTML = tiempo + " segs";
        if(tiempo<=0 && ejeActual!="" && !terminado){
            _gameOver();
            terminado=true;
            //console.log("GameOver");
        }
        
    }
    
    $("#Restart").click(function () {
        window.location.reload();
    });
    
    $("body").on("click",".opcw",function (event) {
        intentos++;
                
        __crearEjercicios();
        
        document.getElementById("AudioW").currentTime =  0;
        document.getElementById("AudioW").play();
        
        $("#WAnsScore").effect("slide",{"direction":"down"});
        if (arcade){
            $("#WAnsTiempo").effect("slide",{"direction":"up"});
            tiempo = tiempo-2;
            actualizarTiempo();
        }
        $(".WAns").fadeOut();
        
        $(this).effect("shake",{"direction":"left","distance":4,"times":3});
        if(score>=50){
            score=score-50;
            $("#Score").text(score + " pts");
        }
        
        $('#' + ejeActual).hide();
        
        {
            aciertos++;
            pase = 0;
            ejeActual = "eje";
            $('#' + ejeActual).fadeIn(); 
        }
        
        consecutivos=0;
        parent.$juego.game.setError(50);
    });
    
    $("body").on("click",".opcc",function () {
        intentos++;
        
        __crearEjercicios();
        
        multiplicador = 1 + consecutivos*.1;
        
        document.getElementById("AudioG").currentTime = 0;
        document.getElementById("AudioG").play();
        
        $("#RAnsScore").effect("slide",{"direction":"down"});
        if (arcade){
            $("#RAnsTiempo").effect("slide",{"direction":"up"});
            tiempo = tiempo+5;
            actualizarTiempo();
        }
        $(".RAns").fadeOut('slow');
        
        score = score + 100 * multiplicador;
        document.getElementById("RAnsScore").innerHTML = "+" + Math.floor(100*multiplicador) + " pts";
        document.getElementById("Score").innerHTML= score + " pts";
        
        $('#' + ejeActual).hide();
        if (aciertos < n -1)
        {
            aciertos++;
            pase = 0;
            ejeActual = "eje";
            $('#' + ejeActual).fadeIn(); 
        }
        else
        {
            _gameOver();
        }
        consecutivos++;
        parent.$juego.game.setCorrecto();
    });
    $("body").on("pausar",function(){
        pausa = true;
    });
    $("body").on("continue",function(){
        pausa = false;
    });
});