var express = require('express');
var router = express.Router();
var Vote = require('../models/ModelVote');
var Token = require('../models/Modeltoken');
var jwt = require('jsonwebtoken');


router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Vote.getVoteById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
    Vote.getAllVotes(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});  

router.post('/',Token.verifyToken,function(req,res,){
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Vote.addVote(req.body,function(err,count){
                if(err){
                    res.json(err);
                }
                else{
                    res.json(count);
                }
            });
        }
    });
});

router.delete('/:id',Token.verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{ 
            Vote.deleteVote(req.params.id, function(err, count) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(count);  
                }  
            });
        }  
    }); 
}); 

router.put('/:id/:secid',Token.verifyToken,function(req, res, next) {  
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Vote.updateVote(req.params.id,req.params.secid, req.body, function(err, rows) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(rows);  
                }  
            })
        };  
    });
});


module.exports = router;