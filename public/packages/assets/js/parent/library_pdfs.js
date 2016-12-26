$(function(){

	/* Transitions of the Views ----------------------------------- */

	$('.lp-PDFselect').click(function(){
		$('#lp-row-showPDF').removeClass("lp-content-disabled");
		$('#lp-container-all').addClass("lp-content-disabled");

	}); // show PDF

	$('.lp-close').click(function(){
		$('#lp-row-showPDF').addClass("lp-content-disabled");
		$('#lp-container-all').removeClass("lp-content-disabled");
		$('#lp-container-all').addClass("fadeInUp");
	}); // close PDF

	$("body,html").keyup(function(evt){
		if(evt.keyCode==27){
			$(".lp-close").trigger("click");
		}
	}); // close PDF with "esc"

	/* ------------------------------------------------------------- */

});
