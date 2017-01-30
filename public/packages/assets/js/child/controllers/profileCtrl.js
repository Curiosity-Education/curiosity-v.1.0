var profileController = {

	id : null,

	setId : function($id){
		this.id = $id;
	},

	getGamesDay : function(){
		Profile.getGamesDay(this.makeGraph);
	},

	getCardsData : function(){
		Profile.getCardsData(this.makeCards);
	},

	makeGraph : function(response){

		var m,a, missing;
		$.each(response['data'],function(i,o){
			m = o['meta'];
			a = o['avance'];
		});

		missing = m - a;

		console.log();

		if(a == 0){
			$('#pf-text-missing').text('¡ Vamos, te invitamos a comenzar tu meta !');
			var container = $("#pf-Graph");

			var chart = new Chart(container,{
				type : 'doughnut',
				 data : {
				 labels : ["Juegos Terminados", "Faltantes"],
					 datasets : [{
						data : [a, missing],
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
		}else{
			var container = $("#pf-Graph");

			var chart = new Chart(container,{
				type : 'doughnut',
				 data : {
				 labels : ["Juegos Terminados", "Faltantes"],
					 datasets : [{
						data : [a, missing],
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
	},

	makeCards : function(response){

		$.each(response['data'],function(i,o){

			$('#pf-text-CardExperience').text(o['cantidad_exp']+' Pts');
			$('#pf-text-CardCoins').text(o['coins']+' CC');
			$('#pf-text-CardGoalDialy').text(o['nombre']);
			$('#pf-img-CardGoalDialy').attr('src',"packages/assets/media/images/child/"+o['emoji']);

			profileController.experience(o['nombre'],o['cantidad_exp']);
			profileController.coins(o['nombre'],o['coins']);
		});

	},

	experience : function(meta,exp){

		switch (meta){
				case 'Emocionado':
					// card experience
					$('#pf-bg-experience').removeClass('pf-default');
					$('#pf-text-CardExperience').removeClass('pf-default');

					if(exp < 700){
						// card experience
						$('#pf-bg-experience').addClass('pf-warning');
						$('#pf-text-CardExperience').addClass('pf-warning');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-warning.png");

					}else if(exp >= 700 && exp <= 1200){
						// card experience
						$('#pf-bg-experience').addClass('pf-good');
						$('#pf-text-CardExperience').addClass('pf-good');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-good.png");

					}else{
						// card experience
						$('#pf-bg-experience').addClass('pf-perfect');
						$('#pf-text-CardExperience').addClass('pf-perfect');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-perfect.png");

					}

					break;

				case 'Normal':
					// card experience
					$('#pf-bg-experience').removeClass('pf-default');
					$('#pf-text-CardExperience').removeClass('pf-default');

					if(exp < 500){
						// card experience
						$('#pf-bg-experience').addClass('pf-warning');
						$('#pf-text-CardExperience').addClass('pf-warning');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-warning.png");

					}else if(exp >= 500 && exp <= 1000){
						// card experience
						$('#pf-bg-experience').addClass('pf-good');
						$('#pf-text-CardExperience').addClass('pf-good');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-good.png");

					}else{
						// card experience
						$('#pf-bg-experience').addClass('pf-perfect');
						$('#pf-text-CardExperience').addClass('pf-perfect');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-perfect.png");

					}

					break;

				case 'Relajado':
					// card experience
					$('#pf-bg-experience').removeClass('pf-default');
					$('#pf-text-CardExperience').removeClass('pf-default');

					if(exp < 300){
						// card experience
						$('#pf-bg-experience').addClass('pf-warning');
						$('#pf-text-CardExperience').addClass('pf-warning');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-warning.png");

					}else if(exp >= 300 && exp <= 800){
						// card experience
						$('#pf-bg-experience').addClass('pf-good');
						$('#pf-text-CardExperience').addClass('pf-good');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-good.png");

					}else{
						// card experience
						$('#pf-bg-experience').addClass('pf-perfect');
						$('#pf-text-CardExperience').addClass('pf-perfect');
						$('#pf-img-CardExperience').attr('src',"packages/assets/media/images/child/emoji-perfect.png");

					}

					break;
			}
	},

	coins : function(meta,coi){

		switch (meta){
				case 'Emocionado':
					// card coins
					$('#pf-bg-coins').removeClass('pf-default');
					$('#pf-text-CardCoins').removeClass('pf-default');

					if(coi < 500){
						// card coins
						$('#pf-bg-coins').addClass('pf-warning');
						$('#pf-text-CardCoins').addClass('pf-warning');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-warning.png");

					}else if(coi >= 500 && coi <= 1200){
						// card coins
						$('#pf-bg-coins').addClass('pf-good');
						$('#pf-text-CardCoins').addClass('pf-good');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-good.png");

					}else{
						// card coins
						$('#pf-bg-coin').addClass('pf-perfect');
						$('#pf-text-CardCoins').addClass('pf-perfect');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-perfect.png");

					}

					break;

				case 'Normal':
					// card coins
					$('#pf-bg-coins').removeClass('pf-default');
					$('#pf-text-CardCoins').removeClass('pf-default');

					if(coi < 200){
						// card coins
						$('#pf-bg-coins').addClass('pf-warning');
						$('#pf-text-CardCoins').addClass('pf-warning');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-warning.png");

					}else if(coi >= 200 && coi <= 800){
						// card coins
						$('#pf-bg-coins').addClass('pf-good');
						$('#pf-text-CardCoins').addClass('pf-good');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-good.png");

					}else{
						// card coins
						$('#pf-bg-coins').addClass('pf-perfect');
						$('#pf-text-CardCoins').addClass('pf-perfect');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-perfect.png");

					}

					break;

				case 'Relajado':
					// card coins
					$('#pf-bg-coins').removeClass('pf-default');
					$('#pf-text-CardCoins').removeClass('pf-default');

					if(coi < 300){
						// card coins
						$('#pf-bg-coins').addClass('pf-warning');
						$('#pf-text-CardCoins').addClass('pf-warning');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-warning.png");

					}else if(coi >= 300 && coi <= 700){
						// card coins
						$('#pf-bg-coins').addClass('pf-good');
						$('#pf-text-CardCoins').addClass('pf-good');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-good.png");

					}else{
						// card coins
						$('#pf-bg-coins').addClass('pf-perfect');
						$('#pf-text-CardCoins').addClass('pf-perfect');
						$('#pf-img-CardCoins').attr('src',"packages/assets/media/images/child/emoji-perfect.png");

					}

					break;
			}
	}
}
