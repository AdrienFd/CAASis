var express = require('express');
var router = express.Router();
var Like = require('../models/ModelLike');
var Token = require('../models/Modeltoken');
var jwt = require('jsonwebtoken');

//route to get likes all or by id
router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Like.getLikeById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
    Like.getAllLikes(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});  
//route to post a like on an image with token verification
router.post('/',Token.verifyToken,function(req,res,){
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Like.addLike(req.body,function(err,count){
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

// route to delete a like with token verification
router.delete('/:id',Token.verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{ 
            Like.deleteLike(req.params.id, function(err, count) {  
                if (err) {  
                    res.json(err);  
                } else {  
                    res.json(count);  
                }  
            });
        }  
    }); 
}); 

// route to update a like with token verification
router.put('/:id/:secid',Token.verifyToken,function(req, res, next) {  
    jwt.verify(req.token,'secretKey1', (err, authData)=> {
        if (err){
            res.sendStatus(403);
        }
        else{
            Like.updateLike(req.params.id, req.paramsIsecid,req.body, function(err, rows) {  
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