var newsCtrl = {

	formADD : $("#nw-formAdd"),
	pdf : $("#nw_pdf"),
	formEDIT : $("#nw-formEdit"),
	pdf_edit : $("#nw_pdfEdit"),

	fileWeight : function($input){
		var exts = new Array(".pdf");
		var $file = $input;
		var maxMegas = 2;
		if ($file.val() != ""){
			if(Curiosity.file.validExtension($file.val(), exts)){
				var files = Curiosity.file.validSize($file.attr("id"), maxMegas);
				if (files != null){
				   $("#nw-pdfName").val(files.name);
				   $("#nw-pdfEditname").val(files.name);
				}
				else{
				   $("#nw-pdfName").val("");
				   $("#nw-pdfEditname").val("");
				   $file.val("");
				   Curiosity.noty.warning("El archivo excede los "+maxMegas+" MB máximos permitidos", "Demasiado grande");
				}
			 }
			 else{
				$file.val("");
				Curiosity.noty.info("Selecciona un archivo PDF", "Formato invalido");
			 }
		  }
	},

	save : function(){
		this.formADD.validate({
			rules:{
				title_new:{
					required:true,
					remote:{
						url:'/news/title',
						type:"POST",
						data:{
							function(){
								return $("#title_new").val();
							}
						} // c-data
					} // c-remote
				}, // c-title
				nw_pdf:{required:true}
			}, // c-rules
			messages:{
				title_new:{required:'Ingresa un titulo', remote:'Este titulo ya existe'},
				nw_pdf:{required:'Ingresa el link'}
			} // c-messages
		}); // c-validate

		if(this.formADD.valid()){
			var formData = new FormData((this.formADD)[0]);
			formData.append("title",$("#title_new").val());
			var newDad = new News(formData);
			Curiosity.toastLoading.show();
			newDad.save("POST", this.alert);
		}
		//console.log("llego al controlador");
	},

	update : function(id,success){
		News.update(id,"POST",success);
	},

	delete : function(id,success){
		News.delete(id,"POST",success);
	},

	get : function(success){
		News.get(success);
	},

	title: function(success){
		News.title(success);
	},

	alert : function(response){
		Curiosity.toastLoading.hide();
		switch (response.status){

			case 200:
				Curiosity.noty.success("Novedad Guardada","Exitoso");
				break;
			case "CU-103":
				Curiosity.noty.warning("Esta novedad ya existe","Atención");
				break;
			case "CU-104":
				$.each(response.data, function(index, value){
					Curiosity.noty.warning(message,"Algo va mal");
				});
				break;
			default:
				Curiosity.noty.error("Consulta con el administrador","Error desconocido");
				break;
		} // c-switch
	}

};
