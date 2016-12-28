class Database{

    constructor(){

    }

    static all(prefix,options){
        if(typeof options != "object"){
            options = {
                method:"GET",
                data:null,
                success:function(){

                }
            }
        }
        var path = prefix + '/all';
        Request.send(options.method,path,options.success,options.data);
    }
    static find(prefix,options){
        if(typeof options != "object"){
            options = {
                method:"GET",
                data:null,
                success:function(){

                }
            }
        }
        var path = prefix + '/find';
        Request.send(options.method,path,options.success,options.data);
    }
    save(prefix,options){
        if(typeof options != "object"){
            options = {
                method:"GET",
                data:null,
                success:function(){

                }
            }
        }
        var path = prefix + '/save';
        Request.send(options.method,path,options.success,options.data);
    }
    static delete(prefix,options){
        if(typeof options != "object"){
            options = {
                method:"GET",
                data:null,
                success:function(){

                }
            }
        }
        var path = prefix + '/delete';
        Request.send(options.method,path,options.success,options.data);
    }
    update(prefix,options){
        if(typeof options != "object"){
            options = {
                method:"GET",
                data:null,
                success:function(){

                }
            }
        }
        var path = prefix + '/update';
        Request.send(options.method,path,options.success,options.data);
    }

    static any(method,path,callback,data){
        Request.send(method,path,callback,data);
    }
}
