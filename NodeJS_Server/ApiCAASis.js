var express = require('express'); 
var app = express(); 
// Here we define server parameters.
var hostname = 'localhost';
var port = 3000;

var mysql = require('mysql');
 
console.log('Get connection ...');
 
//Database connection
var connNational = mysql.createConnection({
    database: 'caasis_national_db',
    host: "localhost",
    user: "root",
    password: ""
  });

  connNational.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });

  var connLocal = mysql.createConnection({
    database: 'caasis_local_Arras_db',
    host: "localhost",
    user: "root",
    password: ""
  });
   
  connLocal.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });
 
var bodyParser = require("body-parser"); 
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
 
//Afin de faciliter le routage (les URL que nous souhaitons prendre en charge dans notre API), nous créons un objet Router.
//C'est à partir de cet objet myRouter, que nous allons implémenter les méthodes. 
var myRouter = express.Router(); 

var tables = {"National":["member","location","statut"],"Local":["article","category","command","comment","illustrate_manifestation","image","like_img","manifestation","participate","purchase","shopping_cart","vote"]};



myRouter.route('/:alltable')
// J'implémente les méthodes GET, PUT, UPDATE et DELETE
// GET
.get(function(req,res,next){ 
    var table = req.params.alltable;
    for (i=0;i<(tables.Local.length+tables.National.length);i++){
      if (req.params.alltable==tables.Local[i]){
        db="connLocal";
      }
      else if (req.params.alltable == tables.National[i]){
        db="connNational";
      }
    }
    if (db=="connNational"){
      connNational.query("SELECT * from ??",table, function (error, results, fields) {
		  if (error) throw error;
		  res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
    });
  }
  else if (db=="connLocal"){
    connLocal.query("SELECT * from ??",table, function (error, results, fields) {
		  if (error) throw error;
      res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
    });
  }
})


//POST
.post(function(req,res){
      res.json({message : "Ajoute un nouvel utilisateur",
        methode : req.method,
        member_name :req.body.member_name,
        member_firstname:req.body.member_firstname,
        email:req.body.email,
        password:req.body.password
    });
})
//PUT
.put(function(req,res){ 
      res.json({message : "Mise à jour des informations d'un utilisateur", methode : req.method});
})
//DELETE
.delete(function(req,res){ 
res.json({message : "Suppression d'un utilisateur", methode : req.method});  
});

myRouter.route('/:table/:condition/:id')
.get(function(req,res,next){ 
    var request = "Select * from ?? where ?? = ?";
    var parameters=[req.params.table,req.params.condition,req.params.id];
    requestSql=connNational.format(request,parameters);
    requestLocal=connLocal.format(request,parameters);
    
    for (i=0;i<(tables.Local.length+tables.National.length);i++){
      if (req.params.table==tables.Local[i]){
        db="connLocal";
      }
      else if (req.params.table == tables.National[i]){
        db="connNational";
      }
    }

    if (db=="connNational"){
      connNational.query(requestSql, function (error, results, fields) {
		  if (error) throw error;
      res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
   });
  }
  else if (db=="connLocal"){
    connLocal.query(requestLocal, function (error, results, fields) {
		  if (error) throw error;
      res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
    });
  }
})
.put(function(req,res){ 
	  res.json({message : "Vous souhaitez modifier les informations de l'utilisateur n°" + req.params.user_id});
})
.delete(function(req,res){ 
	  res.json({message : "Vous souhaitez supprimer  l'utilisateur n°" + req.params.user_id});
});

 
// Nous demandons à l'application d'utiliser notre routeur
app.use(myRouter);  
// server boot 
app.listen(port, hostname, function(){
	console.log("Mon serveur fonctionne sur http://"+ hostname +":"+port+"\n"); 
});