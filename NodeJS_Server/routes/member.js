var express = require('express');
var router = express.Router();
var Member = require('../models/Modelmember');


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

router.post('/',function(req,res,){
    Member.addMember(req.body,function(err,count){
        if(err){
            res.json(err);
        }
        else{
            res.json(count);
        }
    });
});

router.delete('/:id',verifyToken,function(req, res, next) {
    jwt.verify(req.token,'secretkey',(err,authData)=>{
        if (err){
            res.sendStatus(403);
        }
        else {
            res.json({
                message :'request accepted',
                authData 
            })
            next();
        }

    });
  Member.deleteMember(req.params.id, function(err, count) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(count);  
      }  
  });  
});  

router.put('/:id', function(req, res, next) {  
  Member.updateMember(req.params.id, req.body, function(err, rows) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(rows);  
      }  
  });  
});  

router.post('/login',function(req,res,){
    Member.LoginMember(req.body,function(err,count){
        if (user.length == 0 ){
            return res.sendStatus(403).json({
                message: "Echec de la connexion"
            });
        }

        else{
            const user = {
                id : user[0],
                name:user[1],
                firstname:user[2],
                email:user[3],
                password:user[4]
            }
            jwt.sign({user:user},'secretkey',(err,token)=>{
                res.json({
                    token: token
                });
            });
            
        }
    });
});

function verifyToken(req, res, next){
    const baererHeader = req.headers['authorization'];

    if(typeof baererHeader !== 'undefined'){

        const baerer = baererHeader.split(' ');
        const baererToken = baerer[1];
        req.token = baererToken;
        next();
    }
    else{
        res.sendStatus(403);
    }
}

module.exports = router;
