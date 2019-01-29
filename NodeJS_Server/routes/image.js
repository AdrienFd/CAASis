var express = require('express');
var router = express.Router();
var Image = require('../models/ModelImage');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Image.getImageById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Image.getAllImages(function (err, rows) {
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
            Image.addImage(req.body, function (err, count) {
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
            Image.deleteImage(req.params.id, function (err, count) {
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
            Image.updateImage(req.params.id, req.body, function (err, rows) {
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
