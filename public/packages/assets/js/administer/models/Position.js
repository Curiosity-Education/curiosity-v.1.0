class Position extends CORM {
    constructor(formData){
        super();
        this.position = formData;
        super.setPrefix('/admin-position');
    }
    save(method,success){
      super.save(this.position,method,success);
    }
    update(id,method,success){
        this.position.append('id', id);
        super.update(this.position,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/admin-position');
    }
    static all(method,success){
        super.all(method,success,'/position');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/position');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/position',pathRoute);
   }
}
