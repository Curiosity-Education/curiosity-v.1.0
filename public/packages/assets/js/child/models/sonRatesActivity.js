// Example of model "Teacher"
class SonRatesActivity extends CORM {
    constructor(qualification){
        super();
        this.sonRatesActivity = {
            qualification:qualification
        }
        super.setPrefix('/sonRatesActivity');
    }
    save(method,success){
        super.save(this.sonRatesActivity,method,success);
    }
    update(id,method,success){
        this.sonRatesActivity.id = id;
        super.update(this.sonRatesActivity,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/sonRatesActivity');
    }
    static all(method,success){
        super.all(method,success,'/sonRatesActivity');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/sonRatesActivity');
    }
    static getCurrent(method,success){
        super.find(null,method,success,'/sonRatesActivity');
    }
}
