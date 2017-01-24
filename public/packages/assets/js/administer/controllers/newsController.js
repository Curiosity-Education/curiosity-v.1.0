var newsCtrl = {

	save : function(success){
		News.save("POST",success);
	},

	update : function(id,success){
		News.update(id,"POST",success);
	},

	delete : function(id,success){
		News.delete(id,"POST",success);
	},

	get : function(success){
		News.get(success);
	}

}
