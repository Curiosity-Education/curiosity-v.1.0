class Teacher extends CORM {
    constructor(name,age,school){
        super();
        this.teacher = {
            name:name,
            age:age,
            school:school
        }
        super.setPrefix('/teachers');
    }
    save(method,success){
        super.save(this.teacher,method,success);
    }
    update(id,method,success){
        this.teacher.id = id;
        super.update(this.teacher,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/teachers');
    }
    static all(method,success){
        super.all(method,success,'/teachers');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/teachers');
    }
}
