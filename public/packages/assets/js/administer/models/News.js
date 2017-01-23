class News extends CORM{

	constructor(data){
	    super();
	    this.news = {
	        data: data
	    }
	    super.setPrefix('/news');
    }

	static save(success){
		super.any(null,success,'/news','save');
	}

	static update(id,method,success){
		this.news.id = id;
		super.update(this.news,method,success)
	}

	static delete(id,method,success){
		super.delete({id:id},method,success,'/news');
	}

	static get(success){
		super.any(null,success,'/news','get');
	}

}
