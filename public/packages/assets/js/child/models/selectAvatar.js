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

	static selected(id_,success){

		var ID = 1;

		super.any({id:ID},"GET",success,"/select-avatar","selected");
	}
}
