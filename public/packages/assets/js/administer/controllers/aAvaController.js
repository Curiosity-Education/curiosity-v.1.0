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
    }
    else{
       Curiosity.noty.info("Por favor selecciona una imagen para este bloque", "Atención");
    }
  },

  getAvatars:function(success){
		avatar.getAvatars(success);    
	}
}
