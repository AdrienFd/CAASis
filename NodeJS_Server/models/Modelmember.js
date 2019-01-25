var db=require('../db_connections');

var Member={

    getAllMembers:function(callback){
        return db.query("Select * from member",callback);

    },

    getMemberById:function(id,callback){
        return db.query("select * from member where id_member = ?",[id],callback);
    },

    addMember:function(Member,callback){
        return db.query("Insert into member(member_name,member_firstname,email,password,id_location,id_status) values(?,?,?,?,?,?)",[Member.name,Member.firstname,Member.email,Member.password,Member.id_location,Member.id_status],callback);
    },

    deleteMember:function(id,callback){
        return db.query("delete from member where id_member=?",[id],callback);
    },

    UpdateMember:function(id,Member,callback){
        return db.query("Update Member set member_name=?,member_firstname=?,email=?,password=?,id_location=?,id_status=? where id_member = ?)",[Member.name,Member.firstname,Member.email,Member.password,Member.id_location,Member.id_status,id],callback);
    },
}

module.exports=Member;