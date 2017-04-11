class apadrinar extends CORM{

    constructor(data){
        super();
        this.datos = data;
        super.setPrefix('/apadrinar');
    }

    getChildren(method,success){
        $.ajax({
            url: '/apadrinar/get-children',
			type: 'POST',
			data: this.datos,
			cache: false,
			contentType: false,
			processData: false
        }).done(function(response){
           success(response);
        });
    }

    static any(data,method,success,prefix,pathRoute){
        super.any(data,method,success,prefix,pathRoute);
    }

}
