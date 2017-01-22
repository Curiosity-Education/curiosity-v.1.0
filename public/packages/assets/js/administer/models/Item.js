class Item extends CORM {
    constructor(name, intelligence){
        super();
        this.item = {
           nombre : name,
           inteligencia : intelligence
        }
        super.setPrefix('/admin-item');
    }
    save(method,success){
        super.save(this.item,method,success);
    }
    update(id,method,success){
        this.item.id = id;
        super.update(this.item,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-item');
    }
    static all(method,success){
        super.all(method,success,'/item');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/item');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/item',pathRoute);
   }
}
