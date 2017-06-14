class Child extends CORM {
    constructor(data){
        super();
        this.child = {
            usuario     :data.usuario,
            nombre      :data.nombre,
            apellidos   :data.apellidos,
            password    :data.password,
            cpassword   :data.cpassword,
            genero      :data.genero,
            promedio    :data.promedio,
            grado       :data.grado
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
