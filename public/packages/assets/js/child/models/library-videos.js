class libraryVideos extends CORM{

    constructor(){
	    super();
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

    static getVideos(success){
      super.any(null,"POST",success,"/video","all");
    }

    static getTeachers(success){
      super.any(null,"POST",success,"/teacher","all");
    }

    static getSchools(success){
      super.any(null,"POST",success,"/schoolasc","all");
    }

}
