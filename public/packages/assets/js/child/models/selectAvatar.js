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

	static selected(id,success){
		super.any({id:id},"POST",success,"/select-avatar","select-avatar");
	}
}
