var admChHomController = {

    photo : undefined,

    getChildren : function(var_instution){
        Curiosity.toastLoading.show();
        ChildrenHome.any(var_instution, this.makeChildrenList, 'getChildren');
    },

    makeChildrenList : function(r){
        let code = '<div class="col-md-12">'+
            '<div class="chip animated bounce" id="agf-back">'+
                '<img src="/packages/assets/media/images/system/iconBack.png">'+
                'Regresar'+
            '</div>'+
            '<div class=\'acti-buttons float-xs-right\'>'+
                '<a class=\'btn-floating btn-small waves-effect waves-light\' id=\'agf-btnReg\'>'+
                    '<i class="fa fa-plus"></i>'+
                '</a>'+
            '</div>'+
        '</div>';
        $("#agf-row-children").append(code);
        if (r.children.length > 0){
            let folder = r.folder;
            $.each(r.children, function(index, el) {
                let code = "<div class='col-md-3 childCount'>"+
                        	"<div class='view overlay z-depth-1 agf-containerbox'>"+
                        		"<img src='/packages/assets/media/images/padrino_curiosity/"+folder+"/"+el.foto+"' class='img-fluid'>"+
                        		"<div class='mask flex-center'>"+
                        			"<center>"+
                        				"<a class='btn-floating btn-small waves-effect waves-light agf-btnround-confChild' data-o='"+JSON.stringify(el)+"' data-f='"+folder+"'>"+
                        					"<i class='fa fa-gears'></i>"+
                        				"</a>"+
                        				"<a class='btn-floating btn-small waves-effect waves-light agf-btnround-hideChild' data-c="+el.id+">"+
                        					"<i class='fa fa-eye-slash'></i>"+
                                        "</a>"+
                                    "</center>"+
                                "</div>"+
                                "<h6>"+el.nombre+" "+el.apellidos+"</h6>"+
                            "</div>"+
                        "</div>"
                $("#agf-row-children").append(code);
            });
        }
        else {
            let code = '<div class=\'col-md-12\'>'+
                '<div class=\'z-depth-1\' id=\'agf-emptybox\'>'+
                    '<h5>No existen niños regisrados en esta institución</h5>'+
                '</div>'+
            '</div>';
            $("#agf-row-children").append(code);
        }
        Curiosity.toastLoading.hide();
    },

    countChildrenInDOM : function (){
        var counter = 0;
        $.each($("#agf-row-children > .childCount"), function(index, el) {
            counter++;
        });
        return counter;
    },

    saveChild : function (var_instution){
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
                    child.save(this.successAdded);
                }
                else {
                    Curiosity.noty.warning('Favor de elegir una imagen Cuadrada 4:4', 'Imagen Error');
                    this.resetImage();
                }
            }
            else {
                Curiosity.noty.info('Por favor selecciona una imagen para el niño/a', 'Seleccionar Imagen');
            }
        }
    },

    successAdded : function(r){
        if (r.status == 200){
            Curiosity.noty.success("El niño ha sido registrado exitosamente", "Bien hecho");
            $("#agf-modal").modal("hide");
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
