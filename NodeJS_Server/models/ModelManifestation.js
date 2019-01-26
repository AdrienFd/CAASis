var db=require('../db_local');

var Manifestation={

    getAllManifestations:function(callback){
        return db.query("Select * from manifestation",callback);

    },

    getManifestationById:function(id,callback){
        return db.query("select * from manifestation where id_manifestation = ?",[id],callback);
    },

    addManifestation:function(Manifestation,callback){
        return db.query("Insert into manifestation(manifestation_name, manifestation_description, manifestation_recurrency, manifestation_frequency, manifestation_price, manifestation_date, manifestation_votes, manifestation_is_idea) values(?,?,?,?,?,?,?,?)",[Manifestation.manifestation_name, Manifestation.manifestation_description, Manifestation.manifestation_recurrency, Manifestation.manifestation_frequency, Manifestation.manifestation_price, Manifestation.manifestation_date, Manifestation.manifestation_votes, Manifestation.manifestation_is_idea],callback);
    },

    deleteManifestation:function(id,callback){
        return db.query("delete from manifestation where id_manifestation=?",[id],callback);
    },

    UpdateManifestation:function(id,Manifestation,callback){
        return db.query("Update manifestation set manifestation_name=?, manifestation_description=?, manifestation_recurrency=?, manifestation_frequency=?, manifestation_price=?, manifestation_date=?, manifestation_votes=?, manifestation_is_idea=? where id_manifestation = ?)",[Manifestation.manifestation_name, Manifestation.manifestation_description, Manifestation.manifestation_recurrency, Manifestation.manifestation_frequency, Manifestation.manifestation_price, Manifestation.manifestation_date, Manifestation.manifestation_votes, Manifestation.manifestation_is_idea, id],callback);
    },
}
module.exports=Manifestation;