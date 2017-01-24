class Parent extends CORM {
    constructor(data){
        super();
        this.parent = data;
        super.setPrefix('/parent');
    }
    save(method,success){
        super.save(this.parent,method,success);
    }
    update(id,method,success){
        this.parent.id = id;
        super.update(this.parent,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/parent');
    }
    static all(method,success){
        super.all(method,success,'/parent');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/parent');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/parent',pathRoute);
   }
}
