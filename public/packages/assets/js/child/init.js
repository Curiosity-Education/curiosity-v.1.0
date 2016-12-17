addEvent("click",document.getElementsByClassName("btn-view-more"));

function addEvent(nameEvent,elements){
	for(var i=0;i<elements.length;i++){
		elements[i].addEventListener(nameEvent,function(evt){
			var cardContenido = document.getElementById("card-container-games");//obtenemos la tarjeta donde mostraremos el contenido de los juegos
			cardContenido.setAttribute("class",cardContenido.getAttribute("class")+" show-efect");
			var containerCards = evt.target.parentNode.parentNode.parentNode.parentNode.parentNode;
			containerCards.setAttribute("class",containerCards.getAttribute("class")+" hide-efect");
		},false);
	}
}