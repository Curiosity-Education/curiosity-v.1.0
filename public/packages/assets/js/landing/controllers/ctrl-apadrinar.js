var apadrinarController = {

    instID : null,

    setinstID : function($id){
        this.instID = $id;
    },

    getChildren : function($idInst){
        var id_ = new FormData();
        id_.append('id',$idInst);

        var children = new apadrinar(id_);
        children.getChildren("POST",this.makeCardChild);
    },

    makeCardChild : function(response){

        $('#displayChildren').empty();

        $.each(response.data,function(i,o){

            if(o.apadrinado == 1){

                var cardWith = "<div class='col-md-3'>"+
                        "<div class='card'>"+
                            "<img class='img-fluid' src='/packages/assets/media/images/instituciones/children/"+o.foto+"' alt='Card image cap'>"+
                            "<div class='card-block'>"+
                                "<h5 class='blue-text-ce'><i class='fa fa-star colorStar'></i>&nbsp; Apadrinado</h5>"+
                                "<h4 class='card-title text-xs-center'>"+o.nombre+"</h4>"+
                                "<h5 class='card-title text-xs-center'>"+o.apellidos+"</h5>"+
                                "<center><a href='#' data-foto="+o.foto+" data-childid="+o.id+" data-childname="+o.nombre+" class='btn btn-rounded btn-homesChild disabled'>Apadrinar</a></center>"+
                            "</div>"+
                        "</div>"+
                    "</div>";

                $('#displayChildren').append(cardWith);

               }else{

                   var cardOut = "<div class='col-md-3'>"+
                        "<div class='card'>"+
                            "<img class='img-fluid gris' src='/packages/assets/media/images/instituciones/children/"+o.foto+"' alt='Card image cap'>"+
                            "<div class='card-block'>"+
                                "<h5 class='blue-text-ce'><i class='fa fa-star-o colorStar'></i>&nbsp; Sin apadrinar</h5>"+
                                "<h4 class='card-title text-xs-center'>"+o.nombre+"</h4>"+
                                "<h5 class='card-title text-xs-center'>"+o.apellidos+"</h5>"+
                                "<center><a href='#' data-foto="+o.foto+" data-toggle='modal' data-target='#modal-apadrinar' data-childid="+o.id+" data-childname="+o.nombre+" class='btn btn-rounded btn-homesChild'>Apadrinar</a></center>"+
                            "</div>"+
                        "</div>"+
                    "</div>";

                   $('#displayChildren').append(cardOut);
               }

        });




    }

}
