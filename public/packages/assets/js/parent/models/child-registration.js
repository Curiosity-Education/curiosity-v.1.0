class childRegistration extends CORM{
  
    static getSons(success){
      super.any(null,"POST",success,"/parent","get-sons");
    }
}
