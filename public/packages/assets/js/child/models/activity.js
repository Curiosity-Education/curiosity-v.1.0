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
    	super.any(null,"GET",success,"/activity","find-new");
    }

    static getRank(success){
    	super.any(null,"GET",success,"/activity","find-rank");
    }

    static getPopulars(success){
    	super.any(null,"GET",success,"/activity","find-popular");
    }

    static getRecomended(success){
    	super.any(null,"GET",success,"/activity","find-recomended");
    }
    static getPdfs(success){
        super.any(null,"GET",success,"/pdfs","find-pdfs");
    }
    static findAll(method,success){
        super.any(null,method,success,"activity","find-all");
    }
}
