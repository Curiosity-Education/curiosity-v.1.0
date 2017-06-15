var photoChildSponsored;

var apadrinarController = {

    instID : null,

    setinstID : function($id){
        this.instID = $id;
    },

    getChildren : function($idInst){
        var id_ = new FormData();
        id_.append('id',$idInst);

        var children = new apadrinar(id_);
        children.getChildren("POST",this.makeCardChild);
    },

    makeCardChild : function(response){

        $('#displayChildren').empty();

        $.each(response.data.child,function(i,o){

            if(o.apadrinado > 0){

                var cardWith = "<div class='col-md-3 col-sm-6'>"+
                        "<div class='card'>"+
                            "<img class='img-fluid' src='/packages/assets/media/images/padrino_curiosity/"+response.data.folder+"/"+o.foto+"?"+Math.random()+"' alt='"+o.nombre+"'>"+
                            "<div class='card-block'>"+
                                `<h5 class='blue-text-ce'>
                                    <i class='fa fa-star colorStar'></i>
                                    &nbsp; Apadrinado
                                </h5>`+
                                "<h4 class='card-title text-xs-center'>"+o.nombre+"</h4>"+
                                "<h5 class='card-title text-xs-center'>"+o.apellidos+"</h5>"+
                                "<center><a href='javascript:void(0)' data-foto="+response.data.folder+"/"+o.foto+" data-childid="+o.id+" data-childname="+o.nombre+" "+o.apellidos+" class='btn btn-rounded btn-homesChild disabled'>Apadrinar</a></center>"+
                            "</div>"+
                        "</div>"+
                    "</div>";

                $('#displayChildren').append(cardWith);

               }else{

                   var cardOut = "<div class='col-md-3 col-sm-6'>"+
                        "<div class='card'>"+
                            "<img class='img-fluid gris' src='/packages/assets/media/images/padrino_curiosity/"+response.data.folder+"/"+o.foto+"?"+Math.random()+"' alt='Card image cap'>"+
                            "<div class='card-block'>"+
                                "<h5 class='blue-text-ce'><i class='fa fa-star-o colorStar'></i>&nbsp; Sin apadrinar</h5>"+
                                "<h4 class='card-title text-xs-center'>"+o.nombre+"</h4>"+
                                "<h5 class='card-title text-xs-center'>"+o.apellidos+"</h5>"+
                                "<center><a href='javascript:void(0)' data-foto="+response.data.folder+"/"+o.foto+" data-childid="+o.id+" data-childname="+o.nombre+" "+o.apellidos+" class='btn btn-rounded btn-homesChild'>Apadrinar</a></center>"+
                            "</div>"+
                        "</div>"+
                    "</div>";

                   $('#displayChildren').append(cardOut);
               }

        });

    },

    payment : function(){
        let tokenParams = {
            "card": {
                "number": document.getElementById('card_number').value,
                "name": document.getElementById('name').value,
                "exp_year": document.getElementById('exp_year').value,
                "exp_month": document.getElementById('exp_month').value,
                "cvc": document.getElementById('cvv').value
            }
        };
        let successResponseHandler = function(token) {
            let sponsored = StorageDB.table.getData("sponsoredChild");
            if (sponsored == "" || sponsored == null || sponsored == undefined || sponsored <= 0){
                Curiosity.noty.warning(
                    "No fue posible obtener al niño a apadrinar, por favor intentalo nuevamente",
                    "Error de selección"
                );
            }
            else{
                let datos={
                    nombre: document.getElementById("name").value,
                    email : document.getElementById("email").value,
                    child : parseInt(sponsored),
                    conektaTokenId: token.id
                }
                return apadrinar.any(datos,Curiosity.methodSend.POST,apadrinarController.paymentSuccess,'/sponsored','payForChild');
            }
        };
        let errorResponseHandler = function(error) {
            Curiosity.toastLoading.hide();
            $("#btnConfirm").html("Confirmar Información");
            $("#btnConfirm").prop("disabled", false);
            return Curiosity.noty.warning(
                error.message_to_purchaser,
                "Error durante el proceso"
            );
        };
        $("#formToPay").validate({
            rules : {
                name : {required:true, maxlength:255},
                email : {required:true, email:true},
                card_number: {required:true, minlength:16, maxlength:16, number:true},
                exp_month: {required:true, minlength:2, maxlength:2, number:true},
                exp_year: {required:true, minlength:2, maxlength:2, number:true},
                cvv: {required:true, minlength:3, maxlength:3, number:true}
            }
        });
        if ($("#formToPay").valid()){
            let sponsored = StorageDB.table.getData("sponsoredChild");
            Conekta.setPublicKey("key_WXkrivJAijWK8DKqt1BXbmg");
            $("#btnConfirm").prop("disabled", true);
            $("#btnConfirm").html("<span class='fa fa-spinner fa-pulse'></span>&nbsp; Procesando");
            if (sponsored == "" || sponsored == null || sponsored == undefined || sponsored <= 0){
                Curiosity.noty.warning(
                    "No fue posible obtener al niño a apadrinar, por favor intentalo nuevamente",
                    "Error de selección"
                );
            }
            else{
                Curiosity.toastLoading.show();
                Conekta.Token.create(tokenParams, successResponseHandler, errorResponseHandler);
            }
        }
    },

    paymentSuccess:function(response){
        Curiosity.toastLoading.hide();
        $("#btnConfirm").html("Confirmar Información");
        switch(response.status){
            case 200:
                localStorage.removeItem("sponsoredChild");
                let notyBody = {
                    'title': "!Felicidades padrino Curiosity!",
                    'message' :
                    "<div class='text-justify'><center><img src="+photoChildSponsored+" class='img-fluid' id='succImgPay'/><br /></center>"+
                    "El pago se ha generado de manera correcta.<br /> Se ha enviado un correo electrónico con más detalles al email que nos has proporcionado </div><br />"+
                    "<div class='text-xs-right'><a href='/casas-hogares' class='btn btn-default' id='btnSuccPay'>Aceptar</a></div>",
                    'icon': "fa-done"
                };
                Curiosity.windowMessage(notyBody.title, notyBody.message, notyBody.icon);
            break;
            case "CU-104":
                $("#btnConfirm").prop("disabled", false);
                $.each(response.data, function(index, value){
                  $.each(value, function(i, message){
                      Curiosity.noty.warning(message, "Algo va mal");
                  });
                });
                console.info(response.data);
            break;
            case 105:
                $("#btnConfirm").prop("disabled", false);
                Curiosity.noty.warning(response.message);
                console.info(response.data);
            break;
            case 'CUE-00101':
                $("#btnConfirm").prop("disabled", false);
                console.info(response.data);
                for (var i = 0; i < response.data.length; i++) {
                    Curiosity.noty.warning(response.data[i]);
                }
            break;
            default:
                $("#btnConfirm").prop("disabled", false);
                Curiosity.noty.error("Se ha detectado un error desconocido, por favor contáctanos para dar solución de inmediato.", "Ups algo ha salido muy mal.");
            break;
        }

    }

}
