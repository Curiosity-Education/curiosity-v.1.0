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
        console.log(response.data);
    }

}
