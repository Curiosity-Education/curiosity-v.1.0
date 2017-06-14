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
        background: url(https://www.curiosity.com.mx/packages/assets/media/images/padrino_curiosity/emailtosend/portadaemailpadrino.png) no-repeat center;
        background-size: cover;
        padding-top: 10rem;
        padding-left: 2rem;
        padding-right: 1rem;
        color: #fff;">
            <h1 style="padding-bottom: 2rem; font-size:1rem;color:#4c4c4c !important;">
                ¡Hola {{ $client }}!  <br>
                <span style="color:#4c4c4c !important;">
                    Gracias por formar parte del programa <br>
                    Padrino Curiosity. <br><br>
                    Apoyando la Educación del país.
                </span>
            </h1>
        </div>
        <div id="infoSponsored" style="background: #ec2726;
        color: #fff;
        padding: 1rem;
        margin: -1rem 0rem 0rem 0rem;">
            <center>
                <div id="childbox" style="width: 25%;
                padding: .5rem;">
                    <center><img src="{{asset($child_image)}}" id="imgSponsored" style="width: 85%;
                    border-radius: 1rem;
                    border: solid .2rem #fff;
                    background: #fff;
                    min-width:5rem;"></center>
                </div>
                <div id="infoChildBox" style="">
                    <p style="margin:0;">
                        <b><span style="font-size: 20px;">{{ $child }}</span> </b><br>
                        @if ($hobby == "" || $ser_grande == "")
                        @else
                            Me gusta {{ $hobby }} y de grande quiero ser {{ $ser_grande }}.
                        @endif
                    </p>
                </div>
            </center>
        </div>
        <div id="infoHome" style="padding: 1rem;
        text-align: center; background: #fff;">
            <img src="{{asset('/packages/assets/media/images/padrino_curiosity/emailtosend/partners/logoDef.png')}}" style="width: 10%;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-top: 1rem;
            min-width:5rem;">
            <img src="{{asset('/packages/assets/media/images/padrino_curiosity/emailtosend/partners/tecMty.jpg')}}" style="width: 10%;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-top: 1rem;
            min-width:5rem;">
            <img src="{{asset('/packages/assets/media/images/padrino_curiosity/emailtosend/partners/incubadora_laguna.png')}}" style="width: 10%;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-top: 1rem;
            min-width:5rem;">
            <p style="color:#4c4c4c;">
                <br>
                “Educación es esperanza y dignidad. Educación es crecimiento y empoderamiento. La educación es la piedra fundamental de toda sociedad y el pasaje para salir de la
                pobreza”, <br><br>- Ban Ki-Moon
            </p>
            <p style="color:#4c4c4c;">
                Gracias a tu apoyo podremos brindarle a {{ $child }} el acceso una computadora con internet y a la plataforma Curiosity Educación por un año.
            </p>
            <p style="color:#4c4c4c;">
                Estarás recibiendo información acerca de sus avances académicos.
            </p>
            <p style="color:#4c4c4c;"><br><br>
                <b>Agradecemos tu apoyo</b>
            </p>
            <br><br>
            <!-- <img src="{{asset('/packages/assets/media/images/system/icon-mono.png')}}" style="width: 5% !important;color: #989898;">
            <center><h4 id="signTeamText" style="margin-top: 1rem;
            margin-bottom: 2rem;color: #a6a6a6;">{{ $name }}</h4></center> -->
        </div>
        <div id="separator1" style="height: 2rem;
        background: #2162ad;"></div>
        <div id="separator2" style="height: 1rem;
        background: #3c78bd;"></div>
        <div id="footer" style="min-height: 4rem;
        background: #4a85ca;
        text-align: center;
        padding: 1.5rem;
        color: rgba(255, 255, 255, 0.8);">
            <label><b>Sigue al pendiente en nuestras redes sociales y en nuestra web oficial</b></label><br><br>
            | <a href="https://www.facebook.com/curiosity.mx" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Facebook</a> |
            <a href="https://www.curiosity.com.mx" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Curiosity</a> |
            <a href="https://www.youtube.com/channel/UCucy9_laT18ac4DN8qosoEQ" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">YouTube</a> |
            <a href="https://www.curiosity.com.mx/casas-hogares" target="_blank" style="text-decoration: none;
            margin-left: .2rem;
            margin-right: .2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: .5rem;">Padrino Curiosity</a> |
            <br><br>
            <span style="font-size: .8rem;">
                Curiosity Educación S.A.P.I de C.V. <br>&reg; <?php echo Date('Y'); ?>  Todos los derechos reservados.
            </span>
            <br><br>
        </div>
    </div>

</body>
</html>
