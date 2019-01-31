var express = require('express');
var router = express.Router();
var Location = require('../models/ModelLocation');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Location.getLocationById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Location.getAllLocations(function (err, rows) {
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
            Location.addLocation(req.body, function (err, count) {
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
            Location.deleteLocation(req.params.id, function (err, count) {
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
            Location.updateLocation(req.params.id, req.body, function (err, rows) {
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