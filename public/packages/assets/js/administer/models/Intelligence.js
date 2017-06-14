class Intelligence extends CORM {
    constructor(name, description, level){
        super();
        this.intelligence = {
           nombre : name,
           descripcion : description,
           nivel : level
        }
        super.setPrefix('/intelligences');
    }
    save(method,success){
        super.save(this.intelligence,method,success);
    }
    update(id,method,success){
        this.intelligence.id = id;
        super.update(this.intelligence,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/intelligences');
    }
    static all(method,success){
        super.all(method,success,'/intelligences');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/intelligences');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/intelligences',pathRoute);
   }
}
