$(function(){

	/* Create graph of Daily goal ----------------------------------- */

	var container = $('#pg-Graph');

	var chart = new Chart(container,{
		type : 'doughnut',
         data : {
         labels : ["Juegos Terminados", "Faltantes"],
			 datasets : [{
                data : [3, 2],
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

	/* -------------------------------------------------------------- */

});
