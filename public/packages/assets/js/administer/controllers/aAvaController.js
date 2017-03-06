var aAvaController = {

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

  getAvatars:function(success){
		avatar.getAvatars(success);
	},

  delete:function(id){

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

  updateStyle : function(){
    if($("#adAv-img").val() != ""){
      var formData = new FormData($("#adAv-imgForm")[0]);
      formData.append('nombre', $('#adAv-name').val());
      formData.append('costo', $('#adAv-cost').val());
      Curiosity.toastLoading.show();
      Avatar.updateStyle(formData,function(){});
      Curiosity.toastLoading.hide();
    }
  },

  getSprites : function(success){
    avatar.getSprites(success);
  }

}
