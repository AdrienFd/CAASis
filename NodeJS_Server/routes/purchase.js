var express = require('express');
var router = express.Router();
var Purchase = require('../models/ModelPurchase');


router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Purchase.getPurchaseById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
        Purchase.getAllPurchases(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});

router.post('/',function(req,res,){
    Purchase.addPurchase(req.body,function(err,count){
        if(err){
            res.json(err);
        }
        else{
            res.json(count);
        }
    });
});

router.delete('/:id', function(req, res, next) {  
  Purchase.deletePurchase(req.params.id, function(err, count) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(count);  
      }  
  });  
});

router.put('/:id', function(req, res, next) {  
  Purchase.updatePurchase(req.params.id, req.body, function(err, rows) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(rows);  
      }
  });  
});

module.exports = router;