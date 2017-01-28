class Profile extends CORM{

	constructor(data){
		super();
		this.profile = data;
		super.setPrefix('/profile-child');
	}

	static getGamesDay(success){
		super.any(null,"GET",success,"/profile-child","get-graph")
	}

	static getCardsData(){
		super.any(null,"GET",null,"/profile-child","get-cards")
	}


}
