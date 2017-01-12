var childrenCtrl = {
	save : function(data,success){
		new Child(data).save("POST",success);
	}
};
