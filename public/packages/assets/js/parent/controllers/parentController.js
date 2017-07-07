var parentController = {
       chartActivity:null,
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
                'cpassword':$("#cpassword").val(),
                '_token':$("#csrf").val()
            }
       },
       id : null,
       itemSon:function(id,name,nivel_id,photoProfile,infoActivities,topicLow){
           return "<a href='javascript:void(0)' data-name='"+name+"' data-id='"+id+"' data-nivel-id='"+nivel_id+"' data-topic-low='"+topicLow+"' data-info-activities='"+infoActivities+"' class='carousel-item hm-carousel-item'>"+
              "<div class=itemCarousel>"+
                 "<img src='"+photoProfile+"'>"+
                 "<h6 class='h6-responsive text-xs-center'>"+name+"</h6>"
              "</div>"+
           "</a>";
       },
       itemTopic:function(idTopic,name_topic,info){
           return "<li>"+
                        "<div style='cursor:pointer!important;' class='card hoverable chp-topics chp-cardTopic chp-active' data-id-topic="+idTopic+" data-info='"+JSON.stringify(info)+"' >"+
                            "<div class='card-block chp-topic-card'>"+
                              "<div class='card-left'>"+
                                "<img src='/packages/assets/media/images/landing/attachment.png' class='chp-imgWeak z-depth-1'>"+
                              "</div>"+
                              "<div class='card-right'>"+
                                "<div class='chp-topicDesc'>"+
                                  "<p class='weakZise'>"+name_topic+"</p>"+
                                "</div>"+
                              "</div>"+
                            "</div>"+
                      "</div>"+
                    "</li>";
       },
       createArrayTopic:function(datas){
           var dataClear = [];
           if(datas.length > 0){
               $.each(datas,function(i,object){
                   if(dataClear.length > 0){
                       var exist = 0;
                       $.each(dataClear,function(i,itemArray){
                           if(object.nombre_tema == itemArray.nombre){
                               exist++;
                           }
                       });
                       if(exist == 0)
                           dataClear.push({id:object.temaID,nombre:object.nombre_tema});
                   }
                   else{
                       dataClear.push({id:object.temaID,nombre:object.nombre_tema});
                   }
               });
           }
           return dataClear;
       },
       createItemsRecommend:function(temaID,dataset){
          $("#itemsRecommend").empty();
          if(dataset != null || dataset != ""){
             $("#topic_name_help").empty();
             $("#topic_name_help").append(dataset.nombre_tema);
             var o = dataset;
             $("#itemsRecommend").append(
                parentController.itemRecommend(o.nPDF,o.nrPDF,o.eVideo,o.nombre_tema,{nombre:o.ncpVid,foto:o.fpVid})
             );
          }
       },
       itemRecommend:function(nombre,nombre_real,embed,nombre_tema,infoProf){
           return "<div class='col-sm-12 col-md-6 col-xs-12'>"+
						  		"<div class='chp-btn-mat'>"+
									"<center>"+
										"<p>Click para ver la guía explicativa</p>"+
										"<a href='#'>"+
											"<img src='packages/assets/media/images/parents/pdfs.png' alt='' class='chp-pdfImg imgWeak' data-type='pdf' data-name='"+nombre+"' data-nombre-real="+nombre_real+" data-nombre-tema="+nombre_tema+">"+
										"</a>"+
									"</center>"+
						  		"</div><br>"+
							"</div>"+
							"<div class='col-sm-12 col-md-6 col-xs-12 chp-border chp-border-left'>"+
								"<div class='text-xs-center'>"+
									"<center>"+
										"<p>Click para ver el video explicativo</p>"+
										"<a href='#'>"+
											"<img src='packages/assets/media/images/parents/video.png' alt='' class='chp-videoImg' data-info-prof='"+JSON.stringify(infoProf)+"' data-type='video' data-embed='"+embed+"' data-nombre-tema="+nombre_tema+">"+
										"</a>"+
									"</center>"+
								"</div>"+
							"</div>";
       },
       createChartActivities:function(id,nivelId,dataset){
            if(dataset.length != 0){
                var iSstorage = localStorage.getItem('intelligencesSon');
                var intelligences = (iSstorage == null) ? null : JSON.parse(iSstorage);
                $("#materias").empty();
                $.each(intelligences,function(i,intelligence){
                    if(i == 0){
                        $("#materias").append("<fieldset class='form-group'><input value="+intelligence.id+" name='materia' type='radio'  checked='checked'><label for='radio11'>"+intelligence.nombre+"</label></fieldset>");
                    }
                    else{
                        $("#materias").append("<fieldset class='form-group'><input val='"+intelligence.id+"' name='materia' type='radio'><label for='radio11'>"+intelligence.nombre+"</label></fieldset>");
                    }
                });
                var ctx = $("body #myChart");
                var materiaID = $("input[name='materia']:checked").val();
                var materia,numRand,numRand2;
                var dataValues=[],dataValuesCompare=[];
                var notations = {
                                    50:"Bajo desempeño",
                                    60:"Necesita practicar",
                                    70:"Regular",
                                    80:"Bien",
                                    90:"Muy bien",
                                    100:"Excelente"
                                }
                var data = {
                    labels: [],
                    datasets: []
                };

                $.each(dataset,function(i,activity){
                    if(activity.idMateria == materiaID){
                        if(activity.id == id){
                            data.labels.push(activity.nombre_tema);
                            dataValues.push(activity.Promedio.toFixed(2));
                            dataValuesCompare.push(activity.promedioGeneral.toFixed(2));
                            if(activity.Promedio <= 70){
                                $("#hm-btn-HelpSon").prop('hidden',false);
                            }
                        }
                    }
                    materia = activity.Materia;
                });
            }
            if(dataset.length == 0){
                $("#dadNotice").show('slow');
                $("body #myChart").hide('slow');
            }else if(dataset.length < 10){
                $("#dadNotice").hide('slow');
                $("body #myChart").show('slow');
                $("#materias").show();
                numRand = Math.round(Math.random()*(Curiosity.colors().length-1));
                numRand2 = Math.round(Math.random()*(Curiosity.colors().length-1));
                data.datasets.push({
                             label: materia,
                             fill: false,
                             lineTension: 0.1,
                             backgroundColor: Curiosity.colorsTransparent(.4)[numRand],
                             borderColor: Curiosity.colors()[numRand],
                             borderCapStyle: 'butt',
                             borderDash: [],
                             borderDashOffset: 0.1,
                             borderJoinStyle: 'miter',
                             pointBorderColor: Curiosity.colors()[numRand],
                             pointBackgroundColor: "#fff",
                             pointBorderWidth: 1,
                             pointHoverRadius: 5,
                             pointHoverBackgroundColor: Curiosity.colors()[numRand],
                             pointHoverBorderColor: Curiosity.colors()[numRand],
                             pointHoverBorderWidth: 2,
                             pointRadius: 1,
                             pointHitRadius: 10,
                             data: dataValues,
                             spanGaps: false,
                },{
                            label: "General " + materia,
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: Curiosity.colorsTransparent(.4)[numRand2],
                            borderColor: Curiosity.colors()[numRand2],
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.1,
                            borderJoinStyle: 'miter',
                            pointBorderColor: Curiosity.colors()[numRand2],
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: Curiosity.colors()[numRand2],
                            pointHoverBorderColor: Curiosity.colors()[numRand2],
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: dataValuesCompare,
                            spanGaps: false,
                });
                if(parentController.chartActivity != null)
                {
                   var $parentChart = $("body #myChart").parent();
                   var $newChart = $("<canvas/>").attr({
                      "width" : 200,
                      "height" : 200,
                      "id" : "myChart"
                   });

                   $("body #myChart").remove();
                   $("body .chartjs-hidden-iframe").remove();
                   $("#prntHome-contentInfo .row > div").append($newChart);
                   ctx = $("#prntHome-contentInfo .row > div #myChart");
                }
                parentController.chartActivity = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true,
                                        userCallback: function (value, index, values) {
                                            return notations[value];
                                        }
                                    }
                                }]
                            }
                        }
                });



            }else{
                $("#dadNotice").hide('slow');
                $("body #myChart").show('slow');
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
                parentController.chartActivity = new Chart(ctx, {
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
                }
             });
       },
       createCarousel:function(response){
           if(response.sons.length > 0){
                $.each(response.sons,function(id,son){
                    var dataActivitiesSon = parentController.createArrayDataSon(son.id,response.sonMakeActivities);
                    var dataTopicLow = parentController.createArrayDataTopicLowSon(son.id,response.temasLow);
                    $(".hm-carousel").append(parentController.itemSon(son.id,son.nombre_completo,son.nivel_id,son.photoProfile,JSON.stringify(dataActivitiesSon),JSON.stringify(dataTopicLow)));
                });
                $(".carousel").carousel();
                parentController.autoSelectedUser();
            }
       },
       createArrayDataSon:function(id,activities){
            var dataset=[];
            if($.isArray(activities)){
                if(activities.length > 0){
                    $.each(activities,function(i,activity){
                        if(activity.id == id){
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
                        if(topic.id == id){
                            dataset.push(topic);
                        }
                    });
                }
            }

           return dataset;


       },
       getSons:function(){
           Curiosity.toastLoading.show();
           Parent.any({},Curiosity.methodSend.POST,function(response){
                parentController.createCarousel(response);
                if(response.sonMakeActivities.length != null){
                    var intelligences = [];
                    $.each(response.sonMakeActivities,function(i,object){
                        var duplicate = 0;
                        $.each(intelligences,function(i,o){
                            if(o.id == object.idMateria){
                                duplicate++;
                            }
                        });
                        if(duplicate == 0)
                            intelligences.push({id:object.idMateria,nombre:object.Materia});
                    });
                    localStorage.setItem('intelligencesSon',JSON.stringify(intelligences));
                }
               Curiosity.toastLoading.hide();

           },'get-sons');
       },
       getPlan:function(id){
           CORM.any({id:id},Curiosity.methodSend.POST,function(response){
               if(response != null && response != '')
                  //   $("#pay-button").text("Pagar plan "+response.name);
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
                $.ajax({
                    url: 'logIn',
                    type: 'POST',
                    dataType: 'JSON',
                    data: response.data
                 })
                 .done(function(response) {
                    switch (response.status) {
                       case 200:
                          Curiosity.noty.success("Bien echo!, registro exitoso.");
                          window.location.href = response.data;
                          break;
                       case "CU-105":
                          Curiosity.noty.info("Lo sentimos tu cuenta a expirado. Renueva cuanto antes y sigue disfrutando de nuestro contenido.");
                          break;
                       case "CU-106":
                          Curiosity.noty.warning("Los datos de accesso que ingresaste son incorrectos, intenta nuevamente", "Datos Erróneos");
                          break;
                       default:
                          Curiosity.noty.error("Contáctate con nostros por favor", "Error desconocido");
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
           Conekta.setPublicKey("key_WXkrivJAijWK8DKqt1BXbmg");
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
               parentController.getPlan(localStorage.getItem('plan-user-selected'));
               $("#pay-button").html("Continuar &nbsp;<span class='fa fa-chevron-circle-right'></span>");
               $("#pay-button").prop("disabled",false);
               return Curiosity.noty.warning(error.message_to_purchaser);

            };
            Conekta.Token.create(tokenParams, successResponseHandler, errorResponseHandler);
       },

        paymentSuccess:function(response){
            parentController.getPlan(localStorage.getItem('plan-user-selected'));
            switch(response.status){
                case 200:
                    localStorage.setItem('plan-user-selected',null);
                    Curiosity.noty.success("Se ha realizado el cobró con exito.");
                    window.location = '/view-parent.registry_firstchild';
                    break;
                case 105:
                    Curiosity.noty.warning(response.message);
                    console.info(response.data);
                    break;
                default:
                    $("#pay-button").html("Continuar &nbsp;<span class='fa fa-chevron-circle-right'></span>");
                    $("#pay-button").prop("disabled",false);
                    Curiosity.noty.error("Se ha detectado un error desconocido, por favor contáctanos para dar solución de inmediato.", "Ups algo ha salido muy mal.");
                    break;
            }
        },

        validPlanSelected:function(){
            var exist=0;
            if(localStorage.getItem('plan-user-selected') != null && localStorage.getItem('plan-user-selected') != "null" && localStorage.getItem('plan-user-selected') != ""){
                exist = 1;
            }
            return exist;
        },

        verifyCode : function($code){
           var plan = localStorage.getItem("plan-user-selected");
           if (plan == null || plan == "" || plan == undefined){
             Curiosity.noty.warning("Lo sentimos, parece que no has seleccionado ningun plan previamente. Por favor regresa a la página principal y selecciona uno.", "No hay plan seleccionado.");
           }
           else {
             var cancelbtn = $("body").find('#sctn-cancelcode');
             var varifybtn = $("body").find('#sctn-btnVerif');
             var inputcode = $("body").find('#sctn-codeval');
             var bodyAlert = $("body").find('#sctn-noty');
             var charging = "<span class='fa fa-spinner fa-pulse fa-fw'></span>";
             var successIcon = "<span class='fa fa-check'></span>";
             cancelbtn.prop('disabled', true);
             inputcode.prop('disabled', true);
             varifybtn.removeClass('sctn-btnVerif');
             varifybtn.css('cursor', 'no-drop');
             varifybtn.html(charging);
             SalerCode.any({'plan_id':plan,'code_val':$code}, Curiosity.methodSend.POST, function(response){
                switch (response.status) {
                   case 200:
                       $("#sctn-code").hide();
                       localStorage.setItem('plan-user-selected', response.data["id"]);
                       varifybtn.html(successIcon);
                       varifybtn.css('cursor', 'default');
                       cancelbtn.html("Aceptar");
                       cancelbtn.css('color','#3cb54a');
                       cancelbtn.css('border-color','#3cb54a');
                       inputcode.prop('readonly', true);
                       var noty = "<div class='alert alert-success fade in sctn-alert'><h5>Código Aceptado.</h5>El código que has ingresado es correcto y los beneficios serán obtenidos en tu suscripción.<br><br>Para continuar, presiona el botón ACEPTAR y completa la información de registro de tu tarjeta.</div>";
                       bodyAlert.html(noty);
                      break;
                   case "CU-110":
                      varifybtn.addClass('sctn-btnVerif');
                      varifybtn.html("Verificar");
                      varifybtn.css('cursor', 'pointer');
                      cancelbtn.html("Cancelar");
                      cancelbtn.css('color','#585d66');
                      cancelbtn.css('border-color','#585d66');
                      var noty = "<div class='alert alert-danger alert-dismissable fade in sctn-alert'><a href='javascript:void(0)' class='close' data-dismiss='alert'aria-label='close'>&times;</a><h5>Código Expirado.</h5>El código ingresado ha caducado.</div>";
                      bodyAlert.html(noty);
                      break;
                   case "CU-109":
                      varifybtn.addClass('sctn-btnVerif');
                      varifybtn.html("Verificar");
                      varifybtn.css('cursor', 'pointer');
                      cancelbtn.html("Cancelar");
                      cancelbtn.css('color','#585d66');
                      cancelbtn.css('border-color','#585d66');
                      var noty = "<div class='alert alert-danger alert-dismissable fade in sctn-alert'><a href='javascript:void(0)' class='close' data-dismiss='alert'aria-label='close'>&times;</a><h5>El Código No Aplica.</h5>El código ingresado no aplica en el plan que se ha seleccionado.</div>";
                      bodyAlert.html(noty);
                      break;
                   case "CU-111":
                      varifybtn.addClass('sctn-btnVerif');
                      varifybtn.html("Verificar");
                      varifybtn.css('cursor', 'pointer');
                      cancelbtn.html("Cancelar");
                      cancelbtn.css('color','#585d66');
                      cancelbtn.css('border-color','#585d66');
                      var noty = "<div class='alert alert-danger alert-dismissable fade in sctn-alert'><a href='javascript:void(0)' class='close' data-dismiss='alert'aria-label='close'>&times;</a><h5>Plan No Encontrado.</h5>A ocurrido un error al momento de revisar el plan seleccionado. <br>Al parecer el plan ha expirado o se ha perdido la relación.</div>";
                      bodyAlert.html(noty);
                      break;
                   case "CU-108":
                      varifybtn.addClass('sctn-btnVerif');
                      varifybtn.html("Verificar");
                      varifybtn.css('cursor', 'pointer');
                      cancelbtn.html("Cancelar");
                      cancelbtn.css('color','#585d66');
                      cancelbtn.css('border-color','#585d66');
                      var noty = "<div class='alert alert-danger alert-dismissable fade in sctn-alert'><a href='javascript:void(0)' class='close' data-dismiss='alert'aria-label='close'>&times;</a><h5>Código inválido.</h5>El código que has ingresado es inválido, por favor revisa que este escrito correctamente.</div>";
                      bodyAlert.html(noty);
                      break;
                   default:
                      break;
                }
                cancelbtn.prop('disabled', false);
                inputcode.prop('disabled', false);
             }, "match");
           }
        }

}
