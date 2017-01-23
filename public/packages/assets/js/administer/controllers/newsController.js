var newsCtrl = {

	save:function(successn){
		News.save(success);
	},

	update: function(id,method,success){
		News.update(id,method,success);
	},

	delete: function(id,method,success){
		News.delete(id,method,success);
	},

	get: function(success){
		News.get(success);
	}

}
