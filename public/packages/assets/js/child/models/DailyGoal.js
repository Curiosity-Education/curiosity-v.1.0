class DailyGoal extends CORM {
   constructor() {}

   static updateConf(idGoal,method,success){
     this.goal = {
        id : idGoal
     }
     super.any(this.goal,method,success,'/child-goal','updateConf');
  }

  static getChildSelected(success){
     super.any(null, "POST", success, '/child-goal', 'getChildSelected');
  }
}
