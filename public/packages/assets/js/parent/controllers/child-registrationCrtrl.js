var childRegistrationCrtrl = {

	delete:function(id){
		id = this.id;

		if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
						childRegistration.delete(id,"POST",this.alert);
				 }
		 });
		}
	},

	getSonsInfo:function(success){
		childRegistration.getSonsInfo(success);
  }

};
