$(function(){
    var prefix = "parent";

    $("#payment-form").submit(function(e) {
       e.prevetDefault();
    });

    if(parentController.validPlanSelected() == 1)
        parentController.getPlan(localStorage.getItem('plan-user-selected'));
    else
        parentController.getSons();

    $("#pay-button").click(function(){
        if(parentController.validPlanSelected()){
            $("#pay-button").prop("disabled",true);
            $("#pay-button").html("<span class='fa fa-spinner fa-pulse'></span>&nbsp; Procesando");
            parentController.payment();
        }else{
            Curiosity.noty.info("Aun no haz seleccionado un plan, no puedes realizar esta acción");
        }
    });


    $(".hm-carousel").on('click','.carousel-item',function(){

        $("#materias").data('id',$(this).data('id'));
        $("#materias").data('nivelId',$(this).data('nivelId'));
        $("#materias").data('infoActivities',$(this).data('infoActivities'));
        parentController.createChartActivities($(this).data('id'),$(this).data('nivelId'),$(this).data('infoActivities'));
        $("#hm-btn-HelpSon").data('topicLow',$(this).data('topicLow'));
        $("#name_low_son").empty();
        $("#name_low_son").append($(this).data('name'));
        $("#name_son_selected").empty();
        $("#name_son_selected").append($(this).data('name'));

    });

    $("#chp-contentTopics").on('click','.chp-cardTopic',function(){
        parentController.createItemsRecommend($(this).data('idTopic'),$(this).data('info'));
    });


   $("#"+prefix+"-save").click(function(ev){ eval(prefix+"Controller").save(); });

   $("body").on("click", "."+prefix+"-btnConf", function(){
      eval(prefix+"Controller").setId(
          {
              id:$(this).data("dti"),
              reference:$(this).data('reference')
          }
      );
      parentController.openModalUpdate(this);
   });

   $("body").on("click", "."+prefix+"-btnDel", function(){
      eval(prefix+"Controller").setId(
          {
              id:$(this).data("dti"),
              reference:$(this).data('reference')
          }
      );
      eval(prefix+"Controller").delete();
   });

   $("#"+prefix+"-cancel").click(function(){
      eval(prefix+"Controller").clearInputs();
   });


    $("#itemsRecommend").on('click','img',function(){
        console.log($(this));
        $(".gst-tema-content").empty();
         $("#type_mdl").empty();
        $(".gst-tema-content").append($(this).data('nombreTema'));
        switch($(this).data('type')){
            case 'pdf':
                $(".gst-prof-content").hide();
                $("#gst-iframe-content").attr('src','/packages/assets/pdf/'+$(this).data('name'));
                $(".gst-img-content").attr('src',"packages/assets/media/images/parents/pdfs.png");
                $("#type_mdl").append("PDF");
                break;
            case 'video':
                var infoProf = $(this).data('infoProf');
                $("#gst-iframe-content").attr('src',$(this).data('embed'));
                $(".gst-img-content").attr('src',"/packages/assets/media/images/teachersAsc/"+infoProf.foto);
                $(".gst-prof-content").empty();
                $(".gst-prof-content").append(infoProf.nombre);
                $(".gst-prof-content").show();
                $("#type_mdl").append("Videos");
                break;
        }
        $("#gst-modal-pdf-video").modal("show");
    });



});
