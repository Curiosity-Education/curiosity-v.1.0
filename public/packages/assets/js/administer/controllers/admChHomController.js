var admChHomController = {

    photo : undefined,

    getChildren : function(var_instution){
        Curiosity.toastLoading.show();
        ChildrenHome.any(var_instution, this.makeChildrenList, 'getChildren');
    },

    makeChildrenList : function(r){
        if (r.children.length > 0){
            let folder = r.folder;
            $.each(r.children, function(index, el) {
                let code = "<div class='col-md-3 childCount animated zoomIn' id='agf"+el.id+"'>"+
                        	"<div class='view overlay z-depth-1 agf-containerbox'>"+
                        		"<img src='/packages/assets/media/images/padrino_curiosity/"+folder+"/"+el.foto+"' class='img-fluid' id='agf"+el.id+"img'>"+
                        		"<div class='mask flex-center'>"+
                        			"<center>"+
                        				"<a class='btn-floating btn-small waves-effect waves-light agf-btnround-confChild' id='agf"+el.id+"data' data-o='"+JSON.stringify(el)+"' data-f='"+folder+"'>"+
                        					"<i class='fa fa-gears'></i>"+
                        				"</a>"+
                        				"<a class='btn-floating btn-small waves-effect waves-light agf-btnround-hideChild' id='agf"+el.id+"position' data-c="+el.id+">"+
                        					"<i class='fa fa-eye-slash'></i>"+
                                        "</a>"+
                                    "</center>"+
                                "</div>"+
                                "<h6 id='agf"+el.id+"name'>"+el.nombre+" "+el.apellidos+"</h6>"+
                            "</div>"+
                        "</div>"
                $("#adf-boxChildren").prepend(code);
            });
            Curiosity.toastLoading.hide();
        }
        else {
            let code = '<div class=\'col-md-12\'>'+
                '<div class=\'z-depth-1\' id=\'agf-emptybox\'>'+
                    '<h5>No existen niños regisrados en esta institución</h5>'+
                '</div>'+
            '</div>';
            $("#adf-boxChildren").append(code);
            Curiosity.toastLoading.hide();
        }
    },

    countChildrenInDOM : function (){
        var counter = 0;
        $.each($("#agf-boxChildren > .childCount"), function(index, el) {
            counter++;
        });
        return counter;
    },

    saveChild : function (var_instution, var_id, type){
        $('#agf-form').validate({
            rules : {
              agf_name      : {required:true, maxlength:45},
              agf_lName     : {required:true, maxlength:45},
              agf_genre     : {required:true},
              agf_sponsored : {required:true}
            }
        });
        if ($('#agf-form').valid()){
            Curiosity.toastLoading.show();
            let formData = new FormData($('#agf-formPhoto')[0]);
            formData.append('nombre', $('#agf_name').val());
            formData.append('apellidos', $('#agf_lName').val());
            formData.append('sexo', $('#agf_genre').val());
            formData.append('institucion_id', var_instution);
            formData.append('apadrinado', $('#agf_sponsored').val());
            let _width = document.getElementById('agf_ph').width;
            let _height = document.getElementById('agf_ph').height;
            let child = new ChildrenHome(formData);
            if ($('#agf_photo').val() != ''){
                if (_width == _height){
                    if (type == "registry"){
                        child.save(this.successAdded);
                    }
                    if (type == "update"){
                        child.update(var_id, this.successUpdated);
                    }
                }
                else{
                    Curiosity.noty.warning('Favor de elegir una imagen Cuadrada con relación 1:1', 'Imagen Error');
                    this.resetImage();
                    Curiosity.toastLoading.hide();
                }
            }
            else if(type == "registry") {
                Curiosity.toastLoading.hide();
                Curiosity.noty.info('Por favor selecciona una imagen para el niño/a', 'Seleccionar Imagen');
            }
            else if (type == "update"){
                child.update(var_id, this.successUpdated);
            }
        }
    },

    deleteChild : function (var_id){
        ChildrenHome.delete(var_id, this.successDeleted);
    },

    successDeleted : function(r){
        if(r.status == 200){
            $("body").find("#agf"+r.data.child.id).hide('slow', function() {
                $(this).remove();
            });;
            Curiosity.noty.success("Eliminado correctamente", "Bien hecho");
            if (admChHomController.countChildrenInDOM() == 0) {
                let code = '<div class=\'col-md-12\'>'+
                    '<div class=\'z-depth-1\' id=\'agf-emptybox\'>'+
                        '<h5>No existen niños regisrados en esta institución</h5>'+
                    '</div>'+
                '</div>';
                $("#adf-boxChildren").append(code);
            }
        }
        else {
            Curiosity.noty.error("Error inesperado", "Error");
        }
        Curiosity.toastLoading.hide();
    },

    successAdded : function(r){
        if (r.status == 200){
            let folder = r.data.folder;
            let code = "<div class='col-md-3 childCount animated zoomIn' id='agf"+r.data.child.id+"'>"+
                        "<div class='view overlay z-depth-1 agf-containerbox'>"+
                            "<img src='/packages/assets/media/images/padrino_curiosity/"+folder+"/"+r.data.child.foto+"' class='img-fluid' id='agf"+r.data.child.id+"img'>"+
                            "<div class='mask flex-center'>"+
                                "<center>"+
                                    "<a class='btn-floating btn-small waves-effect waves-light agf-btnround-confChild' id='agf"+r.data.child.id+"data' data-o='"+JSON.stringify(r.data.child)+"' data-f='"+folder+"'>"+
                                        "<i class='fa fa-gears'></i>"+
                                    "</a>"+
                                    "<a class='btn-floating btn-small waves-effect waves-light agf-btnround-hideChild' id='agf"+r.data.child.id+"position' data-c="+r.data.child.id+">"+
                                        "<i class='fa fa-eye-slash'></i>"+
                                    "</a>"+
                                "</center>"+
                            "</div>"+
                            "<h6 id='agf"+r.data.child.id+"name'>"+r.data.child.nombre+" "+r.data.child.apellidos+"</h6>"+
                        "</div>"+
                    "</div>"
            if (admChHomController.countChildrenInDOM() == 0) {
                $("body").find("#agf-emptybox").remove();
            }
            $("#adf-boxChildren").prepend(code);
            Curiosity.noty.success("El niño ha sido registrado exitosamente", "Bien hecho");
            $("#agf-cancel").trigger('click');
        }
        else{
            Curiosity.noty.error("Error inesperado", "Error");
        }
        Curiosity.toastLoading.hide();
    },

    successUpdated : function(r){
        console.log(r);
        if (r.status == 200){
            $("body").find("#agf"+r.data.child.id+"image").attr('src', "/packages/assets/media/images/padrino_curiosity/"+r.data.folder+"/"+r.data.child.foto+"?"+parseInt(Math.random() * 10000000000000000));
            $("body").find("#agf"+r.data.child.id+"data").data('o', JSON.stringify(r.data.child));
            $("body").find("#agf"+r.data.child.id+"data").data('f', r.data.folder);
            $("body").find("#agf"+r.data.child.id+"position").data('c', r.data.child.id);
            $("body").find("#agf"+r.data.child.id+"name").text(r.data.child.nombre+" "+r.data.child.apellidos);
            $("#agf-cancel").trigger('click');
            Curiosity.noty.success("Actualizado exitosamente", "Bien hecho");
        }
        else{
            Curiosity.noty.error("Error inesperado", "Error");
        }
        Curiosity.toastLoading.hide();
    },

    fillData : function(obj, folder){
        this.photo = "/packages/assets/media/images/padrino_curiosity/"+folder+"/"+obj.foto;
        $("#agf_ph").attr('src', this.photo);
        $('#agf_name').val(obj.nombre);
        $('#agf_lName').val(obj.apellidos);
        $('#agf_genre').val(obj.sexo);
        $('#agf_sponsored').val(obj.apadrinado);
    },

    updateChild : function(){
        alert('Updated');
    },

    resetImage : function(){
       $('#agf_ph').attr('src', this.photo);
       $('#agf_photo').val('');
       $('#agf-resetPhoto').hide();
    },

    selectFile : function($input){
        var exts = new Array('.png', '.PNG', '.jpg', '.JPG', '.JPEG');
        var $file = $input;
        var maxMegas = 2;
        if ($file.val() != ''){
            if(Curiosity.file.validExtension($file.val(), exts)){
                var files = Curiosity.file.validSize($file.attr('id'), maxMegas);
                if (files != null){
                    var url = Curiosity.makeBlob($file.attr('id'));
                    $('#agf_ph').attr('src', url);
                    $('#agf-resetPhoto').show();
                    $('#agf-resetPhoto').addClass('animated fadeIn');
                }
                else{
                    this.resetImage();
                    Curiosity.noty.warning('El archivo excede los '+maxMegas+' MB máximos permitidos', 'Demasiado grande');
                }
            }
            else{
                $file.val('');
                Curiosity.noty.info('Selecciona un archivo de imagen valido (\'.png\', \'.PNG\', \'.jpg\', \'.JPG\', \'.JPEG\')', 'Formato invalido');
            }
        }
    },

    resetImage : function(){
       $("#agf_ph").attr("src", this.photo);
       $("#agf_photo").val("");
       $("#agf-resetPhoto").hide();
    }

}


/*

ASPECT RATIO

function gcd (a,b):
    if b == 0:
        return a
    return gcd (b, a mod b)


*/
