var db=require('../db_national');

var Statut={

    getAllStatuts:function(callback){
        return db.query("Select * from statut",callback);

    },

    getStatutById:function(id,callback){
        return db.query("select * from statut where id_statut = ?",[id],callback);
    },

    addStatut:function(Statut,callback){
        return db.query("Insert into statut(statut_name) values(?)",[Statut.statut_name],callback);
    },

    deleteStatut:function(id,callback){
        return db.query("delete from statut where id_statut=?",[id],callback);
    },

    UpdateStatut:function(id,Statut,callback){
        return db.query("Update Statut set statut_name=? where id_statut=?",[Statut.statut_name,Statut.id_statut],callback);
    },
}
module.exports=Statut;