var express = require('express');
var router = express.Router();
db= require ('../db_national');
var Member = require('../models/Modelmember');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

//route to get members all or by id
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

//route to post a new member with token verification
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

// route to delete a member with token verification
router.delete('/:id',Token.verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
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

// route to update a member with token verification
router.put('/:id',Token.verifyToken, function(req, res, next) {
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
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




module.exports = router;




