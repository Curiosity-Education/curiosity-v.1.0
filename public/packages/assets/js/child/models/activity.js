class Activity extends CORM{

    constructor(data){
	    super();
	    this.activity = {
	        data: data
	    }
	    super.setPrefix('/activity');
    }

    save(method,success){
        super.save(this.sonRatesActivity,method,success);
    }

    update(id,method,success){
        this.activity.id = id;
        super.update(this.sonRatesActivity,method,success);
    }

    static delete(id,method,success){
        super.delete({id:id},method,success,'/activity');
    }

    static all(method,success){
        super.all(method,success,'/activity');
    }

    static find(id,method,success){
        super.find({id:id},method,success,'/activity');
    }

    static getNews(success){
    	super.any(null,"POST",success,"/activity","/find-recomendeds");
    }

    static getRank(success){
    	super.any(null,"POST",success,"/activity","/find-recomendeds");
    }

    static getPopulars(success){
    	super.any(null,"POST",success,"/activity","/find-recomendeds");
    }

    static getRecomended(success){
    	super.any(null,"POST",success,"/activity","/find-recomendeds");
    }
}