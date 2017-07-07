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
    super.any(id,"POST",success,'/institutions','deleteInsti');
  }

  static infoInsti(id,success){
    super.any({id:id},"POST",success,"/institutions","info");
  }

  update(id,success){
    this.institution.append('id', id);
    super.update(this.institution,"POST",success);
  }

}
