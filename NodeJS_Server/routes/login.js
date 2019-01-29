var express = require('express');
var router = express.Router();
var jwt = require('jsonwebtoken');
db= require ('../db_national');










router.route('/')
.post(function(req,res){
    db.query("Select password from member where email=? and password=? and email_verified=1",[req.body.email,req.body.password],function(error,results,fields){
        
        if(error){
            throw(error);
        }
        else if (results.length==0){
            res.sendStatus(403);
        } 
        else{
            var user = {
                email:req.body.email,
             password: req.body.password,
             member_statut: req.body.member_statut
            }
            switch(req.body.member_statut){
                case '1':
                jwt.sign({user : user},'secretKey1',(err, token)=>{
                    res.json({
                        token
                    });
                });
                break;
                case '2':
                jwt.sign({user : user},'secretKey2',(err, token)=>{
                    res.json({
                        token
                    });
                });
                break;
                case '3':
                jwt.sign({user : user},'secretKey3',(err, token)=>{
                    res.json({
                        token
                    });
                });
                break;
                default:
                res.sendStatus(500);
            }
        }
    });      
});


module.exports = router;