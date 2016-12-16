class CORM{
    constructor(){
        this.database = new Database();
    }

    setPrefix(prefix){
        this.prefix = prefix;
    }

    save(data,method,success){
        var options={};
        options.data = data;
        options.method = method;
        options.success = success;
        this.database.save(this.prefix,options);
    }

    update(data,method,success){
        var options={};
        options.data = data;
        options.method = method;
        options.success = success;
        this.database.update(this.prefix,options);
    }

    delete(data,method,success){
        var options={};
        options.data = data;
        options.method = method;
        options.success = success;
        this.database.delete(this.prefix,options);
    }

    static find(data,method,success,prefix){
        var options={};
        options.data = data;
        options.method = method;
        options.success = success;
        Database.find(prefix,options);
    }

    static all(method,success,prefix){
        var options={};
        options.method = method;
        options.success = success;
        Database.all(prefix,options);
    }

}
