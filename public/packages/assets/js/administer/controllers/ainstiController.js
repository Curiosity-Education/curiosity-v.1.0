var ainstiController = {

  allInstitutes : function(success){
    Institution.allInstitutes(success)
  },

  allStates : function(success){
    Institution.allStates(success);
  },

  allCities : function(success){
    Institution.allCities(success);
  },

  save : function(type){

    if ($("#adIn-img").val() != "") {

      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('name', $('#adIn-name').val());
      formData.append('street', $('#adIn-calle').val());
      formData.append('colony', $('#adIn-colonia').val());
      formData.append('number', $('#adIn-number').val());
      formData.append('cp', $('#adIn-Cp').val());
      formData.append('city', $('#adIn-city').val());
      formData.append('state', $('#adIn-state').val());
      formData.append('type', type);
      var p = new Institution(formData);
      p.save(function(){});
    }
  },

  delete : function(id){

		if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
					 	  Curiosity.toastLoading.show();
						  Institution.delete(id,function(){
							window.location.reload();
					  });
				 }else {
				 	  Curiosity.noty.info("Lo sentimos, La palabra escrita no es correcta")
				 }
		 });
		}
	},

  infoInsti : function(id){
    Institution.infoInsti(id,this.updateModal);
  },

  selectFile : function($input){
     var exts = new Array(".png", ".jpg", "jpeg", "JPEG", "JPG", "PNG");
     var $file = $input;
     var maxMegas = 2;
     if ($file.val() != ""){
        if(Curiosity.file.validExtension($file.val(), exts)){
           var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
           if (files != null){
              var url = Curiosity.makeBlob($file.attr("id"));
              $("#pero").attr("src", url);
              // $("#aemp-resetPhoto").show();
              // $("#aemp-resetPhoto").addClass('animated fadeIn');
           }
           else{
              this.resetImage();
              Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
           }
        }
        else{
           $file.val("");
           Curiosity.noty.info("Selecciona un archivo de imagen valido", "Formato invalido");
        }
     }
  },
  updateModal : function(response){
    $("#updAdIn-name").val(response.nombre);
    $("#updAdIn-calle").val(response.calle);
    $("#updAdIn-colonia").val(response.colonia);
    $("#updAdIn-number").val(response.numero);
    $("#updAdIn-Cp").val(response.codigo_postal);
    $("#pero").attr("src", "/packages/assets/media/images/institutions/"+response.logo);
    $("#updAdInfirst-register").attr("data-id", response.id);
  },

  updateInstitute : function(id){
    var formData = new FormData($("#adAv-imgForm")[0]);
    formData.append('name', $('#updAdIn-name').val());
    formData.append('street', $('#updAdIn-calle').val());
    formData.append('colony', $('#updAdIn-colonia').val());
    formData.append('number', $('#updAdIn-number').val());
    formData.append('cp', $('#updAdIn-Cp').val());
    formData.append('city', $('#updAdInselect-city').val());
    formData.append('state', $('#updAdIn-state').val());
    var p = new Institution(formData);
    p.update(id,function(){});
  }


}
