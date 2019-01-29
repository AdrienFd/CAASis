var db=require('../db_local');

var Like={

    getAllLikes:function(callback){
        return db.query("Select * from like_img",callback);

    },

    getLikeById:function(id,callback){
        return db.query("select * from like_img where id_img = ?",[id],callback);
    },

    addLike:function(Like,callback){
        return db.query("Insert into like_img(id_img,id_member) values(?,?)",[Like.id_img, Like.id_member],callback);
    },

    deleteLike:function(id,callback){
        return db.query("delete from like_img where id_img=?",[id],callback);
    },

    updateLike:function(id,Like,callback){
        return db.query("Update like_img set id_member=? where id_img = ?and id_member=?",[Like.id_img,id,secid],callback);
    },
}
module.exports=Like;