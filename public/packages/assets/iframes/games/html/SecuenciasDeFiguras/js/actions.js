$(document).ready(function () {
    
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
    
    function _gameOver(){
    $('#' + ejeActual).hide();
    $("#Tiempo").hide();
    $("#Score").hide();
    document.getElementById("Final").innerHTML = document.getElementById("Score").innerHTML;
    $("#Final").fadeIn('slow');
    $("#Restart").fadeIn('slow');
}
    
    var ejeActual= "";
    var score = 0;
    var aciertos = 0;
    
    $.getJSON('contenido.json', function (data) {
        var sucesion = []; //Arreglo que despues se convertirá en matriz de las sucesiones de los ejercicios
        var ejercicios = []; //Variable constructora de html de los ejercicios ya completos
        var i = 0;
        var incorrectas = []; //Proximamente matriz de incorrectas de las sucesiones
        var n=0;
        shuffle(data.Ejercicios);
        for (i = 0; i < data.Ejercicios.length; i++)//Recorre todos los ejercicios existentes en el JSON 
        {
            if( data.Ejercicios[i].Sucesion[0] != "")//Verificacion... solo por si acaso
            {
                incorrectas[i] = [];
                //Aqui se hace la eliminacion de un elemento de la sucesion original y lo almacena en la opcion correcta
                sucesion[i]="";
                var correcta=[];
                var excluido = Math.floor(Math.random() * data.Ejercicios[i].Sucesion.length); //indice del excluido
                for(var k=0; k<data.Ejercicios[i].Sucesion.length; k++) //Genera la sucesion con indice faltante
                {
                    if (k!=excluido){
                        sucesion[i] = sucesion[i] + "<img src='media/img/fgrs/" + data.Ejercicios[i].Sucesion[k] + "' style='position:absolute; left:" + 17.5*k + "%'>"; //Aqui se genera el html de la imagen con source del JSON
                    }
                    else{
                        sucesion[i]= sucesion[i] + "<img src='media/img/fgrs/q.png' style='position:absolute; left:" + 17.5*k + "%'>"; //Imagen de faltante
                        correcta[i] = " opcc'>" + "<img src='media/img/fgrs/" + data.Ejercicios[i].Sucesion[k] + "' style='height:100%; width:100%;'>"; //Opción con imagen correcta
                    }
                }
                
                var j;
                var jn=0;
                for (j = 0; j < data.Ejercicios[i].incorrectas.length; j++)
                {
                    if(data.Ejercicios[i].incorrectas[j]!="")
                    {
                        incorrectas[i][jn] = " opcw'><img src='media/img/fgrs/" + data.Ejercicios[i].incorrectas[j] + "' style='height:100%; width:100%;'>"; //Html con imagen incorrecta
                        jn++;
                    }
                }
                
                shuffle(incorrectas[i]);
                
                ejercicios[n] = "<div id='eje" + n + "' style='display:none;'> <div class='Sucesion'>" + sucesion[n] + " </div>";
                
                if (incorrectas[i].length >= 3) {
                    var opciones = [correcta[i], incorrectas[i][0], incorrectas[i][1], incorrectas[i][2] ];
                    shuffle(opciones);
                    opciones[0] = "opc opc1" + opciones[0];
                    opciones[1] = "opc opc2" + opciones[1];
                    opciones[2] = "opc opc3" + opciones[2];
                    opciones[3] = "opc opc4" + opciones[3];
                    ejercicios[n] += "<div class='" + opciones[0] + "</div> <div class='" + opciones[1] + "</div> <div class='" + opciones[2] + "</div> <div class='" + opciones[3] + "</div>        </div>";
                }
                
                if (incorrectas[i].length == 2) {
                    var opciones = [correcta[i], incorrectas[i][0], incorrectas[i][1] ];
                    shuffle(opciones);
                    opciones[0] = "opc opc1" + opciones[0];
                    opciones[1] = "opc opc25" + opciones[1];
                    opciones[2] = "opc opc4" + opciones[2];
                    ejercicios[n] += "<div class='" + opciones[0] + "</div> <div class='" + opciones[1] + "</div> <div class='" + opciones[2] + "</div> <div class='" + opciones[3] + "</div>        </div>";
                }
                
                if (incorrectas[i].length == 1) {
                    var opciones = [correcta[i], incorrectas[i][0]];
                    shuffle(opciones);
                    opciones[0] = "opc opc2" + opciones[0];
                    opciones[1] = "opc opc3" + opciones[1];
                    ejercicios[n] += "<div class='" + opciones[0] + "</div> <div class='" + opciones[1] + "</div>        </div>";
                }
                
                $('#Ejercicios').append(ejercicios[n]);
                $("#audio" + n).load();
                n++;
            }
        }
        
//        document.getElementById("Opcion").innerHTML = data.Opciones[0].correcta;
                        
        $(".opcw").click(function (event) {
            if (true) {
                $("#Alerta").fadeOut("");
                document.getElementById("AudioW").currentTime =  0;
                document.getElementById("AudioW").play();
                $("#WAns").effect("slide",{"direction":"up"});
                $("#WAns").fadeOut();
                //$("#WAns").css("opacity",1);
                $(this).effect("shake",{"direction":"left","distance":4,"times":3});
                if(score>=50){
                    score=score-50;
                    $("#Score").text(score + " pts");
                }
            }
        });
        
        
        $(".opcc").click(function () {
            if(true){
                $("#Alerta").fadeOut("");
                document.getElementById("AudioG").currentTime = 0;
                document.getElementById("AudioG").play();
                
                $("#RAns").effect("slide",{"direction":"up"});
                $("#RAns").fadeOut('slow');
                
                score = score + 100;
                document.getElementById("Score").innerHTML= score + " pts";
                
                ejeActual = "eje" + aciertos;
                $('#' + ejeActual).hide();
                if (aciertos < n -1)
                {
                    aciertos++;
                    pase = 0;
                    ejeActual = "eje" + aciertos;
                    $('#' + ejeActual).fadeIn(); 
                }
                else
                {
                    _gameOver();
                }
            }
            else
            {
                $("#Alerta").fadeIn();
            }
        });
        
    });
});