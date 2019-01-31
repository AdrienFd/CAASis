var express = require('express');
var router = express.Router();
var Image_comment = require('../models/ModelComment');
var jwt = require('jsonwebtoken');
var Token = require('../models/Modeltoken');

//route to get comments all or by id
router.get('/:id?', function (req, res) {
    if (req.params.id) {
        Image_comment.getCommentById(req.params.id, function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    } else {
        Image_comment.getAllComments(function (err, rows) {
            if (err) {
                res.json(err);
            } else {
                res.json(rows);
            }
        });
    }
});
//route to post a comment with token verification
router.post('/', Token.verifyToken, function (req, res, ) {

    jwt.verify(req.token, 'secretKey1', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Image_comment.addComment(req.body, function (err, count) {
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

// route to delete a comment with token verification
router.delete('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Image_comment.deleteComment(req.params.id, function (err, count) {
                if (err) {
                    res.json(err);
                } else {
                    res.json(count);
                }
            });
        }
    });
})

// route to update a comment  with token verification
router.put('/:id', Token.verifyToken, function (req, res, next) {
    jwt.verify(req.token, 'secretKey2', (err, authData) => {
        if (err) {
            res.sendStatus(403);
        }
        else {
            Image_comment.updateComment(req.params.id, req.body, function (err, rows) {
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
