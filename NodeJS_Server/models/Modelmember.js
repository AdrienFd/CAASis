var db=require('../db_national');
var jwt = require('jsonwebtoken');

var Member={

    getAllMembers:function(callback){
        return db.query("Select * from member",callback);

    },

    getMemberById:function(id,callback){
        return db.query("select * from member where id_member = ?",[id],callback);
    },

    addMember:function(Member,callback){
        return db.query("Insert into member(member_name,member_firstname,email,password,id_location,id_statut) values(?,?,?,?,?,?)",[Member.member_name,Member.member_firstname,Member.email,Member.password,Member.id_location,Member.id_statut],callback);
    },

    deleteMember:function(id,callback){
        return db.query("delete from member where id_member=?",[id],callback);
    },

    UpdateMember:function(id,Member,callback){
        return db.query("Update Member set member_name=?,member_firstname=?,email=?,password=?,id_location=?,id_statut=? where id_member = ?)",[Member.member_name,Member.member_firstname,Member.email,Member.password,Member.id_location,Member.id_statut,Member.id_member],callback);
    },

    LoginMember:function(Member,callback){
       return  user = [db.query("Select * from member where member_name=? and member_firstname=?  and member_email =? and member_password = ?",[Member.member_name,Member.member_firstname,Member.email,Member.password],callback)];

    }
}
module.exports=Member;