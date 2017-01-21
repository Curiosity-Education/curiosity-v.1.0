class libraryPdfs extends CORM{

    constructor(){
	    super();

	    super.setPrefix('/pdfs');
    }

    static getIntelligences(success){
      super.any(null,"POST",success,"/intelligences","all");
    }

    static getLevels(success){
      super.any(null,"POST",success,"/levels","all");
    }

    static getBlocks(success){
      super.any(null,"POST",success,"/blocks","all");
    }

    static getTopics(success){
      super.any(null,"POST",success,"/topics","all");
    }

    static getPdfs(success){
      super.any(null,"POST",success,"/pdfs","all");
    }

}
