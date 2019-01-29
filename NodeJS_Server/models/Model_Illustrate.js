var db=require('../db_local');

var Illustration={

    getAllIllustrations:function(callback){
        return db.query("Select * from illustrate_manifestation",callback);

    },

    getIllustrationById:function(id,callback){
        return db.query("select * from illustrate_manifestation where id_manifestation = ?",[id],callback);
    },

    addIllustration:function(Illustration,callback){
        return db.query("Insert into illustrate_manifestation(id_img,id_manifestation) values(?,?)",[Illustration.id_img, Illustration.id_manifestation],callback);
    },

    deleteIllustration:function(id,secid,callback){
        return db.query("delete from illustrate_manifestation where id_img=? and id_manifestation=?",[id,secid],callback);
    },

    updateIllustration:function(id,secid,Illustration,callback){
        return db.query("Update illustrate_manifestation set id_img=? where id_img=? and id_manifestation=?",[Illustration.id_img,id,secid],callback);
    },
}
module.exports=Illustration;