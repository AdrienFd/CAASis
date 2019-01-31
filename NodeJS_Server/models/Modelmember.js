//database implementation
var db=require('../db_national');

// Function declarations for GET POST DELETE and PUT method


var Member={

    getAllMembers:function(callback){
        return db.query("Select * from api_member",callback);

    },

    getMemberById:function(id,callback){
        return db.query("select * from api_member where id_member = ?",[id],callback);
    },

    addMember:function(Member,callback){
        return db.query("Insert into member(member_name,member_firstname,email,password,id_location,id_statut,activation_link) values(?,?,?,?,?,?,?)",[Member.member_name,Member.member_firstname,Member.email,Member.password,Member.id_location,Member.id_statut,Member.activation_link],callback);
    },

    deleteMember:function(id,callback){
        return db.query("delete from member where id_member=?",[id],callback);
    },

    updateMember:function(id,Member,callback){
        return db.query("Update Member set member_name=?,member_firstname=?,email=?,password=?,id_location=?,id_statut=?,activation_link=? where id_member = ?",[Member.member_name,Member.member_firstname,Member.email,Member.password,Member.id_location,Member.id_statut,Member.activation_link,id],callback);
    },

}

//Export the object and his functions
module.exports=Member;