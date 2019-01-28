var express = require('express');
var router = express.Router();
var Status = require('../models/ModelStatus');


router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Status.getStatusById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
        Status.getAllStatus(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});

router.post('/',function(req,res,){
    Status.addStatus(req.body,function(err,count){
        if(err){
            res.json(err);
        }
        else{
            res.json(count);
        }
    });
});

router.delete('/:id', function(req, res, next) {  
  Status.deleteStatus(req.params.id, function(err, count) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(count);  
      }  
  });  
});

router.put('/:id', function(req, res, next) {  
  Status.updateStatus(req.params.id, req.body, function(err, rows) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(rows);  
      }
  });  
});

module.exports = router;