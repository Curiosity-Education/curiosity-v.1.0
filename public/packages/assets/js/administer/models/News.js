class News extends CORM{

	constructor(formdata){
		super();
		this.news = {
			data: formdata
		}
		super.setPrefix('/news');
	}

	save(method,success){
		super.save(this.news,method,success);
	}

	update(id,method,success){
		this.news.id = id;
		super.update(this.news,method,success);
	}

	static delete(id,method,success){
		super.delete({id:id},method,success,'/news');
	}

	static get(success){
		super.any(null,"GET",success,"/news","get");
	}

	static title(success){
		super.any(null,"POST",success,"/news","title")
	}

}
