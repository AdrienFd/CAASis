var express = require('express');
var router = express.Router();
db= require ('../db_national');
var Member = require('../models/Modelmember');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Member.getMemberById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
        Member.getAllMembers(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});  

router.post('/', Token.verifyToken, function(req,res,){
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Member.addMember(req.body,function(err,count){
                if(err){
                    res.json(err);
                }
                else{
                    res.json(count);
                }
            });
        }
    });
})

router.delete('/:id',Token.verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Member.deleteMember(req.params.id, function(err, count) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(count);  
                }  
            }); 
        } 
    });
});  

router.put('/:id',Token.verifyToken, function(req, res, next) {
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{  
            Member.updateMember(req.params.id, req.body, function(err, rows) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(rows);  
                }  
            });
        } 
    }); 
}) 


//Verify token
/*function verifyToken(req,res,next){
    //get the auth header value
    const bearerHeader = req.headers['authorization'];
    //check if undefined
    if (typeof bearerHeader !== 'undefined'){
        //split the header with a space to get the token
        const bearer = bearerHeader.split(' ');
        //set the token
        const bearerToken = bearer[1];
        req.token = bearerToken;
        //next middleware
        next();

    }
    else{
        res.sendStatus(403);
    }

}*/

module.exports = router;




