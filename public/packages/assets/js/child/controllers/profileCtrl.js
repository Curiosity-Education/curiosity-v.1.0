var profileController = {

	id : null,

	setId : function($id){
		this.id = $id;
	},

	getGamesDay : function(){
		Profile.getGamesDay(this.makeGraph);
	},

	getCardsData : function(){
		Profile.getCardsData();
	},

	makeGraph : function(response){
		var container = document.getElementById("pf-makeGraph");

		var chart = new Chart(container,{
			type : 'doughnut',
			 data : {
			 labels : ["Juegos Terminados", "Faltantes"],
				 datasets : [{
					data : [response.finish, response.slopes],
					backgroundColor : ["#3cb54a", "rgba(255, 255, 255, 1)"],
					hoverBackgroundColor : ["#007E33", "rgba(195, 228, 199, 1)"],
					borderColor : ["#3cb54a", "rgba(195, 228, 199, 1)"],
					borderWidth : [1, 1]
				 }]
			 },
			 animation : {
					animateScale : true
			 },
			 options : {
					responsive : true
			 }
		});
	}
}
