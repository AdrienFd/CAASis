//database implementation
var db=require('../db_local');

// Function declarations for GET POST DELETE and PUT method
var Vote={

    getAllVotes:function(callback){
        return db.query("Select * from vote",callback);

    },

    getVoteById:function(id,callback){
        return db.query("select * from vote where id_manifestation = ?",[id],callback);
    },

    addVote:function(Vote,callback){
        return db.query("Insert into vote(id_manifestation,id_member) values(?,?)",[Vote.id_manifestation, Vote.id_member],callback);
    },

    deleteVote:function(id,callback){
        return db.query("delete from vote where id_member=?",[id],callback);
    },

    updateVote:function(id,secid,Vote,callback){
        return db.query("Update vote set id_member where id_manifestation = ? and id_member=?",[Vote.id_member,id,secid],callback);
    },
}

//Export the object and his functions
module.exports=Vote;