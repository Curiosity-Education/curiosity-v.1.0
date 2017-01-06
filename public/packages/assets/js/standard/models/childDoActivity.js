// Model childDoActivity
class ChildDoActivity extends CORM {
    constructor(score,efficiency,hits,mistakes,average){
        super();
        this.childDoActivity = {
            score     : score,
            efficiency: efficiency,
            hits      : hits,
            mistakes  : mistakes,
            average   : average
        }
        super.setPrefix('/childDoActivities');
    }
    save(method,success){
        super.save(this.childDoActivity,method,success);
    }
    update(id,method,success){
        this.childDoActivity.id = id;
        super.update(this.childDoActivity,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/childDoActivities');
    }
    static all(method,success){
        super.all(method,success,'/childDoActivities');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/childDoActivities');
    }
}
