var activityCtrl = {
	getNews : function(success){
		Activity.getNews(success);
	},
	getRanks : function(success){
		Activity.getRank(success);
	},
	getPopulars : function(success){
		Activity.getPopulars(success);
	},
	getRecomendies: function(success){
		Activity.getPopulars(success);
	},
	getPdfs: function(success){
		Activity.getPdfs(success);
	},
	getAll: function(success){
		Activity.findAll("GET",success);
	},
	updateViews: function(data,success){
		Activity.updateViews(data,success);	
	} 
};
