var db=require('../db_local');

var Image={

    getAllImages:function(callback){
        return db.query("Select * from image",callback);

    },

    getImageById:function(id,callback){
        return db.query("select * from image where id_image = ?",[id],callback);
    },

    addImage:function(Image,callback){
        return db.query("Insert into image(img_name, img_url, img_likes, id_member) values(?,?,?,?)",[Image.img_name, Image.img_url, Image.img_like, Image.id_member],callback);
    },

    deleteImage:function(id,callback){
        return db.query("delete from image where id_img=?",[id],callback);
    },

    updateImage:function(id,Image,callback){
        return db.query("Update Image set img_name=?, img_url=?, img_likes=?, id_member=? where id_img = ?",[Image.img_name, Image.img_url, Image.img_like, Image.id_member, id],callback);
    },
}
module.exports=Image;