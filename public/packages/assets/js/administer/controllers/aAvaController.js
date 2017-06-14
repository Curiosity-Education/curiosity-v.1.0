var aAvaController = {

  allAvatars:function(success){
		avatar.allAvatars(success);
	},

  allSprites : function(success){
    avatar.allSprites(success);
  },

  allSecuences : function(success){
    avatar.getSecuences(success);
  },

  allStyles : function(success){
    avatar.allStyles(success)
  },

  save : function(){
    if ($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('nombre', $("#adAv-name").val());
      formData.append('historia', $("#adAv-story").val());
      formData.append('costo', $('#adAv-cost').val());
      Curiosity.toastLoading.show();
      var tempAvatar = new avatar(formData);
      tempAvatar.save("POST",function(){alert('hecho');});
      Curiosity.toastLoading.hide();
      // window.location.reload();
    }
    else{
       Curiosity.noty.info("Por favor selecciona una imagen para este bloque", "Atención");
    }
  },

  delete : function(id){

		if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
					 	  Curiosity.toastLoading.show();
						  avatar.delete(id,"POST",function(){
							window.location.reload();
					  });
				 }else {
				 	  Curiosity.noty.info("Lo sentimos, La palabra escrita no es correcta")
				 }
		 });
		}
	},

  update : function($id){
    var id = $id;
    if ($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('nombre', $("#adAv-name").val());
      formData.append('historia', $("#adAv-story").val());
      formData.append('costo', $('#adAv-cost').val());
      Curiosity.toastLoading.show();
      var updateAva = new avatar(formData);
      updateAva.update(id,"POST",function(){alert('hecho');});
      Curiosity.toastLoading.hide();
      // window.location.reload();
    }
    else{
       Curiosity.noty.info("Por favor selecciona una imagen para este bloque", "Atención");
    }
  },

  addStyleAvatar : function($folder,$id){
    id = $id;
    folder = $folder;
    if($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('nombre', $('#adAv-name').val());
      formData.append('costo', $('#adAv-cost').val());
      formData.append('folder', folder);
      formData.append('id', id)
      Curiosity.toastLoading.show();
      avatar.addStyles(formData,function(){});
      Curiosity.toastLoading.hide();
    }
  },

  deleteStyle : function(id){

    if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
				 	  Curiosity.toastLoading.show();
					  avatar.deleteStyle(id,function(){
						window.location.reload();
				  });
				 }else {
				 	  Curiosity.noty.info("Lo sentimos, La palabra escrita no es correcta")
				 }
		 });
		}
  },

  updateStyle : function($folder,$id){
    id = $id;
    folder = $folder;
    if($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('nombre', $('#adAv-name').val());
      formData.append('costo', $('#adAv-cost').val());
      ormData.append('folder', folder);
      formData.append('id', id)
      Curiosity.toastLoading.show();
      Avatar.updateStyle(formData,function(){});
      Curiosity.toastLoading.hide();
    }
  },

  saveSprite : function(id){
    if($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('secuencia',$('#adAv-select').val());
      formData.append('widthFrame',$('#adAv-width').val());
      formData.append('heightFrame',$('#adAv-height').val());
      formData.append('framesX',$('#adAv-framesX').val());
      formData.append('framesY',$('#adAv-frameY').val());
      formData.append('fps',$('#adAv-fps').val());
      formData.append('estilo_id',id);
      avatar.saveSprites(formData,function(){alert('')});
    }
  },

  deleteSprite : function(id){

    if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
				 	  Curiosity.toastLoading.show();
					  avatar.deleteSprite(id,function(){
						window.location.reload();
				  });
				 }else {
				 	  Curiosity.noty.info("Lo sentimos, La palabra escrita no es correcta")
				 }
		 });
		}
  },

  updateSprite : function(id){
    if($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('secuencia',$('#adAv-select').val());
      formData.append('widthFrame',$('#adAv-width').val());
      formData.append('heightFrame',$('#adAv-height').val());
      formData.append('framesX',$('#adAv-framesX').val());
      formData.append('framesY',$('#adAv-frameY').val());
      formData.append('fps',$('#adAv-fps').val());
      formData.append('estilo_id',id);
      avatar.updateSprites(formData,function(){alert('')});
    }
  }

}
