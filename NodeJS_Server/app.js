var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require ('body-parser');
var cors = require('cors');
var memberRouter = require('./routes/member');
var articleRouter = require('./routes/article');
var commentRouter = require('./routes/comment');
var imageRouter = require('./routes/image');
var manifestationRouter = require('./routes/manifestation');
var locationRouter = require('./routes/location');
var orderRouter = require('./routes/order');
var statutRouter =require('./routes/statut');
var shoppingcartRouter = require ('./routes/shopping_cart');
var categoryRouter =require ('./routes/category');
var loginRouter = require ('./routes/login');
var illustrateRouter = require ('./routes/illustrate_manifestation');
var commandRouter = require('./routes/command');
var likeRouter= require('./routes/like');
var participateRouter= require('./routes/participate');
var voteRouter= require('./routes/vote');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

app.use(cors());
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));


app.use('/member', memberRouter);
app.use('/article', articleRouter);
app.use('/comment', commentRouter);
app.use('/image', imageRouter);
app.use('/manifestation',manifestationRouter);
app.use('/location',locationRouter);
app.use('/order',orderRouter);
app.use('/statut',statutRouter);
app.use('/shopping_cart',shoppingcartRouter);
app.use('/category',categoryRouter);
app.use('/login',loginRouter);
app.use('/illustrate_manifestation',illustrateRouter);
app.use('/command',commandRouter);
app.use('/like',likeRouter);
app.use('/participate',participateRouter);
app.use('/vote',voteRouter);

app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});
// error handlers
// development error handler
// will print stacktrace
if (app.get('env') === 'development') {
  app.use(function(err, req, res, next) {
    res.status(err.status || 500);
    res.render('error', {
      message: err.message,
      error: err
    });
  });
}
// production error handler
// no stacktraces leaked to user
app.use(function(err, req, res, next) {
  res.status(err.status || 500);
  res.render('error', {
    message: err.message,
    error: {}
  });
});

module.exports = app;
