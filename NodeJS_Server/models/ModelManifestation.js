var db=require('../db_local');

var Manifestation={

    getAllManifestation:function(callback){
        return db.query("Select * from manifestation",callback);

    },

    getManifestationById:function(id,callback){
        return db.query("select * from manifestation where id_manifestation = ?",[id],callback);
    },

    addManifestation:function(Manifestation,callback){
        return db.query("Insert into manifestation(manifestation_name, manifestation_description, manifestation_recurrency, manifestation_frequency,manifestation_price,manifestation_date,manifestation_votes,manifestation_is_idea,manifestation_approbate_date,id_member_suggest,id_member_plan,id_member_approbator) values(?,?,?,?,?,?,?,?,?,?,?,?)",[Manifestation.manifestation_name, Manifestation.manifestation_description, Manifestation.manifestation_recurrency, Manifestation.manifestation_frequency,Manifestation.manifestation_price,Manifestation.manifestation_date,Manifestation.manifestation_votes,Manifestation.manifestation_is_idea,Manifestation.manifestation_approbate_date,Manifestation.id_member_suggest,Manifestation.id_member_plan,Manifestation.id_member_approbator],callback);
    },

    deleteManifestation:function(id,callback){
        return db.query("delete from article where id_manifestation=?",[id],callback);
    },

    updateManifestation:function(Manifestation,callback){
        return db.query("Update article set manifestation_name=?, manifestation_description=?, manifestation_recurrency=?, manifestation_frequency=?,manifestation_price=?,manifestation_date=?,manifestation_votes=?,manifestation_is_idea=?,manifestation_approbate_date=?,id_member_suggest=?,id_member_plan=?,id_member_approbator=? where id_manifestation=?",[Manifestation.manifestation_name, Manifestation.manifestation_description, Manifestation.manifestation_recurrency, Manifestation.manifestation_frequency,Manifestation.manifestation_price,Manifestation.manifestation_date,Manifestation.manifestation_votes,Manifestation.manifestation_is_idea,Manifestation.manifestation_approbate_date,Manifestation.id_member_suggest,Manifestation.id_member_plan,Manifestation.id_member_approbator,Manifestation.id_manifestation],callback);
    },
}
module.exports=Manifestation;