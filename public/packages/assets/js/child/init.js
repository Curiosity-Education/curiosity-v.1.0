addEvent("click",document.getElementsByClassName("btn-view-more"));

function addEvent(nameEvent,elements){
	for(var i=0;i<elements.length;i++){
		elements[i].addEventListener(nameEvent,function(evt){
			evt.target.setAttribute("class",evt.target.getAttribute("class")+" hide-efect");
		},false);
	}
}