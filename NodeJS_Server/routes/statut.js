var express = require('express');
var router = express.Router();
var Statut = require('../models/ModelStatut');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');


//route to get member status all or by id
router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Statut.getStatutById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Statut.getAllStatuts(function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    }
});
//route to post a new status with token verification
router.post('/', Token.verifyToken, function (req, res, ) {
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Statut.addStatut(req.body, function (err, count) {
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

// route to delete a status with token verification
router.delete('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Statut.deleteStatut(req.params.id, function (err, count) {
                if (err) {
                    res.json(err);
                } else {
                    res.json(count);
                }
            });
        }
    });
})

// route to update a status with token verification
router.put('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Statut.updateStatut(req.params.id, req.body, function (err, rows) {
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
