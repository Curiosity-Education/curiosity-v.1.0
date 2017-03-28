class Institution extends CORM {

  constructor(formData){
    super();
    this.institution = formData;
    super.setPrefix('/institutions');
  }

  static allInstitutes(success){
    super.any(null,"POST",success,"/institutions","all");
  }

  static allStates(success){
    super.any(null,"POST",success,"/state","all");
  }

  static allCities(success){
    super.any(null,"POST",success,"/cities","all");
  }

  save(success){
    super.save(this.institution,"POST",success);
  }

  static deleteInsti(id,success){
    super.delete({id:id},"POST",success,'/institutions');
  }

  static infoInsti(id,success){
    super.any({id:id},"POST",success,"/institutions","info");
  }

}
