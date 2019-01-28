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

router.delete('/:id',function(req, res, next) {
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
        if (err){
            res.json(err);
        }
        else{
            res.json(req.body);
        }
    });
});



module.exports = router;
