class Game extends CORM {
    constructor(data){
        super();
        this.game = data;
        super.setPrefix('/activity-admin/game');
    }
    save(method,success){
        super.save(this.game,method,success);
    }
    update(id,method,success){
        this.game.append('id',id);
        super.update(this.game,method,success);
    }
    static delete(id,method,success){
        super.delete({id:id},method,success,'/activity-admin/game');
    }
    static all(method,success){
        super.all(method,success,'/activity-admin/game');
    }
    static find(id,method,success){
        super.find({id:id},method,success,'/activity-admin/game');
    }
    static any(data,method,success,pathRoute){
      super.any(data,method,success,'/activity-admin/game',pathRoute);
   }
}
