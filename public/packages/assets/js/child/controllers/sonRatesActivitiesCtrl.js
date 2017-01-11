var sonRatesActivitiesCtrl = {
	save : function(data){
		if(typeof data == "object"){
			console.log(data);
			var sonRatesActivity = new SonRatesActivity(data.qualification);
			sonRatesActivity.save("POST",function(response){
				//toastr.success(response.message);
				console.log(response);
			});
		}else{
			console.error("The object parameter should be an object");
		}
	},
	getCalification : function(success){
		SonRatesActivity.getCurrent("GET",success);
	}
}