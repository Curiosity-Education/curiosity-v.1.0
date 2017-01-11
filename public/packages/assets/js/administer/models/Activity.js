class Activity extends CORM {
    constructor(data){
        super();
        this.activity = data;
        super.setPrefix('/activity-admin');
    }
    save(method,success){
        super.save(this.activity,method,success);
    }
    update(id,method,success){
        this.activity.append('id',id);
        super.update(this.activity,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/activity-admin');
    }
    static all(method,success){
        super.all(method,success,'/activity-admin');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/activity-admin');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/activity-admin',pathRoute);
   }
}
