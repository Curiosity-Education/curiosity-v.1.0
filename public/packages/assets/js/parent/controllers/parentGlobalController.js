var parentGlobalController = {
    suscription:{
        status:function(){
            Curiosity.toastLoading.show();
            CORM.any(null,Curiosity.methodSend.POST,function(response){
               if(response.data != 'active' && response.data != 'in_trial'){
                    parentGlobalController.changeIcon({
                        text:'Reanudar',
                        action:'resume',
                        before:'fa-pause',
                        after:'fa-play'
                    });
               }
               Curiosity.toastLoading.hide();
            },'/parent/suscription','status');
        },
        pause:function(){
           $("body").find('#mvp-continue').html("<i class='fa fa-spinner fa-spin'></i>");
           $("body").find('#mvp-continue').prop('disabled', true);
           $("body").find('#mvp-cancelchange').prop('disabled', true);
            CORM.any(null,Curiosity.methodSend.POST,function(response){
                switch(response.status){
                    case 200:
                            parentGlobalController.changeIcon({
                                text:'Reanudar',
                                action:'resume',
                                before:'fa-pause',
                                after:'fa-play'
                            });
                            Curiosity.noty.success(response.message,"Bien hecho.");
                        break;
                    case 500:
                            console.log(response);
                            Curiosity.noty.error("Ha ocurrido un error al procesar su solicitud. Comuniquese con el administrador","Error");
                        break;
                }
                $("body").find('#mvp-continue').html("Continuar");
                $("body").find('#mvp-continue').prop('disabled', false);
                $("body").find('#mvp-cancelchange').prop('disabled', false);
            },'/parent/suscription','pause');
        },
        resume:function(){
           $("body").find('#mvp-continue').html("<i class='fa fa-spinner fa-spin'></i>");
           $("body").find('#mvp-continue').prop('disabled', true);
           $("body").find('#mvp-cancelchange').prop('disabled', true);
            CORM.any(null,Curiosity.methodSend.POST,function(response){
                switch(response.status){
                    case 200:
                            parentGlobalController.changeIcon({
                                text:'Pausar',
                                action:'pause',
                                before:'fa-play',
                                after:'fa-pause'
                            });
                            Curiosity.noty.success(response.message,"Bien hecho.");
                        break;
                    case 500:
                            console.log(response);
                            Curiosity.noty.error("Ha ocurrido un error al procesar su solicitud. Comuniquese con el administrador","Error");
                        break;
                }
                $("body").find('#mvp-continue').html("Continuar");
                $("body").find('#mvp-continue').prop('disabled', false);
                $("body").find('#mvp-cancelchange').prop('disabled', false);
            },'/parent/suscription','resume');
        }

    },
    changeIcon:function(data){
        $('.gst-susc-p').text(data.text);
        var parent = $('.gst-susc-p').parent();
        parent.data('action',data.action);
        parent.children('span').eq(0).removeClass(data.before);
        parent.children('span').eq(0).addClass(data.after);
    }
};
