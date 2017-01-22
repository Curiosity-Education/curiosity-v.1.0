$(function(){
	var ac_recents,ac_populars,ac_ranks,ac_recomended,videos;// variables for save all information handled in this view;
	var rankiing = new Ranking();
	activityCtrl.getAll(function(response){//get all information
		console.log(response);
		ac_recents    = response.data.recents;//activities recentes 
		ac_populars   = response.data.populars;//Activities populars
		ac_ranks      = response.data.ranks;//Activities ranks
		ac_recomended = response.data.recomended;//Activities recomendeds
		videos        = null;//videos
	});

	$(".btn-show-information").click(function(event){//click in card
		var type = this.getAttribute("data-type");
		switch(type){
			case "ranks":
				//object.fillContetnFromData(ac_ranks);
			break;
			case "recents":
				object.fillContetnFromData(ac_recents);
			break;
			case "recomended":
				object.fillContetnFromData(ac_recomended);
			break;
			case "populars":
				object.fillContetnFromData(ac_populars);
			break;
		}
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
                                    '<a class="btn btn-lg btn-outline-info btn-rounded waaves-effect"><i class="fa fa-gamepad left"></i> Jugar</a>'+
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
		}
	}
});
