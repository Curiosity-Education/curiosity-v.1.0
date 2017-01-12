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
	}
};