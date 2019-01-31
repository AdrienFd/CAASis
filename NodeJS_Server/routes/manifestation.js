var express = require('express');
var router = express.Router();
var Manifestation = require('../models/ModelManifestation');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Manifestation.getManifestationById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Manifestation.getAllManifestation(function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    }
});

router.post('/', Token.verifyToken, function (req, res, ) {
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Manifestation.addManifestation(req.body, function (err, count) {
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
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Manifestation.deleteManifestation(req.params.id, function (err, count) {
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
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Manifestation.updateManifestation(req.params.id, req.body, function (err, rows) {
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