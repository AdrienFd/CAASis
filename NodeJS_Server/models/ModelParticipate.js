var db=require('../db_local');

var Participate={

    getAllParticipates:function(callback){
        return db.query("Select * from participate",callback);

    },

    getParticipateById:function(id,callback){
        return db.query("select * from participate where id_manifestation = ?",[id],callback);
    },

    addParticipate:function(Participate,callback){
        return db.query("Insert into participate(id_manifestation,id_member) values(?,?)",[Participate.id_manifestation, Participate.id_member],callback);
    },

    deleteParticipate:function(id,callback){
        return db.query("delete from participate where id_manifestation=?",[id],callback);
    },

    updateParticipate:function(id,secid,Participate,callback){
        return db.query("Update participate set id_member=? where id_manifestation = ? and id_member=?",[Participate.id_manifestation,id,secid],callback);
    },
}
module.exports=Participate;