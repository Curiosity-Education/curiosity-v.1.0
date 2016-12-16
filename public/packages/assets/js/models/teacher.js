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
    delete(id,method,success){
        this.teacher.id = id;
        super.delete(this.teacher,method,success);
    }
    static all(method,success){
        super.all(method,success,'/teachers');
    }
    static find(id,method,success){
        super.all({id:id},method,success,'/teachers');
    }
}
