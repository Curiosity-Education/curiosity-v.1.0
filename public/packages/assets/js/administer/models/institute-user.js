class instituteUser extends CORM {

  constructor(data){
    super();
    this.institution = data;
    super.setPrefix('/institute-user');
  }

  static save(data,success){
    var ruta = "get-user-for-institute/"+data.range+"/"+data.id;
    console.log(data);
    console.log(ruta);
    super.any({},"GET",success,'/institute-user',ruta);
  }

  static deleteUsers(ids,success){
    var ruta = "delete-user-for-institute/"+data.idInstitute;
    console.log(data);
    super.any({ids:data.idsUser},"POST",success,'/institute-user',ruta);
  }
}
