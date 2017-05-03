var institutesUsersController = {

  save : function(id,range){
    Curiosity.toastLoading.show();
    var data = {
      range : range,
      id : id
    };
    instituteUser.save(data,function(response){
        console.log(response);
        var a = document.createElement("a");
        a.href = response.file; 
        a.download = response.name;
        document.body.appendChild(a);
        a.click();
        a.remove();
        document.location.reload();
    });
  },

  delete : function(id){

		if (id != null || id != "") {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
					 	  Curiosity.toastLoading.show();
						  Institution.delete(id,function(){
							window.location.reload();
					  });
				 }else {
				 	  Curiosity.noty.info("Lo sentimos, La palabra escrita no es correcta")
				 }
		 });
		}
	},

  


}
