class Secuence extends CORM {
    constructor(name, intelligence){
        super();
        this.secuence = {
           nombre : name,
           inteligencia : intelligence
        }
        super.setPrefix('/admin-secuence');
    }
    save(method,success){
        super.save(this.secuence,method,success);
    }
    update(id,method,success){
        this.secuence.id = id;
        super.update(this.secuence,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-secuence');
    }
    static all(method,success){
        super.all(method,success,'/secuence');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/secuence');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/secuence',pathRoute);
   }
}
