var express = require('express');
var router = express.Router();
var Illustration = require('../models/Model_Illustrate');
var Token = require('../models/Modeltoken');
var jwt = require('jsonwebtoken');

//route to get manifestation images all or by id
router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Illustration.getIllustrationById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
    Illustration.getAllIllustrations(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
}); 

//route to post an illustration with token verification
router.post('/',Token.verifyToken,function(req,res,){
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Illustration.addIllustration(req.body,function(err,count){
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

// route to delete an illustration with token verification
router.delete('/:id/:secid',Token.verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{ 
            Illustration.deleteIllustration(req.params.id, function(err, count) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(count);  
                }  
            });
        }  
    }); 
}); 

// route to update an illustration with token verification
router.put('/:id/:secid',Token.verifyToken,function(req, res, next) {  
    jwt.verify(req.token,'secretKey2', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Illustration.updateIllustration(req.params.id,req.params.secid, req.body, function(err, rows) {  
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