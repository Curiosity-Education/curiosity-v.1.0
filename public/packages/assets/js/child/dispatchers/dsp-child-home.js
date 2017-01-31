$(function(){
	var ac_recents,ac_populars,ac_ranks,ac_recomended,videos;// variables for save all information handled in this view;
	activityCtrl.getAll(function(response){//get all information
		console.log(response);
		// ac_recents    = response.data.recents;//activities recentes
		// ac_populars   = response.data.populars;//Activities populars
		// ac_ranks      = response.data.ranks;//Activities ranks
		// ac_recomended = response.data.recomended;//Activities recomendeds
		// videos        = null;//videos
		StorageDB.table.create("ac_recents", response.data.recents);
		StorageDB.table.create("ac_populars", response.data.populars);
		StorageDB.table.create("ac_ranks", response.data.ranks);
		StorageDB.table.create("ac_recomended", response.data.recomended);
	});

	$(".btn-show-information").click(function(event){//click in card
		var type = this.getAttribute("data-type");
		switch(type){
			case "ranks":
				// object.fillContetnFromDataRanks(ac_ranks);
				object.fillContetnFromDataRanks(StorageDB.table.getData(ac_ranks));
			break;
			case "recents":
				// object.fillContetnFromData(ac_recents);
				object.fillContetnFromData(StorageDB.table.getData(ac_recents));
			break;
			case "recomended":
				// object.fillContetnFromData(ac_recomended);
				object.fillContetnFromData(StorageDB.table.getData(ac_recomended));
			break;
			case "populars":
				// object.fillContetnFromData(ac_populars);
				object.fillContetnFromData(StorageDB.table.getData(ac_populars));
			break;
		}
	});

	$("#in-content-activity").on("click",".btn-play-game",function(event){// event click for get view game
		var activityId = $(this).data("activity");
		if(activityId!=undefined){
			var location = "/childDoActivities/game-"+activityId;
			document.location = location;
		}
		console.log(activityId);
	});

	object  = {//object for set function used in this view
		fillContetnFromData: function(data){//function for fill activities container, of data
			$("#in-content-activity").empty();
			var conetentHTML;
			conetentHTML = "<div class='row'>";
			for(var i=0;i<data.length;i++){
				if(i<6){
					conetentHTML += '<div class="col-md-4 col-sm-4">'+
                        '<div class="card-game">'+
                            '<div class="view overlay hm-white-slight card-content-game">'+
                              '<img class="img-fluid" src="/packages/assets/media/images/games/wallpapers/'+data[i].wallpaper+'" alt="Card image cap">'+
                              '<a href="#" data-toggle="modal" data-target="#quick-look-ex">'+
                                '<div class="mask waves-effect waves-light">'+
                                  '<div class="flex-center">'+
                                    '<a class="btn btn-lg btn-warning btn-rounded waaves-effect btn-play-game" data-activity="'+data[i].id+'"><i class="fa fa-gamepad left"></i> Jugar</a>'+
                                  '</div>'+
                                '</div>'+
                              '</a>'+
                            '</div>'+
                          '<div class="card-footer-game text-center">'+
                            '<span class="card-title">'+data[i].topicName+'</span>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                 	if(i==2){
                 		conetentHTML +="</div>";
                 		conetentHTML +="<div class='row'>";
                 	}
				}
			}
			conetentHTML += "</div>";
			$("#in-content-activity").append(conetentHTML);
		},
		fillContetnFromDataRanks: function(ranks){
			$("#in-content-activity").empty();
			var conetentHTML;
			conetentHTML = "<div class='row'>";
			for(var i=0;i<ranks.length;i++){
				if(i<6){
					conetentHTML += '<div class="col-md-4 col-sm-4">'+
                        '<div class="card-game">'+
                            '<div class="view overlay hm-white-slight card-content-game">'+
                              '<img class="img-fluid" src="/packages/assets/media/images/games/wallpapers/'+ranks[i].activity[0].wallpaper+'" alt="Card image cap">'+
                              '<a href="#" data-toggle="modal" data-target="#quick-look-ex">'+
                                '<div class="mask waves-effect waves-light">'+
                                  '<div class="flex-center">'+
                                    '<a class="btn btn-lg btn-warning btn-rounded waaves-effect btn-play-game" data-activity="'+ranks[i].activity[0].id+'"><i class="fa fa-gamepad left"></i> Jugar</a>'+
                                  '</div>'+
                                '</div>'+
                              '</a>'+
                            '</div>'+
                          '<div class="card-footer-game text-center">'+
                          	'<ul class="curiosity-ranking animated bounceIn" data-stars="'+ranks[i].average+'" >'+
                              '<li class="star-text" style="display:none"></li>'+
                              '<li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Mala"></li>'+
                              '<li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Aceptable"></li>'+
                              '<li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Buena"></li>'+
                              '<li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Muy buena"></li>'+
                              '<li class="fa fa-star item-ranking" data-toggle="tooltip" data-placement="bottom" title="Excelente"></li>'+
                            '</ul>'+
                            '<span class="card-title">'+ranks[i].activity[0].topicName+'</span>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                 	if(i==2){
                 		conetentHTML +="</div>";
                 		conetentHTML +="<div class='row'>";
                 	}
				}
			}
			conetentHTML += "</div>";
			$("#in-content-activity").append(conetentHTML);
			var r = new Ranking();
			r.show("#fff");
		}
	}
});
