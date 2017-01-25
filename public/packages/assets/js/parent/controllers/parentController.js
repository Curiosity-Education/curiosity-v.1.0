if(localStorage.getItem('plan-user-selected') != null || localStorage.setItem('plan-user-selected') != ''){
    var parentController = {

       prefix:"parent",
       formulary : $("#parent-form"),
       rulesFormulary:{
           rules:{
                email:{
                    required:true,
                    email:true
                },
                username:{
                  required:true,
                  maxlength:40,
                  remote:{
                    "url":"/remote-username",
                    "type":"POST",
                    "username":function(){
                      return $("input[name='username']").val();
                    }
                  }
                },
                nombre:{
                    required:true
                },
                apellidos:{
                    required:true
                },
                sexo:{
                    required:true
                },
                password:{
                    required:true,
                    minlength:8
                },
                cpassword:{
                  required: true,
                  minlength:8,
                  equalTo:function(){
                    return $("input[name='password']");
                  }
                },
                telefono:{
                    required:true,
                    digits:true,
                    minlength:7,
                    maxlength:13
                }
           },messages:{
              cpassword:{equalTo:"Las contraseñas son diferentes"},
              username:{remote:"Nombre de usuario no disponible"}
           }
       },
       data:function(){
            return {
                'email':$("#email").val(),
                'nombre':$("#nombre").val(),
                'apellidos':$("#apellidos").val(),
                'sexo':$("#sexo").val(),
                'password':$("#password").val(),
                'telefono':$("#telefono").val(),
                'username':$("#username").val(),
                'cpassword':$("#cpassword").val()
            }
       },
       id : null,
       getPlan:function(id){
           return CORM.any({id:id},Curiosity.methodSend.POST,function(response){
               $("#pay-button").text("Pagar plan "+response.name);
           },'/plans','get');
       },
       save : function(){
            parentController.formulary.validate(parentController.rulesFormulary);
            if (parentController.formulary.valid()){
               if($("#accept_conditions").is(':checked')){
                   var parent = new Parent(this.data());
                   Curiosity.toastLoading.show();
                   parent.save(Curiosity.methodSend.POST, this.addSuccess);
               }
                else{
                    Curiosity.noty.warning("Acepta primero los términos y codiciones.","¡OJO!");
                }
            }
       },



       addSuccess : function(response){
          Curiosity.toastLoading.hide();
          switch (response.status) {
             case 200:
                console.log(response);
                $.ajax({
                    url: 'logIn',
                    type: 'POST',
                    dataType: 'JSON',
                    data: response.data
                 })
                 .done(function(response) {
                    console.log(response);
                    switch (response.status) {
                       case 200:
                          window.location.href = response.data;
                          break;
                       case "CU-105":
                          Curiosity.noty.info("Lo sentimos tu cuenta a expirado. Renueva cuanto antes y sigue disfrutando de nuestro contenido.");
                          break;
                       case "CU-106":
                          Curiosity.noty.warning("Los datos de accesso que ingresaste son incorrectos, intenta nuevamente", "Datos Erróneos");
                          break;
                       default:
                          Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
                          break;
                    }
                 })
                 .fail(function(error) {
                    Curiosity.noty.error("Contactate con nostros por favor", "Error desconocido");
                    console.log(error);
                 });
                break;
             case "CU-104":
                $.each(response.data, function(index, value){
                  $.each(value, function(i, message){
                      Curiosity.noty.warning(message, "Algo va mal");
                  });
                });
                break;
             default:
                Curiosity.noty.error("Consulta con el administrador", "Error desconocido");
                break;
          }
       },

       clearInputs : function(){
          $("."+parentController.prefix+"Inp").val("");
       },

       payment:function($data){
           Conekta.setPublicKey("key_CmADz585Gq19Aqt1xpLWppg");
            var tokenParams = {
              "card": {
                "number": document.getElementById('card_number').value,
                "name": document.getElementById('name').value,
                "exp_year": document.getElementById('exp_year').value,
                "exp_month": document.getElementById('exp_month').value,
                "cvc": document.getElementById('cvv').value
              }
            };


            var successResponseHandler = function(token) {
                var datos={
                    nombre:document.getElementById("name").value,
                    conektaTokenId:token.id,
                    plan_id:localStorage.getItem('plan-user-selected')
                }
                return Parent.any(datos,Curiosity.methodSend.POST,parentController.paymentSuccess,'payment-suscription');
            };

            var errorResponseHandler = function(error) {
              $("#pay-button").prop("disabled",false);
              return Curiosity.noty.warning(error.message_to_purchaser);

            };
            Conekta.Token.create(tokenParams, successResponseHandler, errorResponseHandler);
       },

        paymentSuccess:function(response){
            $("#pay-button").prop("disabled",false);
            switch(response.status){
                case 200:
                    Curiosity.noty.success("Se ha realizado el cobró con exito.");
                    window.location = '/view-parent.registry_firstchild';
                    break;
                default:
                    Curiosity.noty.error("Ups algo ha salido mal reportelo con el administrador.");
            }
        }

    }

}
else{
    window.location = '/';
}
