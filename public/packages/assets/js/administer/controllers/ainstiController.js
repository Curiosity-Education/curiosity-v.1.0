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

  infoInsti : function(id,success){
    Institution.infoInsti(success);
  }

}
