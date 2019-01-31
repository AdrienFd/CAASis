//database implementation
var db=require('../db_local');

// Function declarations for GET POST DELETE and PUT method
var Command={

    getAllCommands:function(callback){
        return db.query("Select * from command",callback);

    },

    getCommandById:function(id,callback){
        return db.query("select * from command where id_purchase = ?",[id],callback);
    },

    addCommand:function(Command,callback){
        return db.query("Insert into command(id_article,id_purchase) values(?,?)",[Command.id_article, Command.id_purchase],callback);
    },

    deleteCommand:function(id,callback){
        return db.query("delete from command where id_purchase=?",[id],callback);
    },

    updateCommand:function(id,Command,callback){
        return db.query("Update command set id_article=? where id_purchase=? and id_article=?",[Command.id_article,id,secid],callback);
    },
}

//Export the object and his functions
module.exports=Command;