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
       user = db.query("Select password from member where email =? and password = ?",[Member.email,Member.password],callback);
       if (user.length == 0 ){
        return res.sendStatus(403).json({
            message: "Echec de la connexion"
        });
        }
        else{
            const user = {
                name:Member.member_name,
                firstname:Member.member_firstname,
                email:Member.email,
                password:Member.password
            }
            
        jwt.sign({user:user},'secretkey',(err,token)=>{
           var token = json({
                token: token,
                user : user
            });
        });
        
        return token;
        

    }
}
}
module.exports=Member;