class Level extends CORM {
    constructor(name){
        super();
        this.teacher = { name : name }
        super.setPrefix('/levels');
    }
    save(method,success){
        super.save(this.teacher,method,success);
    }
    update(id,method,success){
        this.teacher.id = id;
        super.update(this.teacher,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/levels');
    }
    static all(method,success){
        super.all(method,success,'/levels');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/levels');
    }
}
