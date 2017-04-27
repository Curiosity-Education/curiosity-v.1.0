"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Ranking = function () {
	//object for ranking in curiosity

	function Ranking() {
		_classCallCheck(this, Ranking);

		// in contructor set a values for default in this class
		ranking.colorActive = "#2262ae"; //colors of active stars
		ranking.colorUnActive = "rgba(46,46,46,0.75)"; //colors for unactive stars
		ranking.stars = 0; //number of stars in ranking
		ranking.averageStars = 0; //average of ranking
	}

	_createClass(Ranking, [{
		key: "show",
		value: function show(color) {
			ranking.colorActive = color; //colors of active stars
			ranking.colorUnActive = "rgba(46,46,46,0.75)"; //colors for unactive stars
			ranking.stars = 0; //number of stars in ranking
			ranking.averageStars = 0; //average of ranking
			$.each($(".curiosity-ranking"), function (indx, object) {
				//rut to rankings
				object.style = "display:block"; //show rankings
				ranking.averageStars = object.getAttribute("data-stars"); // get data stars
				ranking.stars = Math.floor(ranking.averageStars); // convert to int data stars
				$(object).find(".star-text").text(ranking.averageStars);
				ranking.runRankingSetColors($(object), ranking.stars);
			});
		}
	}, {
		key: "init",
		value: function init() {
			//init function
			this.setDatasToRankings();
		}
	}, {
		key: "setDatasToRankings",
		value: function setDatasToRankings() {
			//this function set values to ranking this date get from attribute data-stars in html
			var these = this;
			$.each($(".curiosity-ranking"), function (indx, object) {
				//rut to rankings
				object.style = "display:block"; //show rankings
				ranking.averageStars = object.getAttribute("data-stars"); // get data stars
				ranking.stars = Math.floor(ranking.averageStars); // convert to int data stars
				$(object).find(".star-text").text(ranking.averageStars);
				$.each($(object).children(), function (index, obj) {
					obj.addEventListener("mouseover", these.hoverStar, false);
					obj.addEventListener("mouseout", these.mouseOut, false);
					if (index <= ranking.stars) {
						obj.style = "color:" + ranking.colorActive + ";";
					}
				});
			});
		}
	}, {
		key: "uploadStars",
		value: function uploadStars(itemRanking, averageStars) {
			//upload data stars in ranking element
			if (averageStars > 5 && averageStars < 0) {
				//validate data parameter
				console.error("El segundo parametros recivido tiene que ser menor que 5 y mayor que 0");
			} else {
				//if data parameter is correct
				var parent = itemRanking.parentNode; // get ranking element(ul)
				var stars = Math.floor(averageStars); // convert to int data stars
				parent.setAttribute("data-stars", averageStars); //set new data stars to ranking
				$(parent).find(".star-text").text(averageStars); //set text of average stars
				ranking.runRankingSetColors($(parent), stars); // paint stars
			}
		}
	}, {
		key: "hoverStar",
		value: function hoverStar(event) {
			//hover event
			var starIndex = $(event.target).index();
			ranking.runRankingSetColors($(event.target.parentNode), starIndex);
		}
	}, {
		key: "mouseOut",
		value: function mouseOut(event) {
			// mouse over event
			var limitStars = Math.floor(event.target.parentNode.getAttribute("data-stars"));
			ranking.runRankingSetColors($(event.target.parentNode), limitStars);
		}
	}, {
		key: "setColorActive",
		value: function setColorActive(color) {
			//set new color in case active
			if (/^#[0-9][a-fA-F]{6}$/.test(color) || /^rgb\([0-9]{1,3}\,[0-9]{1,3}\,[0-9]{1,3}\)$/.test(color)) {
				ranking.colorActive = color;
			} else {
				console.error("El parametro de la funcion setBackgroundColor debe ser hexadecimal o rgb");
			}
		}
	}, {
		key: "setColorUnActive",
		value: function setColorUnActive(color) {
			//set new color in case unactive
			if (/^#[0-9][a-fA-F]{6}$/.test(color) || /^rgb\([0-9]{1,3}\,[0-9]{1,3}\,[0-9]{1,3}\)$/.test(color)) {
				ranking.colorUnActive = color;
			} else {
				console.error("El parametro de la funcion setBackgroundColor debe ser hexadecimal o rgb");
			}
		}
	}, {
		key: "setEventClick",
		value: function setEventClick(clickfunction) {
			if ($.isFunction(clickfunction)) {
				$(".curiosity-ranking>li.item-ranking").click(clickfunction);
			} else {
				console.error("El parametro recibido tiene que ser una función");
			}
		}
	}]);

	return Ranking;
}();

;

var ranking = { //object with values to use in this class
	colorActive: "",
	colorUnActive: "",
	stars: 0,
	averageStars: 0,
	runRankingSetColors: function runRankingSetColors(rankingElement, limitStars) {
		//run to item ranking for set stars
		$.each(rankingElement.children(), function (index, object) {
			if (index <= limitStars) {
				object.style = "color:" + ranking.colorActive + ";";
			} else {
				object.style = "color:" + ranking.colorUnActive + ";";
			}
		});
	}
};
//end of document