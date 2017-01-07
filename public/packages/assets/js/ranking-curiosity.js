class Ranking { //object for ranking in curiosity
	constructor(){
		ranking.color =  "#2262ae";
		ranking.stars =0;
	}
	init(){
		var these = this;
		$.each($(".curiosity-ranking"),function(indx,object){
			object.style = "display:block";
			ranking.stars = (Math.floor(object.getAttribute("data-stars")));
			$(object).find(".star-text").text(object.getAttribute("data-stars"));
			$.each($(object).children(),function(index,obj){
				obj.addEventListener("mouseover",these.hoverStar,false);
				if(index <=ranking.stars){
					obj.style="color:"+ranking.color+";";
				}
			});
		});
	}

	hoverStar(event){
		var starIndex = $(event.target).index();
		var these = Ranking.getContext();
		console.log(these);
		$.each($(event.target).parent().children(),function(index,object){
			if(index<=starIndex){
				console.log(these.color);
				object.style="color:"+these.color+";";
			}
		});
	}
}
var ranking = {
	this.color:"",
	this.stars:0
}