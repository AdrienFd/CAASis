var express = require('express');
var router = express.Router();
var Shopping = require('../models/ModelShopping_cart');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Shopping.getShoppingById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Shopping.getAllShoppings(function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    }
});

router.post('/', Token.verifyToken, function (req, res, ) {
    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Shopping.addShopping(req.body, function (err, count) {
                if (err) {
                    res.json(err);
                }
                else {
                    res.json(count);
                }
            });
        }
    });
});

router.delete('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Shopping.deleteShopping(req.params.id, function (err, count) {
                if (err) {
                    res.json(err);
                } else {
                    res.json(count);
                }
            });
        }
    });
});

router.put('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Shopping.updateShopping(req.params.id, req.body, function (err, rows) {
                if (err) {
                    res.json(err);
                } else {
                    res.json(rows);
                }
            });
        }
    });
});

module.exports = router;
