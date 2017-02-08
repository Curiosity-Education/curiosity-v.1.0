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
       itemSon:function(id,name,nivel_id,infoActivities,topicLow){
           return "<a href='javascript:void(0)' data-name="+name+" data-id="+id+" data-nivel-id="+nivel_id+" data-topic-low='"+topicLow+"' data-info-activities='"+infoActivities+"' class='carousel-item hm-carousel-item'>"+
              "<div class=itemCarousel>"+
                 "<img src='/packages/assets/media/images/child/store/ProfilePhotos/profDefM.png'>"+
                 "<h6 class='h6-responsive text-xs-center'>"+name+"</h6>"
              "</div>"+
           "</a>";
       },
       itemTopic:function(idTopic,name_topic,info){
           return "<li>"+
                        "<div class='card hoverable chp-topics chp-cardTopic chp-active'  data-id-topic="+idTopic+" data-info='"+JSON.stringify(info)+"' >"+
                            "<div class='card-block chp-topic-card'>"+
                              "<div class='card-left'>"+
                                "<img src='http://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg' class='chp-imgWeak z-depth-1'>"+
                              "</div>"+
                              "<div class='card-right'>"+
                                "<div class='chp-topicDesc'>"+
                                  "<p>"+name_topic+"</p>"+
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
           if(dataset.length > 0){
               $("#topic_name_help").append(dataset[0].nombre_tema);
               $.each(dataset,function(i,o){
                  if(o.temaID == temaID){
                       $("#itemsRecommend").append(parentController.itemRecommend(o.nPDF,o.nrPDF,o.eVideo,o.nombre_tema,{nombre:o.ncpVid,foto:o.fpVid}));
                   }
               });
           }
       },
       itemRecommend:function(nombre,nombre_real,embed,nombre_tema,infoProf){
           return "<div class='col-sm-12 col-md-6 col-xs-12'>"+
						  		"<div class='chp-btn-mat'>"+
									"<center>"+
										"<p>Click para ver la guía explicativa</p>"+
										"<a href='#'>"+
											"<img src='packages/assets/media/images/parents/pdfs.png' alt='' class='chp-pdfImg' data-type='pdf' data-name='"+nombre+"' data-nombre-real="+nombre_real+" data-nombre-tema="+nombre_tema+">"+
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
                var ctx = document.getElementById("myChart").getContext("2d");
                var materiaID = $("input[name='materia']:checked").val();
                var materia,numRand,chartActivity;
                var dataValues=[],dataValuesCompare=[];
                var data = {
                    labels: [],
                    datasets: [],
                    options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                };
                numRand = Math.round(Math.random()*(Curiosity.colors().length-1));
                $.each(dataset,function(i,activity){
                    if(activity.idMateria == materiaID){
                        if(activity.id == id){
                            data.labels.push(activity.nombre_tema);
                            dataValues.push(activity.Promedio.toFixed(2));
                            dataValuesCompare.push(activity.promedioGeneral.toFixed(2));
                            if(activity.Promedio < 60){
                                $("#hm-btn-HelpSon").prop('disabled',false);
                            }
                        }
                    }
                    materia = activity.Materia;
                });
            }
            if(dataset.length == 0){
                $("#dadNotice").show();
            }else if(dataset.length < 10){
                $("#materias").show();
                data.datasets.push({
                            label: materia,
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.4)',
                                'rgba(255, 99, 132, 0.4)',
                                'rgba(255, 206, 86, 0.4)',
                                'rgba(75, 192, 192, 0.4)',
                                'rgba(153, 102, 255, 0.4)',
                                'rgba(255, 159, 64, 0.4)'
                             ],
                             borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                             ],
                             borderCapStyle: 'butt',
                             borderDash: [],
                             borderDashOffset: 0.1,
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
                },{
                            label: "General " + materia,
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: Curiosity.colorsTransparent(.4)[numRand],
                            borderColor: Curiosity.colors()[numRand],
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.1,
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
                            data: dataValuesCompare,
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
                }
             });
       },
       createCarousel:function(response){
           if(response.sons.length > 0){
                $.each(response.sons,function(id,son){
                    var dataActivitiesSon = parentController.createArrayDataSon(son.id,response.sonMakeActivities);
                    var dataTopicLow = parentController.createArrayDataTopicLowSon(son.id,response.temasLow);
                    $(".hm-carousel").append(parentController.itemSon(son.id,son.nombre_completo,son.nivel_id,JSON.stringify(dataActivitiesSon),JSON.stringify(dataTopicLow)));
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
           Curiosity.toastLoading.show();
           Parent.any({},Curiosity.methodSend.POST,function(response){
                parentController.createCarousel(response);
                if(response.sonMakeActivities.length != null){
                    var intelligences = [];
                    $.each(response.sonMakeActivities,function(i,object){
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
                case 105:
                    Curiosity.noty.warning(response.message);
                    console.info(response.data);
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
