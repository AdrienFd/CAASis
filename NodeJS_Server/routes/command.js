var express = require('express');
var router = express.Router();
var Command = require('../models/ModelCommand');
var Token = require('../models/Modeltoken');
var jwt = require('jsonwebtoken');

//route to get commands all or by id
router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Command.getCommandById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
    Command.getAllCommands(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});  
//route to post a command  with token verification
router.post('/',Token.verifyToken,function(req,res,){
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Command.addCommand(req.body,function(err,count){
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

// route to delete a command with token verification
router.delete('/:id',Token.verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{ 
            Command.deleteCommand(req.params.id, function(err, count) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(count);  
                }  
            });
        }  
    }); 
}); 

// route to update a command with token verification
router.put('/:id/:secid',Token.verifyToken,function(req, res, next) {  
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Command.updateCommand(req.params.id,req.params.secid, req.body, function(err, rows) {  
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