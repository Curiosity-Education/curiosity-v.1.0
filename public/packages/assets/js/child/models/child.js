class Child extends CORM {
    constructor(data){
        super();
        this.child = {
            username  :data.username,
            name      :data.name,
            surnames  :data.surnames,
            password  :data.password,
            cpassword :data.cpassword,
            gender    :data.gender,
            average   :data.average,
            level     :data.level
        }
        super.setPrefix('/admin-child');
    }
    save(method,success){
        super.save(this.child,method,success);
    }

    static updateConf(data,method,success){
      this.child = {
          username  : data.username,
          pass      : data.pass,
          npass     : data.npass,
          cpass     : data.cpass
      }
      super.any(this.child,method,success,'/admin-child','updateConf');
   }
}
