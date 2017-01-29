var parentController = {

       update: function(id,data,success){
            new Parent(data).update(id,"POST",success);
       },
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
       itemSon:function(id,name,infoActivities,topicLow){
           return "<a href='javascript:void(0)' data-id="+id+" data-topic-low="+topicLow+" data-info-activities="+infoActivities+" class='carousel-item hm-carousel-item'>"+
              "<div class=itemCarousel>"+
                 "<img src='/packages/assets/media/images/child/store/ProfilePhotos/profDefM.png'>"+
                 "<h6 class='h6-responsive text-xs-center'>"+name+"</h6>"
              "</div>"+
           "</a>";
       },
       createChartActivities:function(id,data){
            if(data.length != 0){
                var ctx = document.getElementById("myChart").getContext("2d");
                var materiaID = $("input[name='materia']:checked").val();
                var materia,numRand,chartActivity;
                var dataValues=[];
                var data = {
                    labels: [],
                    datasets: []
                };
                $.each(data,function(i,activity){
                    numRand = Math.random()*(Curiosity.colors.length-1);
                    if(activity.idMateria == materiaID){
                        if(activity.id == id){
                            data.labels.push(activity.nombre_tema);
                            dataValues.push(activity.promedio);
                        }
                    }
                    materia = activity.Materia;
                });
            }

            if(data.length == 0){
                $("#dadNotice").show();
            }else if(data.length < 5){
                $("#materias").show();
                data.datasets.push({
                            label: materia,
                            fill: false,
                            lineTension: 0.1,
                           backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: dataValues,
                            spanGaps: false,
                });
                chartActivity = new Chart(ctx, {
                    type: 'bar',
                    data: data
                });


            }else{
                $("#materias").show();
                data.datasets.push({
                    label:materia,
                    backgroundColor: Curiosity.colorsTransparent(.4)[numRand],
                    borderColor: Curiosity.colors()[numRand],
                    pointBackgroundColor: Curiosity.colors()[numRand],
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: Curiosity.colors()[numRand],
                    data:dataValues
                });
                var options ={
                        scale: {
                            reverse: false,
                            ticks: {
                                beginAtZero: true
                            }
                        }
                }
                chartActivity = new Chart(ctx, {
                    type: 'radar',
                    data: data,
                    options: options
                });
            }
       },
       autoSelectedUser:function(){
             $(".hm-carousel").children('.carousel-item').each(function(i,item){
                if(i == 0){
                    $(this).trigger('click');
                    console.log($(this));
                }
             });
       },
       createCarousel:function(response){
           if(response.sons.length > 0){
                $.each(response.sons,function(id,son){
                    var dataActivitiesSon = parentController.createArrayDataSon(son.id,response.sonMakeActivities);
                    var dataTopicLow = parentController.createArrayDataTopicLowSon(son.id,response.temasLow);
                    $(".hm-carousel").append(parentController.itemSon(son.id,son.nombre_completo,JSON.stringify(dataActivitiesSon),JSON.stringify(dataTopicLow)));
                });
                $(".carousel").carousel();
            }
       },
       createArrayDataSon:function(id,activities){
            var dataset=[];
            if($.isArray(activities)){
                if(activities.length > 0){
                    $.each(activities,function(i,activity){
                        if(activity.id = id){
                            dataset.push(activity);
                        }
                    });
                }
            }

           return dataset;


       },
        createArrayDataTopicLowSon:function(id,topics){
            var dataset=[];
            if($.isArray(topics)){
                if(topics.length > 0){
                    $.each(topics,function(i,topic){
                        if(topics.id = id){
                            dataset.push(topic);
                        }
                    });
                }
            }

           return dataset;


       },
       getSons:function(){

           Parent.any({},Curiosity.methodSend.POST,function(response){
               console.log("response");
                parentController.createCarousel(response);
           },'get-sons');
           Intelligence.all(Curiosity.methodSend.POST,function(response){
               $.each(response,function(i,intelligence){

                   if(i == 0)
                        $("#materias").append("<fieldset class='form-group'><input value="+intelligence.id+" name='materia' type='radio'  checked='checked'><label for='radio11'>"+intelligence.nombre+"</label></fieldset>");
                   else
                        $("#materias").append("<fieldset class='form-group'><input val='"+intelligence.id+"' name='materia' type='radio'><label for='radio11'>"+intelligence.nombre+"</label></fieldset>");

               });
           });
           parentController.autoSelectedUser();
       },
       getPlan:function(id){
           CORM.any({id:id},Curiosity.methodSend.POST,function(response){
               if(response != null && response != '')
                    $("#pay-button").text("Pagar plan "+response.name);
                    return response;
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
                          Curiosity.noty.success("Bien echo!!, Regiostro exitoso.");
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
            console.log(response);
            switch(response.status){
                case 200:
                    localStorage.setItem('plan-user-selected',null);
                    Curiosity.noty.success("Se ha realizado el cobró con exito.");
                    window.location = '/view-parent.registry_firstchild';
                    break;
                default:
                    Curiosity.noty.error("Ups algo ha salido mal reportelo con el administrador.");
            }
        },

        validPlanSelected:function(){
            var exist=0;
            if(localStorage.getItem('plan-user-selected') != null && localStorage.getItem('plan-user-selected') != "null" ){
                exist = 1;
            }
            return exist;
        }

}
