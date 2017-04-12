<!DOCTYPE html5>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Padrino Curiosity</title>
</head>
<style media="screen" type="text/css">
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: calibri;
    }
    body{
        background-color: #e6e6e6;
        box-sizing: border-box;
    }
    #container-dad{
        width: 100%;
        background-color: #fff;
        margin: 0 auto;
        box-sizing: border-box;
    }
    #imgportada{
        width: 100%;
    }
    #infoSponsored{
        background-color: rgb(34, 98, 173);
        background-color: #;
        color: #fff;
        padding: 1rem;
    }
    #infoSponsored > h1{
        font-size: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
    }
    #infoSponsored > p{
        color: #808080;
        text-align: justify;
    }
    #childbox{
        width: 25%;
        float: left;
        padding: 1rem;
    }
    #imgSponsored{
        width: 100%;
        border-radius: 50%;
        border: solid .8rem #fff;
        background: #fff;
    }
    #infoChildBox{
        padding-left: 17rem;
        padding-right: 1rem;
        text-align: justify;
        padding-top: 3rem;
        padding-bottom: 4rem;
    }
    #infoHome{
        padding: 1rem;
        text-align: center;
    }
    #infoHome > img{
        width: 15%;
        margin-left: 2rem;
        margin-right: 2rem;
        margin-bottom: 2rem;
        margin-top: 1rem;
    }
    #relhome{
        font-size: 1.2rem;
        color: #808080;
    }
    #signTeam{
        width: 5% !important;
        margin-top: 4rem !important;
    }
    #signTeamText{
        color: #989898;
        margin-top: -1.5rem;
        margin-bottom: 2rem;
    }
    #separator1{
        height: 2rem;
        background-color: rgb(34, 98, 173);
    }
    #separator2{
        height: 1rem;
        background-color: rgba(34, 98, 173, .9);
    }
    #footer{
        min-height: 4rem;
        background-color: rgba(34, 98, 173, .8);
        text-align: center;
        padding: 1.5rem;
        color: rgba(255, 255, 255, 0.8);
    }
    #footer > a {
        text-decoration: none;
        margin-left: .2rem;
        margin-right: .2rem;
        color: rgba(255, 255, 255, 0.8);
        margin-top: .5rem;
    }
    @media (min-width : 1024px){
        #container-dad{
            width: 75%;
        }
    }
    @media (min-width: 768px) and (max-width: 920px){
        #childbox{
            width: 35%;
        }
    }
    @media (min-width: 1024px) and (max-width: 1240px){
        #childbox{
            width: 30%;
        }
    }
    @media (min-width: 620px) and (max-width: 767px){
        #childbox{
            width: 45%;
        }
    }
    @media (max-width : 619px){
        #infoChildBox{
            padding-left: 0;
            padding-top: 2;
            padding-bottom: 2rem;
        }
        #childbox{
            width: 45%;
        }
        #imgSponsored{
            border: solid .4rem #fff;
        }
        #infoHome > img{
            width: 25%;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-bottom: 1rem;
            margin-top: 0rem;
        }
        #signTeam{
            width: 8% !important;
        }
        #signTeamText{
            margin-top: -.8rem;
        }
    }
</style>
<body>
    <div id="container-dad">
        {{--<img src="{{asset('/packages/assets/media/images/padrino_curiosity/emailtosend/portadaemailpadrino.jpg') }}" id="imgportada">--}}
        <img src="/packages/assets/media/images/padrino_curiosity/emailtosend/portadaemailpadrino.jpg" id="imgportada">
        <div id="infoSponsored">
            <div id="childbox">
                {{--<img src="{{asset('/packages/assets/media/images/padrino_curiosity/amor/susana-alvarez-garca.jpg') }}" id="imgSponsored">--}}
                <img src="/packages/assets/media/images/padrino_curiosity/amor/susana-alvarez-garca.jpg" id="imgSponsored">
            </div>
            <div id="infoChildBox">
                <h2>Lorem ipsum dolor sit amet.</h2><br>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam perferendis delectus libero magnam excepturi hic ullam, pariatur quas veritatis quasi iure illum, inventore tempora, deserunt ad. Natus voluptatibus labore, fugiat. <br><br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, impedit.
                </p>
            </div>
        </div>
        <div id="infoHome">
            <img src="/packages/assets/media/images/system/logoDef.png">
            <img src="/packages/assets/media/images/institutions/nckWQ25258_030417.jpg">
            <center>
                <br> <h4 id="relhome">Curiosity Educación y Casa Hogar</h4> <br>
            </center>
            <p style="color:#4c4c4c;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque provident non doloribus, <br>totam ratione veniam natus nisi impedit earum, odio perferendis sint ab suscipit vitae animi molestiae nam porro, ad. <br><br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus sit ex odit sint illo minima consequatur id iste, nemo, <br>ipsam porro veritatis eos quos consequuntur, magni totam libero laborum voluptatibus iusto qui quis cum! <br> Nobis eos eius tempore, deleniti quasi ea quod. Voluptas dolorem ab aut doloremque, error nobis a.
            </p>
            <br><br>
            <img src="/packages/assets/media/images/system/icon-mono.png" id="signTeam">
            <h4 id="signTeamText">Equipo Curiosity</h4>
        </div>
        <div id="separator1"></div>
        <div id="separator2"></div>
        <div id="footer">
            <label>Sigue al pendiente en nuestras redes sociales y en nuestra web oficial</label><br>
            | <a href="https://www.facebook.com/curiosity.mx" target="_blank">Siguenos en Facebook</a> |
            <a href="https://www.twitter.com/@curiosity.mx" target="_blank">Siguenos en Twitter</a> |
            <a href="https://www.curiosity.com.mx" target="_blank">www.curiosity.com.mx</a> |
            <a href="https://www.instagram.com/@curiosity.mx" target="_blank">Siguenos en Instagram</a> |
            <a href="https://www.curiosity.com.mx/casas-hogares" target="_blank">Padrino Curiosity</a> |
            <br><br>
        </div>
    </div>
</body>
</html>
