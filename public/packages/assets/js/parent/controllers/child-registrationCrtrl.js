var childRegistrationCrtrl = {

	delete:function(id){
		childRegistration.delete(id,"POST",this.alert);
	},

	getSonsInfo:function(success){
		childRegistration.getSonsInfo(success);
  }

};
