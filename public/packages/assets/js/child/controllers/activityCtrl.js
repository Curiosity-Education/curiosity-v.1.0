var activityCtrl = {
	getNews : function(success){
		Activity.getNews(success);
	},
	getRank : function(success){
		Activity.getRank(success);
	},	
	getPopulars: function(success){
		Activity.getPopulars(success);
	},
	getRecomended: function(success){
		Activity.getPopulars(success);
	}
};