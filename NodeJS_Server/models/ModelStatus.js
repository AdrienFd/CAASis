var db=require('../db_national');

var Status={

    getAllStatus:function(callback){
        return db.query("Select * from statut",callback);
    },

    getStatusById:function(id,callback){
        return db.query("select * from statut where id_statut = ?",[id],callback);
    },

    addStatus:function(Status,callback){
        return db.query("Insert into statut(statut_name) values(?)",[Status.statut_name],callback);
    },

    deleteStatus:function(id,callback){
        return db.query("delete from statut where id_statut=?",[id],callback);
    },

    UpdateStatus:function(id,Status,callback){
        return db.query("Update statut set statut_name = ? where id_statut = ?)",[Status.statut_name, id],callback);
    },
}
module.exports=Status;