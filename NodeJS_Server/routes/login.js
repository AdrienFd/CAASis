var express = require('express');
var router = express.Router();
var jwt = require('jsonwebtoken');
db= require ('../db_national');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');







//route to login a member and give him a token according to his status

router.route('/')
.post(function(req,res){
    console.log(req.body);
    //search for correspondance in the database
    db.query("Select password,id_statut from member where email=? and password=? and email_verified=1",[req.body.email,req.body.password],function(error,results,fields){
        console.log(results[0].id_statut);
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
             member_statut: results[0].id_statut
            }
            //token distribution
            switch(user.member_statut){
                case 1 :
                jwt.sign({user : user},'secretKey1',(err, token)=>{
                    res.json({
                        token
                    });
                });
                break;
                case 2:
                jwt.sign({user : user},'secretKey2',(err, token)=>{
                    res.json({
                        token
                    });
                });
                break;
                case 3:
                jwt.sign({user : user},'secretKey3',(err, token)=>{
                    res.json({
                        token
                    });
                });
                break;
                default:
                //if error
                res.sendStatus(500);
            }
        }
    });      
});


module.exports = router;