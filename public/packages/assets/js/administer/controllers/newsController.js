var newsCtrl = {

	formADD : $("#nw-formAdd"),
	pdf : $("#nw_pdf"),
	formEDIT : $("#nw-formEdit"),
	pdf_edit : $("#nw_pdfEdit"),
	id : null,

	setId : function(id){
      this.id = id;
   },

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
				nw_pdf:{required:true},
				description_new:{
					required: true,
					maxlength: 250
				}
			}, // c-rules
			messages:{
				title_new:{required:'Ingresa un titulo', remote:'Este titulo ya existe'},
				nw_pdf:{required:'selecciona el pdf'}
			} // c-messages
		}); // c-validate

		if(this.formADD.valid()){
			var formData = new FormData((this.formADD)[0]);
			formData.append("title",$("#title_new").val());
			var newDad = new News(formData);
			Curiosity.toastLoading.show();
			newDad.save("POST", this.alert);
		}

	},

	update : function(){
		this.formEDIT.validate({
			rules:{
				title_newEdit:{
					required:true
				}, // c-title
				description_newEdit:{
					required: true,
					maxlength: 250
				}
			}, // c-rules
			messages:{
				title_newEdit:{required:'Ingresa un titulo'}
			} // c-messages
		}); // c-validate

		if(this.formEDIT.valid()){
			var formDataed = new FormData((this.formEDIT)[0]);
			formDataed.append("titleEdit",$("#title_newEdit").val());
			var newDadEdit = new News(formDataed);
			Curiosity.toastLoading.show();
			newDadEdit.update(this.id,"POST", this.alert);
		}
	},

	delete : function(id){
		Curiosity.toastLoading.show();
		News.delete(id,"POST",this.alert);
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
				Curiosity.noty.success(response.message,"Exitoso");
				setInterval(function(){
					location.reload(true);
				},'2300');
				break;
			case "CU-103":
				Curiosity.noty.warning("Esta novedad ya existe","Atención");
				break;
			case "CU-104":
				$.each(response.data, function(index, value){
					$.each(value, function(i, message){
						Curiosity.noty.warning(message, "Algo va mal");
				  	});
				});
				break;
			default:
				Curiosity.noty.error("Consulta con el administrador","Error desconocido");
				break;
		} // c-switch
	},

	deleteConfirm : function(){
		var $title = "Eliminar Novedad";
		var $text = "¿Estas seguro que deseas eliminar la novedad selecccionada?";
		var $type = "warning";
		var $id = this.id;
		Curiosity.notyConfirm($title, $text, $type, function(){ newsCtrl.delete($id); });
	}

};
