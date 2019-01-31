var express = require('express');
var router = express.Router();
var Order = require('../models/ModelOrder');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');


//route to get purchases all or by id
router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Order.getOrderById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Order.getAllOrders(function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    }
});

//route to post a purchase with token verification
router.post('/', Token.verifyToken, function (req, res, ) {
    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Order.addOrder(req.body, function (err, count) {
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

// route to delete a purchase with token verification
router.delete('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Order.deleteOrder(req.params.id, function (err, count) {
                if (err) {
                    res.json(err);
                } else {
                    res.json(count);
                }
            });
        }
    });
});

// route to update a purchase with token verification
router.put('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Order.updateOrder(req.params.id, req.body, function (err, rows) {
                if (err) {
                    res.json(err);
                } else {
                    res.json(rows);
                }
            });
        }
    });
})

module.exports = router;
