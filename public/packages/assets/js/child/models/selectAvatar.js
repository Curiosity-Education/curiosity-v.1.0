class selectAvatar extends CORM{

	constructor(data){
		super();
		this.avatar = data;
		super.setPrefix('/select-avatar');
	}

	static getAvatars(success){
		super.any(null,"GET",success,"/select-avatar","get-avatar");
	}

	static getStyles(success){
		super.any(null,"GET",success,"/select-avatar","get-style");
	}

	save(method,success){

		$.ajax({
			url: '/select-avatar/save',
			type: 'POST',
			data: this.avatar,
			cache: false,
			contentType: false,
			processData: false
		}).done(function(response){
			success(response);
		})

	}
}
