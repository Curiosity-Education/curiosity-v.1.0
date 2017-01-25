$(function(){
   $(".carousel").carousel();

	/* Transitions of the View ------------------------------------ */

	$('#hm-btn-HelpSon').click(function(){
		$('#hm-viewHelp').removeClass("hm-content-disabled");
		$('#hm-init').addClass("hm-content-disabled");

	}); // show HELP MY SON

	$('.hm-close').click(function(){
		$('#hm-init').removeClass("hm-content-disabled");
		$('#hm-viewHelp').addClass("hm-content-disabled");

	}); // hide HELP MY SON

        var ctx = document.getElementById("myChart").getContext("2d");
        var data = {
            labels: ["1ero", "2do", "3ero", "4to", "5to", "6to"],
            datasets: [
                {
                    label: "Matemáticas",
                    backgroundColor: "rgba(55, 106, 188, 0.4)",
                    borderColor: "rgb(33, 86, 172)",
                    pointBackgroundColor: "rgb(75, 120, 193)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [65, 59, 90, 81, 56, 60]
                },
                {
                    label: "General",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(255,99,132,1)",
                    data: [80, 92, 94, 100, 90, 82]
                }
            ]
        };
        var options ={
                scale: {
                    reverse: false,
                    ticks: {
                        beginAtZero: true
                    }
                }
        }
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: data,
            options: options
        });

});
