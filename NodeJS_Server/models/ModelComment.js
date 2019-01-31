//database implementation
var db=require('../db_local');

// Function declarations for GET POST DELETE and PUT method
var Image_comment={

    getAllComments:function(callback){
        return db.query("Select * from comment",callback);

    },

    getCommentById:function(id,callback){
        return db.query("select * from comment where id_comment = ?",[id],callback);
    },

    addComment:function(Image_comment,callback){
        return db.query("Insert into comment(comment_content, comment_approbate_date, id_member,id_img, id_member_approbator) values(?,?,?,?,?)",[Image_comment.comment_content, Image_comment.comment_approbate_date, Image_comment.id_member,Image_comment.id_img, Image_comment.id_member_approbator],callback);
    },

    deleteComment:function(id,callback){
        return db.query("delete from comment where id_comment=?",[id],callback);
    },

    updateComment:function(Image_comment,callback){
        return db.query("Update comment set comment_content=?,comment_approbate_date=?,id_member=?, id_member_approbator=? where id_comment = ?",[Image_comment.comment_content,Image_comment.comment_approbate_date, Image_comment.id_member, Image_comment.id_member_approbator],callback);
    },
}

//Export the object and his functions
module.exports=Image_comment;