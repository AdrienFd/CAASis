var express = require('express');
var router = express.Router();
var CesiLocation = require('../models/ModelLocation');


router.get('/:id?', function(req, res) {  
    if (req.params.id) {  
        CesiLocation.getLocationById(req.params.id, function(err, rows) {  
            if (err) {  
                res.json(err);  
            } else {  
                res.json(rows);  
            }  
        });  
    } else {  
        CesiLocation.getAllLocations(function(err, rows) {  
            if (err) {  
                res.json(err);   
            } else {  
                res.json(rows);  
            }  
        });  
    }  
});

router.post('/',function(req,res,){
    CesiLocation.addLocation(req.body,function(err,count){
        if(err){
            res.json(err);
        }
        else{
            res.json(count);
        }
    });
});

router.delete('/:id', function(req, res, next) {  
  CesiLocation.deleteLocation(req.params.id, function(err, count) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(count);  
      }  
  });  
});

router.put('/:id', function(req, res, next) {  
  CesiLocation.UpdateLocation(req.params.id, req.body, function(err, rows) {  
      if (err) {  
          res.json(err);  
      } else {  
          res.json(rows);  
      }
  });  
});

module.exports = router;