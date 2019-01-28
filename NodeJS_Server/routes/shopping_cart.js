var express = require('express');
var router = express.Router();
var Shopping = require('../models/ModelShopping_cart');


router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        Shopping.getShoppingById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
        Shopping.getAllShoppings(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});  

router.post('/',function(req,res,){
    Shopping.addShopping(req.body,function(err,count){
        if(err){
            res.json(err);
        }
        else{
            res.json(count);
        }
    });
});

router.delete('/:id', function(req, res, next) {  
  Shopping.deleteShopping(req.params.id, function(err, count) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(count);  
      }  
  });  
});  

router.put('/:id', function(req, res, next) {  
  Shopping.updateShopping(req.params.id, req.body, function(err, rows) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(rows);  
      }  
  });  
});  

module.exports = router;
