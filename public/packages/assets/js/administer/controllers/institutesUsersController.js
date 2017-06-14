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

  delete : function(ids,idInstitute){

		if (ids != null || ids.length>0) {
			Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
				 if(input == "ELIMINAR" || input == "eliminar"){
					 	  Curiosity.toastLoading.show();
              data = {
                idsUser : ids,
                idInstitute : idInstitute
              };
						  instituteUser.deleteUsers(data,function(response){
              if(response.status == 200){
                toastr.success("Bien hecho.");
                window.location.reload();
              }
              console.log(response);
					  });
				 }else {
				 	  Curiosity.noty.info("Lo sentimos, La palabra escrita no es correcta")
				 }
		 });
		}
	},

  


}
