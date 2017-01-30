$(function(){


	/* Transitions of the View ------------------------------------ */

	$('#hm-btn-HelpSon').click(function(){
		$('#hm-viewHelp').removeClass("hm-content-disabled");
		$('#hm-init').addClass("hm-content-disabled");
        var info = $(this).data('topicLow');
        var arrayTopic = parentController.createArrayTopic(info);
        $.each(arrayTopic,function(i,item){
            $("#chp-contentTopics").append(parentController.itemTopic(item.id,item.nombre,info));
        });
	}); // show HELP MY SON

	$('.hm-close').click(function(){
		$('#hm-init').removeClass("hm-content-disabled");
		$('#hm-viewHelp').addClass("hm-content-disabled");

	}); // hide HELP MY SON




});
