<!DOCTYPE html5>
<html lang="es" style="padding: 0;
margin: 0;
box-sizing: border-box;
font-family: calibri;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Padrino Curiosity</title>
</head>
<body style="background: #e6e6e6;
box-sizing: border-box;
max-width: 600px;
margin: auto;">
    <div id="container-dad" style="width: 100%;
    max-width: 1820px;
    background: #fff;
    margin: 0 auto;
    box-sizing: border-box;">
        <div class="boxportada" style="min-height: 10rem;
        background: url(https://www.curiosity.com.mx/packages/assets/media/images/padrino_curiosity/emailtosend/portadaemailpadrino.jpg) no-repeat center;
        background-size: cover;
        padding-top: 10rem;
        padding-left: 2rem;
        padding-right: 1rem;
        color: #fff;">
            <h1 style="padding-bottom: 2rem; font-size:1.2rem;color:#fff !important;">
                ¡Hola {{ $client }}!  <br>
                <span style="color:#fff !important;">
                    Gracias por formar parte del programa <br>
                    Padrino Curiosity. <br><br>
                    Apoyando la Educación del país.
                </span>
            </h1>
        </div>
        <div id="infoSponsored" style="background: rgb(34, 98, 173);
        color: #fff;
        padding: 1rem;
        margin: -1rem 0rem 0rem 0rem;">
            <center>
                <div id="childbox" style="width: 25%;
                padding: 1rem;">
                    <center><img src="{{asset($child_image)}}" id="imgSponsored" style="width: 85%;
                    border-radius: 50%;
                    border: solid .4rem #fff;
                    background: #fff;
                    min-width:5rem;"></center>
                </div>
                <div id="infoChildBox" style="">
                    <h2 style="font-size: 1.2rem;margin: 0rem 0rem -1.5rem 0rem;">{{ $child }}</h2><br>
                    <p style="">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. amet, consectetur adipisicing elit consectetur.
                    </p>
                </div>
            </center>
        </div>
        <div id="infoHome" style="padding: 1rem;
        text-align: center;">
            <img src="{{asset('/packages/assets/media/images/system/logoDef.png')}}" style="width: 20%;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-top: 1rem;
            min-width:5rem;">
            <img src="{{asset($home_image)}}" style="width: 20%;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-top: 1rem;
            min-width:5rem;">
            <center>
                <br> <h4 id="relhome" style="font-size: 1.2rem;
                color: #808080; margin: 3rem 0rem -1rem 0rem;">Curiosity Educación y {{ $home }} </h4> <br>
            </center>
            <p style="color:#4c4c4c;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque provident non doloribus, <br>totam ratione veniam natus nisi impedit earum, odio perferendis sint ab suscipit vitae animi molestiae nam porro, ad. <br><br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus sit ex odit sint illo minima consequatur id iste, nemo, <br>ipsam porro veritatis eos quos consequuntur, magni totam libero laborum voluptatibus iusto qui quis cum! <br> Nobis eos eius tempore, deleniti quasi ea quod. Voluptas dolorem ab aut doloremque, error nobis a.
            </p>
            <br><br>
            <img src="{{asset('/packages/assets/media/images/system/icon-mono.png')}}" style="width: 5% !important;color: #989898;">
            <center><h4 id="signTeamText" style="margin-top: 1rem;
            margin-bottom: 2rem;color: #a6a6a6;">{{ $name }}</h4></center>
        </div>
        <div id="separator1" style="height: 2rem;
        background-color: rgb(34, 98, 173);"></div>
        <div id="separator2" style="height: 1rem;
        background-color: rgba(34, 98, 173, .9);"></div>
        <div id="footer" style="min-height: 4rem;
        background-color: rgba(34, 98, 173, .8);
        text-align: center;
        padding: 1.5rem;
        color: rgba(255, 255, 255, 0.8);">
            <label><b>Sigue al pendiente en nuestras redes sociales y en nuestra web oficial</b></label><br><br>
            | <a href="https://www.facebook.com/curiosity.mx" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Siguenos en Facebook</a> |
            <a href="https://www.twitter.com/@curiosity.mx" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Siguenos en Twitter</a> |
            <a href="https://www.curiosity.com.mx" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">www.curiosity.com.mx</a> |
            <a href="https://www.instagram.com/@curiosity.mx" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Siguenos en Instagram</a> |
            <a href="https://www.curiosity.com.mx/casas-hogares" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Padrino Curiosity</a> |
            <br><br>
            <span style="font-size: .8rem;">
                Curiosity Educación S.A.P.I de C.V. <br>&reg; <?php echo Date('Y'); ?>  Todos los derechos reservados: CURIOSITY.COM.MX
            </span>
            <br><br>
        </div>
    </div>

</body>
</html>
