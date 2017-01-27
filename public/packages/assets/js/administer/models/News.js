class News extends CORM{

	constructor(formdata){
		super();
		this.new = formdata
		super.setPrefix('/news');
	}

	save(method,success){
		$.ajax({
			url: '/news/save',
			type: 'POST',
			data: this.new,
			cache: false,
			contentType: false,
			processData: false
		}).done(function(response){
			success(response);
		});
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
